<div id="form-group-titles-register" class="form-group form-group-titles">
	<h4 class="form-title">Register your account</h4>
</div>
<p id="form-notification-global" class="form-notifications"></p>
<div id="form-group-fname" class="form-group">
	<p class="form-input-title">First name:</p>
	<input type="text" name="fname" id="fname" tabindex="1" class="form-control" value="">
	<p id="form-notification-fname" class="form-notifications"></p>
</div>
<div id="form-group-insertion" class="form-group">
	<p class="form-input-title">Infix name:</p>
	<input type="text" name="insertion" id="insertion" tabindex="2" class="form-control" value="">
	<p id="form-notification-insertion" class="form-notifications"></p>
</div>
<div id="form-group-lname" class="form-group">
	<p class="form-input-title">Last name:</p>
	<input type="text" name="lname" id="lname" tabindex="3" class="form-control" value="">
	<p id="form-notification-lname" class="form-notifications"></p>
</div>
<div id="form-group-email" class="form-group">
	<p class="form-input-title">E-mail address:</p>
	<input type="email" name="email" id="email" tabindex="4" class="form-control" placeholder="" value="">
	<p id="form-notification-email" class="form-notifications"></p>
</div>
<div id="form-group-password2" class="form-group">
	<p class="form-input-title">Password:</p>
	<input type="password" name="password" id="password2" tabindex="5" class="form-control" placeholder="">
	<p id="form-notification-password" class="form-notifications"></p>
</div>
<div id="form-group-confirm-password" class="form-group">
	<p class="form-input-title">Confirm password:</p>
	<input type="password" name="confirm-password" id="confirm-password" tabindex="6" class="form-control" placeholder="">
</div>
<div class="form-group">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<input type="button" name="register-submit" id="register-submit" tabindex="7" class="form-control btn btn-register" value="Continue">
		</div>
	</div>
	<div class="row form-links">
		<div class="col-sm-6 col-sm-offset-3">
			<a href="#" class="active" id="login-form-link">Already have an account?</a>
			<p>Or <a href="http://em.gluweb.nl/profile/activation.php">activate</a> your account.</p>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#register-submit").click(function(){
			if($("#fname").val() != "" && $("#lname").val() != "" && $("#email").val() != "" && $("#password2").val() != "" && validateEmail($("#email").val())){
				if($("#password2").val() === $("#confirm-password").val() ){
					if (validatePassword($("#password2").val())) {
						document.getElementById("form-notification-global").innerHTML = "A confirmation mail has been sent, please confirm your account registration!";
						$.ajax({
						  method: "POST",
						  url: "<?=registerfile?>",
						  data: { fname: $("#fname").val(), insertion: $("#insertion").val() , lname: $("#lname").val(), email: $("#email").val(), password: $("#password2").val() }
						}).done(function( msg ) {
							document.getElementById("form-notification-global").innerHTML = msg;
						});
					}
					else {
						document.getElementById("form-notification-password").innerHTML = "Password must contain atleast 8 letters, 1 uppercase letter, 1 lowercase letter and 1 number";
					}
				}else{
					document.getElementById("form-notification-password").innerHTML = "Passwords don't match!";
				}
			}else{
				document.getElementById("form-notification-global").innerHTML = "Insert valid information";
			}
		});
	});
</script>
