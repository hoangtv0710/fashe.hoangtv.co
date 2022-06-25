<?php 

	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/danh-muc-bv');
		die;
	}

	$id = trim($_POST['id']);
	$name = trim($_POST['name']);
	$description = $_POST['description'];

	if($name == ""){
		header('location: '. SITELINKADMIN . '/danh-muc-bv/edit.php?id='.$id.'&errName=Không để trống tên danh mục');
		die;
	}

	if(!checkXss($name)){
		header('location: '. SITELINKADMIN . '/danh-muc-bv/edit.php?id='.$id.'&errName=Tên danh mục không hợp lệ!');
		die;
	}

	if(!checkXss($description)){
		header('location: '. SITELINKADMIN . '/danh-muc-bv/add.php?id='.$id.'&errDescription=Tên danh mục không hợp lệ!');
		die;
	}

	$sql = "select * from post_categories where name = '$name' and id <> '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '. SITELINKADMIN . '/danh-muc-bv/edit.php?id='.$id.'&errName=Tên danh mục đã tồn tại!');
		die;
	}


	$sql = "update post_categories set name = '$name', description = '$description' where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/danh-muc-bv');
	die;
	
 ?>