<?php 
    $path = "./";
    require_once  $path.'../database/db_fashe.php';
    session_start();
    if(isset($_SESSION['login']) == false || $_SESSION['login'] == null){
      header("location: ". $siteurl . "login.php");
      die;
    }
     if($_SESSION['login']['role'] != 2 &&  $_SESSION['login']['role'] != 3){
      header("location: ". $siteurl . "login.php");
      die;
    }
    
    $countCategoriesProQuery = "select count(*) as total from product_categories";
    $kq = $conn->prepare($countCategoriesProQuery);
    $kq->execute();
    $countCategoriesPro = $kq->fetch();

    $countProductsQuery = "select count(*) as total from products";
    $kq = $conn->prepare($countProductsQuery);
    $kq->execute();
    $countProducts = $kq->fetch();

    $countcmtProQuery = "select count(*) as total from product_comments";
    $kq = $conn->prepare($countcmtProQuery);
    $kq->execute();
    $countcmtPro = $kq->fetch();

    $discountQuery = "select count(*) as total from discount_code";
    $kq = $conn->prepare($discountQuery);
    $kq->execute();
    $discount = $kq->fetch();

    $countCategoriesPostQuery = "select count(*) as total from post_categories";
    $kq = $conn->prepare($countCategoriesPostQuery);
    $kq->execute();
    $countCategoriesPost = $kq->fetch();

    $countPostQuery = "select count(*) as total from posts";
    $kq = $conn->prepare($countPostQuery);
    $kq->execute();
    $countPost = $kq->fetch();

    $countcmtPQuery = "select count(*) as total from post_comments";
    $kq = $conn->prepare($countcmtPQuery);
    $kq->execute();
    $countcmtP = $kq->fetch();

    $contactQuery = "select count(*) as total from contacts";
    $kq = $conn->prepare($contactQuery);
    $kq->execute();
    $contacts = $kq->fetch();

    $countInvoiceQuery = "select count(*) as total from invoices";
    $kq = $conn->prepare($countInvoiceQuery);
    $kq->execute();
    $invoices = $kq->fetch();

    $countSlideShowQuery = "select count(*) as total from slideshows";
    $kq = $conn->prepare($countSlideShowQuery);
    $kq->execute();
    $countSlideShow = $kq->fetch();

    $brandsQuery = "select count(*) as total from brands";
    $kq = $conn->prepare($brandsQuery);
    $kq->execute();
    $brands = $kq->fetch();

    $menusQuery = "select count(*) as total from menus";
    $kq = $conn->prepare($menusQuery);
    $kq->execute();
    $menus = $kq->fetch();

    $menu_galleriesQuery = "select count(*) as total from menu_galleries";
    $kq = $conn->prepare($menu_galleriesQuery);
    $kq->execute();
    $menu_galleries = $kq->fetch();

    $countUsersQuery = "select count(*) as total from users";
    $kq = $conn->prepare($countUsersQuery);
    $kq->execute();
    $countUsers = $kq->fetch();

    $countWebsettingsQuery = "select count(*) as total from web_settings";
    $kq = $conn->prepare($countWebsettingsQuery);
    $kq->execute();
    $countWebsetting = $kq->fetch();

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
        <li><a href="<?= $adminUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tổng quan</li>
        <li class="active">Thống kê</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?= $countCategoriesPro['total'] ?>
              </h3>

              <p>Danh mục sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a 
              href="<?= $adminUrl?>danh-muc-sp" 
              class="small-box-footer">Quản lý danh mục <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $countProducts['total']?></h3>

              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a 
              href="<?= $adminUrl?>san-pham" 
              class="small-box-footer">Quản lý sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $countcmtPro['total']?></h3>

              <p>Bình luận sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a 
              href="<?= $adminUrl?>phan-hoi-sp" 
              class="small-box-footer">Quản lý bình luận <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $discount['total']?></h3>

              <p>Mã giảm giá</p>
            </div>
            <div class="icon">
              <i class="fa fa-level-down"></i>
            </div>
            <a 
              href="<?= $adminUrl?>ma-giam-gia" 
              class="small-box-footer">Quản lý mã giảm giá <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $countCategoriesPost['total'] ?></h3>

              <p>Danh mục bài viết</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= $adminUrl ?>danh-muc-bv" class="small-box-footer">Quản lý danh mục <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-multicoloured">
            <div class="inner">
              <h3><?= $countPost['total'] ?></h3>

              <p>Bài viết</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?= $adminUrl ?>bai-viet" class="small-box-footer">Quản lý bài viết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $countcmtP['total'] ?></h3>

              <p>Bình luận bài viết</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="<?= $adminUrl ?>phan-hoi-bv" class="small-box-footer">Quản lý bình luận <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $contacts['total'] ?></h3>

              <p>Liên hệ</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="<?= $adminUrl ?>lien-he" class="small-box-footer">Quản lý liên hệ <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3><?= $invoices['total'] ?></h3>

              <p>Hóa đơn</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?= $adminUrl ?>hoa-don" class="small-box-footer">Quản lý hóa đơn  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-light-blue">
            <div class="inner">
              <h3><?= $countSlideShow['total'] ?></h3>

              <p>Slideshows</p>
            </div>
            <div class="icon">
              <i class="fa fa-sliders"></i>
            </div>
            <a href="<?= $adminUrl ?>slide-show" class="small-box-footer">Quản lý slide  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-light">
            <div class="inner">
              <h3><?= $brands['total'] ?></h3>

              <p>Đối tác</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="<?= $adminUrl ?>doi-tac" class="small-box-footer">Quản lý tối tác  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $menus['total'] ?></h3>

              <p>Menu</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="<?= $adminUrl ?>menu" class="small-box-footer">Quản lý menu  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $menu_galleries['total'] ?></h3>

              <p>Dropdown-menu</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="<?= $adminUrl ?>dropdown-menu" class="small-box-footer">Quản lý menu  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

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
            <a href="<?= $adminUrl ?>tai-khoan" class="small-box-footer">Quản lý tài khoản  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3><?= $countWebsetting['total'] ?></h3>

              <p>Cấu hình hệ thống</p>
            </div>
            <div class="icon">
              <i class="fa fa-gears"></i>
            </div>
            <a href="<?= $adminUrl ?>thong-tin-chung" class="small-box-footer">Quản lý hệ thống  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

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
