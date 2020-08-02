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
	<?php include 'share/linkAsset.php'; ?>	
	<link rel="stylesheet" href="admin/adminlte/plugins/Toastr/toastr.min.css">
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
					<form class="leave-comment" method="POST" action="<?= SITELINKADMIN ?>/lien-he/save-add.php" name="form" onsubmit="return validate()">
						<h4 class="m-text26 p-b-36 p-t-15">
							Gửi cho chúng tôi ý kiến của bạn
						</h4>

						<div class="bo4 size15 m-b-30">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Họ tên">
							<span class="text-danger" id="errname"></span>
						</div>

						<div class="bo4 size15 m-b-30">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" placeholder="Số điện thoại">
							<span class="text-danger" id="errphone-number"></span>
						</div>
					
						<div class="bo4 size15 m-b-30">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Địa chỉ email">
							<span class="text-danger" id="erremail"></span>
						</div>
						
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13" name="message" placeholder="Lời nhắn"></textarea>
						<span class="text-danger" id="errmessage"></span>
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


	<script>
		function validate() {
				var f = document.form;
				var checkPhone_number = /^(0)[0-9]{9,10}$/;
				var checkEmail = /^\w+@\w+\.\w+$/;
				var checkEmail2 = /^\w+@\w+\.\w+\.\w+$/;
				if (f.name.value == "") {
					document.getElementById("errname").innerHTML = 'Vui lòng nhập tên!';
					f.name.focus();
					return false;
				} else {
					document.getElementById("errname").style.display = 'none';
				}
				if (f.phone_number.value == "") {
					document.getElementById("errphone-number").innerHTML = 'Vui lòng nhập số điện thoại!';
					f.phone_number.focus();
					return false;
				} else if (!checkPhone_number.test(f.phone_number.value)) {
					document.getElementById("errphone-number").innerHTML = 'Số điện thoại không hợp lệ!';
					f.phone_number.focus();
					return false;
				} else {
					document.getElementById("errphone-number").style.display = 'none';
				}
				if (f.email.value == "") {
					document.getElementById("erremail").innerHTML = 'Vui lòng nhập email!';
					f.email.focus();
					return false;
				} else if (!checkEmail.test(f.email.value) && !checkEmail2.test(f.email.value)) {
					document.getElementById("erremail").innerHTML = 'Email không hợp lệ!';
					f.email.focus();
					return false;
				} else {
					document.getElementById("erremail").style.display = 'none';
				}
	
				if (f.message.value == "") {
					document.getElementById("errmessage").innerHTML = 'Vui lòng nhập nội dung!';
					f.message.focus();
					return false;
				} else {
					document.getElementById("errmessage").style.display = 'none';
				}

				return true;
			}
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="admin/adminlte/plugins/Toastr/toastr.min.js""></script>
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
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
