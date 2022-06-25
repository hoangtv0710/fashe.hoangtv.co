<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/doi-tac');
		die;
	}

	$id = $_POST['id'];
	$file = $_FILES['image'];
	$name = $_POST['name'];
	$url = $_POST['url'];

	if ($name == '') {
		header('location:' . SITELINKADMIN . '/doi-tac/add.php?id='.$id.'&errName=Vui lòng nhập tên đối tác!');
		die;
	}

	if(!checkXss($name)){
		header('location:' . SITELINKADMIN . '/doi-tac/add.php?id='.$id.'&errName=Tên đối tác không hợp lệ!');
		die;
	}

	$sql = "select * from brands where name = '$name' and id <> $id";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkName = $kq->fetch();
	if ($checkName != false) {
		header('location:' . SITELINKADMIN . '/doi-tac/edit.php?id='.$id.'&errName=Tên đã tồn tại!');
		die;
	}

	$filename = false;
	if ($file['size'] > 0) {
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/brands/'.uniqid() . '.' . $ext;
		move_uploaded_file($file['tmp_name'], "../../".$filename);
	} 



	$sql = "update brands set name = :name, url = :url";
	if ($filename != false) {
		$sql .=", image = :image";
	}

	$sql .=" where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':url', $url);
	if ($filename != false) {
		$stmt->bindParam(':image', $filename);
	}
	$stmt->bindParam(':id', $id);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/doi-tac');
	die;
?>