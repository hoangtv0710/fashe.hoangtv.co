<?php 
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $cateId = $_GET['id'];
  $sql = "select * from discount_code where id = '$cateId'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $cate = $stmt->fetch();

  if(!$cate){
    header('location: ' . SITELINKADMIN . '/ma-giam-gia');
    die;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sửa mã giảm giá</title>
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
        Sửa mã giảm giá
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mã giảm giá</li>
        <li class="active">Sửa </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="save-edit.php" method="post" name="form" onsubmit="return checkCode()">

          <input type="hidden" name="id" value="<?= $cate['id']?>">

          <div class="col-md-6">
            <div class="form-group">
              <label>Mã giảm</label>
              <input type="text" name="code"  class="form-control" value="<?= $cate['code']?>" >
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
              <span class="text-danger" id="err1"></span>
            </div>

            <div class="form-group">
              <label>% giảm</label>
               <input type="text" name="percent" class="form-control" value="<?= $cate['percent']?>" >
               <?php if (isset($_GET['errName1'])): ?>
                <span class="text-danger"><?= $_GET['errName1'] ?></span>
              <?php endif ?>
              <span class="text-danger" id="err2"></span>
            </div>

            <div class="text-right">
              <a href="./" class="btn btn-danger btn-xs">Huỷ</a>
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
<!-- ./wrapper -->

<script>
  function checkCode (argument) {
    var f = document.form;
    var checkcode = /^[A-Z]+[0-9]+$/;
    var checkpercent = /^[0-9]+$/;

     if (!checkcode.test(f.code.value)) {
        document.getElementById("err1").innerHTML = "Mã giảm giá phải là chữ in hoa kết hợp với số ( Vd: CODE123 )";
        f.code.focus();
        return false;
      } else {
        document.getElementById("err1").style.display = 'none';
      }

      if (!checkpercent.test(f.percent.value) || f.percent.value >= 100 || f.percent.value == 0) {
        document.getElementById("err2").innerHTML = "% giảm phải là số dương và phải bé hơn 100";
        f.percent.focus();
        return false;
      } else {
        document.getElementById("err2").style.display = 'none';
      }

  }
</script>

</body>
</html>
