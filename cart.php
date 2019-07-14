<?php 
	$cart = isset($_SESSION['CART']) == true ? $_SESSION['CART'] : [];
	$totalPrice = 0;
	require_once 'database/db_fashe.php';
	// if ($cart == null) {
	// 	header('location: ' . $siteurl);
	// 	die;
	// }
	$bannerQuery = "select * from banners where page = 'cart'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$cartt = $stmt->fetch();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Giỏ hàng</title>
	<meta charset="UTF-8">
	<?php include 'share/linkAsset.php'; ?>
</head>
<body class="animsition">

	<!-- Header -->

	<?php include 'share/header.php'; ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= $cartt['image'] ?>);">
		<h2 class="l-text2 t-center">
			<?= $cartt['description'] ?>
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">Ảnh</th>
							<th class="column-2">Tên sản phẩm</th>
							<th class="column-3">Giá gốc</th>
							<th class="column-4">Giá khuyến mãi</th>
							<th class="column-5">Số lượng</th>
							<th class="column-6">Thành tiền</th>
							<th class="column-7">Xóa</th>
						</tr>

					<?php foreach ($cart as $item): ?>
						
						<?php if (empty($item['sell_price'])): ?>

							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product hov-img-zoom o-f-hidden">
										<img src="<?= $item['image'] ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2 text-uppercase"><?= $item['product_name'] ?></td>
								<td class="column-3"><?= number_format($item['price']) ?></td>
								<td class="column-4">-----</td>
								<td class="column-5">
									<!-- <div class="flex-w bo5 w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?= $item['quantity'] ?>">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div> -->
									<?= $item['quantity'] ?>
								</td>
								<td class="column-6">
									<?php if (isset($discount_code)): ?>
										<?= number_format($item['price']*$item['quantity']*((100 - $discount_code['percent'])/100)) ?>
									<?php else: ?>
										<?= number_format($item['price']*$item['quantity']) ?>
									<?php endif ?>										
								</td>
								<td class="column-7"><a href="<?= "remove_cart.php?id=". $item['id'] ?>"><i class="fa fa-trash"></i></a></td>
	
							</tr>
						<?php 
							if (isset($discount_code)) {
								$totalPrice += $item['price']*$item['quantity']*((100 - $discount_code['percent'])/100);
							} else {
								$totalPrice += $item['price']*$item['quantity'];
							}
							
			 					
			 			 ?>
						
						<?php else: ?>

							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product hov-img-zoom o-f-hidden">
										<img src="<?= $item['image'] ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2 text-uppercase"><?= $item['product_name'] ?></td>
								<td class="column-3"><strike><?= number_format($item['price']) ?></strike></td>
								<td class="column-4"><?= number_format($item['sell_price']) ?></td>
								<td class="column-5">
									<!-- <div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?= $item['quantity'] ?>">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div> -->
									<?= $item['quantity'] ?>
								</td>
								<td class="column-6"><?= number_format($item['sell_price']*$item['quantity']) ?></td>
								<td class="column-7"><a href="<?= "remove_cart.php?id=". $item['id'] ?>"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php 
				 				$totalPrice += $item['sell_price']*$item['quantity'];
				 			 ?>
							
						<?php endif ?>
						
					<?php endforeach ?>
						
					</table>
				</div>
			</div>
				<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div>
						<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
							<a href="removeAllcart.php" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" >
								Xóa tất cả
							</a>
							
						</div>
					</div>
							
					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<p class="s-text12">Tổng: <?= number_format($totalPrice) ?></p>
					</div>					

				</div>
				<div class="flex-w flex-col-r p-t-25 p-b-25  p-l-35 p-r-60 p-lr-15-sm">
					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<a href="send_cart.php" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="color: white;">
							Thanh toán
						</a>
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
