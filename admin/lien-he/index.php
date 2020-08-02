<?php 
  
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $contactsQuery = "select * from contacts";
  $stmt = $conn->prepare($contactsQuery);
  $stmt->execute();
  $contacts = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css"></style> 
  <title>Liên hệ</title>
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
        Liên hệ
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Liên hệ</li>
        <li class="active">Danh sách liên hệ</li>
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
                  <th>Tên</th>
                  <th>Email</th>
                  <th>SĐT</th>
                  <th>Ghi chú</th>
                </tr>

                <?php foreach ($contacts as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>

                    <td><?= $item['name']?></td>

                    <td><?= $item['email']?></td>

                    <td><?= $item['phone_number']?></td>

                    <td><?= $item['message']?></td>

                    <td>
                      <a href=send.php?id=<?= $item['id']?> class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>  Gủi phản hồi</a>
                      <a 
                        href="javascript:;" 
                        linkurl="remove.php?id=<?= $item['id']?>" 
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
    toastr.success('Gủi thành công!')
    <?php
  } ?>

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá tài khoản này hay không?');

    if(conf){
      window.location.href = url;
    }
  });
</script>
</body>
</html>
