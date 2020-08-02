<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/danh-muc-sp');
		die;
	}

	$name = trim($_POST['name']);
	$description = $_POST['description'];

	if($name == ""){
		header('location: '. SITELINKADMIN . '/danh-muc-sp/add.php?errName=Không để trống tên danh mục!&name='.$name.'&description='.$description);
		die;
	}

	$sql = "select * from product_categories where name = '$name'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '. SITELINKADMIN . '/danh-muc-sp/add.php?errName=Tên danh mục đã tồn tại!&name='.$name.'&description='.$description);
		die;
	}


	$sql = "insert into product_categories (name, description) values ('$name', '$description')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/danh-muc-sp?success=true');
	die;
 ?>