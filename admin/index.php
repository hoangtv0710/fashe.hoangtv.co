<?php 
    $path = "./";
    require_once  $path.'../database/db_fashe.php';
    session_start();
    if(isset($_SESSION['login']) == false || $_SESSION['login'] == null){
      header("location: ./login.php");
      die;
    }
     if($_SESSION['login']['role'] != 2 &&  $_SESSION['login']['role'] != 3){
      header("location: ./login.php");
      die;
    }
    
    $countInvoiceQuery = "select count(*) as total from invoices where status = 0";
    $kq = $conn->prepare($countInvoiceQuery);
    $kq->execute();
    $invoices = $kq->fetch();

    $countcmtProQuery = "select count(*) as total from product_comments where status = 0";
    $kq = $conn->prepare($countcmtProQuery);
    $kq->execute();
    $countcmtPro = $kq->fetch();

    $countcmtPQuery = "select count(*) as total from post_comments where status = 0";
    $kq = $conn->prepare($countcmtPQuery);
    $kq->execute();
    $countcmtP = $kq->fetch();

    $contactQuery = "select count(*) as total from contacts where status = 0";
    $kq = $conn->prepare($contactQuery);
    $kq->execute();
    $contacts = $kq->fetch();

    $countProductsQuery = "select count(*) as total from products";
    $kq = $conn->prepare($countProductsQuery);
    $kq->execute();
    $countProducts = $kq->fetch();

    $discountQuery = "select count(*) as total from discount_code";
    $kq = $conn->prepare($discountQuery);
    $kq->execute();
    $discount = $kq->fetch();

    $countUsersQuery = "select count(*) as total from users";
    $kq = $conn->prepare($countUsersQuery);
    $kq->execute();
    $countUsers = $kq->fetch();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <?php 
      include_once $path.'share/linkAsset.php';
   ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once $path.'share/header.php';?>

  <!-- Left side column. contains the logo and sidebar -->

  <?php include_once $path.'share/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tổng quan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tổng quan</li>
        <li class="active">Thống kê</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $invoices['total'] ?></h3>

              <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?= SITELINKADMIN ?>/hoa-don" class="small-box-footer">Quản lý hóa đơn  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $countcmtPro['total']?></h3>

              <p>Bình luận sản phẩm mới</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a 
              href="<?= SITELINKADMIN ?>/phan-hoi-sp" 
              class="small-box-footer">Quản lý bình luận <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-light-blue">
            <div class="inner">
              <h3><?= $countcmtP['total'] ?></h3>

              <p>Bình luận bài viết mới</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="<?= SITELINKADMIN ?>/phan-hoi-bv" class="small-box-footer">Quản lý bình luận <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $contacts['total'] ?></h3>

              <p>Liên hệ mới</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="<?= SITELINKADMIN ?>/lien-he" class="small-box-footer">Quản lý liên hệ <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $countProducts['total']?></h3>

              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a 
              href="<?= SITELINKADMIN ?>/san-pham" 
              class="small-box-footer">Quản lý sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $discount['total']?></h3>

              <p>Mã giảm giá</p>
            </div>
            <div class="icon">
              <i class="fa fa-level-down"></i>
            </div>
            <a 
              href="<?= SITELINKADMIN ?>/ma-giam-gia" 
              class="small-box-footer">Quản lý mã giảm giá <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      <?php if ($_SESSION['login']['role'] == 3): ?>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $countUsers['total'] ?></h3>

              <p>Tài khoản</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= SITELINKADMIN ?>/tai-khoan" class="small-box-footer">Quản lý tài khoản  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      <?php endif ?>


        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'share/footer.php'; ?>
</div>
<!-- ./wrapper -->

</body>
</html>
