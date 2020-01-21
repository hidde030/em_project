<?php
session_start();
define('conString', 'mysql:host=localhost;dbname=em_em');
define('dbUser', 'em_em');
define('dbPass', 'Event123');

define('userfile', 'user.php');
define('loginfile', 'login.php');
define('activatefile', 'activate.php');
define('registerfile', 'register.php');

// Login Pages
define('indexHead', 'inc/indexhead.htm');
define('indexTop', 'inc/indextop.htm');
define('loginForm', 'inc/loginform.php');
define('activationForm', 'inc/activationform.php');
define('indexMiddle', 'inc/indexmiddle.htm');
define('registerForm', 'inc/registerform.php');
define('indexFooter', 'inc/indexfooter.htm');
define('indexPage', 'index.php');

// Event Pages
define('eventPage', 'events.php');
define('productDetailPage', 'event.php');

define('eventHead', 'inc/eventshead.htm');
define('eventFooter', 'inc/eventsfooter.htm');
define('eventCreate', 'inc/create-event.php');
define('eventDetail', 'inc/detail-event.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = new User();
$user->dbConnect(conString, dbUser, dbPass);
