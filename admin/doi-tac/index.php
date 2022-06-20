<?php 
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  include_once $path.'share/check_login.php';

  $sql = "select * from brands";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $brand = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css"></style> 
  <title>Đối tác</title>
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
       Đối tác
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Đối tác</li>
        <li class="active">Danh sách đối tác</li>
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
                  <th>Tên đối tác</th>
                  <th style="width: 150px">Ảnh</th>
                  <th>Url</th>
                  <th style="width: 120px">
                    <a 
                      href="<?= SITELINKADMIN ?>/doi-tac/add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>

                <?php foreach ($brand as $item): ?>
                  
                  <tr>
                    
                    <td><?= $item['id'] ?></td>

                    <td><?= $item['name']?></td>

                     <td><img src="<?= SITELINK . $item['image']?>" class="img-responsive"></td>

                    <td><a href="<?= $item['url']?>"><?= $item['url']?></a></td>

                    <td>
                      <a 
                        href="<?= SITELINKADMIN ?>/doi-tac/edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>

                      <a 
                        href="javascript:;" 
                        linkurl="<?= SITELINKADMIN ?>/doi-tac/remove.php?id=<?= $item['id']?>" 
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
  
  <?php include_once $path.'share/footer.php'; ?>
</div>
<!-- ./wrapper -->



<script type="text/javascript" src="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.js""></script>
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
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success('Thêm đối tác thành công!')
    <?php
  } ?>

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá đối tác này hay không?');

    if(conf){
      window.location.href = url;
    }
  });
</script>

</body>
</html>
