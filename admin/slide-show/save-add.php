<?php 
	session_start();
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/slide-show');
		die;
	}

	$file = $_FILES['image'];
	$title = $_POST['title'];
	$caption = $_POST['caption'];
	$sort_order = $_POST['sort_order'];
	$effect = $_POST['effect'];
	$link_url = $_POST['link_url'];

	if ($title == "" || $sort_order == "" || file_exists($file)) {
		header('location:' . SITELINKADMIN . '/slide-show/add.php?err=Không để trống mục này!&title='.$title.'&link_url='.$link_url.'&sort_order='.$sort_order);
		die;
	}

	$sql = "select * from slideshows where sort_order = '$sort_order'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkOrderNumber = $kq->fetch();
	if ($checkOrderNumber != false) {
		header('location:' . SITELINKADMIN . '/slide-show/add.php?errOrder=Số thứ tự đã tồn tại!&title='.$title.'&link_url='.$link_url.'&sort_order='.$sort_order);
		die;
	}

	if ($file['size'] > 0) {
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/slideshows/'.uniqid() . '.' . $ext;
		move_uploaded_file($file['tmp_name'], "../../".$filename);
	} else {
		$filename = 'images/default/default.jpg';
	}



	$sql = "insert into slideshows (image, title, caption, sort_order, effect, link_url) values (:image, :title, :caption, :sort_order, :effect, :link_url)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':image', $filename);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':caption', $caption);
	$stmt->bindParam(':sort_order', $sort_order);
	$stmt->bindParam(':effect', $effect);
	$stmt->bindParam(':link_url', $link_url);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/slide-show?success=true');
	die;
?>