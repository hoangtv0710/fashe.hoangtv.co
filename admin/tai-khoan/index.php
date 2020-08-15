<?php 
  
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  include_once $path.'share/check_login.php';

  if($_SESSION['login']['role'] < 3){
    header('location: '. SITELINKADMIN );
    die;
  }
  
  $usersQuery = "select * from users order by role desc";
  $stmt = $conn->prepare($usersQuery);
  $stmt->execute();
  $users = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tải khoản</title>
  <?php include_once $path.'share/linkAsset.php'; ?>
  <link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css"></style>  
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
        Tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tài khoản</li>
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
                  <th>Email</th>
                  <th>Tên</th>
                  <th style="width: 100px">Ảnh</th>
                  <th>Quyền</th>
                  <th>Địa chỉ</th>
                  <th>Giới tính</th>
                  <th>SĐT</th>
                  <th style="width: 120px">
                    <a 
                      href="add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>

                <?php foreach ($users as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>

                    <td><?= $item['email']?></td>

                    <td><?= $item['fullname']?></td>

                    <td><img src="<?= SITELINK . $item['avatar']?> " class="img-responsive"></td>

                    <td>
                      <?php if ($item['role'] == 3 ) :?>
                        Admin
                      <?php elseif ($item['role'] == 2 ) :?>
                        Moderator
                      <?php else :?>
                        Member
                      <?php endif ?>
                    </td>

                    <td><?= $item['address']?></td>

                    <td><?= $item['gender']?></td>

                    <td><?= $item['phone_number']?></td>

                    <td>
                        <a 
                          href="edit.php?id=<?= $item['id']?>" 
                          class="btn btn-xs btn-primary">
                          <i class="fa fa-pencil"></i>  Sửa
                        </a>
                      <?php if ($item['role'] != 3 ): ?>
                        <a 
                          href="javascript:;" 
                          linkurl="remove.php?id=<?= $item['id']?>" 
                          class="btn btn-xs btn-danger btn-remove">
                          <i class="fa fa-trash"></i>  Xoá
                        </a>
                      <?php endif ?>
                     
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


<script type="text/javascript" src="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.js"></script>


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
    toastr.success('Thêm tài khoản thành công!')
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
