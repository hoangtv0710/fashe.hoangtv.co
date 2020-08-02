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
					<p class="s-text3">Xin chào, <b><?= $account['fullname'] ?></b></p>
				</div>

				<div class="col-md-10 p-b-20 p-t-20" style="background: #0101">
					<p class="s-text12">sửa mật khẩu</p><hr>
					<form action="<?= SITELINKADMIN . 'tai-khoan/edit-password.php' ?>" method="post" name="ff" onsubmit="return err()">
						<div class="row">

							<div class="col-md-6">
								<input type="hidden" name="id" value="<?= $account['id'] ?>">
								<p class="s-text3">Mật khẩu hiện tại</p>
								<input type="password" name="password" class="form-control p-t-15 p-b-15">
								<?php if (isset($_GET['msg'])): ?>
									<span class="text-danger"><?= $_GET['msg'] ?></span>
								<?php endif ?>
								<span class="text-danger" id="errP"></span>
								<p class="s-text3 p-t-30">Mật khẩu mới</p>

								<input type="password" name="new_password" class="form-control p-t-15 p-b-15">
								<span class="text-danger" id="errP1"></span>

								<p class="s-text3 p-t-30">Xác nhận mật khẩu mới</p>
								<input type="password" name="retype_password" class="form-control p-t-15 p-b-15">
								<span class="text-danger" id="errP2"></span>
								<span class="text-danger" id="errP3"></span>

							</div>

						</div>
						
						<div class="header-cart-buttons p-t-50">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<button type="submit" class="flex-c-m size2 bg1 bo-rad-5 hov1 s-text1 trans-0-4">Lưu thay đổi
								</button>
							</div>
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="account.php" class="flex-c-m size2 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
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


	<script>
		function err () {
			var f = document.ff;
			if (f.password.value == "" || f.new_password.value == "" || f.retype_password.value == "") {
				document.getElementById("errP").innerHTML = "Không để trống mục này";
				document.getElementById("errP1").innerHTML = "Không để trống mục này";
				document.getElementById("errP2").innerHTML = "Không để trống mục này";
				return false;
			} else {
				document.getElementById("errP").style.display = 'none';
				document.getElementById("errP1").style.display = 'none';
				document.getElementById("errP2").style.display = 'none';
			}
			if (f.retype_password.value != f.new_password.value) {
				document.getElementById("errP3").innerHTML = "Mật khẩu không khớp";
				return false;
			} else {
				document.getElementById("errP3").style.display = 'none';
			}
		}
	</script>
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
