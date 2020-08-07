<!-- script -->
<!--===============================================================================================-->
<script type="text/javascript" src="<?= SITELINK ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?= SITELINK ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?= SITELINK ?>js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/sweetalert/sweetalert.min.js"></script>
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
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?= SITELINK ?>vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?= SITELINK ?>js/main.js"></script>

	<script src="<?= SITELINKADMIN ?>/adminlte/plugins/twbs-pagination/jquery.twbsPagination.min.js"></script>

	<script type="text/javascript" src="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.js""></script>