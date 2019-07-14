<?php 

	require_once '../../database/db_fashe.php';
	$cateId = $_GET['id'];
	$invoice_id = $_GET['invoice_id'];

	$sql = "select * from invoice_detail where id = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$cate = $stmt->fetch();
	
	if(!$cate){
		header('location: '. $adminUrl . 'hoa-don-chi-tiet');
		die;
	}

	$sql = "delete from invoice_detail where id  = '$cateId'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$sql = "select * from invoice_detail where invoice_id = '$invoice_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$cateinvoice = $stmt->fetch();

	if (!$cateinvoice) {
		$sql = "delete from invoices where id  = '$invoice_id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}


	header('location: '. $adminUrl . 'hoa-don-chi-tiet');
	die;

 ?>