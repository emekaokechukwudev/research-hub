<?php
// Connect to environment file
require('../settings/env.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Admin Login</title>
	<link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="64x64">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your research journey">
    <meta name="author" content="Emeka Okechukwu - Full Stack Developer">

	<!-- CDN Bootstrap and jQuery -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
    <!-- Font Awesome for icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Custom JS and spinner -->
	<script type="text/javascript" src="../js/loading-spinner.js"></script>
	<script type="text/javascript" src="../js/register_login_ajax.js"></script>
	
	<!-- Custom CSS -->
	<style type="text/css" media="screen">
		.login-form {
			width: 380px;
	    	margin: 50px auto;
		}

	    .login-form form {
	    	margin-bottom: 15px;
	        background: #f7f7f7;
	        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	        padding: 30px;
	    }

	    .login-form h2 {
	        margin: 0 0 15px;
	    }

	    .form-control, .btn {
	        min-height: 38px;
	        border-radius: 2px;
	    }
		
	    .btn {        
	        font-size: 15px;
	        font-weight: bold;
	    }
	</style>

</head>
<body>

	<!-- Login form -->
	<div class="login-form">

		<!-- Error messages -->
		<div class="alert alert-danger fade collapse" id="invalid_email_address">
		    Incorrect email format.
	    </div>
	    <div class="alert alert-danger fade collapse" id="password_empty">
		    Password field is empty.
	    </div>
	    <div class="alert alert-danger fade collapse" id="invalid_email_address_or_password">
		    <strong>Failed!</strong> Incorrect username or password.
	    </div>
		<div class="alert alert-danger fade collapse" id="user_pending">
		    <strong>User Account is Pending:</strong> You registered as an admin and awaiting verification. Follow up with the "Need Help?" below.
	    </div>
	    <div class="alert alert-danger fade collapse" id="user_inactive">
		    <strong>User is Inactive:</strong> Check email for activation link if new registration or contact admin with "Need Help?" below.
	    </div>

	    <form action="" method="post">
	        <h2 class="text-center">Admin Research Hub</h2>       
	        <div class="form-group">
	            <input type="Email" class="form-control" placeholder="Email" required="required" name="email" id="email" value="" maxlength="50">
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password" value="" maxlength="50">
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-block" name="adminloginbutton" id="adminloginbutton" style="background-color: #923D41; color: white;" onclick="adminloginvalidation()">Log in</button>
	        </div>

	        <div class="form-group text-center">
	        	<input type="checkbox" class="form-check-input"  value="rememberme" id="loginrememberme" > Remember Me
	        </div>
	               
	    </form>
	    <p class="text-center"><a href="../login/admin_register.php" style="color:#923D41;">Join</a> | <a href="../index.php" style="color:#923D41;">Home</a> | <a href="admin_forgot_password.php" style="color:#923D41;">Forgot Password?</a> | <a href="mailto:<?php echo SUPER_ADMIN_EMAIL; ?>?subject=Research%20Hub%20Enquiry" style="color:#923D41;"> Help?</a></p>
	</div>
	
</body>
</html>