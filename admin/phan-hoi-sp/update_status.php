<?php
  require_once '../../database/db_fashe.php';

  if($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location: '. SITELINKADMIN . '/phan-hoi-sp');
    die;
  }
  
  $id = $_POST['id'];
  $status = $_POST['status'];

  $sql = "update product_comments set status = '$status' where id = '$id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();


  header('location: '. SITELINKADMIN . '/phan-hoi-sp');
  die;
?>