<?php 
	session_start();
	if ($_POST['btn_update_cart']) {
		foreach ($_POST['quantity'] as $key => $value) {
			$_SESSION['CART'][$key]['quantity'] = $value;
		}
	}
?>
<script>
	history.back()
</script>