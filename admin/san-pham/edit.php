<?php 
  $path = "../";
  require_once $path.'../database/db_fashe.php';
  $id = $_GET['id'];

  $sql = "select * from products where id = '$id'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $product = $stmt->fetch();    

  if(!$product){
    header("location: ".SITELINKADMIN."/san-pham");
    die;
  }    

  $sql = "select * from product_categories";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $cates = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa sản phẩm</title>
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
        Sửa sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản phẩm</li>
        <li class="active">Sửa sản phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form enctype="multipart/form-data" action="save-edit.php" method="post">
          <input type="hidden" name="id" value="<?= $product['id'] ?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" name="product_name" 
                  value="<?= $product['product_name'] ?>" 
                  class="form-control">
                <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>
            <div class="form-group">
              <label>Danh mục</label>
              <select class="form-control" name="cate_id">
                <?php foreach ($cates as $item): ?>
                  <option 
                      <?php if ($product['cate_id'] == $item['id']): ?>
                        selected
                      <?php endif ?>
                      value="<?= $item['id'] ?>">
                      <?= $item['name'] ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Giá trưng bày</label>
              <input type="number" name="price" 
                value="<?= $product['price'] ?>" 
                class="form-control">
            </div>
            <div class="form-group">
              <label>Giá khuyến mại</label>
              <input type="number" name="sell_price" 
                value="<?= $product['sell_price'] ?>" 
                class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">

              <div class="col-md-8 col-md-offset-2">
                <?php if ($product['image'] == null || $product['image'] == ""): ?>
                  
                  <img id="proImg" src="<?= SITELINK ?>images/default/default.jpg" class="img-responsive">
                <?php else: ?>
                  
                  <img id="proImg" src="<?= SITELINK . $product['image']?>" class="img-responsive">
                <?php endif ?>
              </div>
              
            </div>

            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
              <label>Trạng thái</label> &nbsp;

              <input type="radio" name="status"
                <?php if ($product['status'] == 'Tạm hết hàng'): ?>
                  checked
                <?php endif ?>
                value="Tạm hết hàng"> Tạm hết hàng &nbsp;
              <input type="radio" name="status" 
                <?php if ($product['status'] == 'Còn hàng'): ?>
                  checked
                <?php endif ?>
                value="Còn hàng"> Còn hàng 
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Chi tiết sản phẩm</label>
              <textarea name="detail" class="form-control" rows="10"><?= $product['detail'] ?></textarea>
              <?php if (isset($_GET['errDetail'])): ?>
                <span class="text-danger"><?= $_GET['errDetail'] ?></span>
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
