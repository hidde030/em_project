// Login -> Register | Register -> Login
$(function() {
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
});

// RegEx Validations
function validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,})?$/;
  	return emailReg.test( $email );
}

function validatePassword($password) {
	var passwordReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
  	return passwordReg.test( $password );
}

// Show / Hide Inputs
setInterval(function () {
  if ( $("#fname").val() != "" ) {
    $('#form-group-insertion').show( "slow", function() {});
    $('#form-group-lname').show( "slow", function() {});
  }
  else {
    $('#form-group-insertion').hide( "slow", function() {});
    $('#form-group-lname').hide( "slow", function() {});
  }

  if ( $("#password2").val() != "" ) {
    $('#form-group-confirm-password').show( "slow", function() {});
    $('#password-strenght').show( "slow", function() {});
  }
  else {
    $('#form-group-confirm-password').hide( "slow", function() {});
    $('#password-strenght').hide( "slow", function() {});
  }
}, 100);
