<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'thong-tin-chung');
		die;
	}

	$id = $_POST['id'];
	$slogan = trim($_POST['slogan']);
	$hotline = trim($_POST['hotline']);
	$email = $_POST['email'];
	$facebook = $_POST['facebook'];
	$instagram = $_POST['instagram'];
	$map = $_POST['map'];
	$file = $_FILES['logo'];
	$address = $_POST['address'];
	$ship_policy = $_POST['ship_policy'];
	$return_policy = $_POST['return_policy'];
	$open_time = $_POST['open_time'];


$filename = false;
if ($file['size'] > 0) {
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$filename = 'images/icons/'.uniqid() . '.' . $ext;
	move_uploaded_file($file['tmp_name'], "../../".$filename);
}

	$sql = "update web_settings set
									slogan = :slogan,
									hotline = :hotline,
									email = :email,
									facebook = :facebook,
									instagram = :instagram,
									map = :map,
									address = :address,
									ship_policy = :ship_policy,
									return_policy = :return_policy,
									open_time = :open_time";
	if ($filename != false) {
		$sql .= ", logo = :logo";
	}
	$sql .=" where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':slogan', $slogan);
	$stmt->bindParam(':hotline', $hotline);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':facebook', $facebook);
	$stmt->bindParam(':instagram', $instagram);
	$stmt->bindParam(':map', $map);
	$stmt->bindParam(':address', $address);
	$stmt->bindParam(':ship_policy', $ship_policy);
	$stmt->bindParam(':return_policy', $return_policy);
	$stmt->bindParam(':open_time', $open_time);
	if ($filename != false) {
		$stmt->bindParam(':logo', $filename);
	}
	$stmt->bindParam(':id', $id);
	$stmt->execute();


	header('location: '.$adminUrl . 'thong-tin-chung');
	die;
?>