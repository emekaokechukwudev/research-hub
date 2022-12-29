<?php
// Connect to environment file
require('../settings/env.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Forgot Admin Password</title>
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
	<script type="text/javascript" src="../js/standard_js.js"></script>
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

<body data-new-gr-c-s-loaded="9.22.0">

	<!-- Password form -->
	<div class="login-form">

		<!-- Error messages -->
		<div class="alert alert-danger fade collapse" id="invalid_email_address">
		    Invalid email format.
	    </div>
	    <div class="alert alert-danger fade collapse" id="forgot_password_failed">
		    <strong>Email not registered: </strong><a href="admin_register.php" class="alert-link"> click here to register.</a> 
	    </div>
	  
	    <form action="" method="post">
	        <h2 class="text-center">Forgot Admin Password?</h2>       
	        <div class="form-group">
	            <input type="Email" class="form-control" placeholder="Email" required="required" id="email" maxlength="50">
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-block" id="forgotbutton" style="background-color: #923D41; color: white;" onclick="adminforgotpassword()">Submit Request</button>
	        </div>
	               
	    </form>
	    <p class="text-center"><a href="../login/admin_register.php" style="color:#923D41;">Join</a> | <a href="../index.php" style="color:#923D41;">Home</a> | 
		<a href="mailto:<?php echo SUPER_ADMIN_EMAIL; ?>?subject=Research%20Hub%20Enquiry" style="color:#923D41;">Need Help?</a></p>
	</div>

</body>
</html>