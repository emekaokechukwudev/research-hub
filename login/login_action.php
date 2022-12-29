<?php
// For header redirection
ob_start();

// Start session
session_start();

// Connect to controller
require("../controllers/login_controller.php");

// Grab form details
$email = strtolower($_POST['email']);
$password = $_POST['password'];

// Check if email exist
$check_login = login_user_fxn($email);

if (empty($check_login[0]['email_address'])) {

	echo 'failed';

} else if ($check_login[0]['verified'] == 1) {

	echo 'pending';

} else if ($check_login[0]['verified'] == 3) {

	echo 'inactive';

} else if ($check_login && $check_login[0]['verified'] == 2) {

	// Email exist, continue to password from database
	$hash = $check_login[0]['password'];

	// Verify password
	if (password_verify($password, $hash)) {
		echo 'success';

		// Set session
		$_SESSION["user_id"] = $check_login[0]['user_id'];
		$_SESSION["user_email"] = $check_login[0]['email_address'];

		exit;

	} else {

		echo 'failed';
		
	}

} else {

	echo 'failed';

}
?>