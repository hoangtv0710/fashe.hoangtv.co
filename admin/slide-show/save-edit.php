<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'slide-show');
		die;
	}

	$id = $_POST['id'];
	$file = $_FILES['image'];
	$title = $_POST['title'];
	$caption = $_POST['caption'];
	$sort_order = $_POST['sort_order'];
	$effect = $_POST['effect'];
	$link_url = $_POST['link_url'];

	$sql = "select * from slideshows where sort_order = '$sort_order' and id <> $id";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkOrderNumber = $kq->fetch();
	if ($checkOrderNumber != false) {
		header('location: '.$adminUrl . 'slide-show/edit.php?id='.$id.'&errOrder=Số thứ tự đã tồn tại!');
		die;
	}

	$filename = false;
	if ($file['size'] > 0) {
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/slideshows/'.uniqid() . '.' . $ext;
		move_uploaded_file($file['tmp_name'], "../../".$filename);
	}



	$sql = "update slideshows set 
				title = :title, 
				caption =  :caption, 
				sort_order =  :sort_order, 
				effect =  :effect, 
				link_url = :link_url";
	if ($filename != false) {
		$sql .=", image = :image";
	}
	$sql .=" where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':caption', $caption);
	$stmt->bindParam(':sort_order', $sort_order);
	$stmt->bindParam(':effect', $effect);
	$stmt->bindParam(':link_url', $link_url);

	if ($filename != false) {
		$stmt->bindParam(':image', $filename);
	}

	$stmt->bindParam(':id', $id);
	$stmt->execute();


	header('location: '.$adminUrl . 'slide-show');
	die;
?>