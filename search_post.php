<?php  

	require_once 'database/db_fashe.php';

	$search_post = addslashes($_GET['keyword']);

	$sql = "select * from posts where title like '%$search_post%'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$searchpost = $stmt->fetchAll();

	$sql = "select count(*) as total from posts where title like '%$search_post%'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$totalPost = $stmt->fetch();

	$productQuery = "select * from posts order by views desc limit 3";
	$stmt = $conn->prepare($productQuery);
	$stmt->execute();
	$mostpost = $stmt->fetchall();

	$bannerQuery = "select * from banners where page = 'blog'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$blog = $stmt->fetch();

	$categoriesBlog = "select * from post_categories";
	$stmt = $conn->prepare($categoriesBlog);
	$stmt->execute();
	$cB = $stmt->fetchall();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
	<meta charset="UTF-8">
	<?php include 'share/linkAsset.php'; ?>
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'share/header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= $blog['image'] ?>);">
		<h2 class="l-text2 t-center">
			<?= $blog['description'] ?>
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
					<div class="col-md-12 mt-1">
						<h6>
							<p class="s-text2">Có <?= $totalPost['total']?> kết quả tìm kiếm phù hợp</p>
						</h6>
						<hr>
					</div>
					<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
							<?php foreach ($searchpost as $p): ?>
								
								<div class="item-blog p-b-80">
									<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
										<img src="<?= $p['image'] ?>" alt="IMG-BLOG">

										<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
											<?= $p['created_date'] ?>
										</span>
									</a>

									<div class="item-blog-txt p-t-33">
										<h4 class="p-b-11">
											<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="m-text24">
												<?= $p['title'] ?>
											</a>
										</h4>

										<div class="s-text8 flex-w flex-m p-b-21">
											<span>
												By <?= $p['author_name'] ?>
												<span class="m-l-3 m-r-6">|</span>
											</span>

											<span>
												Cooking, Food
												<span class="m-l-3 m-r-6">|</span>
											</span>

											<span>
												8 Comments
											</span>
										</div>

										<p class="p-b-12">
											<?= $p['short_desc'] ?>
										</p>

										<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="s-text20">
											Đọc tiếp
											<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
										</a>
									</div>
								</div>

							<?php endforeach ?>			
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<form action="search_post.php" method="GET">
								<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="keyword" placeholder="Search" required="">

								<button type="submit" class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
									<i class="fs-13 fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Danh mục
						</h4>

						<ul>
							<li class="p-t-6 p-b-8 bo6 text-uppercase">
								<a href="blog.php" class="s-text13 p-t-5 p-b-5">
									Tất cả
								</a>
							</li>
							<?php foreach ($cB as $c): ?>
								<li class="p-t-6 p-b-8 bo6 text-uppercase">
									<a href="<?= "blog.php?id=".$c['id'] ?>" class="s-text13 p-t-5 p-b-5">
										<?= $c['name'] ?>
									</a>
								</li>
							<?php endforeach ?>

						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Đọc nhiều nhất
						</h4>

						<ul class="bgwhite">

							<?php foreach ($mostpost as $mp): ?>
								<li class="p-b-20">
									<a href="<?= "blog-detail.php?id=".$mp['id']."&categories=".$mp['cate_id'] ?>" class="dis-block wrap-pic-w trans-0-4 hov4">
										<img src="<?= $mp['image'] ?>" alt="IMG-PRODUCT">
									</a>

									<div class="p-t-5">
										<a href="<?= "blog-detail.php?id=".$mp['id']."&categories=".$mp['cate_id'] ?>" class="s-text100">
											<?= $mp['title'] ?>
										</a>
									</div>
								</li>

							<?php endforeach ?>
							
						</ul>

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
