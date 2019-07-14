<?php 
	require_once '../../database/db_fashe.php';
	
	$slideID = $_GET['id'];

	$sql = "select * from slideshows where id = '$slideID'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$slide = $kq->fetch();

	if (!$slide) {
		header('location:' . $adminUrl . 'slide-show');
		die;
	}

	$sql = "delete from slideshows where id = '$slideID'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . $adminUrl . 'slide-show');
	die;

 ?>