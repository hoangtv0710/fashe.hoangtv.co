<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'menu');
		die;
	}

	$title = trim($_POST['title']);
	$menu_id = $_POST['menu_id'];
	$url = $_POST['url'];

	if($title == ""){
		header('location: '.$adminUrl . 'dropdown-menu/add.php?errName=Không để trống tiêu đề!&title='.$title.'&url='.$url);
		die;
	}

	$sql = "select * from menu_galleries where title = '$title'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate == true){
		header('location: '.$adminUrl . 'dropdown-menu/add.php?errName=Tiêu đề đã tồn tại!&title='.$title.'&url='.$url);
		die;
	}


	$sql = "insert into menu_galleries (title, url, menu_id) values ('$title', '$url', '$menu_id')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '.$adminUrl . 'dropdown-menu?success=true');
	die;
 ?>