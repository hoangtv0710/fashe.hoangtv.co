<?php 
	require_once '../../database/db_fashe.php';

	if($_SERVER['REQUEST_METHOD'] != "POST"){
		header('location: '. SITELINKADMIN . '/san-pham');
		die;
	}

	$id = $_POST['id'];
	$product_name= trim($_POST['product_name']);
	$cate_id= $_POST['cate_id'];
	$price= $_POST['price'];
	$sell_price= $_POST['sell_price'];
	$status= $_POST['status'];
	$detail= $_POST['detail'];
	$file = $_FILES['image'];

	$findProduct = "select * from products where id = '$id'";
	$kq = $conn->prepare($findProduct);
	$kq->execute();
	$product = $kq->fetch();

	if ($product_name == "") {
		header('location: '. SITELINKADMIN . '/san-pham/edit.php?id='.$id.'&errName=Không để trống tên sản phẩm');
		die;
	}

	if(!checkXss($product_name)){
		header('location: '. SITELINKADMIN . '/san-pham/edit.php?id='.$id.'&errName=Tên sản phẩm không hợp lệ');
		die;
	}

	if(!checkXss($detail)){
		header('location: '. SITELINKADMIN . '/san-pham/edit.php?id='.$id.'&errDetail=Nội dung sản phẩm không hợp lệ!');
		die;
	}
	
	$sql = "select * from products where product_name = '$product_name' and id <> $id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$checkDuplicate = $stmt->fetch();
	if($checkDuplicate != false){
		header('location: '. SITELINKADMIN . '/san-pham/edit.php?id='.$id.'&errName=Tên sản phẩm đã tồn tại!');
		die;
	}

	$filename = false;
	if($file['size'] > 0){
		$path = $file['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$filename = 'images/products/'.uniqid() . '.' . $ext;
		
		move_uploaded_file($file['tmp_name'], "../../".$filename);

		unlink("../../".$product['image']);
	}

	$sql = "update products set 
				product_name = :product_name, 
				cate_id = :cate_id,
				price = :price,
				sell_price = :sell_price,
				status = :status,
				detail = :detail";
	if($filename != false){
		$sql .= ", image = :image";
	}

	$sql .= " where id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':product_name', $product_name);
	$stmt->bindParam(':cate_id', $cate_id);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':sell_price', $sell_price);
	$stmt->bindParam(':status', $status);
	$stmt->bindParam(':detail', $detail);

	if($filename != false){
		$stmt->bindParam(':image', $filename);
	}

	$stmt->bindParam(':id', $id);
	$stmt->execute();

	header('location: '. SITELINKADMIN . '/san-pham');
	die;
 ?>