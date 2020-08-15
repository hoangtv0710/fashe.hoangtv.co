<?php 
	require_once 'database/db_fashe.php';

	$bannerQuery = "select * from banners where page = 'contact'";
	$stmt = $conn->prepare($bannerQuery);
	$stmt->execute();
	$contact = $stmt->fetch();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liên hệ</title>
	<meta charset="UTF-8">
	<?php include 'share/top_asset.php'; ?>	
	<style>
		.error {
			color: red;
		}
	</style>
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'share/header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= $contact['image'] ?>);">
		<h2 class="l-text2 t-center">
			<?= $contact['description'] ?>
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-5 p-b-30">
					<h4 class="m-text26 p-b-36 p-t-15">
							Thông tin của chúng tôi
						</h4>
					<i class="fa fa-home"><span class="m-text12 text-capitalize"><?= $ws['address'] ?></span></i><br>
														<p class="s-text5 text-capitalize"><?= $ws['open_time'] ?></p>	
					<i class="fa fa-phone m-t-30">&ensp;<span class="m-text12"><?= $ws['hotline'] ?></i></span><br>
														<p class="s-text5 text-capitalize"><?= $ws['open_time'] ?></p>			
					<i class="fa fa-envelope m-t-30">&ensp;<span class="m-text12"><?= $ws['email'] ?></span></i>
														<p class="s-text5">Gửi cho chúng tôi bất kì câu hỏi gì vào bất kì lúc nào</p>		
				</div>	

				<div class="col-md-7 p-b-30">
					<form class="form_contact" method="POST" action="<?= SITELINKADMIN ?>/lien-he/save-add.php" name="form">
						<h4 class="m-text26 p-b-36 p-t-15">
							Gửi cho chúng tôi ý kiến của bạn
						</h4>

						<div class="bo4 size15 m-b-30">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Họ tên">
						</div>

						<div class="bo4 size15 m-b-30">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" placeholder="Số điện thoại">
						</div>
					
						<div class="bo4 size15 m-b-30">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Địa chỉ email">
						</div>
						
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13" name="message" placeholder="Lời nhắn"></textarea>
						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 m-t-20">
								Gửi
							</button>
						</div>
					</form>
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

	<script>
		$(".form_contact").validate({
			rules: {
				"name": {
					required: true
				},
				"phone_number": {
					required: true,
					number: true,
					minlength: 10,
					maxlength: 10
				},
				"email": {
					required: true,
					email: true
				},
				"message": {
					required: true
				},
			},
			messages: {
				"name": {
					required: "Tên không được bỏ trống"
				},
				"phone_number": {
					required: "Sô điện thoại không được bỏ trống",
					number: "Sô điện thoại không hợp lệ",
					minlength: "Số điện thoại phải gồm 10 chữ số",
					maxlength: "Số điện thoại tối đa 10 chữ số",
				},
				"email": {
					required: "Email không được bỏ trống",
					email: "Email không hợp lệ"
				},
				"message": {
					required: "Lời nhắn không được bỏ trống"
				}
			}
		});
	</script>

	<script type="text/javascript">

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
		      "timeOut": "5000",
		      "extendedTimeOut": "1000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Gửi thành công! cảm ơn bạn, chúng tôi sẽ sớm liên lạc lại với bạn!')
		    <?php
		  } ?>

	</script>


</body>
</html>
