<?php
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $sql = "select * from menus";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $menu = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm dropdown-menu</title>
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
        Thêm dropdown-menu
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dropdown-menu</li>
        <li class="active">Thêm dropdown-menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form action="save-add.php" method="post">

          <div class="col-md-6">
            <div class="form-group">
              <label>Tiêu đề</label>
              <input type="text" name="title" class="form-control" <?php if (isset($_GET['title'])): ?>
                value="<?= $_GET['title'] ?>"
              <?php endif ?>>
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>

             <div class="form-group">
              <label>Thuộc menu</label>
              <select class="form-control" name="menu_id">
                <?php foreach ($menu as $item): ?>
                  <option value="<?= $item['id'] ?>">
                      <?= $item['name'] ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Đường dẫn</label>
              <input type="text" name="url" class="form-control" <?php if (isset($_GET['url'])): ?>
                value="<?= $_GET['url'] ?>"
              <?php endif ?>>
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
