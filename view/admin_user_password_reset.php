<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Reset Admin Password</title>
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
	<script type="text/javascript" src="../js/external_js.js"></script>
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

    <?php
		// Start session
		session_start();

		// Connect to controller
		require("../controllers/login_controller.php");

		if (isset($_GET['accountemail'])) {

			$encrypted_email = $_GET['accountemail'];

			$decrypted_email = openssl_decrypt($encrypted_email, "AES-128-CTR", "emailaddress", 0,'1234567891011121');

			$decrypted_email;
		}
    ?>
	
    <!-- Login form -->
	<div class="login-form">

		<!-- Error messages -->
		<div class="alert alert-danger fade collapse" id="invalid_new_password">
		    Password field is empty.
	    </div>
	    <div class="alert alert-danger fade collapse" id="invalid_new_password_match">
		    Password match field is empty.
	    </div>
	    <div class="alert alert-danger fade collapse" id="new_passwords_do_not_match">
		    Passwords do not match.
	    </div>
	    <div class="alert alert-danger fade collapse" id="password_reset_failed">
		    <strong>Failed to reset password!</strong> Kindly try again or contact admin.
	    </div>
	   
	    <form action="" method="post">
			
	        <h2 class="text-center">Set New Admin Password</h2>       
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="New Password" required="required" name="newpassword" id="newpassword" maxlength="50">
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Match New Password" required="required" name="newpasswordmatch" id="newpasswordmatch" maxlength="50">
	        </div>
	        <div class="form-group d-none">
	            <input type="text" value="<?php echo $decrypted_email?>" name="email" id="email">
	        </div>
	        <div class="form-group">
	            <button type="Submit" class="btn btn-block" name="resetpasswordbutton" id="resetpasswordbutton" style="background-color: #923D41; color: white;" onclick="adminresetpassword()">Submit</button>
	        </div>
	               
	    </form>
	</div>
	
</body>
</html>