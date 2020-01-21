<div class="form-group form-group-titles">
	<h4 class="form-title">Welcome Back!</h4>
	<h5 class="form-subtitle">We're so excited to see you again!</h5>
</div>
<p id="form-notification-global-login" class="form-notifications"></p>
<div class="form-group">
	<p class="form-input-title">Email:</p>
	<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="" value="">
</div>
<div class="form-group">
	<p class="form-input-title">Password:</p>
	<input type="password" name="password" id="password1" tabindex="2" class="form-control" placeholder="">
</div>
<div class="form-group">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<input type="button" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="Log In">
		</div>
	</div>
	<div class="row form-links">
		<div class="col-sm-6 col-sm-offset-3">
			<a href="#" class="active" id="register-form-link">Create Account</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("#login-submit").click(function(){
			if($("#username").val() != "" && $("#password1").val() != "" && validateEmail($("#username").val())){
				$.ajax({
				  method: "POST",
				  url: "<?=loginfile?>",
				  data: { username: $("#username").val(), password: $("#password1").val() }
				}).done(function( msg ) {
			    if(msg !== ""){
			    	document.getElementById("form-notification-global-login").innerHTML = msg;
			    }else{
			    	window.location = "<?=userfile?>";
			    }
				});
			}else{
				document.getElementById("form-notification-global-login").innerHTML = "Insert valid information";
			}
		});
	});
</script>
