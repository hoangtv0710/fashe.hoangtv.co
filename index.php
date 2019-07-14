<?php 

	require_once 'database/db_fashe.php';
	$brandsQuery = "select * from brands";
	$stmt = $conn->prepare($brandsQuery);
	$stmt->execute();
	$brand = $stmt->fetchall();

	$bannersQuery = "select * from banners where page ='home' order by sort_order asc";
	$stmt = $conn->prepare($bannersQuery);
	$stmt->execute();
	$banner = $stmt->fetchall();

	$saleProductsQuery = "select * from products";
	$stmt = $conn->prepare($saleProductsQuery);
	$stmt->execute();
	$saleProduct = $stmt->fetchall();

	$newProductsQuery = "select * from products order by id desc limit 6";
	$stmt = $conn->prepare($newProductsQuery);
	$stmt->execute();
	$newProduct = $stmt->fetchall();

	$mostProductsQuery = "select * from products order by views desc limit 6";
	$stmt = $conn->prepare($mostProductsQuery);
	$stmt->execute();
	$mostProduct = $stmt->fetchall();

	$mostPostsQuery = "select * from posts order by views desc limit 3";
	$stmt = $conn->prepare($mostPostsQuery);
	$stmt->execute();
	$mostPosts = $stmt->fetchall();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fashe</title>
	<meta charset="UTF-8">
	<?php include 'share/linkAsset.php'; ?>
</head>
<body class="animsition">
	
	<!-- header -->
	<?php include 'share/header.php'; ?>
	 <div class="flex-c-m size22 bg0 s-text21 pos-relative">
		Đăng kí để nhận mã giảm giá 10% cho lần mua hàng đầu tiên tại shop
		<a href="<?= $siteurlz . 'registration.php' ?>" class="s-text22 hov6 p-l-5">
			Đăng kí ngay
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>
	<!-- slideshow -->
	<?php include 'share/slideshow.php'; ?>

	<!-- Banner -->
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
					<?php foreach ($banner as $b): ?>
						<?php if ($b['sort_order']==2): ?>

							<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
								<div class="block1 hov-img-zoom pos-relative m-b-30">
									<img src="<?= $b['image'] ?>" alt="IMG-BENNER" height="450">

									<div class="block1-wrapbtn w-size2">
										<!-- Button -->
										<a href="<?= $siteurl . "product.php?id=".$b['cate_id'] ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
											<?= $b['description'] ?>
										</a>
									</div>
								</div>
							</div>

						<?php else: ?>

							<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
								<div class="block1 hov-img-zoom pos-relative m-b-30">
									<img src="<?= $b['image'] ?>" alt="IMG-BENNER" height="350">

									<div class="block1-wrapbtn w-size2">
										<!-- Button -->
										<a href="<?= $siteurl . "product.php?id=".$b['cate_id'] ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
											<?= $b['description'] ?>
										</a>
									</div>
								</div>
							</div>

						<?php endif ?>
					<?php endforeach ?>
			</div>
		</div>
	</div>


	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Sản phẩm của chúng tôi
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#sale" role="tab">Đang giảm giá</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#new" role="tab">Mới</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#most" role="tab">Xem nhiều</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">

					<!-- sale -->
					<div class="tab-pane fade show active" id="sale" role="tabpanel">
						<div class="row">
							<?php foreach ($saleProduct as $p): ?>
								<?php if ($p['status'] == 'Còn hàng'): ?>
									<?php if (!empty($p['sell_price'])): ?>
										<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
											<div class="block2">
												<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
													<img src="<?= $p['image'] ?>" alt="IMG-PRODUCT" height="280">

													<div class="block2-overlay trans-0-4">
														<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
															<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
															<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
														</a>

														<div class="block2-btn-addcart w-size1 trans-0-4">
															<!-- Button -->
																<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>

															<a href="<?= $siteurl . "save-cart.php?id=".$p['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
														</div>
													</div>
												</div>

												<div class="block2-txt p-t-20 text-center text-uppercase">
													<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
														<?= $p['product_name'] ?>
													</a>

													<span class="block2-oldprice m-text7 p-r-5">
														<?= number_format($p['price']) ?>
													</span>

													<span class="block2-newprice m-text8 p-r-5">
														<?= number_format($p['sell_price']) ?>
													</span>
												</div>
											</div>
										</div>
									<?php endif ?>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
						
					<!-- - -->
					

					<!-- new -->
			<div class="tab-pane fade" id="new" role="tabpanel">
				<div class="row">
					<?php foreach ($newProduct as $p): ?>
						<?php if (empty($p['sell_price'])): ?>
							<?php if ($p['status'] == 'Còn hàng'): ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
											<img src="<?= $p['image'] ?>" alt="IMG-PRODUCT">

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<!-- Button -->
													<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
													<a href="<?= $siteurl . "save-cart.php?id=".$p['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20 text-center text-uppercase">
											<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
												<?= $p['product_name'] ?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?= number_format($p['price']) ?>
											</span>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php else: ?>
							<?php if ($p['status'] == 'Còn hàng'): ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
											<img src="<?= $p['image'] ?>" alt="IMG-PRODUCT" height="280">

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<!-- Button -->
													<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
													<a href="<?= $siteurl . "save-cart.php?id=".$p['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20 text-center text-uppercase">
											<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
												<?= $p['product_name'] ?>
											</a>

											<span class="block2-oldprice m-text7 p-r-5">
												<?= number_format($p['price']) ?>
											</span>

											<span class="block2-newprice m-text8 p-r-5">
												<?= number_format($p['sell_price']) ?>
											</span>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endif ?>							
					<?php endforeach ?>
				</div>
			</div>

					<!-- most -->
			<div class="tab-pane fade" id="most" role="tabpanel">
				<div class="row">
					<?php foreach ($mostProduct as $p): ?>
						<?php if(!empty($p['sell_price'])): ?>
							<?php if ($p['status'] == 'Còn hàng'): ?>
									<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
												<img src="<?= $p['image'] ?>" alt="IMG-PRODUCT">

												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
														<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
														<a href="<?= $siteurl . "save-cart.php?id=".$p['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
													</div>
												</div>
											</div>

											<div class="block2-txt p-t-20 text-center text-uppercase">
												<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
													<?= $p['product_name'] ?>
												</a>

												<span class="block2-oldprice m-text7 p-r-5">
													<?= number_format($p['price']) ?>
												</span>

												<span class="block2-newprice m-text8 p-r-5">
													<?= number_format($p['sell_price']) ?>
												</span>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php else: ?>
							<?php if ($p['status'] == 'Còn hàng'): ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative">
											<img src="<?= $p['image'] ?>" alt="IMG-PRODUCT">

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<!-- Button -->
													<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
													<a href="<?= $siteurl . "save-cart.php?id=".$p['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20 text-center text-uppercase">
											<a href="<?= $siteurl . "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
												<?= $p['product_name'] ?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?= number_format($p['price']) ?>
											</span>
										</div>
									</div>
								</div>

							<?php endif ?>								
						<?php endif ?>
					<?php endforeach ?>

					</div>
				</div>

			</div>
		</div>
	</div>
</section>


	<!-- Banner video -->
	<section class="parallax0 parallax100" style="background-image: url(images/icons/image_video.jpg);">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					The Beauty
				</span>

				<h3 class="l-text1 fs-35-sm">
					Lookbook
				</h3>

				<span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					Play Video
				</span>
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					BLOG
				</h3>
			</div>

				<div class="row">

					<?php foreach ($mostPosts as $mp): ?>

						<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
							<!-- Block3 -->
							<div class="block3">
								<a href="<?= $siteurl . "blog-detail.php?id=".$mp['id']."&categories=".$mp['cate_id'] ?>" class="block3-img dis-block hov-img-zoom">
									<img src="<?= $mp['image'] ?>" alt="IMG-BLOG">
								</a>

								<div class="block3-txt p-t-14">
									<h4 class="p-b-7">
										<a href="<?= $siteurl . "blog-detail.php?id=".$mp['id']."&categories=".$mp['cate_id'] ?>" class="m-text11">
											<?= $mp['title'] ?>
										</a>
									</h4>

									<span class="s-text6">By</span> <span class="s-text7"><?= $mp['author_name'] ?></span>
									<span class="s-text6">on</span> <span class="s-text7"><?= $mp['created_date'] ?></span>

									<p class="s-text8 p-t-16 text-justify">
										<?= $mp['short_desc'] ?>
									</p>
								</div>
							</div>
						</div>

					<?php endforeach ?>
					
				</div>
		</div>
	</section>

	<!-- brands -->
	<?php include 'share/brands.php'; ?>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Giao hàng miễn phí
				</h4>

				<span class="s-text11 t-center">
					<?= $ws['ship_policy'] ?>
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					7 ngày đổi trả
				</h4>

				<span class="s-text11 t-center">
					<?= $ws['return_policy'] ?>
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Thời gian mở cửa
				</h4>

				<span class="s-text11 t-center">
				 		Mở cửa từ <?= $ws['open_time'] ?>
				</span>
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	

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
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
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
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
