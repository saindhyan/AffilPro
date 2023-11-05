<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
require 'vendor/PHPMailer/phpmailer/src/Exception.php';
require 'vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require 'vendor/PHPMailer/phpmailer/src/SMTP.php';
try {
$mail = new PHPMailer(true);
		$mail->IsSMTP();
		$mail->Host= "smtp.gmail.com";
		$mail->Port       = 587;
		$mail->SMTPSecure = "tls";
		$mail->SMTPDebug = 2;
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = "certificate.affilpro@gmail.com";
		$mail->Password   = "hwqluzqhyvymacqg";
		$mail->SetFrom("certificate.affilpro@gmail.com", "piyush saini");
		$mail->AddAddress("piyushsaindhyan@gmail.com", "piyush saini");
		$mail->IsHTML(true); 
		$mail->Subject = "Payment Failed";
		$content = "<b>We are sorry to say your payment has been failed <br>Order .</b>";
		$mail->MsgHTML($content); 
		$mail->send();
		if(!$mail->Send()) {
		echo "Error while sending Email.";
		var_dump($mail);
		} else {
		echo "Email sent successfully";
		}
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
        ?>