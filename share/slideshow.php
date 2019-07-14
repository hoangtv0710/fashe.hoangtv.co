<?php 
	require_once 'database/db_fashe.php'; 
	$slideQuery = "select * from slideshows order by sort_order asc";
	$stmt = $conn->prepare($slideQuery);
	$stmt->execute();
	$slide = $stmt->fetchall();
?>

	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<?php foreach ($slide as $s): ?>
					
					<?php if($s['effect']==1): ?>

						  <div class="item-slick1 item1-slick1" style="background-image: url(<?= $s['image'] ?>);">
							<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
								<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
									<?= $s['title'] ?>
								</h2>

								<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
									<?= $s['caption'] ?>
								</span>

								<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
									<!-- Button -->
									<a href="<?= $s['link_url'] ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
										Shop Now
									</a>
								</div>
							</div>
						</div>

					<?php elseif ($s['effect']==2): ?>

						 <div class="item-slick1 item2-slick1" style="background-image: url(<?= $s['image'] ?>);">
							<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
								<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rollIn">
									<?= $s['title'] ?>
								</h2>

								<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
									<?= $s['caption'] ?>
								</span>

								<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
									<!-- Button -->
									<a href="<?= $s['link_url'] ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
										Shop Now
									</a>
								</div>
							</div>
						</div>

					<?php else: ?>

						 <div class="item-slick1 item3-slick1" style="background-image: url(<?= $s['image'] ?>);">
							<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
								<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rotateInDownLeft">
									<?= $s['title'] ?>
								</h2>

								<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="rotateInUpRight">
									<?= $s['caption'] ?>
								</span>

								<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
									<!-- Button -->
									<a href="<?= $s['link_url'] ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
										Shop Now
									</a>
								</div>
							</div>
						</div>

					<?php endif; ?>

				<?php endforeach ?>
			</div>
		</div>
	</section>