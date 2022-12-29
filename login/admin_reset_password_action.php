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

// Reset admin password function
$admin_reset_password = admin_reset_password_fxn($email, $password);

if (!$admin_reset_password) {
    echo 'failed';
}
?>