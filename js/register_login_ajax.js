// Validate user registeration form function
function registervalidation() {
	
	// Disable button
	document.getElementById('registerbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var userid = document.getElementById('userid').value
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var gender = document.getElementById('gender').value;
	var department = document.getElementById('department').value;
	var rank = document.getElementById('rank').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var passwordmatch = document.getElementById('passwordmatch').value;

	// Define regex for id, name and email
	var useridregex = /^[0-9]{8}$/gm;
	var firstnameregex = /^[a-zA-Z]{2,50}/gm;
	var lastnameregex = /^[a-zA-Z]{2,50}/gm;
	var emailregex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gm;

	if (!useridregex.test(userid)) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_id").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_id").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;
		
	} else if (!firstnameregex.test(firstname)) {

		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_first_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_first_name").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;

	} else if (!lastnameregex.test(lastname)) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_last_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_last_name").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;

	} else if (!emailregex.test(email)) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_email_address").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_email_address").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;

	} else if (password == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_password").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_password").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;

	} else if (passwordmatch == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_password_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_password_match").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;
		
	} else if (password != passwordmatch) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#passwords_do_not_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#passwords_do_not_match").slideUp(500);
		});

		// Enable button
		document.getElementById('registerbutton').disabled = false;
		
	} else {
		
		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/register_action.php',
			type : 'POST',
			data : {
				userid : userid,
				firstname : firstname,
				lastname : lastname,
				gender : gender,
				department : department,
				rank : rank,
				email : email,
				password : password
			},
			success : function(response) {
				if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#user_registration_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#user_registration_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('registerbutton').disabled = false;

					return false;
				}
				else {

					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/user_account_created.php";
					
				}
			}
		});
		return false;
	}
}

// Validate user login form function
function loginvalidation() {

	// Disable button
	document.getElementById('loginbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var checkbox = document.getElementById('loginrememberme');
	var rememberme;

	// Set remember me
	if (checkbox.checked) {
		rememberme = "checked";
	} else {
		rememberme = "forget";
	}

	// Define regex for email
	var emailregex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gm;

	if (!emailregex.test(email)) {

		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_email_address").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_email_address").slideUp(500);
		});

		// Enable button
		document.getElementById('loginbutton').disabled = false;

	} else if (password == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#password_empty").fadeTo(5000, 50).slideUp(500, function() {
			$("#password_empty").slideUp(500);
		});

		// Enable button
		document.getElementById('loginbutton').disabled = false;
		
	} else {
			
		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/login_action.php',
			type : 'POST',
			data : {
				email : email,
				password : password
			},
			success : function(response) {
				if (response == "inactive") {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#user_inactive").fadeTo(10000, 50).slideUp(500, function() {
						$("#user_inactive").slideUp(500);
					});

					document.getElementById('loginbutton').disabled = false;

					return false;
				}
				else if (response == 'pending') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#user_pending").fadeTo(10000, 50).slideUp(500, function() {
						$("#user_pending").slideUp(500);
					});

					document.getElementById('loginbutton').disabled = false;

					return false;
				}
				else if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#invalid_email_address_or_password").fadeTo(10000, 50).slideUp(500, function() {
						$("#invalid_email_address_or_password").slideUp(500);
					});

					// Enable button
					document.getElementById('loginbutton').disabled = false;

					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/dashboard.php";
					
				}
			}
		});
		return false;
	}
}

// Validate admin user registeration form function
function adminregistervalidation() {
	
	// Disable button
	document.getElementById('adminregisterbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var userid = document.getElementById('userid').value
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var passwordmatch = document.getElementById('passwordmatch').value;

	// Define regex for id, name and email
	var useridregex = /^[0-9]{8}$/gm;
	var firstnameregex = /^[a-zA-Z]{2,50}/gm;
	var lastnameregex = /^[a-zA-Z]{2,50}/gm;
	var emailregex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gm;

	if (!useridregex.test(userid)) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_id").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_id").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;
		
	} else if (!firstnameregex.test(firstname)) {

		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_first_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_first_name").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;

	} else if (!lastnameregex.test(lastname)) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_last_name").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_last_name").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;

	} else if (!emailregex.test(email)) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_email_address").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_email_address").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;

	} else if (password == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_password").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_password").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;

	} else if (passwordmatch == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_password_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_password_match").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;

	} else if (password != passwordmatch) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#passwords_do_not_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#passwords_do_not_match").slideUp(500);
		});

		// Enable button
		document.getElementById('adminregisterbutton').disabled = false;
		
	} else {
		
		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/admin_register_action.php',
			type : 'POST',
			data : {
				userid : userid,
				firstname : firstname,
				lastname : lastname,
				email : email,
				password : password
			},
			success : function(response) {
				if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#user_registration_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#user_registration_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('registerbutton').disabled = false;
					
					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/admin_account_created.php";
					
				}
			}
		});
		return false;
	}
}

// Validate admin user login form function
function adminloginvalidation() {

	// Disable button
	document.getElementById('adminloginbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var checkbox = document.getElementById('loginrememberme');
	var rememberme;

	// Set remember me
	if (checkbox.checked) {
		rememberme = "checked";
	} else {
		rememberme = "forget";
	}

	// Define regex for email
	var emailregex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gm;

	if (!emailregex.test(email)) {

		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_email_address").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_email_address").slideUp(500);
		});

		// Enable button
		document.getElementById('adminloginbutton').disabled = false;

	} else if (password == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#password_empty").fadeTo(5000, 50).slideUp(500, function() {
			$("#password_empty").slideUp(500);
		});

		// Enable button
		document.getElementById('adminloginbutton').disabled = false;
		
	} else {
			
		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/admin_login_action.php',
			type : 'POST',
			data : {
				email : email,
				password : password
			},
			success : function(response) {
				if (response == "inactive") {
					
					// Hide spinner
					Spinner.hide();
					
					// Alert error
					$("#user_inactive").fadeTo(10000, 50).slideUp(500, function() {
						$("#user_inactive").slideUp(500);
					});
					document.getElementById('adminloginbutton').disabled = false;
					
					return false;
				}
				else if (response == 'pending') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#user_pending").fadeTo(10000, 50).slideUp(500, function() {
						$("#user_pending").slideUp(500);
					});

					document.getElementById('adminloginbutton').disabled = false;

					return false;
				}
				else if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#invalid_email_address_or_password").fadeTo(10000, 50).slideUp(500, function() {
						$("#invalid_email_address_or_password").slideUp(500);
					});

					// Enable button
					document.getElementById('adminloginbutton').disabled = false;

					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/admin_dashboard.php";
					
				}
			}
		});
		return false;
	}
}

// Forgot password function
function forgotpassword() {
	
	// Disable button 
	document.getElementById('forgotbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var email = document.getElementById('email').value;

	// Define regex for email
	var emailregex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gm;

	if (!emailregex.test(email)) {

		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();
		
		// Alert error
		$("#invalid_email_address").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_email_address").slideUp(500);
		});
		
		document.getElementById('forgotbutton').disabled = false;
		
	} else {
			
		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/forgot_password_action.php',
			type : 'POST',
			data : {
				email : email
			},
			success : function(response) {
				if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#forgot_password_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#forgot_password_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('forgotbutton').disabled = false;
					
					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/user_forgot_password.php";
					
				}
			}
		});
		return false;
	}
}

// Forgot admin password function
function adminforgotpassword() {
	
	// Disable button 
	document.getElementById('forgotbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var email = document.getElementById('email').value;

	// Define regex for email
	var emailregex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gm;

	if (!emailregex.test(email)) {

		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();
		
		// Alert error
		$("#invalid_email_address").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_email_address").slideUp(500);
		});
		
		document.getElementById('forgotbutton').disabled = false;
		
	} else {
			
		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/admin_forgot_password_action.php',
			type : 'POST',
			data : {
				email : email
			},
			success : function(response) {
				if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#forgot_password_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#forgot_password_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('forgotbutton').disabled = false;
					
					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/user_forgot_password.php";
					
				}
			}
		});
		return false;
	}
}

// Reset password function
function resetpassword() {
	
	// Disable button
	document.getElementById('resetpasswordbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var password = document.getElementById('newpassword').value;
	var passwordmatch = document.getElementById('newpasswordmatch').value;
	var email = document.getElementById('email').value;

	if (password == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_new_password").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_new_password").slideUp(500);
		});

		document.getElementById('resetpasswordbutton').disabled = false;

	} else if (passwordmatch == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_new_password_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_new_password_match").slideUp(500);
		});
		
		document.getElementById('resetpasswordbutton').disabled = false;
		
	} else if (password != passwordmatch) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#new_passwords_do_not_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#new_passwords_do_not_match").slideUp(500);
		});
		
		document.getElementById('resetpasswordbutton').disabled = false;
		
	} else {

		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/reset_password_action.php',
			type : 'POST',
			data : {
				email : email,
				password : password
			},
			success : function(response) {
				if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#password_reset_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#password_reset_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('registerbutton').disabled = false;
					
					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/user_account_password_changed.php";
					
				}
			}
		});
		return false;
	}
}

// Reset admin password function
function adminresetpassword() {
	
	// Disable button
	document.getElementById('resetpasswordbutton').disabled = true;

	// Initialize spinner
	Spinner();

	// Show spinner
	Spinner.show();
	
	// Grab form data
	var password = document.getElementById('newpassword').value;
	var passwordmatch = document.getElementById('newpasswordmatch').value;
	var email = document.getElementById('email').value;

	if (password == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_new_password").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_new_password").slideUp(500);
		});

		document.getElementById('resetpasswordbutton').disabled = false;

	} else if (passwordmatch == '') {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#invalid_new_password_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#invalid_new_password_match").slideUp(500);
		});
		
		document.getElementById('resetpasswordbutton').disabled = false;
		
	} else if (password != passwordmatch) {
		
		// Hide spinner
		Spinner.hide();

		// Stop form from submitting normally
		event.preventDefault();

		// Alert error
		$("#new_passwords_do_not_match").fadeTo(5000, 50).slideUp(500, function() {
			$("#new_passwords_do_not_match").slideUp(500);
		});
		
		document.getElementById('resetpasswordbutton').disabled = false;
		
	} else {

		// Alert success
		event.preventDefault();

		$.ajax({
			url : '../login/admin_reset_password_action.php',
			type : 'POST',
			data : {
				email : email,
				password : password
			},
			success : function(response) {
				if (response == 'failed') {
					
					// Hide spinner
					Spinner.hide();

					// Alert error
					$("#password_reset_failed").fadeTo(10000, 50).slideUp(500, function() {
						$("#password_reset_failed").slideUp(500);
					});

					// Enable button
					document.getElementById('registerbutton').disabled = false;
					
					return false;
				}
				else {
					
					// Hide spinner
					Spinner.hide();
					
					// Redirect to success page
					window.location.href = "../view/admin_user_account_password_changed.php";
					
				}
			}
		});
		return false;
	}
}