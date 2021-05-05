<?php
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail ->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->Username = 'phamthanhnamdev@gmail.com';
$mail->Password = 'nguyenxuantrung2';

$mail->addAddress('zvw180ptn1411@gmail.com');
$mail->setFrom('phamthanhnamdev@gmail.com', 'Pham Thanh Nam');
$mail->Subject = 'hello';
$mail->isHTML(true);

$mail->Body = "<h3> et password.</h3>";

if ($mail->send()) {
    echo 'We have send you the reset link in your email ID, please checck your email.';
} else {
    echo 'Something went wrong please try later.';
}
?>