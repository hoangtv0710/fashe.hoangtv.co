<?php 
	require_once '../../database/db_fashe.php';
	if($_SESSION['login']['role'] == 2){
		header('location: '. SITELINKADMIN . '/doi-tac?error=Chức năng không khả dụng cho tài khoản demo');
		die;
	}
	$brandsID = $_GET['id'];

	$sql = "select * from brands where id = $brandsID";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$brands = $kq->fetch();

	if (!$brands) {
		header('location:' . SITELINKADMIN . '/doi-tac');
		die;
	}

	$sql = "delete from brands where id = '$brandsID'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . SITELINKADMIN . '/doi-tac');
	die;

 ?>