<?php
class User{
    private $pdo;
    private $user;
    private $msg;
    private $permitedAttemps = 5;

    // Connection
    public function dbConnect($conString, $user, $pass){
        if(session_status() === PHP_SESSION_ACTIVE){
            try {
                $pdo = new PDO($conString, $user, $pass);
                $this->pdo = $pdo;
                return true;
            }catch(PDOException $e) {
                $this->msg = 'Connection did not work out!';
                return false;
            }
        }else{
            $this->msg = 'Session did not start.';
            return false;
        }
    }

    // Return User
    public function getUser(){
        return $this->user;
    }

    // Login
    public function login($email,$password){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return false;
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT id, fname, lname, email, wrong_logins, password, user_role, role, confirmed FROM users WHERE email = ? and confirmed = 1 limit 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if(password_verify($password,$user['password'])){
                if($user['wrong_logins'] <= $this->permitedAttemps){
                    $this->user = $user;
                    session_regenerate_id();
                    $_SESSION['user']['id'] = $user['id'];
                    $_SESSION['user']['fname'] = $user['fname'];
                    $_SESSION['user']['lname'] = $user['lname'];
                    $_SESSION['user']['email'] = $user['email'];
                    $_SESSION['user']['user_role'] = $user['user_role'];
                    $_SESSION['user']['role'] = $user['role'];
                    $_SESSION['user']['confirmed'] = $user['confirmed'];
                    return true;
                }else{
                    $this->msg = 'This user account is blocked, please contact our support department.';
                    return false;
                }
            }else{
                $this->registerWrongLoginAttemp($email);
                $this->msg = 'Invalid login information or the account is not activated.';
                return false;
            }
        }
    }

    // Register
    public function registration($email,$fname,$insertion,$lname,$pass){
        $pdo = $this->pdo;
        if($this->checkEmail($email)){
            $this->msg = 'This email is already taken.';
            return false;
        }
        if(!(isset($email) && isset($fname) && isset($lname) && isset($pass) && filter_var($email, FILTER_VALIDATE_EMAIL))){
            $this->msg = 'Insert all valid requered fields.';
            return false;
        }

        $pass = $this->hashPass($pass);
        $confCode = rand(pow(10, 5-1), pow(10, 5)-1);
        $stmt = $pdo->prepare('INSERT INTO users (fname, insertion, lname, email, password, confirm_code) VALUES (?, ?, ?, ?, ?, ?)');
        if($stmt->execute([$fname,$insertion,$lname,$email,$pass,$confCode])){
            if($this->sendConfirmationEmail($email)){
                return true;
            }else{
                $this->msg = 'confirmation email sending has failed.';
                return false;
            }
        }else{
            $this->msg = 'Inserting a new user failed.';
            print_r($stmt->errorInfo());
            return false;
        }
    }

    // Confirmation Email
    private function sendConfirmationEmail($email){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT confirm_code FROM users WHERE email = ? limit 1');
        $stmt->execute([$email]);
        $code = $stmt->fetch();

        $subject = 'Confirm your registration';
        $message = 'Please confirm you registration by pasting this code in the confirmation box: '.$code['confirm_code'];
        $headers = 'X-Mailer: PHP/' . phpversion();

        if(mail($email, $subject, $message, $headers)){
            return true;
        }else{
            return false;
        }
    }

    // Activate Account
    public function emailActivation($email,$confCode){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE users SET confirmed = 1 WHERE email = ? and confirm_code = ?');
        $stmt->execute([$email,$confCode]);
        if($stmt->rowCount()>0){
            $stmt = $pdo->prepare('SELECT id, fname, lname, email, wrong_logins, user_role FROM users WHERE email = ? and confirmed = 1 limit 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            $this->user = $user;
            session_regenerate_id();
            if(!empty($user['email'])){
            	$_SESSION['user']['id'] = $user['id'];
	            $_SESSION['user']['fname'] = $user['fname'];
	            $_SESSION['user']['lname'] = $user['lname'];
	            $_SESSION['user']['email'] = $user['email'];
	            $_SESSION['user']['user_role'] = $user['user_role'];
	            return true;
            }else{
            	$this->msg = 'Account activitation failed.';
            	return false;
            }
        }else{
            $this->msg = 'Account activitation failed.';
            return false;
        }
    }

    // Change Password
    public function passwordChange($id,$pass){
        $pdo = $this->pdo;
        if(isset($id) && isset($pass)){
            $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
            if($stmt->execute([$id,$this->hashPass($pass)])){
                return true;
            }else{
                $this->msg = 'Password change failed.';
                return false;
            }
        }else{
            $this->msg = 'Provide an ID and a password.';
            return false;
        }
    }


    // Assign Role
    public function assignRole($id,$role){
        $pdo = $this->pdo;
        if(isset($id) && isset($role)){
            $stmt = $pdo->prepare('UPDATE users SET role = ? WHERE id = ?');
            if($stmt->execute([$id,$role])){
                return true;
            }else{
                $this->msg = 'Role assign failed.';
                return false;
            }
        }else{
            $this->msg = 'Provide a role for this user.';
            return false;
        }
    }



    // Update User Information
    public function userUpdate($id,$fname,$lname){
        $pdo = $this->pdo;
        if(isset($id) && isset($fname) && isset($lname)){
            $stmt = $pdo->prepare('UPDATE users SET fname = ?, lname = ? WHERE id = ?');
            if($stmt->execute([$id,$fname,$lname])){
                return true;
            }else{
                $this->msg = 'User information change failed.';
                return false;
            }
        }else{
            $this->msg = 'Provide a valid data.';
            return false;
        }
    }

    // Check email in use
    private function checkEmail($email){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? limit 1');
        $stmt->execute([$email]);
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    // Register Wrong Login Attemps
    private function registerWrongLoginAttemp($email){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE users SET wrong_logins = wrong_logins + 1 WHERE email = ?');
        $stmt->execute([$email]);
    }


    // Hash Passwords
    private function hashPass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    // Print Messages
    public function printMsg(){
        print $this->msg;
    }

    // Logout
    public function logout() {
        $_SESSION['user'] = null;
        session_regenerate_id();
        return true;
    }

    // List all Users
    public function listUsers(){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM users');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    // List Events
    public function listEvents(){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM events');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    // List Event Detail Page
    public function listDetails(){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare("SELECT * FROM events WHERE eventCode={$_GET['ID']}");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    // Add Events
    public function addEvent($eventName,$eventCode,$eventVendor,$eventDescription,$eventPresentor,$eventLocation,$eventBeginDate,$eventEndDate,$eventBeginTime,$eventEndTime,$quantityTickets,$eventPrice,$eventImg,$eventColor){
        $pdo = $this->pdo;
        if(!(isset($eventName) && isset($eventCode) && isset($eventVendor) && isset($eventDescription) && isset($eventPresentor) && isset($eventLocation) && isset($eventBeginDate) && isset($eventEndDate) && isset($eventBeginTime) && isset($eventEndTime) && isset($quantityTickets) && isset($eventPrice) && isset($eventImg) && isset($eventColor) )){
            $this->msg = 'Insert all valid requered fields.';
            return false;
        }
        $stmt = $pdo->prepare('INSERT INTO events (eventName, eventCode, eventVendor, eventDescription, eventPresentor, eventLocation, eventBeginDate, eventEndDate, eventBeginTime, eventEndTime, quantityTickets, eventPrice, eventImg, eventColor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        if($stmt->execute([$eventName,$eventCode,$eventVendor,$eventDescription,$eventPresentor,$eventLocation,$eventBeginDate,$eventEndDate,$eventBeginTime,$eventEndTime,$quantityTickets,$eventPrice,$eventImg,$eventColor])){

        }else{
            $this->msg = 'Adding a new event failed.';
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public function render($path,$vars = '') {
        ob_start();
        include($path);
        return ob_get_clean();
    }

    public function indexHead() {
        print $this->render(indexHead);
    }

    public function indexTop() {
        print $this->render(indexTop);
    }

    public function loginForm() {
        print $this->render(loginForm);
    }

    public function activationForm() {
        print $this->render(activationForm);
    }

    public function indexMiddle() {
        print $this->render(indexMiddle);
    }

    public function registerForm() {
        print $this->render(registerForm);
    }

    public function indexFooter() {
        print $this->render(indexFooter);
    }

    public function eventHead() {
        print $this->render(eventHead);
    }

    public function eventFooter() {
        print $this->render(eventFooter);
    }

    public function eventCreate() {
        print $this->render(eventCreate);
    }

    public function eventDetail() {
        $event = $this->listDetails();
        print $this->render(eventDetail,$event);
    }

    public function userPage() {
    	if($_SESSION['user']['confirmed'] == 1){
    		$events = $this->listEvents();
        print $this->render(eventPage,$events);
    	}
      else {
        print $this->render(indexPage);
      }
    }
}
