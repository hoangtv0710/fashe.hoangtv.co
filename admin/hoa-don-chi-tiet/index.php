<?php 
  
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $sql = "select id.*, p.product_name as productname, p.cate_id as cate from invoice_detail id join products p on id.product_id = p.id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $invoice = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hóa đơn chi tiết</title>
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
        Hóa đơn chi tiết
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hóa đơn chi tiết</li>
        <li class="active">Danh sách hóa đơn</li>
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
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Mã hóa đơn</th>
                  <th>Số lượng</th>
                  <th>Giá hiện tại</th>
                  <th>Thành tiền</th>
                </tr>

                <?php foreach ($invoice as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>

                    <td><?= $item['product_id']?></td>

                    <td><a href="<?= SITELINK . 'product-detail.php?id=' . $item['product_id']. '&categories='.$item['cate'] ?>" target="_blank"><?= $item['productname'] ?></a></td>

                    <td><?= $item['invoice_id']?></td>

                    <td><?= $item['quantity']?></td>

                    <td><?= number_format($item['unit_price'])?></td>

                    <td><?= number_format($item['total_product_price'])?></td>

                    <td>
                      <a 
                        href="javascript:;" 
                        linkurl="<?= SITELINKADMIN ."/hoa-don-chi-tiet/remove.php?id=".$item['id'].'&invoice_id='.$item['invoice_id'] ?>" 
                        class="btn btn-xs btn-danger btn-remove">
                        <i class="fa fa-trash"></i>  Xoá
                      </a>
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




<script type="text/javascript">

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá hóa đơn này hay không?');

    if(conf){
      window.location.href = url;
    }
  });
</script>
</body>
</html>
