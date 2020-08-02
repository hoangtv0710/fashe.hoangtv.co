<?php 
  
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $websettingsQuery = "select * from web_settings";
  $stmt = $conn->prepare($websettingsQuery);
  $stmt->execute();
  $web_settings = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cấu hình hệ thống</title>
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
        Thông tin chung
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cấu hình hệ thống</li>
        <li class="active">Thông tin chung</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th width="100">Ảnh</th>
                  <th>Phương châm</th>
                  <th>Hotline</th>
                  <th>Email</th>
                  <th>Facebook</th>
                  <th>Instagram</th>
                  <th>Map</th>
                  <th>Địa chỉ</th>
                  <th>Chính sách giao hàng</th>
                  <th>Chính sách đổi trả</th>
                  <th>Thời gian mở/đóng cửa</th>
                </tr>

                <?php foreach ($web_settings as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>

                    <td><img src="<?= SITELINK . $item['logo'] ?>" class="img-responsive"></td>

                    <td><?= $item['slogan']?></td>

                    <td><?= $item['hotline']?></td>

                    <td><?= $item['email']?></td>

                    <td><?= $item['facebook']?></td>

                    <td><?= $item['instagram']?></td>

                    <td><?= $item['map']?></td>

                    <td><?= $item['address']?></td>

                    <td><?= $item['ship_policy']?></td>

                    <td><?= $item['return_policy']?></td>

                    <td><?= $item['open_time']?></td>

                    <td>
                      <a 
                        href="edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>
                    </td>

                  </tr>
                <?php endforeach ?>
              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>  
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'share/footer.php' ?>
</div>
<!-- ./wrapper -->




</body>
</html>
