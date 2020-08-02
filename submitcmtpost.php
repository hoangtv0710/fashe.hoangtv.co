<?php 
	require_once 'database/db_fashe.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] != "POST") {
		header("location:" . SITELINK);
	}

	$post_id = $_POST['id'];
	$categories = $_POST['categories'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$created_date = date('H:i d-m-Y');
	$avatar = $_SESSION['login']['avatar'];

	$sql = "insert into post_comments (email,content,post_id, created_date, avatar) values ('$email', '$content', $post_id,'$created_date', '$avatar')";
	$kq = $conn->prepare($sql);
	$kq->execute();
	header("location:" . SITELINK . "blog-detail.php?id=".$post_id.'&categories='.$categories.'&success=true');
	die;
 ?>