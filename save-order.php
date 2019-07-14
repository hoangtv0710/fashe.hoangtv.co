<?php 
	session_start();
	require_once './database/db_fashe.php';
	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$siteurl . 'send_cart.php');
		die;
	}
	$discount_code = $_POST['discount_code'];

	$sql = "select * from discount_code where code = '$discount_code'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$codes = $stmt->fetch();
	if ($codes == true) {
		$dc = $codes['code'];
		$discount_percent = $codes['percent'];
	}

	

	$customer_name = trim($_POST['name']);
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$note = $_POST['message'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$created_date = date('d-m-Y H:i');

	

	$sql = "insert into invoices (customer_name, phone_number, address, note, email, created_date, discount_code, discount_percent ) values ('$customer_name', '$phone_number', '$address', '$note', '$email', '$created_date' ,'$dc', '$discount_percent')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	

	//chi tiet hoa don

	$invoice = "select * from invoices order by id desc";
	$stmt = $conn->prepare($invoice);
	$stmt->execute();
	$iv = $stmt->fetch();

	$invoice_id = $iv['id'];
	$total_product_price = 0;
	$cart = $_SESSION['CART'];
	foreach ($cart as $item) {
		$product_id = $item['id'];
		$quantity = $item['quantity'];
		if (!empty($item['sell_price'])) {
			$unit_price = $item['sell_price'];
			if (isset($discount_percent)) {
				$total_product_price = $item['sell_price']*$item['quantity']*((100 - $discount_percent)/100);
			} else {
				$total_product_price = $item['sell_price']*$item['quantity'];
			}
		} else {
			$unit_price = $item['price'];
			if (isset($discount_percent)) {
				$total_product_price = $item['price']*$item['quantity']*((100 - $discount_percent)/100);
			} else {
				$total_product_price = $item['price']*$item['quantity'];
			}
		}
		$sql = "insert into invoice_detail (product_id, invoice_id, quantity, unit_price, total_product_price) values ('$product_id', '$invoice_id', '$quantity', '$unit_price', '$total_product_price')";
		$stmt = $conn->prepare($sql);
		$stmt->execute();	
	}

	$sql = "delete from discount_code where code = '$dc'";
	$kq = $conn->prepare($sql);
	$kq->execute();

	unset($_SESSION['CART']);
	header('location: send_cart.php?success=true');
	die;

 ?>