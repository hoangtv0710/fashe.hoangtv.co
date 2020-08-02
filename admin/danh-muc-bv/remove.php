<?php 

	require_once '../../database/db_fashe.php';
	$cateId = $_GET['id'];

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from post_categories where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$cate = $stmt->fetch();
	
	if(!$cate){
		header('location: '. SITELINKADMIN . '/danh-muc-bv');
		die;
	}


	$sql = "delete from posts where cate_id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$sql = "delete from post_categories where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/danh-muc-bv');
	die;

 ?>