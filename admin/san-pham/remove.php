<?php 
	require_once '../../database/db_fashe.php';
	
	$productId = $_GET['id'];

	$sql = "select * from products where id = '$productId'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$product = $kq->fetch();

	if (!$product) {
		header('location:' . SITELINKADMIN . '/san-pham');
		die;
	}

	$sql = "delete from comments where product_id = '$productId'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	
	$sql = "delete from products where id = '$productId'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	
	unlink("../../".$product['image']);

	header('location:' . SITELINKADMIN . '/san-pham');
	die;

 ?>