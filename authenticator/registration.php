<?php 
	require_once '../database/db_fashe.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css">
	<link rel="stylesheet" href="<?= SITELINK ?>/css/authenticator.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
	<style>
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">

			<div class="fadeIn first">
				<a href="<?= SITELINK ?>"><img src="<?= SITELINK ?>images/icons/logo.png" id="icon" alt="User Icon"></a>
			</div>

			<!-- Login Form -->
			<form action="<?= SITELINKADMIN ?>/tai-khoan/quick-saveadd.php" method="post" id="register">

				<input type="text" name="fullname" placeholder="Họ tên" <?php if (isset($_GET['fullname'])): ?>
					value="<?= $_GET['fullname'] ?>"
				<?php endif ?>><br>
				<?php if (isset($_GET['err'])): ?>
					<span style="color: red"><?= $_GET['err'] ?></span>
				<?php endif ?>
				
				<input type="text" name="email" placeholder="Email " <?php if (isset($_GET['email'])): ?>
					value="<?= $_GET['email'] ?>"
				<?php endif ?>><br>
				<?php if (isset($_GET['errEmail'])): ?>
					<span style="color: red"><?= $_GET['errEmail'] ?></span>
				<?php endif ?>
				<?php if (isset($_GET['err'])): ?>
					<span style="color: red"><?= $_GET['err'] ?></span>
				<?php endif ?>	

				<input type="password" name="password" id="password" placeholder="Mật khẩu"><br>
				<?php if (isset($_GET['err'])): ?>
					<span style="color: red"><?= $_GET['err'] ?></span>
				<?php endif ?>	

				<input type="password" name="cfpassword" placeholder="Xác nhận mật khẩu"><br>
				<?php if (isset($_GET['errcfPassword'])): ?>
					<span style="color: red"><?= $_GET['errcfPassword'] ?></span><br>
				<?php endif ?>
				<?php if (isset($_GET['err'])): ?>
					<span style="color: red"><?= $_GET['err'] ?></span><br>
				<?php endif ?>

				<input type="submit" class="fadeIn fourth mt-2" value="Đăng ký">

				<div class="text-center m-2">Bạn đã có tài khoản hãy <a href="login-client.php"> đăng nhập</a></div>
			</form>

		</div>
	</div>

<script type="text/javascript" src="<?= SITELINK ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= SITELINK ?>js/jquery.validate.min.js"></script>

<script>
	$(document).ready(function() {
		$("#register").validate({
			rules: {
				"fullname": {
					required: true
				},
				"email": {
					required: true,
					email: true
				},
				"password": {
					required: true
				},
				"cfpassword": {
					required: true,
					equalTo: "#password"
				},
			},
			messages: {
				"fullname": {
					required: "Tên không được bỏ trống"
				},
				"email": {
					required: "Email không được bỏ trống",
					email: "Email không hợp lệ"
				},
				"password": {
					required: "Mật khẩu không được bỏ trống"
				},
				"cfpassword": {
					required: "Xác nhận mật khẩu không được bỏ trống",
					equalTo: "Mật khẩu không trùng"
				}
			}
		});
	});
</script>

</body>
</html>
