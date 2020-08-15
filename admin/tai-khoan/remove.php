<?php 
	require_once '../../database/db_fashe.php';
	
	$userID = $_GET['id'];

	$sql = "select * from users where id = '$userID'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$user = $kq->fetch();

	if (!$user) {
		header('location:' . SITELINKADMIN . '/tai-khoan');
		die;
	}

	$sql = "delete from users where id = '$userID'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	unlink("../../".$user['avatar']);

	header('location:' . SITELINKADMIN . '/tai-khoan');
	die;

 ?>