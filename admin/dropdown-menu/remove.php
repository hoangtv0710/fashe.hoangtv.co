<?php 
	require_once '../../database/db_fashe.php';
	
	$mg_id = $_GET['id'];

	$sql = "select * from menu_galleries where id = '$mg_id'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$mg = $kq->fetch();

	if (!$mg) {
		header('location:' . $adminUrl . 'dropdown-menu');
		die;
	}

	$sql = "delete from menu_galleries where id = '$mg_id'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . $adminUrl . 'dropdown-menu');
	die;

 ?>