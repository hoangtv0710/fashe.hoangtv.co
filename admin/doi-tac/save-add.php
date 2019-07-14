<?php 
	session_start();
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'doi-tac');
		die;
	}

	$file = $_FILES['image'];
	$name = $_POST['name'];
	$url = $_POST['url'];
	$created_by = $_SESSION['login']['id'];

	$sql = "select * from brands where name = '$name'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkName = $kq->fetch();
	if ($checkName != false) {
		header('location:' . $adminUrl . 'doi-tac/add.php?errName=Tên đã tồn tại!&name='.$name.'&url='.$url);
		die;
	}

	if ($file['size'] > 0) {
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/brands/'.uniqid() . '.' . $ext;
		move_uploaded_file($file['tmp_name'], "../../".$filename);
	} else {
		$filename = 'images/default/default.jpg';
	}



	$sql = "insert into brands (image, name, url, created_by) values (:image, :name, :url, :created_by)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':image', $filename);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':url', $url);
	$stmt->bindParam(':created_by', $created_by);
	$stmt->execute();


	header('location: '.$adminUrl . 'doi-tac?success=true');
	die;
?>