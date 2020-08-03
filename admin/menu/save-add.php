<?php 
	session_start();
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/menu');
		die;
	}

	$name = trim($_POST['name']);
	$link_url = $_POST['link_url'];

	if($name == ""){
		header('location: '. SITELINKADMIN . '/menu/add.php?errName=Không để trống tên menu!&name='.$name.'&link_url='.$link_url);
		die;
	}

	$sql = "select * from menus where name = '$name'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate == true){
		header('location: '. SITELINKADMIN . '/menu/add.php?errName=Tên menu đã tồn tại!&name='.$name.'&link_url='.$link_url);
		die;
	}


	$sql = "insert into menus (name, link_url) values ('$name', '$link_url')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/menu?success=true');
	die;
 ?>