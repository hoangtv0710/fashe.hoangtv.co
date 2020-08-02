<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/trung-bay-sp');
		die;
	}

	$file = $_FILES['image'];
	$product_id = $_POST['product_id'];

	if ($file['size'] > 0) {
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/product_galleries/'.uniqid() . '.' . $ext;
		move_uploaded_file($file['tmp_name'], "../../".$filename);
	} else {
		$filename = 'images/default/default.jpg';
	}



	$sql = "insert into product_galleries (image, product_id) values (:image, :product_id)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':image', $filename);
	$stmt->bindParam(':product_id', $product_id);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/trung-bay-sp?success=true');
	die;
?>