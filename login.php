<?php 
	require_once './database/db_fashe.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LOGIN - ADMIN</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1>LOGIN - ADMIN</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Đăng nhập để tiếp tục</h2>
							<?php if (isset($_GET['err'])): ?>
								<h3 style="color: red; text-align: center; padding-bottom: 10px;"><?= $_GET['err'] ?></h3>
							<?php endif ?>
							<form action="<?= $siteurl ?>post-login.php" method="post">

								<div class="form-sub-w3">
									<input type="text" name="email" placeholder="Email " <?php if (isset($_GET['email'])): ?>
										value="<?= $_GET['email'] ?>"
									<?php endif ?>>
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<?php if (isset($_GET['errorEmail'])): ?>
			 						<span style="color: red"><?= $_GET["errorEmail"] ?></span>
			 					<?php endif ?>

								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="Password" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<?php if (isset($_GET['errorPass'])): ?>
			 						<span style="color: red"><?= $_GET["errorPass"] ?></span>
			 					<?php endif ?>
								<?php if (isset($_GET['msg'])): ?>
			 						<span style="color: red"><?= $_GET["msg"] ?></span>
			 					<?php endif ?>
								<div class="clear"></div>

								<div class="submit-agileits">
									<input type="submit" value="Đăng nhập">
								</div>

							</form>

						</div>
				<!--//form-ends-here-->
			
		</div>
		<!--//footer-->
</body>
</html>
