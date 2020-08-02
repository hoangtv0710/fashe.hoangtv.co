<?php 

	require_once '../../database/db_fashe.php';
	$cateId = $_GET['id'];

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from invoices where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$cate = $stmt->fetch();
	
	if(!$cate){
		header('location: '. SITELINKADMIN . '/hoa-don');
		die;
	}


	$sql = "delete from invoice_detail where invoice_id  = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$sql = "delete from invoices where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/hoa-don');
	die;

 ?>