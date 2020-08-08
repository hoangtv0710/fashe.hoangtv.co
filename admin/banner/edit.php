<?php 
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $id = $_GET['id'];

  $sql = "select * from banners where id = '$id'";
  $kq = $conn->prepare($sql);
  $kq->execute();
  $banner = $kq->fetch();

  if (!$banner) {
    header('location:' . SITELINKADMIN . '/banner');
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa banner</title>
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
       Sửa banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Banner</li>
        <li class="active">Sửa banner</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="save-edit.php" method="post">
            <input type="hidden" name="id"  value="<?= $banner['id'] ?>">
            <div class="col-md-6">
            
              <div class="form-group">
                <label>Mô tả</label>
                <input type="text" name="description" class="form-control" value="<?= $banner['description'] ?>">
              </div>

           </div>

          <div class="col-md-6">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <?php if ($banner['image'] == null || $banner['image'] == ""): ?>
                     <img id="proImg" src="<?= SITELINK ?>images/default/default.jpg" class="img-responsive">
                  <?php else: ?>
                    <img id="proImg" src="<?= SITELINK . $banner['image'] ?>" class="img-responsive">
                  <?php endif ?>                
                </div>
              </div>

              <div class="form-group">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control">
              </div>
              

          </div>

          <div class="col-md-12 text-right">
            <a href="./" class="btn btn-sm btn-danger">Huỷ</a>
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

    var inputImage = document.querySelector('[name="image"]');
    inputImage.onchange = function(){

      var file = this.files[0];
      if(file == undefined){
        document.querySelector('#proImg').src = '<?= SITELINK ?>images/default/default.jpg';
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
