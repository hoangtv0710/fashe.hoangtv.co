<?php 
	require_once '../database/db_fashe.php';
	$id = $_GET['id'];
	$sql = "select * from products";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$product = $stmt->fetchall();


	$item = false;
	foreach ($product as $pro) {
		if ($id == $pro['id']) {
			$item = $pro;
			break;
		}
	}

	$cart = isset($_SESSION['CART']) == true ? $_SESSION['CART'] : [];
	
	if (count($cart) == 0) {
		$item['quantity'] = 1;
		array_push($cart, $item);
	} else {
		$flag = -1;
		// nếu tồn tại sp thì tăng lên
		for ($i=0; $i < count($cart); $i++) { 
			if ($item['id'] == $cart[$i]['id']) {
				$flag = $i;
				break;
			}
		}
		if ($flag == -1) {
			$item['quantity'] = 1;
			array_push($cart, $item);
		} else{
			$cart[$flag]['quantity']++;
		}
	}
	$_SESSION['CART'] = $cart;

 ?>
 <script>
 	history.back();
 </script>
