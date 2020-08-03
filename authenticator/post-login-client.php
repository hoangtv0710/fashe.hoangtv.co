<?php 
	session_start();
	require_once '../database/db_fashe.php';

	// kiem tra xem loai request co phai loai post hay khong
	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINK );
		die;
	}
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "select * from users where email = '$email'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$user = $stmt->fetch();

	if ($email == "") {
		header('location:'  . "login-client.php?errorEmail=Email không được bỏ trống!");
		die;
	}
	if ($password == "") {
		header('location:'  . "login-client.php?errorPass=Mật khẩu không được bỏ trống!&email=".$email);
		die;
	}

	if($user == false || password_verify($password, $user['password']) == false){
		header('location: ' . "login-client.php?msg=Sai email hoặc mật khẩu&email=".$email);
		die;
	}


	$_SESSION['login'] = $user;

	header("location: ". SITELINK);
	die;

	

 ?>