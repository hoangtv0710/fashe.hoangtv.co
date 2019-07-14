<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '.$adminUrl . 'san-pham');
		die;
	}

	$product_name = trim($_POST['product_name']);
	$cate_id = $_POST['cate_id'];
	$price = $_POST['price'];
	$sell_price = $_POST['sell_price'];
	$file = $_FILES['image'];
	$status = $_POST['status'];
	$detail = $_POST['detail'];

	$sql = "select * from products where product_name = '$product_name'";
	$kq = $conn->prepare($sql);
	$kq->execute();
	$checkProductName = $kq->fetch();
	if ($checkProductName != false) {
		header('location:' . $adminUrl . 'san-pham/add.php?errName=Tên sản phẩm đã tồn tại!&product_name='.$product_name.'&price='.$price.'&sell_price='.$sell_price.'&detail='.$detail);
		die;
	}

	if ($product_name == "" || $price == "" || $sell_price == "" || $status == "" || file_exists($file)) {
		header('location:' . $adminUrl . 'san-pham/add.php?err=Không để trống mục này!&product_name='.$product_name.'&price='.$price.'&sell_price='.$sell_price.'&detail='.$detail);
		die;
	}

	if (is_numeric($price) == false) {
		header('location:' . $adminUrl . 'san-pham/add.php?errNumber=Giá phải là số!&product_name='.$product_name.'&price='.$price.'&sell_price='.$sell_price.'&detail='.$detail);
		die;
	}

	if (is_numeric($sell_price) == false) {
		header('location:' . $adminUrl . 'san-pham/add.php?errNumber1=Giá khuyến mãi phải là số!&product_name='.$product_name.'&price='.$price.'&sell_price='.$sell_price.'&detail='.$detail);
		die;
	}

if ($file['size'] > 0) {
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$filename = 'images/products/'.uniqid() . '.' . $ext;
	move_uploaded_file($file['tmp_name'], "../../".$filename);
} else {
	$filename = 'images/default/default.jpg';
}



	$sql = "insert into products (product_name, cate_id, detail, price, sell_price, image, status) 
			values (:product_name, :cate_id, :detail, :price, :sell_price, :image, :status) ";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':product_name', $product_name);
	$stmt->bindParam(':cate_id', $cate_id);
	$stmt->bindParam(':detail', $detail);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':sell_price', $sell_price);
	$stmt->bindParam(':image', $filename);
	$stmt->bindParam(':status', $status);
	$stmt->execute();


	header('location: '.$adminUrl . 'san-pham?success=true');
	die;
?>