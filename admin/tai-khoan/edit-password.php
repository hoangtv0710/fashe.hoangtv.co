<?php 

	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINK . 'edit-password.php');
		die;
	}

	$id = $_POST['id'];
	$password = $_POST['password'];
	$new_password = $_POST['new_password'];

	$sql = "select * from users where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$user = $stmt->fetch();

	if($user == false || password_verify($password, $user['password']) == false){
		header('location: '. SITELINK . "edit-password.php?msg=Sai mật khẩu");
		die;
	}


	$np = password_hash($new_password, PASSWORD_DEFAULT);
	$sql = "update users set password = '$np' where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINK . 'authenticator/login-client.php?sce=true');
	die;
	
 ?>