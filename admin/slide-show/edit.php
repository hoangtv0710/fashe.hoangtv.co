<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';
  $id = $_GET['id'];

  $sql = "select * from slideshows where id = $id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $slideshows = $stmt->fetch();    

  if(!$slideshows){
    header("location: ". SITELINKADMIN ."/slide-show");
    die;
  }    

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa slide</title>
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
        Sửa slide
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slideshows</li>
        <li class="active">Sửa slide</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="save-edit.php" method="post">
          <input type="hidden" name="id" value="<?= $slideshows['id'] ?>">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <?php if ($slideshows['image'] == null || $slideshows['image'] == ""): ?>
                  <img id="proImg" src="<?= SITELINK ?>images/default/default.jpg" class="img-responsive">
                <?php else: ?>
                  <img id="proImg" src="<?= SITELINK . $slideshows['image'] ?>" class="img-responsive">
                <?php endif ?>
              </div>
            </div>

            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
            </div>

          </div>
          
          <div class="col-md-6">
            
            <div class="form-group">
              <label>Tiêu đề</label>
              <input type="text" name="title" class="form-control" value="<?= $slideshows['title'] ?>">
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <input type="text" name="caption" class="form-control" value="<?= $slideshows['caption'] ?>">
            </div>
              
            <div class="form-group">
              <label>Số thứ tự</label>
              <input type="text" name="sort_order" class="form-control" value="<?= $slideshows['sort_order'] ?>">
              <?php if (isset($_GET['errOrder'])): ?>
                <span class="text-danger"><?= $_GET['errOrder'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Hiệu ứng</label>
              <select name="effect" class="form-control">
                <option value="1" <?php if ($slideshows['effect']==1): ?>
                  selected
                <?php endif ?>>1</option>
                <option value="2" <?php if ($slideshows['effect']==2): ?>
                  selected
                <?php endif ?>>2</option>
                <option value="3" <?php if ($slideshows['effect']==3): ?>
                  selected
                <?php endif ?>>3</option>
              </select>
            </div>

            <div class="form-group">
              <label>Đường dẫn</label>
              <input type="text" name="link_url" class="form-control" value="<?= $slideshows['link_url'] ?>">
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
<!-- ./wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
    $('[name="detail"]').wysihtml5();

    var inputImage = document.querySelector(`[name="image"]`);
    inputImage.onchange = function(){

      var file = this.files[0];
      if(file == undefined){
        document.querySelector('#proImg').src = '<?= SITELINK ?>img/default/default-picture.png';
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
