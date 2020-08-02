<?php
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $id = $_GET['id'];
  if ($id == null) {
    header('location:'. SITELINKADMIN .'/lien-he');
    die;
  }

  $sql = "SELECT * FROM contacts WHERE id = '$id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $contact = $stmt->fetch();

  if (!$contact) {
    header('location:'. SITELINKADMIN .'/lien-he');
    die;  
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gửi phản hồi</title>
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
        Gửi phản hồi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Liên hệ</li>
        <li class="active">Gửi phản hồi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
            <form action="save-send.php" method="post" id="formContact">
              <input type="hidden" name="id" value="<?=$contact['id']?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" value="<?=$contact['email']?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                  <label>Title</label>&nbsp;
                  <input type="text" name="title" <?php if (isset($_GET['title'])): ?>
                    value="<?=$_GET['title']?>"
                  <?php endif ?>  class="form-control">
                 <?php if (isset($_GET['errAll'])): ?>
                    <span style="color: red;"><?=$_GET['errAll']?></span>
                  <?php endif ?>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nội dung</label>
                  <textarea name="content" rows="7" class="form-control"></textarea>
                </div>
                <?php if (isset($_GET['errAll'])): ?>
                    <span style="color: red;"><?=$_GET['errAll']?></span>
                  <?php endif ?>
                <!-- /.form-group -->
                <div class="text-right">
                  <a href="./" class="btn btn-danger btn-xs">Huỷ</a>
                  <button class="btn btn-xs btn-primary" type="submit">Gửi</button>
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
<script type="text/javascript">
  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá liên hệ này hay không?');
    if(conf){
      window.location.href = url;
    }
  });
   $(document).ready(function(){
      $('[name="content"]').wysihtml5();
      $( "form" ).submit(function() {
        $('input[name="email"]').prop('disabled', false);
      });
    });
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
    toastr.success('Gửi thành công!')
    <?php
  } ?>
</script>
</body>
</html>
