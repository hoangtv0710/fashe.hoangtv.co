<?php 
	session_start();
	require_once '../database/db_fashe.php';

	// kiem tra xem loai request co phai loai post hay khong
	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. 'login.php' );
		die;
	}
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "select * from users where email = '$email'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$user = $stmt->fetch();

	if ($email == "") {
		header('location:' . "login.php?errorEmail=Email không được bỏ trống!");
		die;
	}
	if ($password == "") {
		header('location:' . "login.php?errorPass=Mật khẩu không được bỏ trống!&email=".$email);
		die;
	}

	if($user == false || password_verify($password, $user['password']) == false){
		header('location: ' . "login.php?msg=Sai email hoặc mật khẩu&email=".$email);
		die;
	}

	if ($user['role'] != 3 && $user['role'] != 2) {
		header('location: ' . "login.php?err=Bạn không đủ quyền để truy cập vào trang này&email=".$email);
		die;
	}

	$_SESSION['login'] = $user;

	header("location: ". SITELINKADMIN);
	die;

	

 ?>