<?php
// Connect to environment file
require('../settings/env.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Hub - Register</title>
	<link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="64x64">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start of research journey">
    <meta name="author" content="Emeka Okechukwu">

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
			width: 390px;
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
	
	<!-- Register form -->
	<div class="login-form">

		<!-- Error messages -->
		<div class="alert alert-danger fade collapse" id="invalid_id">
		    Invalid user ID.
	    </div>
		<div class="alert alert-danger fade collapse" id="invalid_first_name">
		    Invalid first name.
	    </div>
	    <div class="alert alert-danger fade collapse" id="invalid_last_name">
		    Invalid last name.
	    </div>
	    <div class="alert alert-danger fade collapse" id="invalid_email_address">
		    Invalid email format.
	    </div>
	    <div class="alert alert-danger fade collapse" id="invalid_password">
		    Password field is empty.
	    </div>
	    <div class="alert alert-danger fade collapse" id="invalid_password_match">
		    Password match field is empty.
	    </div>
	    <div class="alert alert-danger fade collapse" id="passwords_do_not_match">
		    Passwords do not match.
	    </div>
	    <div class="alert alert-danger fade collapse" id="user_exist">
		    <strong>Email Already Registered:</strong> Contact administrator by using the "Need Help?" below.
	    </div>
	    <div class="alert alert-danger fade collapse" id="user_registration_failed">
		    <strong>User Registration Failed:</strong> Contact administrator by using the "Need Help?" below.
	    </div>

	    <form action="" method="post">
	        <h2 class="text-center">Join Research Hub</h2>  
	        <h6 class="text-center" style="font-style: italic;">Use a real email address</h6>
			<div class="form-group">
	            <input type="text" class="form-control" placeholder="Faculty ID" name="userid" id="userid" maxlength="8" required="required">
	        </div>
	        <div class="form-group">
	            <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" maxlength="50" required="required">
	        </div>
	        <div class="form-group">
	        	<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" maxlength="50" required="required">
	        </div>   
	        <div class="form-group">
	        	<select class="form-control" name="gender" id="gender">
	            	<option value="Male">Male</option>
	            	<option value="Female">Female</option>
	            </select>
	        </div>
			<div class="form-group">
				<select class="form-control" name="department" id="department">
					<option value="Business Administration">Business Administration (BA)</option>
					<option value="Engineering">Engineering (ENG)</option>
					<option value="Computer Science">Computer Science (CS)</option>
					<option value="Humanities & Social Sciences">Humanities & Social Sciences (HSS)</option>
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" name="rank" id="rank">
					<option value="Adjunct Lecturer">Adjunct Lecturer</option>
					<option value="Senior Lecturer">Senior Lecturer</option>
					<option value="Assistant Lecturer">Assistant Lecturer</option>
					<option value="Associate Professor">Associate Professor</option>
					<option value="Professor">Professor</option>
				</select>
			</div>
	        <div class="form-group">
	            <input type="Email" class="form-control" placeholder="Email" name="email" id="email" maxlength="50" required="required">
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Password" name="password" id="password" maxlength="50" required="required">
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Password Match" name="passwordmatch" id="passwordmatch" maxlength="50" required="required">
	        </div>
	        <div class="form-group">
				<button type="submit" class="btn btn-block" style="background-color: #923D41; color: white;" name="registerbutton" id="registerbutton" onclick="registervalidation()">Register</button>
	        </div>
	               
	    </form>
	    <p class="text-center"><a href="login.php" style="color:#923D41;">Login</a> | 
		<a href="../index.php" style="color:#923D41;">Home</a> | 
		<a href="mailto:<?php echo SUPER_ADMIN_EMAIL; ?>?subject=Research%20Enquiry" style="color:#923D41;">Need Help?</a></p>
	</div>
	
</body>
</html>