<?php 
	session_start();
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'menu');
		die;
	}

	$name = trim($_POST['name']);
	$link_url = $_POST['link_url'];
	$created_by = $_SESSION['login']['id'];

	if($name == ""){
		header('location: '.$adminUrl . 'menu/add.php?errName=Không để trống tên menu!&name='.$name.'&link_url='.$link_url);
		die;
	}

	$sql = "select * from menus where name = '$name'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate == true){
		header('location: '.$adminUrl . 'menu/add.php?errName=Tên menu đã tồn tại!&name='.$name.'&link_url='.$link_url);
		die;
	}


	$sql = "insert into menus (name, link_url, created_by) values ('$name', '$link_url', '$created_by')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '.$adminUrl . 'menu?success=true');
	die;
 ?>