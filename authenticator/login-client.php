<?php 
	require_once '../database/db_fashe.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN - CLIENT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css">
	<link rel="stylesheet" href="<?= SITELINK ?>/css/authenticator.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
</head>
<body>

	<div class="wrapper fadeInDown">
		<div id="formContent">

			<div class="fadeIn first">
				<a href="<?= SITELINK ?>"><img src="<?= SITELINK ?>images/icons/logo.png" id="icon" alt="User Icon"></a>
			</div>

			<!-- Login Form -->
			<form action="post-login-client.php" method="post">
				<?php if (isset($_GET['err'])): ?>
					<h3 style="color: red; text-align: center; padding-bottom: 10px;"><?= $_GET['err'] ?></h3><br>
				<?php endif ?>

				<input type="text" name="email" class="fadeIn third" placeholder="Email " <?php if (isset($_GET['email'])): ?>
					value="<?= $_GET['email'] ?>"
				<?php endif ?>><br>
				<?php if (isset($_GET['errorEmail'])): ?>
					<span style="color: red"><?= $_GET["errorEmail"] ?></span>
				<?php endif ?>

				<input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu"><br>
				<?php if (isset($_GET['errorPass'])): ?>
					<span style="color: red"><?= $_GET["errorPass"] ?></span>
				<?php endif ?>

				<?php if (isset($_GET['msg'])): ?>
					<span style="color: red"><?= $_GET["msg"] ?></span>
				<?php endif ?>

				<input type="submit" class="fadeIn fourth mt-2" value="Đăng nhập">

				<div class="text-center m-2">Nếu bạn chưa có tài khoản hãy <a href="registration.php"> đăng ký</a></div>
			</form>

		</div>
	</div>

<script type="text/javascript" src="<?= SITELINK ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
		
		<?php if (isset($_GET['sce']) && $_GET['sce'] == true) {
	   		 ?>
		    toastr.options = {
		      "closeButton": false,
		      "debug": false,
		      "newestOnTop": false,
		      "progressBar": false,
		      "positionClass": "toast-top-right",
		      "preventDuplicates": false,
		      "onclick": null,
		      "showDuration": "300",
		      "hideDuration": "1000",
		      "timeOut": "3000",
		      "extendedTimeOut": "1000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Sửa mật khẩu thành công, vui lòng đăng nhập lại!')
		    <?php
		  } ?>

		<?php if (isset($_GET['sc']) && $_GET['sc'] == true) {
	   		 ?>
		    toastr.options = {
		      "closeButton": false,
		      "debug": false,
		      "newestOnTop": false,
		      "progressBar": false,
		      "positionClass": "toast-top-right",
		      "preventDuplicates": false,
		      "onclick": null,
		      "showDuration": "300",
		      "hideDuration": "1000",
		      "timeOut": "3000",
		      "extendedTimeOut": "1000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Sửa tài khoản thành công, vui lòng đăng nhập lại!')
		    <?php
		  } ?>

		  <?php if (isset($_GET['success']) && $_GET['success'] == true) {
	   		 ?>
		    toastr.options = {
		      "closeButton": false,
		      "debug": false,
		      "newestOnTop": false,
		      "progressBar": false,
		      "positionClass": "toast-top-right",
		      "preventDuplicates": false,
		      "onclick": null,
		      "showDuration": "300",
		      "hideDuration": "1000",
		      "timeOut": "3000",
		      "extendedTimeOut": "1000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Đăng ký tài khoản thành công, mã giảm giá đã được gửi về mail của bạn!')
		    <?php
		  } ?>

	</script>
</body>
</html>
