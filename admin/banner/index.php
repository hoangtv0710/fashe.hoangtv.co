<?php 
  
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  include_once $path.'share/check_login.php';

  $bannerQuery = "select * from banners";
  $stmt = $conn->prepare($bannerQuery);
  $stmt->execute();
  $banner = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Banner</title>
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
          Banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Banner</li>
        <li class="active">Danh sách</li>
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
                  <th>Mô tả</th>
                  <th>Thư tự</th>
                  <th>Trang hiển thị</th>
                  <th>Danh mục</th>

                </tr>

                <?php foreach ($banner as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>

                    <td><img src="<?= SITELINK . $item['image'] ?>" class="img-responsive"></td>

                    <td><?= $item['description']?></td>

                    <td><?= $item['sort_order']?></td>

                    <td><?= $item['page']?></td>

                    <td><?= $item['cate_id']?></td>


                    <td>
                      <a 
                        href="<?= SITELINKADMIN ?>/banner/edit.php?id=<?= $item['id']?>" 
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
