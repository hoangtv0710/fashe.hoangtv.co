<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $id = $_GET['id'];

  $sql = "select * from users where id = $id";
  $kq = $conn->prepare($sql);
  $kq->execute();
  $users = $kq->fetch();

  if (!$users) {
    header('location:' . SITELINKADMIN . '/tai-khoan');
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa tài khoản</title>
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
        Sửa tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tài khoản</li>
        <li class="active">Sửa tài khoản</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="save-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $users['id'] ?>">
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $users['email'] ?>">
                <?php if (isset($_GET['errEmail'])): ?>
                  <span class="text-danger"><?= $_GET['errEmail'] ?></span>
                <?php endif ?>
              </div>

              <div class="form-group">
                <label>Tên</label>
                <input type="text" name="fullname" class="form-control" value="<?= $users['fullname'] ?>">
              </div>
              
              <?php if ($_SESSION['login']['role'] == 3): ?>
                <div class="form-group">
                  <label>Quyền</label>
                  <select name="role" class="form-control">
                    <?php foreach (USER_ROLES as $key => $value): ?>                    
                      <option <?php if ($users['role'] == $value): ?>
                        selected
                      <?php endif ?> value="<?= $value?>"><?= $key ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              <?php endif ?>
                
            </div>
            
            <div class="col-md-6">
              
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <?php if ($users['avatar'] == null || $users['avatar'] == ""): ?>
                     <img id="proImg" src="<?= SITELINK ?>images/default/avatar.jpg" class="img-responsive">
                  <?php else: ?>
                     <img id="proImg" src="<?= SITELINK . $users['avatar'] ?>" class="img-responsive">
                  <?php endif ?> 
                </div>
              </div>

              <div class="form-group">
                <label>Avatar</label>
                <input type="file" name="avatar" class="form-control">
              </div>

              <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="<?= $users['address'] ?>">
              </div>

              <div class="form-group">
                <label>Giới tính</label><br>
                <input type="radio" name="gender" <?php if ($users['gender'] == "Nam"): ?>
                  checked
                <?php endif ?> value="Nam"> Nam &emsp;
                <input type="radio" name="gender" <?php if ($users['gender'] == "Nữ"): ?>
                  checked
                <?php endif ?> value="Nữ"> Nữ 
              </div>

              <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone_number" class="form-control" value="<?= $users['phone_number'] ?>">
              </div>

              <div class="text-right">
                <a href=./" class="btn btn-danger btn-xs">Huỷ</a>
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

<script type="text/javascript">
  $(document).ready(function(){

    var inputImage = document.querySelector('[name="avatar"]');
    inputImage.onchange = function(){

      var file = this.files[0];
      if(file == undefined){
        document.querySelector('#proImg').src = '<?= SITELINK ?>images/default/avatar.jpg';
      }else{
        getBase64(file, '#proImg');
      }
    }
  });

  function getBase64(file, selector) {
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function () {
      $(selector).attr('src', reader.result);
     };
     reader.onerror = function (error) {
       console.log('Error: ', error);
     };
  }
</script>

</body>
</html>
