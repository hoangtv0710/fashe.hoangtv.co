<?php 

	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/dropdown-menu');
		die;
	}

	$id = $_POST['id'];
	$title = trim($_POST['title']);
	$menu_id = $_POST['menu_id'];
	$url = $_POST['url'];

	if($title == ""){
		header('location: '. SITELINKADMIN . '/dropdown-menu/edit.php?id='.$id.'&errName=Không để trống tiêu đề');
		die;
	}

	$sql = "select * from menu_galleries where title = '$title' and id <> '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '. SITELINKADMIN . '/dropdown-menu/edit.php?id='.$id.'&errName=Tiêu đề đã tồn tại!');
		die;
	}


	$sql = "update menu_galleries set title = '$title', url = '$url', menu_id = '$menu_id' where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/dropdown-menu');
	die;
	
 ?>