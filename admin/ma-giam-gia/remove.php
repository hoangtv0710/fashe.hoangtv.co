<?php 

	require_once '../../database/db_fashe.php';
	$dcID = $_GET['id'];
	if($_SESSION['login']['role'] == 2){
		header('location: '. SITELINKADMIN . '/ma-giam-gia?error=Chức năng không khả dụng cho tài khoản demo');
		die;
	}

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from discount_code where id = '$dcID'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$cate = $stmt->fetch();
	if(!$cate){
		header('location: '. SITELINKADMIN . '/ma-giam-gia');
		die;
	}


	$sql = "delete from discount_code where id = '$dcID'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/ma-giam-gia');
	die;

 ?>