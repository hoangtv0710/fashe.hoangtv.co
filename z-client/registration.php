<?php 
	require_once '../database/db_fashe.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>REGISTRATION</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="<?= $siteurl ?>css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="<?= $siteurl ?>css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="<?= $siteurl ?>//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="<?= $siteurl ?>//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1>REGISTRATION</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Tạo tài khoản</h2>
							<form action="<?= $adminUrl ?>tai-khoan/quick-saveadd.php" method="post">
								
								<div class="form-sub-w3">
									<input type="text" name="fullname" placeholder="Họ tên" <?php if (isset($_GET['fullname'])): ?>
										value="<?= $_GET['fullname'] ?>"
									<?php endif ?>>
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>			
								</div>
								<?php if (isset($_GET['err'])): ?>
				                  <span style="color: red"><?= $_GET['err'] ?></span>
				                <?php endif ?>		

								<div class="form-sub-w3">
									<input type="text" name="email" placeholder="Email " <?php if (isset($_GET['email'])): ?>
										value="<?= $_GET['email'] ?>"
									<?php endif ?>>
								<div class="icon-w3">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</div>				
								</div>
								<?php if (isset($_GET['errEmail'])): ?>
				                  <span style="color: red"><?= $_GET['errEmail'] ?></span>
				                <?php endif ?>
				                <?php if (isset($_GET['err'])): ?>
				                  <span style="color: red"><?= $_GET['err'] ?></span>
				                <?php endif ?>		

								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="Mật khẩu " <?php if (isset($_GET['password'])): ?>
										value="<?= $_GET['password'] ?>"
									<?php endif ?>>
								<div class="icon-w3">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</div>					
								</div>
								<?php if (isset($_GET['err'])): ?>
				                  <span style="color: red"><?= $_GET['err'] ?></span>
				                <?php endif ?>	

								<div class="form-sub-w3">
									<input type="password" name="cfpassword" placeholder="Xác nhận mật khẩu">
								<div class="icon-w3">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</div>						
								</div>
								<?php if (isset($_GET['errcfPassword'])): ?>
				                  <span style="color: red"><?= $_GET['errcfPassword'] ?></span>
				                <?php endif ?>
				                <?php if (isset($_GET['err'])): ?>
				                  <span style="color: red"><?= $_GET['err'] ?></span>
				                <?php endif ?>


								<div class="clear"></div>

								<div class="submit-agileits">
									<input type="submit" value="Đăng ký">
								</div>
								<div style="margin-top: 15px; text-align: center;font-size: 20px;">
									<a href="<?= $siteurlz ?>login-client.php">Đăng nhập</a>
								</div>

							</form>

						</div>
				<!--//form-ends-here-->
			
		</div>
		<!--//footer-->

</body>
</html>
