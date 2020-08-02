<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/ma-giam-gia');
		die;
	}

	$code = trim($_POST['code']);
	$percent = $_POST['percent'];

	$sql = "select * from discount_code where code = '$code'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: ' .SITELINKADMIN . '/ma-giam-gia/add.php?errCode=Mã giảm giá đã tồn tại!&code='.$code.'&percent='.$percent);
		die;
	}


	$sql = "insert into discount_code (code, percent) values ('$code', '$percent')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/ma-giam-gia?success=true');
	die;
 ?>