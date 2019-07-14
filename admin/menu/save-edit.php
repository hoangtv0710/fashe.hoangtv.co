<?php 

	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'menu');
		die;
	}

	$id = $_POST['id'];
	$name = trim($_POST['name']);
	$link_url = $_POST['link_url'];

	if($name == ""){
		header('location: '.$adminUrl . 'menu/edit.php?id='.$id.'&errName=Không để trống tên menu');
		die;
	}

	$sql = "select * from menus where name = '$name' and id <> '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '.$adminUrl . 'menu/edit.php?id='.$id.'&errName=Tên menu đã tồn tại!');
		die;
	}


	$sql = "update menus set name = '$name', link_url = '$link_url' where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '.$adminUrl . 'menu');
	die;
	
 ?>