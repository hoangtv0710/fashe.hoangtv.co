<?php 

	require_once '../../database/db_fashe.php';
	$cateId = $_GET['id'];

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from product_categories where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$cate = $stmt->fetch();
	if(!$cate){
		header('location: '. $adminUrl . 'danh-muc-sp');
		die;
	}


	$sql = "delete from products where cate_id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$sql = "delete from product_categories where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. $adminUrl . 'danh-muc-sp');
	die;

 ?>