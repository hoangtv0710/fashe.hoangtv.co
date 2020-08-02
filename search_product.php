<?php 
	require_once 'database/db_fashe.php';

	$search_product = addslashes($_GET['keyword']);

	$sql = "select * from products where product_name like '%$search_product%'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$search_pro = $stmt->fetchAll();

	$sql = "select count(*) as total from products where product_name like '%$search_product%'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$totalProducts = $stmt->fetch();

	$cateProduct = "select * from product_categories";
	$stmt = $conn->prepare($cateProduct);
	$stmt->execute();
	$cate = $stmt->fetchall();

	$bannerProduct = "select * from banners where page = 'product'";
	$stmt = $conn->prepare($bannerProduct);
	$stmt->execute();
	$banner = $stmt->fetch();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kết quả tìm kiếm: <?= $search_product ?></title>
	<meta charset="UTF-8">
	<?php include 'share/linkAsset.php'; ?>
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'share/header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= $banner['image'] ?>);">
		<h2 class="l-text2 t-center">
			product
		</h2>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-20">
							Danh mục
						</h4>
						<li class="p-t-4">
							<a href="product.php" class="s-text3">
								<p class="text-uppercase">Tất cả</p><hr>										
							</a>
						</li>
						<ul class="p-b-54">
							<?php foreach ($cate as $c): ?>
								<li class="p-t-4">
									<a href="<?= "product.php?id=".$c['id'] ?>" class="s-text13">
										<p class="text-uppercase"><?= $c['name'] ?></p><hr>
									</a>
								</li>
							<?php endforeach ?>
						</ul>

						<!--  -->


					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							
						</div>
						<div class="search-product pos-relative bo4 of-hidden">
							<form action="search_product.php" method="GET">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required="">

								<button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>

					<!-- Product -->
					<div class="row">

							<div class="col-md-12 mt-1">
								<h6>
									<p class="s-text2">Có <?= $totalProducts['total']?> kết quả tìm kiếm phù hợp</p>
								</h6>
								<hr>
							</div>
							<?php foreach ($search_pro as $P): ?>

								<?php if (empty($P['sell_price'])): ?>

									<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative">
												<img src="<?= $P['image'] ?>" alt="IMG-PRODUCT" height="300">

												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<a href="<?= "product-detail.php?id=".$P['id']."&categories=".$P['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
														<a href="<?= "save-cart.php?id=".$P['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
													</div>
												</div>
											</div>

											<div class="block2-txt p-t-20 text-center text-uppercase">
												<a href="<?= "product-detail.php?id=".$P['id']."&categories=".$P['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
													<?= $P['product_name'] ?>
												</a>

												<span class="block2-price m-text6 p-r-5">
													<?= number_format($P['price']) ?>
												</span>
											</div>
										</div>
									</div>

								<?php else: ?>

									<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
												<img src="<?= $P['image'] ?>" alt="IMG-PRODUCT" height="300">

												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
														<a href="<?= "product-detail.php?id=".$P['id']."&categories=".$P['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
														<a href="<?= "save-cart.php?id=".$P['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
													</div>
												</div>
											</div>

											<div class="block2-txt p-t-20 text-center text-uppercase">
												<a href="<?= "product-detail.php?id=".$P['id']."&categories=".$P['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
													<?= $P['product_name'] ?>
												</a>

												<span class="block2-oldprice m-text7 p-r-5">
													<?= number_format($P['price']) ?>
												</span>

												<span class="block2-newprice m-text8 p-r-5">
													<?= number_format($P['sell_price']) ?>
												</span>
											</div>
										</div>
									</div>

								<?php endif ?>

							<?php endforeach ?>
						
							


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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
