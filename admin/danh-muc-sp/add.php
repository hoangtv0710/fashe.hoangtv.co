<?php
  $path = "../";
  require_once $path.'../database/db_fashe.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm danh mục sản phẩm</title>
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
        Thêm danh mục sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh mục sản phẩm</li>
        <li class="active">Thêm danh mục</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form action="save-add.php" method="post">

          <div class="col-md-6">
            <div class="form-group">
              <label>Tên danh mục</label>
              <input type="text" name="name" class="form-control" <?php if (isset($_GET['name'])): ?>
                value="<?= $_GET['name'] ?>"
              <?php endif ?>>
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="description" class="form-control" rows="5" <?php if (isset($_GET['description'])): ?>
                value="<?= $_GET['description'] ?>"
              <?php endif ?>></textarea>
            </div>
            
            <div class="text-right">
              <a href="./" class="btn btn-danger btn-xs">Huỷ</a>
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
