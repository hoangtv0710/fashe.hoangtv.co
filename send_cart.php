<?php 
	require_once 'database/db_fashe.php';
	$total_ = 0;
	$bannerQuery = "select * from banners where page = 'pay'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$pay = $stmt->fetch();

	if (isset($_POST['submit'])) {
		$code = $_POST['coupon_code'];
		$sql = "select * from discount_code where code = '$code'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$discount_code = $stmt->fetch();
		if (!$discount_code) {
			header('location: ' . SITELINK . 'send_cart.php?error'.'&Code='.$code);
			die;
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thanh toán</title>
	<meta charset="UTF-8">
	<?php include 'share/top_asset.php'; ?>
	<style>
		.error {
			color: red;
		}
	</style>
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'share/header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= $pay['image'] ?>);">
		<h2 class="l-text2 t-center">
			<?= $pay['description'] ?>
		</h2>
	</section>

	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<p class="m-text25">Sản phẩm</p>
						<hr>
						<?php if (isset($cart)): ?>
							<?php foreach ($cart as $item): ?>
							<?php if (empty($item['sell_price'])): ?>
								<div class="dis-flex">
									<div class="col-md-4 m-t-20">
										<div class="hov-img-zoom">
											<img src="<?= $item['image'] ?>" height="150">
										</div>
									</div>
									<div class="col-md-8 m-t-30">
										<div class="s-text3">
											Tên sản phẩm: <?= $item['product_name'] ?><br>
											<?php if (isset($discount_code)): ?>
												Giá sản phẩm: <strike><?= number_format($item['price']) ?></strike>
												<?=number_format( $item['price']*((100 - $discount_code['percent'])/100)) ?><span class="s-text11">(Đã áp dụng mã giảm giá)
											<?php else: ?>
												Giá sản phẩm: <?= number_format($item['price']) ?>
											<?php endif ?></span>
											<br>
											Số lượng: <?= $item['quantity'] ?><br>										
										</div>
									</div>
								</div>
								<?php 
									if (isset($discount_code)) {
										$total_ += $item['price']*$item['quantity']*((100 - $discount_code['percent'])/100);
									} else {
										$total_ += $item['price']*$item['quantity'];
									}				 					
					 			 ?>
							<?php else: ?>
								<div class="dis-flex">
									<div class="col-md-4 m-t-20">
										<div class="hov-img-zoom">
											<img src="<?= $item['image'] ?>" height="150">
										</div>
									</div>
									<div class="col-md-8 m-t-30">
										<div class="s-text3">
											Tên sản phẩm: <?= $item['product_name'] ?><br>
											<?php if (isset($discount_code)): ?>
												Giá sản phẩm: <strike><?= number_format($item['sell_price']) ?></strike>
												<?=number_format( $item['sell_price']*((100 - $discount_code['percent'])/100)) ?><span class="s-text11">(Đã áp dụng mã giảm giá)
											<?php else: ?>
												Giá sản phẩm: <?= number_format($item['sell_price']) ?>
											<?php endif ?></span>
											<br>
											Số lượng: <?= $item['quantity'] ?><br>										
										</div>
									</div>
								</div>
								<?php 
									if (isset($discount_code)) {
										$total_ += $item['sell_price']*$item['quantity']*((100 - $discount_code['percent'])/100);
									} else {
										$total_ += $item['sell_price']*$item['quantity'];
									}				 					
					 			 ?>
							<?php endif ?>
							
						<?php endforeach ?>
						<?php else: ?>
							<?= 'Bạn chưa có sản phẩm để thanh toán' ?>
						<?php endif ?>
						<hr>
						<div>
							<form action="send_cart.php" method="post" class="flex-w flex-m w-full-sm" name="codeone" onsubmit="return checkCode()">
								<div class="size11 bo4 m-r-10">
									<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon_code" placeholder="Mã giảm giá" <?php if (isset($_GET['Code'])): ?>
										value='<?= $_GET['Code'] ?>'
									<?php endif ?>>
								</div>

								<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
									<!-- Button -->
									<button type="submit" name="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
										Áp dụng
									</button>
									
								</div>
							</form>
							<span id="errCode" class="text-danger"></span>
							<?php if (isset($_GET['error'])): ?>
								<span class="
								text-danger"><?= $_GET['error'].'Mã giảm giá không hợp lệ!' ?></span>
							<?php endif ?>
							<p class="s-text11">Lưu ý: Chỉ áp dụng cho một lần mua hàng</p>
						</div>
					</div>
					<hr>
					<p class="s-text12 text-right">Tổng: <?= number_format($total_) ?></p>
				</div>

				<div class="col-md-6 p-b-30">
					<h4 class="m-text25 p-b-30">
						Mời nhập thông tin đề mua hàng
						<hr>
					</h4>
		<form method="POST" action="cart_action/save-order.php" class="save_order" name="form">	
					<input type="hidden" name="discount_code" value="<?= $discount_code['code'] ?>">			
					<input type="hidden" name="totalprice" value="<?= $total_ ?>">			
					<!--  -->			
					<div class="bo4 size15 m-b-30">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Họ tên">
					</div>

					<div class="bo4 size15 m-b-30">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" placeholder="Số điện thoại">
					</div>
				
					<div class="bo4 size15 m-b-30">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Địa chỉ email">
					</div>

					<div class="bo4 size15 m-b-30">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="address" placeholder="Địa chỉ nhận hàng">
					</div>
					
					<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13" name="message" placeholder="Ghi chú"></textarea>
					<div class="w-size25">
						<!-- Button -->
						<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 m-t-20">
							Hoàn thành
						</button>
					</div>
					<span class="text-danger" id="errcode"></span>					
				</div>
			</div>
		</div>
	</section>
</form>


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
		function checkCode () {
			var c = document.codeone;
			var checkcode = /^[A-Z]+[0-9]+$/;
			if (c.coupon_code.value == "") {
				document.getElementById("errCode").innerHTML = "Mời nhập mã giảm giá";
				c.coupon_code.focus();
				return false;
			} else if (!checkcode.test(c.coupon_code.value)) {
				document.getElementById("errCode").innerHTML = "Mã giảm giá phải là chữ in hoa kết hợp với số ( Vd: CODE123 )";
				c.coupon_code.focus();
				return false;
			}
			else {
				document.getElementById("errCode").style.display = 'none';
			}
		}

		$(".save_order").validate({
			rules: {
				"name": {
					required: true
				},
				"phone_number": {
					required: true,
					number: true,
					minlength: 10,
					maxlength: 10
				},
				"email": {
					required: true,
					email: true
				},
				"address": {
					required: true
				},
			},
			messages: {
				"name": {
					required: "Tên không được bỏ trống"
				},
				"phone_number": {
					required: "Sô điện thoại không được bỏ trống",
					number: "Sô điện thoại không hợp lệ",
					minlength: "Số điện thoại phải gồm 10 chữ số",
					maxlength: "Số điện thoại tối đa 10 chữ số",
				},
				"email": {
					required: "Email không được bỏ trống",
					email: "Email không hợp lệ"
				},
				"address": {
					required: "Địa chỉ nhận hàng không được bỏ trống"
				}
			}
		});
		
	</script>

	<script type="text/javascript">
		<?php if (isset($_GET['success']) && $_GET['success'] == true) {
	   		 ?>
		    toastr.options = {
		      "closeButton": false,
		      "debug": false,
		      "newestOnTop": false,
		      "progressBar": true,
		      "positionClass": "toast-top-right",
		      "preventDuplicates": false,
		      "onclick": null,
		      "showDuration": "300",
		      "hideDuration": "1000",
		      "timeOut": "7000",
		      "extendedTimeOut": "7000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Đơn mua hàng gửi thành công, chúng tôi sẽ liên lạc với bạn ngay!')
		    <?php
		  } ?>
	</script>

</body>
</html>
