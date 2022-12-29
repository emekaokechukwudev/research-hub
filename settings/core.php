<?php
// Start session
session_start();

// For header redirection
ob_start();

// Get the name of the current page
$current_file = $_SERVER['SCRIPT_NAME'];

// Check login function
function check_login() {

	// Check if login session exit
	if (!isset($_SESSION['user_id'])) {

		// Redirect to login page
    	header('Location: ../login/login.php');
	}
}
?>