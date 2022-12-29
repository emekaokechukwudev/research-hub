<?php
// For header redirection
ob_start();

// Start session
session_start();

/**
 * Clear session
 * Remove all session variables
 */
session_unset(); 

// Destroy the session 
session_destroy(); 

// Redirect to login
header('Location: ../index.php');
?>