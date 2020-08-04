<?php
include '../../PHPMailer/src/Exception.php';
include '../../PHPMailer/src/OAuth.php';
include '../../PHPMailer/src/PHPMailer.php';
include '../../PHPMailer/src/POP3.php';
include '../../PHPMailer/src/SMTP.php';
require_once '../../database/db_fashe.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
     $email = $_GET['email'];
	 $discount_code = $_GET['discount_code'];
	 
	
   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
   try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tvhkaizen@gmail.com';                 // SMTP username
    $mail->Password = 'jkdnglchuizjcafx';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->CharSet = "UTF-8";
    $mail->setFrom('tvhkaizen@gmail.com', 'Fashe');
    $mail->addAddress($email);     // địa chỉ nhận mail
    //Content
    $mail->isHTML(true);                                // Set email format to HTML
    $mail->Subject = "Mã giảm giá";
    $mail->Body    = $discount_code;
    //Gửi
    $mail->send();
   header('location:'. SITELINK .'authenticator/login-client.php?success=true');
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>