<?php 

	require_once '../../database/db_fashe.php';
	if($_SESSION['login']['role'] == 2){
		header('location: '. SITELINKADMIN . '/danh-muc-sp?error=Chức năng không khả dụng cho tài khoản demo');
		die;
	}
	$cateId = $_GET['id'];

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from product_categories where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$cate = $stmt->fetch();
	if(!$cate){
		header('location: '. SITELINKADMIN . '/danh-muc-sp');
		die;
	}


	$sql = "delete from products where cate_id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$sql = "delete from product_categories where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/danh-muc-sp');
	die;

 ?>