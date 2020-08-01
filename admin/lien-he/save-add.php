<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$siteurl . 'contact.php');
		die;
	}

	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$message = $_POST['message'];


	$sql = "insert into contacts (name, email, phone_number, message ) values ('$name', '$email', '$phone_number', '$message')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINK . 'contact.php?success=true');
	die;
 ?>