<?php 
  
  session_start();
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  $invoiceQuery = "select * from invoices";
  $stmt = $conn->prepare($invoiceQuery);
  $stmt->execute();
  $invoice = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hóa đơn</title>
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
        Hóa đơn
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hóa đơn</li>
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
                  <th>Tổng tiền</th>
                  <th>Tên khách hàng</th>
                  <th>SĐT</th>
                  <th>Địa chỉ</th>
                  <th>Ghi chú</th>
                  <th>Email</th>
                  <th>Ngày mua</th>
                  <th>Mã giảm giá</th>
                  <th width="170">Trạng thái</th>
                  
                  <td style="width: 150px">
                  </td>
                </tr>

                <?php foreach ($invoice as $item): ?>
                  <tr>
                    <td><?= $iv=$item['id']?>.</td>
                    <?php 
                      $invoicedtQuery = "select sum(total_product_price) as total from invoice_detail where invoice_id = '$iv'";
                      $stmt = $conn->prepare($invoicedtQuery);
                      $stmt->execute();
                      $invoicedt = $stmt->fetch();
                     ?>
                    <td>
                        <?= number_format($invoicedt['total']) ?>
                    </td>

                    <td><?= $item['customer_name']?></td>

                    <td><?= $item['phone_number']?></td>

                    <td><?= $item['address']?></td>

                    <td><?= $item['note']?></td>

                    <td><?= $item['email']?></td>

                    <td><?= $item['created_date']?></td>

                    <?php if ($item['discount_percent']>0): ?>
                       <td><?= $item['discount_code']?>(-<?= $item['discount_percent'] ?>%)</td>
                    <?php else: ?>
                      <td></td>
                    <?php endif ?>

                    <td>
                      <form action="update_status.php" method="post">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <select class="form-control" name="status" onchange="this.form.submit()">
                          <option value="0" <?php if($item['status'] == 0) :?> selected <?php endif ?> >Chờ xử lý</option>
                          <option value="1" <?php if($item['status'] == 1) :?> selected <?php endif ?> >Đã xử lý</option>
                          <option value="2" <?php if($item['status'] == 2) :?> selected <?php endif ?> >Đang vận chuyển</option>
                          <option value="3" <?php if($item['status'] == 3) :?> selected <?php endif ?> >Hoàn thành</option>
                        </select>
                      </form>
                    </td>

                    <td>
                      <a 
                        href="javascript:;" 
                        linkurl="remove.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-danger btn-remove">
                        <i class="fa fa-trash"></i>  Xoá
                      </a>
                      <a 
                        href="<?= SITELINKADMIN ?>/hoa-don-chi-tiet?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary" target="_blank">
                        <i class="fa fa-pencil"></i> Xem chi tiết
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
    var conf = confirm('Bạn có chắc muốn xóa hóa đơn này không?');

    if(conf){
      window.location.href = url;
    }
  });
</script>
</body>
</html>
