<?php 
	require_once '../../database/db_fashe.php';
	
	$brandsID = $_GET['id'];

	$sql = "select * from brands where id = $brandsID";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$brands = $kq->fetch();

	if (!$brands) {
		header('location:' . $adminUrl . 'doi-tac');
		die;
	}

	$sql = "delete from brands where id = '$brandsID'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . $adminUrl . 'doi-tac');
	die;

 ?>