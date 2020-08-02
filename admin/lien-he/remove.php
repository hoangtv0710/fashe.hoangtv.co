<?php 
	require_once '../../database/db_fashe.php';
	
	$contactID = $_GET['id'];

	$sql = "select * from contacts where id = '$contactID'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$contact = $kq->fetch();

	if (!$contact) {
		header('location:' . SITELINKADMIN . '/lien-he');
		die;
	}

	$sql = "delete from contacts where id = '$contactID'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	header('location:' . SITELINKADMIN . '/lien-he');
	die;

 ?>