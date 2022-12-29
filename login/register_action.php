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
$userid = $_POST['userid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$department = $_POST['department'];
$rank = $_POST['rank'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];

// Call function to register user
$register_user = register_user_fxn($userid, $firstname, $lastname, $gender, $department, $rank, $email, $password);

if (!$register_user) {
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
    $mail->Subject = "Activate Your Account - Research Hub";
    $mail->Body = '
    <p>Dear '.$firstname.',</p>
    <p>You recently created an account on the Research Hub website. If you did not initiate this transaction, kindly ignore, 
    delete and report this activity: <a href="mailto:'.SUPER_ADMIN_EMAIL.'?subject=Research%20Account%20Creation%20Intrusion%20Alert">click here to report</a></p>
    <p>Else click the link below to activate your account</p>
    <p><a href="http://'.LOCALHOST_ADDRESS.'/research-hub/actions/user_activate_email.php?accountemail='.urlencode($encrypted_email).'">Activate account</a></p>
    <p>Regards,</p>
    <p>Research Department</p>';
    $mail->AltBody = '
    <p>Dear '.$firstname.',</p>
    <p>You recently created an account on the Research Hub website. If you did not initiate this transaction, kindly ignore, 
    delete and report this activity: <a href="mailto:'.SUPER_ADMIN_EMAIL.'?subject=Research%20Account%20Creation%20Intrusion%20Alert">click here to report</a></p>
    <p>Else click the link below to activate your account</p>
    <p><a href="http://'.LOCALHOST_ADDRESS.'/research-hub/actions/user_activate_email.php?accountemail='.urlencode($encrypted_email).'">Activate account</a></p>
    <p>Regards,</p>
    <p>Research Department</p>';

    $mail->send();

} catch (Exception $e) {

    echo 'email_not_sent';
    
}
?>