<?php  

	require_once 'database/db_fashe.php';

	$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
	$pageSize = 4;
	$offset = ($pageNumber-1)*$pageSize;

	$postsQuery = "select * from posts order by id desc limit $offset, $pageSize";
	$stmt = $conn->prepare($postsQuery);
	$stmt->execute();
	$post = $stmt->fetchall();

	$productQuery = "select * from posts order by views desc limit 5";
	$stmt = $conn->prepare($productQuery);
	$stmt->execute();
	$mostpost = $stmt->fetchall();

	$bannerQuery = "select * from banners where page = 'blog'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$blog = $stmt->fetch();

	if (!empty($_GET['id'])) {
		$cate_id = $_GET['id'];
	} else {
		$cate_id = null;
	}

	$catePost = "select * from posts where cate_id = '$cate_id' order by id desc";
	$stmt = $conn->prepare($catePost);
	$stmt->execute();
	$cP = $stmt->fetchall();

	$categoriesBlog = "select * from post_categories";
	$stmt = $conn->prepare($categoriesBlog);
	$stmt->execute();
	$cB = $stmt->fetchall();

	$sql = "select count(*) as total from posts";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$totalposts = $stmt->fetch();

	$totalPage = ceil($totalposts['total']/$pageSize);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
	<meta charset="UTF-8">
	<?php include 'share/top_asset.php'; ?>
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
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
						<?php if ($cate_id != null): ?>
							<?php foreach ($cP as $p): ?>
								
								<div class="item-blog p-b-80">
									<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
										<img src="<?= $p['image'] ?>" alt="IMG-BLOG">

										<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
											<i class="fa fa-calendar mr-1" aria-hidden="true"></i> 
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
												<i class="fa fa-user" aria-hidden="true"></i>
												<?= $p['author_name'] ?>
												<span class="m-l-3 m-r-6">|</span>
											</span>

											<span>
												<i class="fa fa-eye" aria-hidden="true"></i>
												<?= $p['views'] ?>
											</span>

											
										</div>

										<p class="p-b-12 text-justify">
											<?= $p['short_desc'] ?>
										</p>

										<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="s-text20">
											Đọc tiếp
											<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
										</a>
									</div>
								</div>

							<?php endforeach ?>
						<?php else: ?>
							<?php foreach ($post as $p): ?>
								
								<div class="item-blog p-b-80">
									<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
										<img src="<?= $p['image'] ?>" alt="IMG-BLOG">

										<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
											<i class="fa fa-calendar mr-1" aria-hidden="true"></i> 
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
												<i class="fa fa-user" aria-hidden="true"></i>
												<?= $p['author_name'] ?>
												<span class="m-l-3 m-r-6">|</span>
											</span>

											<span>
												<i class="fa fa-eye" aria-hidden="true"></i>
												<?= $p['views'] ?>										
											</span>

											
										</div>

										<p class="p-b-12 text-justify">
											<?= $p['short_desc'] ?>
										</p>

										<a href="<?= "blog-detail.php?id=".$p['id']."&categories=".$p['cate_id'] ?>" class="s-text20">
											Đọc tiếp
											<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
										</a>
									</div>
								</div>

							<?php endforeach ?>
						<?php endif ?>
							

					</div>

					<!-- Pagination -->
					<?php if ($cate_id == null): ?>
						<div class="flex-c p-t-30">
						 	<ul id="pagination"></ul>
						</div>
					<?php endif ?>
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
						<h4 class="m-text14 p-b-20 p-t-56">
							Danh mục
						</h4>
						<li class="p-t-4">
							<a href="blog.php" class="s-text3">
								<p class="text-uppercase">Tất cả</p><hr>										
							</a>
						</li>
						<ul class="p-b-54" id="blog_category">
							<?php foreach ($cB as $c): ?>
								<li class="p-t-4">
									<a href="<?= "blog.php?id=".$c['id'] ?>" class="s-text13">
										<p class="text-uppercase"><?= $c['name'] ?></p><hr>
									</a>
								</li>
							<?php endforeach ?>
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-15 p-b-34">
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
	
	<?php include 'share/bottom_asset.php'; ?>


	<script type="text/javascript">
		//page
			$('#pagination').twbsPagination({
		      totalPages: <?= $totalPage?>,
		      visiblePages: 3,
		      initiateStartPageClick: false,
		      startPage: <?= $pageNumber?>,
		      onPageClick: function (event, page) {
		        var url = '<?= SITELINK ?>blog.php';
		        url += "?page=" + page;
		        window.location.href = url;
		      }
		  });
	</script>

</body>
</html>
