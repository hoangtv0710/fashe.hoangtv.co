<?php 
	session_start();
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'bai-viet');
		die;
	}

	$created_by = $_SESSION['login']['id'];
	$title = trim($_POST['title']);
	$cate_id = $_POST['cate_id'];
	$short_desc = $_POST['short_desc'];
	$created_date = date('d-m-Y');
	$file = $_FILES['image'];
	$author_name = $_POST['author_name'];
	$content = $_POST['content'];
	$views = 0;

	$sql = "select * from posts where title = '$title'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkProductName = $kq->fetch();
	if ($checkProductName != false) {
		header('location:' . $adminUrl . 'bai-viet/add.php?errName=Tiêu đề bài viết đã tồn tại!&title='.$title.'&short_desc='.$short_desc.'&created_date='.$created_date.'&content='.$content);
		die;
	}

	if ($title == "" || $short_desc == ""  || $content == "" || file_exists($file)) {
		header('location:' . $adminUrl . 'bai-viet/add.php?err=Không để trống mục này!&title='.$title.'&short_desc='.$short_desc.'&created_date='.$created_date.'&content='.$content);
		die;
	}

if ($file['size'] > 0) {
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$filename = 'images/posts/'.uniqid() . '.' . $ext;
	move_uploaded_file($file['tmp_name'], "../../".$filename);
} else {
	$filename = 'images/default/default.jpg';
}



	$sql = "insert into posts (title, cate_id, short_desc, created_by, created_date, author_name, content, image, views) 
			values (:title, :cate_id, :short_desc, :created_by, :created_date, :author_name, :content, :image, :views) ";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':cate_id', $cate_id);
	$stmt->bindParam(':short_desc', $short_desc);
	$stmt->bindParam(':created_by', $created_by);
	$stmt->bindParam(':created_date', $created_date);
	$stmt->bindParam(':author_name', $author_name);
	$stmt->bindParam(':content', $content);
	$stmt->bindParam(':image', $filename);
	$stmt->bindParam(':views', $views);
	$stmt->execute();


	header('location: '.$adminUrl . 'bai-viet?success=true');
	die;
?>