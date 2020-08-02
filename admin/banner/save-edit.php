<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/banner');
		die;
	}

	$id = $_POST['id'];
	$description = $_POST['description'];
	$file = $_FILES['image'];


$filename = false;
if ($file['size'] > 0) {
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$filename = 'images/banners/'.uniqid() . '.' . $ext;
	move_uploaded_file($file['tmp_name'], "../../".$filename);
}

	$sql = "update banners set
								description = :description";
	if ($filename != false) {
		$sql .= ", image = :image";
	}
	$sql .=" where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':description', $description);

	if ($filename != false) {
		$stmt->bindParam(':image', $filename);
	}
	$stmt->bindParam(':id', $id);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/banner');
	die;
?>