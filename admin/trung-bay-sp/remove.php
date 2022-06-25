<?php 
	require_once '../../database/db_fashe.php';
	
	$id = $_GET['id'];
	if($_SESSION['login']['role'] == 2){
		header('location: '. SITELINKADMIN . '/trung-bay-sp?error=Chức năng không khả dụng cho tài khoản demo');
		die;
	}

	$sql = "select * from product_galleries where id = '$id'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$pg = $kq->fetch();

	if (!$pg) {
		header('location:' . SITELINKADMIN . '/trung-bay-sp');
		die;
	}

	$sql = "delete from product_galleries where id = '$id'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . SITELINKADMIN . '/trung-bay-sp');
	die;

 ?>