<?php 
	require_once 'database/db_fashe.php';
	
	$bannerQuery = "select * from banners where page = 'account'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$cartt = $stmt->fetch();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tài khoản</title>
	<meta charset="UTF-8">
	<?php include 'share/linkAsset.php'; ?>
</head>
<body class="animsition">

	<!-- Header -->

	<?php include 'share/header.php'; ?>
	
	<?php 
	$account = $_SESSION['login'];
	 ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= $cartt['image'] ?>);">
		<h2 class="l-text2 t-center">
			<?= $cartt['description'] ?>
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-40 p-b-100">
		<div class="container">	
			<div class="row">
				<div class="col-md-2">		
					<p class="s-text3">Xin chào, <b><?= $account['fullname'] ?></b></p><br>
					<p class="s-text3"><a href="<?= SITELINK ?>">Quay lại trang chủ</a></p><br>
				</div>

				<div class="col-md-10 p-b-20 p-t-20" style="background: #0101">
					<p class="s-text12">THÔNG TIN CÁ NHÂN</p><hr>
					<div class="row">
						<div class="col-md-3 p-l-50">
							<p class="s-text3"><i class="fa fa-image"></i> Ảnh đại diện</p><img src="<?= $account['avatar'] ?>" width="40" height="40">
							<p class="s-text3 p-t-25"><i class="fa fa-user"></i> Họ tên</p><?= $account['fullname'] ?>
						</div>
						<div class="col-md-3 p-l-50">
							<p class="s-text3"><i class="fa fa-envelope"></i> Email</p><?= $account['email'] ?>
							<p class="s-text3 p-t-40"><i class="fa fa-location-arrow"></i></i> Địa chỉ</p>
							<?php if (isset($account['address'])): ?>
								<?= $account['address'] ?>
							<?php else: ?>
								Chưa có thông tin
							<?php endif ?>
						</div>
						<div class="col-md-4 p-l-100">
							<p class="s-text3"><i class="fa fa-transgender"></i></i> Giới tính</p>
							<?php if (isset($account['gender'])): ?>
								<?= $account['gender'] ?>
							<?php else: ?>
								Chưa có thông tin
							<?php endif ?>
							<p class="s-text3 p-t-40"><i class="fa fa-phone"></i> Só điện thoại</p>
							<?php if (isset($account['phone_number'])): ?>
								<?= $account['phone_number']  ?>
							<?php else: ?>
								Chưa có thông tin
							<?php endif ?>
							
						</div>
					</div>
					
					<div class="header-cart-buttons p-t-100">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="edit-profile.php" class="flex-c-m size2 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
								Sửa thông tin
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="edit-password.php" class="flex-c-m size2 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
								Đổi mật khẩu
							</a>
						</div>
					</div>
				</div>
					
				
			</div>
		</div>
	</section>



	<!-- Footer -->
	<?php include 'share/footer.php'; ?>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
