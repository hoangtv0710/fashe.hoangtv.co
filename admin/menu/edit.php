<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $menu_id = $_GET['id'];
  $sql = "select * from menus where id = '$menu_id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $menu = $stmt->fetch();

  if(!$menu){
    header('location: ' . $adminUrl . 'menu');
    die;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa menu</title>
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
        Sửa menu
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Menu</li>
        <li class="active">Sửa menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="<?= $adminUrl?>menu/save-edit.php" method="post">

          <input type="hidden" name="id" value="<?= $menu['id']?>">

          <div class="col-md-6">
            <div class="form-group">
              <label>Tên menu</label>
              <input type="text" name="name" class="form-control" value="<?= $menu['name']?>" >
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="link_url" class="form-control" rows="5"><?= $menu['link_url']?></textarea>
            </div>

            <div class="text-right">
              <a href="<?= $adminUrl?>menu" class="btn btn-danger btn-xs">Huỷ</a>
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
