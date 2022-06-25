<?php 
	require_once '../../database/db_fashe.php';
	if($_SESSION['login']['role'] == 2){
		header('location: '. SITELINKADMIN . '/bai-viet?error=Chức năng không khả dụng cho tài khoản demo');
		die;
	}
	$postId = $_GET['id'];

	$sql = "select * from posts where id = '$postId'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$post = $kq->fetch();

	if (!$post) {
		header('location:' . SITELINKADMIN . '/bai-viet');
		die;
	}

	$sql = "delete from post_comments where product_id = '$postId'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	$sql = "delete from posts where id = '$postId'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	unlink("../../".$post['image']);

	header('location:' . SITELINKADMIN . '/bai-viet');
	die;

 ?>