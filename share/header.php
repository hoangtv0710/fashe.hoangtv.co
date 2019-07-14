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

	$menusQuery = "select * from menus";
	$stmt = $conn->prepare($menusQuery);
	$stmt->execute();
	$menu = $stmt->fetchall();

	$menusQuery = "select * from menu_galleries";
	$stmt = $conn->prepare($menusQuery);
	$stmt->execute();
	$menu_galleries = $stmt->fetchall();

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
				<a href="<?= $siteurl ?>" class="logo">
					<img src="<?= $ws['logo'] ?>" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
							<ul class="main_menu">
								<?php foreach ($menu as $m): ?>

									<li class="text-uppercase">
										<a href="<?= $m['link_url'] ?>"><?= $m['name'] ?></a>
										<ul class="sub_menu">
											<?php foreach ($menu_galleries as $mg): ?>
												<?php if ($mg['menu_id']==$m['id']): ?>
													<li><a href="<?= $mg['url'] ?>"><?= $mg['title'] ?></a></li>
												<?php endif ?>
											<?php endforeach ?>
										</ul>
									</li>
								
								<?php endforeach ?>

								<li>
									|
								</li>
								<li>
									<form action="<?= $siteurl ?>search_product.php" method="GET" name="search">
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
										<a href="<?= $siteurl . 'account.php' ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Thông tin
										</a>
									</div>

									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<a href="<?= $siteurlz . 'logout-client.php' ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
											Đăng xuất
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<a href="<?= $siteurlz . 'login-client.php' ?>" class="header-wrapicon1 dis-block">
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
			<a href="<?= $siteurl ?>" class="logo-mobile">
				<img src="<?= $ws['logo'] ?>" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem giỏ hàng
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
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
							Miễn phí giao hàng cho đơn hàng trên 400.000 VND
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
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
						<a href="<?= $siteurl ?>">TRANG CHỦ</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">SẢN PHẨM</a>
						<ul class="sub-menu">
							<li><a href="index.php">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="about.php">GIỚI THIỆU</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">LIÊN HỆ</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
