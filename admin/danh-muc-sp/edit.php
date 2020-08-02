<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $cateId = $_GET['id'];
  $sql = "select * from product_categories where id = '$cateId'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $cate = $stmt->fetch();

  if(!$cate){
    header('location: ' . SITELINKADMIN . '/danh-muc-sp');
    die;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa danh mục sản phẩm</title>
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
        Sửa danh mục sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh mục sản phẩm</li>
        <li class="active">Sửa danh mục</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="save-edit.php" method="post">

          <input type="hidden" name="id" value="<?= $cate['id']?>">

          <div class="col-md-6">
            <div class="form-group">
              <label>Tên danh mục</label>
              <input type="text" name="name" placeholder="vd: Socola, Bánh dẻo,..." class="form-control" value="<?= $cate['name']?>" >
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="description" class="form-control" rows="5"><?= $cate['description']?></textarea>
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
