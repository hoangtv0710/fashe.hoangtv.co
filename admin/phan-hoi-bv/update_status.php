<?php
  require_once '../../database/db_fashe.php';

  if($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location: '. SITELINKADMIN . '/phan-hoi-bv');
    die;
  }
  
  $id = $_POST['id'];
  $status = $_POST['status'];

  $sql = "update post_comments set status = '$status' where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();


	header('location: '. SITELINKADMIN . '/phan-hoi-bv');
	die;
?>