<?php 
	require_once 'database/db_fashe.php';

	$bannerQuery = "select * from banners where page = 'about'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$about = $stmt->fetch();

	$mostProductsQuery = "select * from products order by views desc limit 3";
	$stmt = $conn->prepare($mostProductsQuery);
	$stmt->execute();
	$mostProduct = $stmt->fetchall();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Giới thiệu</title>
	<meta charset="UTF-8">
	<?php include 'share/top_asset.php'; ?>
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'share/header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= $about['image'] ?>);">
		<h2 class="l-text2 t-center">
			<?= $about['description'] ?>
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">

				<div class="col-md-9 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Câu chuyện của chúng tôi
					</h3>

					<p class="p-b-28 text-justify">
						Thế giới thời trang gần 20 năm qua đã quen thuộc câu nói: “Thời trang là cách biểu hiện tối đa cá tính mỗi người”.  Ở Việt Nam thấy phần lớn mọi người thường chú trọng nhiều tới cái gọi là “mốt”, cứ vài ba tháng là một mốt mới được lăng xê, đám đông chị em phụ nữ chạy theo mải miết để rồi vài ba tháng sau lại xếp nó vào trong tủ để chạy theo kiểu mốt khác. Nhưng sự thật “mốt” là một vòng quay lặp lại từ người này sang người khác, có chăng là một chút biến tấu và cách điệu, hay nói đúng hơn người ta mua sắm theo một tâm lý “hội chứng đám đông”. Vậy những đối tượng có sự tinh tế, gu thẩm mỹ và yêu cầu khắt khe sẽ dừng lại ở đâu? Đến với thời trang Fashe để sở hữu cho mình những bộ đồ tinh tế, có gu thâm mỹ với sức lôi cuốn đến kỳ lạ<br><br>

						Ra đời năm 2018, Fashe với mục tiêu trở thành một trong những shop mua sắm thời trang online uy tín hàng đầu Việt Nam. Tại đây quý khách có thể mua sắm trực tuyến các sản phẩm thời trang với giá bán buôn và bán sỉ : quần áo, thời trang hàng hiệu, thời trang nam, thời trang nam nữ thời trang hàn quốc, Fashe sẽ đáp ứng mọi nhu cầu mua sắm thời trang online của quý khách bất cứ lúc nào<br><br>

						Xác định “Khách hàng là Thượng đế” nên luôn làm “vui lòng khách đến vừa lòng khách đi, Fashe luôn tư vấn và cố vấn thời trang cho khách có như cầu về kiểu dáng, loại vải, màu sắc để phù hợp nhất với phong cách của từng người. Không chạy đua theo xu hướng, theo “mốt”, Fashe sẽ mang đến cho bạn trải nghiệm về những món đồ thời trang, tinh tế, có gu thẩm mỹ cao và hợp với phong cách của bạn<br><br>

						Quý khách có thể sử dụng đường dây nóng miễn phí hoặc trao đổi với những chuyên viên ở bộ phận Chăm sóc khách hàng để xin tư vấn về những vấn đề cá nhân có liên quan từ thời trang, phong cách, hướng dẫn mua hàng. Fashe luôn sẵng sàng hỗ trợ khách hàng một cách tốt nhất, chu đáo nhất và chuyên nghiệp nhất bằng nhiều loại dịch vụ chăm sóc khách hàng khác nhau. Bạn có thể thoải mái mua sắm thời trang cao cấp hay thời trang hàng hiệu. Chúng tôi cam kết giá rẻ nhất thị trường thời trang online với chính sách Giảm Giá những deal hot liên tục. Mọi đơn hàng sẽ được giao hàng tận nơi tại Hà Nội và tất cả các tỉnh thành trên toàn quốc.
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10 text-justify">
						<p class="p-b-11">
							Đừng chạy theo xu hướng. Đừng khiến bản thân lệ thuộc vào thời trang. Hãy để chính mình là người quyết định bản thân sẽ mặc gì cũng như sẽ sống ra sao.
						</p>

						<span class="s-text7">
							- Versace
						</span>
					</div>
				</div>

				<div class="col-md-3 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Sản phẩm nổi bật
					</h3>

					<?php foreach ($mostProduct as $p): ?>
						<div class="block2 m-t-20">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?= $p['image'] ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a href="<?= "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Xem chi tiết</a>
										<a href="<?= "cart_action/save-cart.php?id=".$p['id'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-b-10">Thêm vào giỏ</a>
									</div>
								</div>
							</div>

							<div class="block2-txt text-center text-uppercase">
								<a href="<?= "product-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="block2-name dis-block s-text3 p-b-5">
									<?= $p['product_name'] ?>
								</a>
							</div>
						</div>
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

	<?php include 'share/bottom_asset.php'; ?>
					
</body>
</html>
