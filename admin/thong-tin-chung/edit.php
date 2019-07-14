<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $id = $_GET['id'];

  $sql = "select * from web_settings where id = '$id'";
  $kq = $conn->prepare($sql);
  $kq->execute();
  $web_setting = $kq->fetch();

  if (!$web_setting) {
    header('location:' . $adminUrl . 'thong-tin-chung');
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa cấu hình</title>
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
       Sửa cấu hình
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thông tin chung</li>
        <li class="active">Sửa cấu hình</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="<?= $adminUrl?>thong-tin-chung/save-edit.php" method="post">
            <input type="hidden" name="id"  value="<?= $web_setting['id'] ?>">
            <div class="col-md-6">
            
              <div class="form-group">
                <label>Phương châm</label>
                <input type="text" name="slogan" class="form-control" value="<?= $web_setting['slogan'] ?>">
              </div>

              <div class="form-group">
                <label>Hotline</label>
                <input type="text" name="hotline" class="form-control" value="<?= $web_setting['hotline'] ?>">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $web_setting['email'] ?>">
              </div>
              
               <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" value="<?= $web_setting['facebook'] ?>">
              </div>
              
               <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control" value="<?= $web_setting['instagram'] ?>">
              </div>

              <div class="form-group">
                <label>Map</label>
                <textarea name="map" rows="7"  class="form-control"><?= $web_setting['map'] ?></textarea>
              </div>

           </div>

          <div class="col-md-6">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <?php if ($web_setting['logo'] == null || $web_setting['logo'] == ""): ?>
                     <img id="proImg" src="<?= $siteurl?>images/default/default.jpg" class="img-responsive">
                  <?php else: ?>
                    <img id="proImg" src="<?= $siteurl . $web_setting['logo'] ?>" class="img-responsive">
                  <?php endif ?>                
                </div>
              </div>

              <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
              </div>
              
              <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="<?= $web_setting['address'] ?>">
              </div>
              
              <div class="form-group">
                <label>Chính sách giao hàng</label>
                <input type="text" name="ship_policy" class="form-control" value="<?= $web_setting['ship_policy'] ?>">
              </div>

               <div class="form-group">
                <label>Chính sách đổi trả</label>
                <input type="text" name="return_policy" class="form-control" value="<?= $web_setting['return_policy'] ?>">
              </div>

              <div class="form-group">
                <label>Thời gian đóng / mở cửa</label>
                <input type="text" name="open_time" class="form-control" value="<?= $web_setting['open_time'] ?>">
              </div>

          </div>

          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>thong-tin-chung" class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
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

    var inputImage = document.querySelector('[name="logo"]');
    inputImage.onchange = function(){

      var file = this.files[0];
      if(file == undefined){
        document.querySelector('#proImg').src = '<?= $siteurl?>images/default/default.jpg';
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
