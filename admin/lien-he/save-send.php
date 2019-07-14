<?php
include '../../PHPMailer/src/Exception.php';
include '../../PHPMailer/src/OAuth.php';
include '../../PHPMailer/src/PHPMailer.php';
include '../../PHPMailer/src/POP3.php';
include '../../PHPMailer/src/SMTP.php';
require_once '../../database/db_fashe.php';
include '../../database/check.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	 $id = $_POST['id'];
	 $email = $_POST['email'];
	 $title = $_POST['title'];
	 $content = $_POST['content'];

	 //check rỗng
	 if (empty($email) || empty($title) || empty($content)) {
	 	header('location:'.$adminUrl.'lien-he/send.php?id='.$id.'&errAll=Không được để trống trường trên !&email='.$email.'&title='.$title.'&content='.$content);
	 	die;
	 }
	 //check định dạng mail
	 /*if (!preg_match($pattern_email, $email)) {
	 	header('location:'.$adminUrl.'lien-he/send.php?id='.$id.'&errEmail=Email sai định dạng !&email='.$email.'&title='.$title.'&content='.$content);
	 	die;
	 }*/

	

   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
   try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tvhkaizen@gmail.com';                 // SMTP username
    $mail->Password = '01674969474aA';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->CharSet = "UTF-8";
    $mail->setFrom('tvhkaizen@gmail.com', 'Fashe');
    $mail->addAddress($email);     // địa chỉ nhận mail
    //Content
    $mail->isHTML(true);                                // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $content;
    //Gửi
    $mail->send();
   header('location:'.$adminUrl.'lien-he?success=true');
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>