<?php 
  
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $slideshowQuery = "select * from slideshows";
  $stmt = $conn->prepare($slideshowQuery);
  $stmt->execute();
  $slideshows = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Slideshows</title>
  <link rel="stylesheet" href="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.css"></style> 
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
        Slideshows
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slideshows</li>
        <li class="active">Danh sách slide</li>
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
                  <th>#</th>
                  <th style="width: 200px">Ảnh</th>
                  <th>Tiêu đề</th>
                  <th>Mô tả</th>
                  <th>Số thứ tự</th>
                  <th>Hiệu ứng</th>
                  <th>Đường dẫn</th>
                  <th>Người tạo</th>
                  <th style="width: 120px">
                    <a 
                      href="<?= $adminUrl ?>slide-show/add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>

                <?php foreach ($slideshows as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>

                    <td><img src="<?= $siteurl . $item['image']?>" class="img-responsive"></td>

                    <td><?= $item['title']?></td>

                    <td><?= $item['caption']?></td>

                    <td><?= $item['sort_order']?></td>

                    <td><?= $item['effect']?></td>

                    <td><?= $item['link_url']?></td>

                    <td><?= $item['created_by']?></td>

                    <td>
                       <a 
                        href="<?= $adminUrl ?>slide-show/edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>
                      <a 
                        href="javascript:;" 
                        linkurl="<?= $adminUrl ?>slide-show/remove.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-danger btn-remove">
                        <i class="fa fa-trash"></i>  Xoá
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



<script type="text/javascript" src="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.js""></script>
<script type="text/javascript">
  
  <?php if (isset($_GET['success']) && $_GET['success'] == true) {
    ?>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "2000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success('Thêm slide thành công!')
    <?php
  } ?>

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá slide này hay không?');

    if(conf){
      window.location.href = url;
    }
  });
</script>
</body>
</html>
