<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINK . 'contact.php');
		die;
	}

	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$message = $_POST['message'];
	if (!checkXss($message)) {
		header('location:' . SITELINK . 'contact.php?error=Có gì đó không ổn!');
		die;
	}
	$status = 0;


	$sql = "insert into contacts (name, email, phone_number, message, status) values ('$name', '$email', '$phone_number', '$message', '$status')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINK . 'contact.php?success=true');
	die;
 ?>