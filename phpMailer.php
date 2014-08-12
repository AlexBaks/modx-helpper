<?php
require_once(LIB_PATH.'/Phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

$mail->isSMTP();  
$mail->Host = "localhost"; // SMTP server
$mail->From = "from@example.com";
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->CharSet    = 'utf-8';
 
$mail->From = 'from@example.com';
$mail->FromName = 'Mailer';
$mail->addAddress('52018@bk.ru');     // Add a recipient
$mail->addAddress('alexbaks@bk.ru');
/*
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');
*/
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!!!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

php?>
