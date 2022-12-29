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

// Reset password function
$reset_password = reset_password_fxn($email, $password);

if (!$reset_password) {
    echo 'failed';
}
?>