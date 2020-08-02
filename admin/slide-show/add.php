 <?php 

  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Slideshow/Thêm slide</title>
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
       Thêm slide
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slideshows</li>
        <li class="active">Thêm Slide</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="save-add.php" method="post">

          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <img id="proImg" src="<?= SITELINK ?>images/default/default.jpg" class="img-responsive">
              </div>
            </div>

            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
              <?php if (isset($_GET['err'])): ?>
                <span class="text-danger"><?= $_GET['err'] ?></span>
              <?php endif ?>
            </div>

          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label>Tiêu đề</label>
              <input type="text" name="title" class="form-control" <?php if (isset($_GET['title'])): ?>
                value="<?= $_GET['title'] ?>"
              <?php endif ?>>
              <?php if (isset($_GET['err'])): ?>
                <span class="text-danger"><?= $_GET['err'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Mô tả</label>
              <input type="text" name="caption" class="form-control" <?php if (isset($_GET['caption'])): ?>
                value="<?= $_GET['caption'] ?>"
              <?php endif ?>>
            </div>
            
            <div class="form-group">
              <label>Số thứ tự</label>
              <input type="text" name="sort_order" class="form-control" <?php if (isset($_GET['sort_order'])): ?>
                value="<?= $_GET['sort_order'] ?>"
              <?php endif ?>>
              <?php if (isset($_GET['errOrder'])): ?>
                <span class="text-danger"><?= $_GET['errOrder'] ?></span>
              <?php endif ?>
              <?php if (isset($_GET['err'])): ?>
                <span class="text-danger"><?= $_GET['err'] ?></span>
              <?php endif ?>
            </div>
            
            <div class="form-group">
              <label>Hiệu ứng</label>
              <select name="effect" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
              <?php if (isset($_GET['errEffect'])): ?>
                <span class="text-danger"><?= $_GET['errEffect'] ?></span>
              <?php endif ?>
              <?php if (isset($_GET['err'])): ?>
                <span class="text-danger"><?= $_GET['err'] ?></span>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Đường dẫn</label> <br>
              <input type="text" name="link_url" class="form-control" <?php if (isset($_GET['link_url'])): ?>
                value="<?= $_GET['link_url'] ?>"
              <?php endif ?>>
              <?php if (isset($_GET['err'])): ?>
                <span class="text-danger"><?= $_GET['err'] ?></span>
              <?php endif ?>
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

    var inputImage = document.querySelector(`[name="image"]`);
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
