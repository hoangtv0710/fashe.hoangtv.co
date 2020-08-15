<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/tai-khoan');
		die;
	}

	$email = trim($_POST['email']);
	$fullname = $_POST['fullname'];
	$password = $_POST['password'];
	$cfpassword = $_POST['cfpassword'];
	$file = $_FILES['avatar'];
	$role = $_POST['role'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$phone_number = $_POST['phone_number'];

	$sql = "select * from users where email = '$email'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkUserEmail = $kq->fetch();
	if ($checkUserEmail != false) {
		header('location:' . SITELINKADMIN . '/tai-khoan/add.php?errEmail=Email đã tồn tại!&email='.$email.'&fullname='.$fullname.'&address='.$address.'&phone_number='.$phone_number);
		die;
	}

	if ($cfpassword != $password) {
		header('location:' . SITELINKADMIN . '/tai-khoan/add.php?errcfPassword=Mật khẩu không khớp!&email='.$email.'&fullname='.$fullname.'&address='.$address.'&phone_number='.$phone_number);
		die;
	}

	if ($email == "" || $password == "" || $cfpassword == "" || $fullname == "" || $gender == "") {
		header('location:' . SITELINKADMIN . '/tai-khoan/add.php?err=Không để trống mục này!&email='.$email.'&fullname='.$fullname.'&address='.$address.'&phone_number='.$phone_number);
		die;
	}


$password = password_hash($password, PASSWORD_DEFAULT);
if ($file['size'] > 0) {
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$filename = 'images/users/'.uniqid() . '.' . $ext;
	move_uploaded_file($file['tmp_name'], "../../".$filename);
} else {
	$filename = 'images/default/user.png';
}



	$sql = "insert into users (email, fullname, password, avatar, role, address, gender, phone_number ) 
			values (:email, :fullname, :password, :avatar, :role, :address, :gender, :phone_number) ";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':fullname', $fullname);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':avatar', $filename);
	$stmt->bindParam(':role', $role);
	$stmt->bindParam(':address', $address);
	$stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':phone_number', $phone_number);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/tai-khoan?success=true');
	die;
?>