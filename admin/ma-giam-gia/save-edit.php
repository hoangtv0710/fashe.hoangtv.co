<?php 

	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/ma-giam-gia');
		die;
	}

	$id = $_POST['id'];
	$code = trim($_POST['code']);
	$percent = $_POST['percent'];

	if($code == ""){
		header('location: '. SITELINKADMIN . '/ma-giam-gia/edit.php?id='.$id.'&errName=Không để trống mã giảm');
		die;
	}

	if($percent == ""){
		header('location: '. SITELINKADMIN . '/ma-giam-gia/edit.php?id='.$id.'&errName1=Không để trống % giảm');
		die;
	}

	$sql = "select * from discount_code where code = '$code' and id <> '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '. SITELINKADMIN . '/ma-giam-gia/edit.php?id='.$id.'&errName=Mã giảm giá đã tồn tại!');
		die;
	}


	$sql = "update discount_code set code = '$code', percent = '$percent' where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/ma-giam-gia');
	die;
	
 ?>