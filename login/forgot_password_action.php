<?php
// For header redirection
ob_start();

// Start session
session_start();

// Connect to controller
require("../controllers/login_controller.php");

// Connect to environment file
require('../settings/env.php');

// Grab form details
$email = strtolower($_POST['email']);

// Call function to login user
$check_login = login_user_fxn($email);

$firstname = $check_login[0]['first_name'];

if (!$check_login) {
    echo 'failed';
}

// Send email for verification
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer();

try {
    
    // Server setting
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = TRUE;
    $mail->Username = GMAIL_USERNAME;
    $mail->Password = GMAIL_APP_PASSWORD;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Mailer = "smtp";
    $mail->IsHTML(true);

    // Recipients
    $senderemailaddress = GMAIL_USERNAME;
    $sendername = "Research Hub";
    $mail->SetFrom($senderemailaddress, $sendername);
    $mail->AddReplyTo($senderemailaddress, $sendername);
    $mail->AddAddress($email);

    // Content
    $encrypted_email = openssl_encrypt($email, "AES-128-CTR", "emailaddress", 0,'1234567891011121');
    $mail->Subject = "Reset Forgotten Password - Research Hub";
    $mail->Body = '
    <p>Dear '.$firstname.',</p>
    <p>You recently requested to change your password on the Research Hub website. If you did not initiate this transaction, kindly ignore, 
    delete and report this activity: <a href="mailto:'.SUPER_ADMIN_EMAIL.'?subject=Research%20Password%20Reset%20Intrusion%20Alert">
    click here to report</a></p>
    <p>Else click on the link below to reset your password. This link expires in 24 hours</p>
    <p><a href="http://'.LOCALHOST_ADDRESS.'/research-hub/view/user_password_reset.php?accountemail='.urlencode($encrypted_email).'">Reset Password</a></p>
    <p>Regards,</p>
    <p>Research Department</p>';
    $mail->AltBody = '
    <p>Dear '.$firstname.',</p>
    <p>You recently requested to change your password on the Research Hub website. If you did not initiate this transaction, kindly ignore, 
    delete and report this activity: <a href="mailto:'.SUPER_ADMIN_EMAIL.'?subject=Research%20Password%20Reset%20Intrusion%20Alert">
    click here to report</a></p>
    <p>Else click on the link below to reset your password. This link expires in 24 hours</p>
    <p><a href="http://'.LOCALHOST_ADDRESS.'/research-hub/view/user_password_reset.php?accountemail='.urlencode($encrypted_email).'">Reset Password</a></p>
    <p>Regards,</p>
    <p>Research Department</p>';

    $mail->send();

} catch (Exception $e) {

    echo 'email_not_sent';
    
}
?>