<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/trung-bay-sp');
		die;
	}

	$id = $_POST['id'];
	$file = $_FILES['image'];
	$product_id = $_POST['product_id'];



$filename = false;
if ($file['size'] > 0) {
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$filename = 'images/product_galleries/'.uniqid() . '.' . $ext;
	move_uploaded_file($file['tmp_name'], "../../".$filename);
} 


	$sql = "update product_galleries set 
							product_id = :product_id";
	if ($filename != false) {
		$sql .= ", image = :image";
	}

	$sql .= " where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':product_id', $product_id);
	if ($filename != false) {
		$stmt->bindParam(':image', $filename);
	}
	$stmt->bindParam(':id', $id);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/trung-bay-sp');
	die;
?>