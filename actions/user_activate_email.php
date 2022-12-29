<?php
// Start session
session_start();

// Connect to controller
require("../controllers/login_controller.php");

if (isset($_GET['accountemail'])) {

    $encrypted_email = $_GET['accountemail'];

    $decrypted_email = openssl_decrypt($encrypted_email, "AES-128-CTR", "emailaddress", 0,'1234567891011121');

    $activate_account = activate_account_fxn($decrypted_email);

    if ($activate_account) {
        header('Location: ../view/user_activated.php');
    } else {
        header('Location: ../view/user_not_registered.php');
    }
}
?>