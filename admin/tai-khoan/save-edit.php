<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/tai-khoan');
		die;
	}

	$id = $_POST['id'];
	$fullname = $_POST['fullname'];
	$file = $_FILES['avatar'];
	$role = $_POST['role'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$phone_number = $_POST['phone_number'];

	$findUser = "select * from users where id = $id";
  	$kq = $conn->prepare($findUser);
  	$kq->execute();
	$user = $kq->fetch();
	 
	$filename = false;

	if ($file['size'] > 0) {
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/users/'.uniqid() . '.' . $ext;
		move_uploaded_file($file['tmp_name'], "../../".$filename);

		unlink("../../".$user['avatar']);
	} 


	$sql = "update users set 
							fullname = :fullname,
							role = :role,
							address = :address,
							gender = :gender,
							phone_number = :phone_number";
	if ($filename != false) {
		$sql .= ", avatar = :avatar";
	}

	$sql .= " where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':fullname', $fullname);
	$stmt->bindParam(':role', $role);
	$stmt->bindParam(':address', $address);
	$stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':phone_number', $phone_number);
	if ($filename != false) {
		$stmt->bindParam(':avatar', $filename);
	}
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	
	header('location: '. SITELINKADMIN . '/tai-khoan');
	die;
?>