<?php 

	require_once '../../database/db_fashe.php';
	$dcID = $_GET['id'];

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from discount_code where id = '$dcID'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$cate = $stmt->fetch();
	if(!$cate){
		header('location: '. $adminUrl . 'ma-giam-gia');
		die;
	}


	$sql = "delete from discount_code where id = '$dcID'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. $adminUrl . 'ma-giam-gia');
	die;

 ?>