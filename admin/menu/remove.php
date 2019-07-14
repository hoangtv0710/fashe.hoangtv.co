<?php 

	require_once '../../database/db_fashe.php';
	$menu_id = $_GET['id'];

	// kiem tra xem id co ton tai trong csdl
	$sql = "select * from menus where id = '$menu_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$menu = $stmt->fetch();
	if(!$menu){
		header('location: '. $adminUrl . 'menu');
		die;
	}


	$sql = "delete from menu_galleries where menu_id = '$menu_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	$sql = "delete from menus where id = '$menu_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. $adminUrl . 'menu');
	die;

 ?>