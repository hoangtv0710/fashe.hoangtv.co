<?php
  $path = "../";
  require_once $path.'../database/db_fashe.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm mã giảm giá</title>
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
        Thêm mã giảm giá
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mã giảm giá</li>
        <li class="active">Thêm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form action="save-add.php" method="post" name="form" onsubmit="return checkCode()">

          <div class="col-md-6">
            <div class="form-group">
              <label>Mã giảm</label>
              <input type="text" name="code" class="form-control" <?php if (isset($_GET['code'])): ?>
                value="<?= $_GET['code'] ?>"
              <?php endif ?>>
              <?php if (isset($_GET['errCode'])): ?>
                <span class="text-danger"><?= $_GET['errCode'] ?></span>
              <?php endif ?>
              <span class="text-danger" id="err"></span>
              <span class="text-danger" id="err3"></span>
            </div>

            <div class="form-group">
              <label>% giảm</label>
              <input type="text" name="percent" class="form-control" <?php if (isset($_GET['percent'])): ?>
                value="<?= $_GET['percent'] ?>"
              <?php endif ?>>
              <span class="text-danger" id="err1"></span>
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

      if (f.code.value == "" || f.percent.value == "" ) {
        document.getElementById("err").innerHTML = "Không để trống mã giảm";
        document.getElementById("err1").innerHTML = "Không để trống % giảm";
        return false;
      } else {
        document.getElementById("err").style.display = 'none';
        document.getElementById("err1").style.display = 'none';
       
      }

     if (!checkcode.test(f.code.value)) {
        document.getElementById("err3").innerHTML = "Mã giảm giá phải là chữ in hoa kết hợp với số ( Vd: CODE123 )";
        f.code.focus();
        return false;
      } else {
        document.getElementById("err3").style.display = 'none';
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
