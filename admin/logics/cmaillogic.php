<?php
include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);
session_start();
if (isset($_POST['cmailbtn'])) {
    $adminid=$_SESSION["adminid"];
    $rec=$_POST['email_rec'];
    $sub=$_POST['email_sub'];
    $msg=$_POST['email_msg'];

    $sql="INSERT INTO `emails` (`email_id`, `email_rec`, `email_msg`, `email_date`, `email_user`, `email_status`) VALUES (NULL, '{$rec}', '{$msg}', current_timestamp(), '{$adminid}', '0');";
    mysqli_query($connection,$sql);
        
  
}

try {
    // Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';               // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                              // Enable SMTP authentication
    $mail->Username   = 'teslacomputerinstitute@gmail.com';      // SMTP username
    $mail->Password   = 'ecxfwqdfmbszhnrt';                  // SMTP password
    $mail->SMTPSecure = 'ssl';                            
    $mail->Port       = 465;                             

    // Recipients
    $mail->setFrom('teslacomputerinstitute@gmail.com', 'Jabir');
    $mail->addAddress($rec, 'check');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $msg;

    // Send the email
    $mail->send();
    header("Location: http://localhost/Elixir/admin/webpages/createmail.php?alert=sentemail");
} catch (Exception $e) {
    header("Location: http://localhost/Elixir/admin/webpages/createmail.php?alert=sentnotemail");
}

?>
