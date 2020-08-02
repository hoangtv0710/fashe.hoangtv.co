<?php 
	require_once '../../database/db_fashe.php';
	
	$commentId = $_GET['id'];

	$sql = "select * from product_comments where id = '$commentId'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$comment = $kq->fetch();

	if (!$comment) {
		header('location:' . SITELINKADMIN . '/phan-hoi-sp');
		die;
	}

	$sql = "delete from product_comments where id = '$commentId'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . SITELINKADMIN . '/phan-hoi-sp');
	die;


 ?>