<?php 
	session_start();
	require_once 'database/db_fashe.php';
	$totalCart = 0;
	if (isset($_SESSION['CART']) && count($_SESSION['CART']) > 0) {
		$cart = $_SESSION['CART'];
		foreach ($cart as $total) {
			$totalCart += $total['quantity'];
		}
	}
	$total_price = 0;
	$web_settingsQuery = "select * from web_settings";
	$stmt = $conn->prepare($web_settingsQuery);
	$stmt->execute();
	$ws = $stmt->fetch();

	$sub_cate = "select * from product_categories";
	$stmt = $conn->prepare($sub_cate);
	$stmt->execute();
	$subcate = $stmt->fetchall();

	$sub_cate_post = "select * from post_categories";
	$stmt = $conn->prepare($sub_cate_post);
	$stmt->execute();
	$subcatepost = $stmt->fetchall();

 ?>
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="<?= $ws['facebook'] ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?= $ws['instagram'] ?>" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-twitter"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					<?= $ws['slogan'] ?>
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<a href="#"><?= $ws['hotline'] ?></a>
					</span>

				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?= SITELINK ?>" class="logo">
					<img src="<?= $ws['logo'] ?>" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
							<ul class="main_menu">
								<li class="text-uppercase">
									<a href="<?= SITELINK ?>">Trang chủ</a>
								</li>
								<li class="text-uppercase">
									<a href="product.php">Sản phẩm</a>
									<ul class="sub_menu">
										<?php foreach ($subcate as $sc): ?>
											<li><a href="product.php?id=<?= $sc['id'] ?>"><?= $sc['name'] ?></a></li>
										<?php endforeach ?>
									</ul>
								</li>
								<li class="text-uppercase">
									<a href="about.php">giới thiệu</a>
								</li>
								<li class="text-uppercase">
									<a href="contact.php">liên hệ</a>
								</li>
								<li class="text-uppercase">
									<a href="blog.php">Blog</a>
									<ul class="sub_menu">
										<?php foreach ($subcatepost as $scp): ?>
											<li><a href="blog.php?id=<?= $scp['id'] ?>"><?= $scp['name'] ?></a></li>
										<?php endforeach ?>
									</ul>
								</li>
									
								<li>
									|
								</li>
								<li>
									<form action="search_product.php" method="GET" name="search">
										<input type="text" name="keyword" placeholder="Tìm kiếm" required="">
										<button type="submit"><i class="fa fa-search"></i></button>
									</form>
								</li>
							</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<?php if (isset($_SESSION['login'])): ?>
						<div class="header-wrapicon2">

								<img src="<?= $_SESSION['login']['avatar']  ?>" class="header-icon1 js-show-header-dropdown"> <?= $_SESSION['login']['fullname'] ?>

							<!-- Header cart noti -->
							<div class="header-cart header-dropdown">
								<div class="header-cart-buttons">
									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="account.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Thông tin
										</a>
									</div>

									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="authenticator/logout-client.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Đăng xuất
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<a href="authenticator/login-client.php" class="header-wrapicon1 dis-block">
							<i class="fa fa-sign-in fa-lg" title="Đăng nhập / Đăng kí"></i>
						</a>
					<?php endif ?>
						
						

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON" title="Giỏ hàng">
						<span class="header-icons-noti"><?= $totalCart ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php if (!empty($cart)): ?>
									<?php foreach ($cart as $cart_product): ?>
										<?php if (empty($cart_product['sell_price'])): ?>
											<li class="header-cart-item">
												<div class="header-cart-item-img">
													<img src="<?= $cart_product['image'] ?>" alt="IMG">
												</div>

												<div class="header-cart-item-txt">
													<a href="#" class="header-cart-item-name text-uppercase">
														<?= $cart_product['product_name'] ?>
													</a>

													<span class="header-cart-item-info">
														<?= $cart_product['quantity'] ?> x <?= number_format($cart_product['price']) ?>
													</span>
												</div>
											</li>
											<?php 
												$total_price += $cart_product['price']*$cart_product['quantity'];
											 ?>
										<?php else: ?>
											<li class="header-cart-item">
												<div class="header-cart-item-img">
													<img src="<?= $cart_product['image'] ?>" alt="IMG">
												</div>

												<div class="header-cart-item-txt">
													<a href="#" class="header-cart-item-name text-uppercase">
														<?= $cart_product['product_name'] ?>
													</a>

													<span class="header-cart-item-info">
														<?= $cart_product['quantity'] ?> x <?= number_format($cart_product['sell_price']) ?>
													</span>
												</div>
											</li>
											<?php 
												$total_price += $cart_product['sell_price']*$cart_product['quantity'];
											 ?>
										<?php endif ?>
										
									<?php endforeach ?>
								<?php else: ?>
									<?= "Không có sản phẩm trong giỏ hàng"; ?>
								<?php endif ?>
									
								

							</ul>
							
							<?php if ($total_price > 0): ?>

								<div class="header-cart-total">
									Tổng: <?= number_format($total_price) ?>
								</div>

								

								<div class="header-cart-buttons">
									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Xem giỏ hàng
										</a>
									</div>

									<div class="header-cart-wrapbtn">
										<a href="send_cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Mua hàng
										</a>										
									</div>
								</div>

							<?php endif ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?= SITELINK ?>" class="logo-mobile">
				<img src="<?= $ws['logo'] ?>" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<?php if (isset($_SESSION['login'])): ?>
						<div class="header-wrapicon2">

								<img src="<?= $_SESSION['login']['avatar']  ?>" class="header-icon1 js-show-header-dropdown"> <?= $_SESSION['login']['fullname'] ?>

							<!-- Header cart noti -->
							<div class="header-cart header-dropdown">
								<div class="header-cart-buttons">
									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="account.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Thông tin
										</a>
									</div>

									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="authenticator/logout-client.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Đăng xuất
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<a href="authenticator/login-client.php" class="header-wrapicon1 dis-block">
							<i class="fa fa-sign-in fa-lg" title="Đăng nhập / Đăng kí"></i>
						</a>
					<?php endif ?>


					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?= $totalCart ?></span>


						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php if (!empty($cart)): ?>
									<?php foreach ($cart as $cart_product): ?>
										<?php if (empty($cart_product['sell_price'])): ?>
											<li class="header-cart-item">
												<div class="header-cart-item-img">
													<img src="<?= $cart_product['image'] ?>" alt="IMG">
												</div>

												<div class="header-cart-item-txt">
													<a href="#" class="header-cart-item-name text-uppercase">
														<?= $cart_product['product_name'] ?>
													</a>

													<span class="header-cart-item-info">
														<?= $cart_product['quantity'] ?> x <?= number_format($cart_product['price']) ?>
													</span>
												</div>
											</li>
											<?php 
												$total_price += $cart_product['price']*$cart_product['quantity'];
											 ?>
										<?php else: ?>
											<li class="header-cart-item">
												<div class="header-cart-item-img">
													<img src="<?= $cart_product['image'] ?>" alt="IMG">
												</div>

												<div class="header-cart-item-txt">
													<a href="#" class="header-cart-item-name text-uppercase">
														<?= $cart_product['product_name'] ?>
													</a>

													<span class="header-cart-item-info">
														<?= $cart_product['quantity'] ?> x <?= number_format($cart_product['sell_price']) ?>
													</span>
												</div>
											</li>
											<?php 
												$total_price += $cart_product['sell_price']*$cart_product['quantity'];
											 ?>
										<?php endif ?>
										
									<?php endforeach ?>
								<?php else: ?>
									<?= "Không có sản phẩm trong giỏ hàng"; ?>
								<?php endif ?>
									
								

							</ul>
							
							<?php if ($total_price > 0): ?>

								<div class="header-cart-total">
									Tổng: <?= number_format($total_price) ?>
								</div>

								

								<div class="header-cart-buttons">
									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Xem giỏ hàng
										</a>
									</div>

									<div class="header-cart-wrapbtn">
										<a href="send_cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Mua hàng
										</a>										
									</div>
								</div>

							<?php endif ?>
							
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							<?= $ws['slogan'] ?>
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								<?= $ws['email'] ?>
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-twitter"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="<?= SITELINK ?>">TRANG CHỦ</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">SẢN PHẨM</a>
						<ul class="sub-menu">
							<?php foreach ($subcate as $sc): ?>
								<li><a href="product.php?id=<?= $sc['id'] ?>"><?= $sc['name'] ?></a></li>
							<?php endforeach ?>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="about.php">GIỚI THIỆU</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">LIÊN HỆ</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.php">BLOG</a>
						<ul class="sub-menu">
							<?php foreach ($subcatepost as $scp): ?>
								<li><a href="blog.php?id=<?= $scp['id'] ?>"><?= $scp['name'] ?></a></li>
							<?php endforeach ?>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
				</ul>
			</nav>
		</div>
	</header>
