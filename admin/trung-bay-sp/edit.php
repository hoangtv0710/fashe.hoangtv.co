<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';
  $id = $_GET['id'];

  $sql = "select * from product_galleries where id = $id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $pg = $stmt->fetch();    

  if(!$pg){
    header("location: ".$adminUrl."trung-bay-sp");
    die;
  }    

  $sql = "select * from products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $product = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa </title>
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
        Sửa 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Trưng bày sản phẩm</li>
        <li class="active">Sửa </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="<?= $adminUrl?>trung-bay-sp/save-edit.php" method="post">
          <input type="hidden" name="id" value="<?= $pg['id'] ?>">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <?php if ($pg['image'] == null || $pg['image'] == ""): ?>
                  <img id="proImg" src="<?= $siteurl?>images/default/default.jpg" class="img-responsive">
                <?php else: ?>
                  <img id="proImg" src="<?= $siteurl . $pg['image'] ?>" class="img-responsive">
                <?php endif ?>
              </div>
            </div>

            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
            </div>
            
             <div class="form-group">
              <label>Thuộc sản phẩm</label>
              <select class="form-control" name="product_id">
                <?php foreach ($product as $item): ?>
                  <option 
                      <?php if ($pg['product_id'] == $item['id']): ?>
                        selected
                      <?php endif ?>
                      value="<?= $item['id'] ?>">
                      <?= $item['product_name'] ?> / ID = <?= $item['id'] ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>

          </div>


          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>trung-bay-sp" class="btn btn-sm btn-danger">Huỷ</a>
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
        document.querySelector('#proImg').src = '<?= $siteurl?>img/default/default-picture.png';
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
