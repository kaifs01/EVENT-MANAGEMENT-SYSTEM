<?php
use PHPMailer\PHPMailer\PHPMailer;
// Include PHPMailer autoload file
@include 'vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Configure SMTP settings (if necessary)
$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = 'your_smtp_username';
$mail->Password = 'your_smtp_password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set From and To addresses
$mail->setFrom('from@example.com', 'Your Name');
$mail->addAddress($user_email);

// Set email subject and body
$mail->Subject = 'Booking Confirmation';
$mail->Body = 'Thank you for booking the event. Your booking details are as follows...';

// Send the email
if ($mail->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Error: ' . $mail->ErrorInfo;
}

?>