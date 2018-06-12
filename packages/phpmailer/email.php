<?php
date_default_timezone_set('America/Recife');

require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "username@gmail.com"; # $_ENV['username']
$mail->Password = "yourpassword"; # $_ENV['password']
$mail->setFrom('from@example.com', 'First Last');
$mail->addAddress('whoto@example.com', 'John Doe');
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->Body = 'This is a plain-text message body';
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
