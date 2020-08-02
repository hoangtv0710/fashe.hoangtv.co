<?php 

	require_once 'database/db_fashe.php';

	$id = $_GET['id'];

	$conn->query("update products set views = views + 1 where id = '$id'");

	$sql = "select * from products where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$product = $stmt->fetch();
	

	if (!$product) {
		header("location: " . SITELINK);
		die;
	}

	$cate_id = $_GET['categories'];
	$sql = "select * from products where cate_id = '$cate_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$splq = $stmt->fetchall();

	if (!$splq) {
		header("location: " . SITELINK);
		die;
	}

	$sql = "select * from product_categories where id = '$cate_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$categories = $stmt->fetch();

	$conmentSql = "select * from product_comments where product_id = $id order by id desc";
	$kq = $conn->prepare($conmentSql);
	$kq->execute();
	$comments = $kq->fetchall();

	$pgSql = "select * from product_galleries where product_id = '$id'";
	$kq = $conn->prepare($pgSql);
	$kq->execute();
	$pg = $kq->fetchall();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $product['product_name'] ?></title>
	<meta charset="UTF-8">
	<?php include 'share/linkAsset.php'; ?>
	<link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css">
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'share/header.php'; ?>

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?= SITELINK ?>" class="s-text16 text-uppercase">
			trang chủ
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.php" class="s-text16 text-uppercase">
			sản phẩm
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="<?= 'product.php?id='.$categories['id'] ?>" class="s-text16 text-uppercase">
			<?= $categories['name'] ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17 text-uppercase">
			<?= $product['product_name'] ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?= $product['image'] ?>">
							<div class="wrap-pic-w">
								<img src="<?= $product['image'] ?>" alt="IMG-PRODUCT" height="600px">
							</div>
						</div>
					<?php foreach ($pg as $p): ?>
						<div class="item-slick3" data-thumb="<?= SITELINK . $p['image'] ?>">
							<div class="wrap-pic-w">
								<img src="<?= SITELINK . $p['image'] ?>" alt="IMG-PRODUCT">
							</div>
						</div>
					<?php endforeach ?>
						
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<?php if (empty($product['sell_price'])): ?>
					<h4 class="product-detail-name m-text16 p-b-13 text-uppercase">
						<?= $product['product_name'] ?>
					</h4>

					<span class="m-text17">
						<?= number_format($product['price']) ?>
					</span>
				<?php else: ?>
					<h4 class="product-detail-name m-text16 p-b-13 text-uppercase">
						<?= $product['product_name'] ?>
					</h4>
					
					<span class="m-text17">
						<?= number_format($product['sell_price']) ?>
					</span>

					<span class="m-text17">
						<strike><?= number_format($product['price']) ?></strike>
					</span>

				<?php endif ?>
				<p class="s-text8 p-t-10">
					Trạng thái : <?= $product['status'] ?>
				</p>
				
				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<a href="<?= "save-cart.php?id=".$product['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Mã sản phẩm: <?= $product['id'] ?></span>
					<span class="s-text8">Danh mục: <a href="<?= 'product.php?id='.$categories['id'] ?>"><?= $categories['name'] ?></a></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Mô tả sản phẩm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?= $product['detail'] ?>
						</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="submitcmt.php" method="POST" name="formcmt" onsubmit="return cmt()">
					<input type="hidden" name="productId" value="<?= $id?>">
					<input type="hidden" name="productlq" value="<?= $cate_id ?>">
					<h4 class="m-text26 p-b-36 p-t-15">
						Bình luận về sản phẩm
					</h4>
					<input type="hidden" name="email" value="<?= $_SESSION['login']['email'] ?>">
					<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13" name="content" placeholder="Viết đánh giá"></textarea>
					<span class="text-danger" id="errcontent"></span>
					<div class="w-size25">
	                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 m-t-20 btn-cmt">
							Bình luận
						</button>
					</div>
					<div class="m-t-10"></div>
					<a href="<?= SITELINK ?>authenticarot/login-client.php" id="err" class="text-danger s-text2"></a>
				</form>
			</div>
			<div class="col-md-6 m-t-30">
				<div class="wrap-dropdown-content p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Bình luận

						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text">
															
							<?php foreach ($comments as $cmt): ?>
									<img src="<?= $cmt['avatar'] ?>" height="40px" width="40px" style="border-radius: 50%;">
									<span class="s-text9" style="color: #059; font-size: 17px;"><b><?= $cmt['email']?></b></span>
									<span style="color: black;"><?= $cmt['content']?></span><br>
									<span style="font-size: 12px; color: #ccc"><?= $cmt['created_date'] ?></span>
									<hr>
							<?php endforeach ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- sản phẩm liên quan -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm liên quan
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					
					<?php foreach ($splq as $item): ?>

						<?php if ($item != $product && $item['status'] == 'Còn hàng'): ?>

							<?php if (empty($item['sell_price'])): ?>
								
								<div class="item-slick2 p-l-15 p-r-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative">
											<img src="<?= $item['image'] ?>" alt="IMG-PRODUCT" height="300">

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<a href="<?= "product-detail.php?id=".$item['id']."&categories=".$item['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
													<a href="<?= "save-cart.php?id=".$item['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
												</div>
											</div>
										</div>
 
										<div class="block2-txt p-t-20 text-center text-uppercase">
											<a href="<?= "product-detail.php?id=".$item['id']."&categories=".$item['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
												<?= $item['product_name'] ?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												<?= number_format($item['price']) ?>
											</span>
										</div>
									</div>
								</div>

							<?php else: ?>

								<div class="item-slick2 p-l-15 p-r-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
											<img src="<?= $item['image'] ?>" alt="IMG-PRODUCT" height="300">

											<div class="block2-overlay trans-0-4">
												<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a>

												<div class="block2-btn-addcart w-size1 trans-0-4">
													<a href="<?= "product-detail.php?id=".$item['id']."&categories=".$item['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
													<a href="<?= "save-cart.php?id=".$item['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
												</div>
											</div>
										</div>

										<div class="block2-txt p-t-20 text-center text-uppercase">
											<a href="<?= "product-detail.php?id=".$item['id']."&categories=".$item['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
												<?= $item['product_name'] ?>
											</a>

											<span class="block2-oldprice m-text7 p-r-5">
												<?= number_format($item['price']) ?>
											</span>

											<span class="block2-newprice m-text8 p-r-5">
												<?= number_format($item['sell_price']) ?>
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
		<?php if (!isset($_SESSION['login'])): ?>
			function cmt () {
				document.getElementById('err').innerHTML = "Bạn cần đăng nhập để bình luận!";
				return false;
			}
		<?php else: ?>
			function cmt() {
				var f = document.formcmt;	
				if (f.content.value == "") {
					document.getElementById("errcontent").innerHTML = 'Vui lòng nhập nội dung!';
					f.content.focus();
					return false;
				} else {
					document.getElementById("errcontent").style.display = 'none';
				}

				return true;
			}
		<?php endif ?>
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.js""></script>
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
		      "timeOut": "4000",
		      "extendedTimeOut": "1000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Đăng bình luận thành công!')
		    <?php
		  } ?>
	</script>
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

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
