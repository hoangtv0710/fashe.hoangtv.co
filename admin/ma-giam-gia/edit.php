<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $cateId = $_GET['id'];
  $sql = "select * from discount_code where id = '$cateId'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $cate = $stmt->fetch();

  if(!$cate){
    header('location: ' . $adminUrl . 'ma-giam-gia');
    die;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa mã giảm giá</title>
  <?php include_once $path.'share/linkAsset.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'share/header.php'; ?>
  
  <?php include_once $path.'share/sidebar.php'; ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa mã giảm giá
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mã giảm giá</li>
        <li class="active">Sửa </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="<?= $adminUrl?>ma-giam-gia/save-edit.php" method="post" >

          <input type="hidden" name="id" value="<?= $cate['id']?>">

          <div class="col-md-6">
            <div class="form-group">
              <label>Mã giảm</label>
              <input type="text" name="code"  class="form-control" value="<?= $cate['code']?>" >
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>% giảm</label>
               <input type="text" name="percent" class="form-control" value="<?= $cate['percent']?>" >
               <?php if (isset($_GET['errName1'])): ?>
                <span class="text-danger"><?= $_GET['errName1'] ?></span>
              <?php endif ?>
            </div>

            <div class="text-right">
              <a href="<?= $adminUrl?>ma-giam-gia" class="btn btn-danger btn-xs">Huỷ</a>
              <button class="btn btn-xs btn-primary" type="submit">Lưu</button>
            </div>
          </div>

        </form>
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
