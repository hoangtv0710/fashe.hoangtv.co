<?php 
	require_once 'database/db_fashe.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] != "POST") {
		header("location:" . SITELINK);
	}

	$productId = $_POST['productId'];
	$productlq = $_POST['productlq'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$created_date = date('H:i d-m-Y');
	$avatar = $_SESSION['login']['avatar'];
	$status = 0;

	$sql = "insert into product_comments (email,content,product_id, created_date, avatar, status) 
			values ('$email', '$content', $productId,'$created_date', '$avatar', '$status')";
	$kq = $conn->prepare($sql);
	$kq->execute();
	header("location:" . SITELINK . "product-detail.php?id=" . $productId.'&categories='.$productlq.'&success=true');
	die;
 ?>