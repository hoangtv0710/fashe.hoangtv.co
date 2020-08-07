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
	<title>Sửa tài khoản</title>
	<meta charset="UTF-8">
	<?php include 'share/top_asset.php'; ?>
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
					<p class="s-text3">Xin chào, <b><?= $account['fullname'] ?></b></p>
				</div>

				<div class="col-md-10 p-b-20 p-t-20" style="background: #0101">
					<p class="s-text12">sửa THÔNG TIN CÁ NHÂN</p><hr>
					<form action="<?= SITELINKADMIN . 'tai-khoan/quick-saveeditprofile.php' ?>" method="post" enctype="multipart/form-data" name="ff" onsubmit="return err()">
						<div class="row">
							<input type="hidden" name="id" value="<?= $account['id'] ?>">
							<div class="col-md-5 p-l-50">
								<p class="s-text3"><i class="fa fa-image"></i> Ảnh đại diện</p><img src="<?= $account['avatar'] ?>" width="40" height="40">
								<input type="file" name="avatar" class="form-control m-t-5">

								<p class="s-text3 p-t-25"><i class="fa fa-user"></i> Họ tên</p>
								<input type="text" name="fullname" class="form-control" value="<?= $account['fullname'] ?>">
								<span id="err" class="text-danger"></span>
							</div>

							<div class="col-md- p-l-50">
								<p class="s-text3"><i class="fa fa-envelope"></i> Email</p><?= $account['email'] ?>

								<p class="s-text3 p-t-40"><i class="fa fa-location-arrow"></i></i> Địa chỉ</p>
								<input type="text" name="address" class="form-control" value="<?= $account['address'] ?>">
							</div>

							<div class="col-md-3 p-l-100">
								<p class="s-text3"><i class="fa fa-transgender"></i></i> Giới tính</p>
								<input type="radio" name="gender" <?php if ($account['gender'] == "Nam"): ?>
				                  checked
				                <?php endif ?> value="Nam"> Nam &emsp;
				                <input type="radio" name="gender" <?php if ($account['gender'] == "Nữ"): ?>
				                  checked
				                <?php endif ?> value="Nữ"> Nữ 
								<p class="s-text3 p-t-40"><i class="fa fa-phone"></i> Só điện thoại</p>
								<input type="text" name="phone_number" class="form-control" value="<?= $account['phone_number'] ?>">
							</div>
						</div>
						
						<div class="header-cart-buttons p-t-100">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<button type="submit" class="flex-c-m size2 bg1 bo-rad-5 hov1 s-text1 trans-0-4">Lưu thay đổi
								</button>
							</div>
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= SITELINK . 'account.php' ?>" class="flex-c-m size2 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
									Hủy
								</a>
							</div>
							
						</div>
					</form>
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
	
	<?php include 'share/bottom_asset.php'; ?>

	<script>
		function err () {
			var f = document.ff;
			if (f.fullname.value == "") {
				document.getElementById("err").innerHTML = "Không để trống tên";
				return false;
			} else {
				document.getElementById("err").style.display = 'none';
			}
		}
	</script>


</body>
</html>
