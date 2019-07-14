<?php 
	require_once '../../database/db_fashe.php';

	// kiem tra xem loai request co phai loai post hay khong
	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'bai-viet');
		die;
	}

	$id = $_POST['id'];
	$title = trim($_POST['title']);
	$cate_id = $_POST['cate_id'];
	$short_desc = $_POST['short_desc'];
	$file = $_FILES['image'];
	$author_name = $_POST['author_name'];
	$content = $_POST['content'];

	if ($title == "") {
		header('location: '.$adminUrl . 'san-pham/edit.php?id='.$id.'&errName=Không để trống tiêu đề bài viết');
	die;
	}
	
	$sql = "select * from posts where title = '$title' and id <> $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '.$adminUrl . 'bai-viet/edit.php?id='.$id.'&errName=Tiêu đề bài viết đã tồn tại!');
		die;
	}

	$filename = false;
	if($file['size'] > 0){
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/posts/'.uniqid() . '.' . $ext;
		
		move_uploaded_file($file['tmp_name'], "../../".$filename);
	}

	$sql = "update posts set 
				title = :title, 
				cate_id = :cate_id,
				short_desc = :short_desc,
				author_name = :author_name,
				content = :content";
	if($filename != false){
		$sql .= ", image = :image";
	}

	$sql .= " where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':cate_id', $cate_id);
	$stmt->bindParam(':short_desc', $short_desc);
	$stmt->bindParam(':author_name', $author_name);
	$stmt->bindParam(':content', $content);

	if($filename != false){
		$stmt->bindParam(':image', $filename);
	}

	$stmt->bindParam(':id', $id);
	$stmt->execute();


	header('location: '.$adminUrl . 'bai-viet');
	die;
 ?>