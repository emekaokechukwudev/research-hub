<?php
// Start session
session_start();

// Connect to controller
require("../controllers/login_controller.php");

if (isset($_GET['accountemail'])) {

    $encrypted_email = $_GET['accountemail'];

    $decrypted_email = openssl_decrypt($encrypted_email, "AES-128-CTR", "emailaddress", 0,'1234567891011121');

    $activate_account = admin_activate_account_fxn($decrypted_email);

    if ($activate_account) {
        header('Location: ../view/admin_activated.php');
    } else {
        header('Location: ../view/admin_not_registered.php');
    }
}
?>