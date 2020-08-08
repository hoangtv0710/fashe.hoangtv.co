<footer class="bg6 p-b-43 p-l-45 p-r-45">
	<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h4 class="s-text12 p-b-13 p-t-40">
						thông tin về chúng tôi
					</h4>

					<div>
						<p class="s-text7 w-size27 text-justify">
							Bạn có bất kì câu hỏi gì. Hãy cho chúng tôi biết tại cửa hàng hàng <?= $ws['address'] ?> hoặc gọi cho chúng tôi theo số <?= $ws['hotline'] ?> 
						</p>

						<div class="flex-m p-t-30">
							<a href="<?= $ws['facebook'] ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
							<a href="<?= $ws['instagram'] ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
							<a href="#" class="fs-18 color1 p-r-20 fa fa-twitter"></a>
							<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
						</div>
					</div>
				</div>
				<div class="col-md-2" id="menu_footer">
					<h4 class="s-text12 p-b-10 p-t-40">
						liên kết
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="<?= SITELINK ?>" class="s-text7 text-uppercase">Trang chủ</a>
						</li>
						<li class="p-b-9">
							<a href="product.php" class="s-text7 text-uppercase">Sản phẩm</a>
						</li>
						<li class="p-b-9">
							<a href="about.php" class="s-text7 text-uppercase">Giới thiệu</a>
						</li>
						<li class="p-b-9">
							<a href="contact.php" class="s-text7 text-uppercase">Liên hệ</a>
						</li>
						<li class="p-b-9">
							<a href="blog.php" class="s-text7 text-uppercase">Blog</a>
						</li>
					</ul>
				</div>
				<div class="col-md-6 p-t-40">
					<?= $ws['map'] ?>
				</div>
			<div class="col-md-12">
				<div class="t-center s-text8 p-t-40">
					Copyright © 2020 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?= SITELINK ?>" target="_blank">Fashe</a>
				</div>
			</div>
		</div>
	</div>
</footer>

