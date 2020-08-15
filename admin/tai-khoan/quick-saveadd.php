<?php 
	require_once '../../database/db_fashe.php';


	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINK . 'authenticator/registration.php');
		die;
	}

	// sinh mã giảm giá
	$randomNumber = rand(10000, 99999);
	function randomString($length = 5)
	{
		$str = "";
		$characters = array_merge(range('A','Z'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++)
		{
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
	$randomString = randomString();
	$randomStr = $randomString.$randomNumber;
	// end

	$percent = 10;

	$email = trim($_POST['email']);
	$fullname = $_POST['fullname'];
	$password = $_POST['password'];
	$cfpassword = $_POST['cfpassword'];
	$role = 1;

	$filename = 'images/default/user.png';

	$sql = "select * from users where email = '$email'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkUserEmail = $kq->fetch();
	if ($checkUserEmail != false) {
		header('location:' . SITELINK . 'authenticator/registration.php?errEmail=Email đã tồn tại!&email='.$email.'&fullname='.$fullname);
		die;
	}

	if ($cfpassword != $password) {
		header('location:' . SITELINK . 'authenticator/registration.php?errcfPassword=Mật khẩu không khớp!&email='.$email.'&fullname='.$fullname);
		die;
	}

	if ($email == "" || $password == "" || $cfpassword == "" || $fullname == "") {
		header('location:' . SITELINK . 'authenticator/registration.php?err=Không để trống mục này!&email='.$email.'&fullname='.$fullname);
		die;
	}


$password = password_hash($password, PASSWORD_DEFAULT);



	$sql = "insert into users (email, fullname, password, avatar, role) 
			values ('$email', '$fullname', '$password', '$filename', '$role')";
	$stmt = $conn->prepare($sql);
	
	$stmt->execute();

	$code = "insert into discount_code (code, percent) values ('$randomStr' , '$percent')";
	$st = $conn->prepare($code);
	$st->execute();

	header('location: '. SITELINKADMIN . '/send_dc?email='.$email.'&discount_code='.$randomStr);
	die;
?>