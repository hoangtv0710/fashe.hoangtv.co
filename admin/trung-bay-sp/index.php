<?php 
  session_start();

  $path = "../";
  require_once $path.'../database/db_fashe.php';
  $pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
  $pageSize = 8;

  $offset = ($pageNumber-1)*$pageSize;
  $sql = "select pg.*, p.product_name as productname, p.cate_id as cate from product_galleries pg join products p on pg.product_id = p.id order by product_id desc limit $offset, $pageSize";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $pg = $stmt->fetchAll();

  $sql = "select count(*) as total from product_galleries";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $totalProduct = $stmt->fetch();

  $totalPage = ceil($totalProduct['total']/$pageSize);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sản phẩm / Trưng bày sản phẩm</title>
  <?php include_once $path.'share/linkAsset.php'; ?>
  <link rel="stylesheet" href="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.css"></style> 

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
       Trưng bày sản phẩm
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản phẩm</li>
        <li class="active">Trưng bày</li>
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
                  <th>Tên sản phẩm</th>
                  <th>Mã sản phẩm</th>
                  <th style="width: 150px;">Ảnh</th>
                  <th style="width: 120px;">
                    <a 
                      href="<?= $adminUrl ?>trung-bay-sp/add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>

                <?php foreach ($pg as $item): ?>
                  
                  <tr>

                    <td><?= $item['id'] ?></td>
                    
                    <td>
                        <a href="<?= $siteurl . 'product-detail.php?id=' . $item['product_id']. '&categories='.$item['cate'] ?>"><?= $item['productname'] ?></a>
                    </td>

                    <td><?= $item['product_id']?></td>

                    <td><img src="<?= $siteurl . $item['image'] ?>" alt="" class="img-responsive"></td>

                    <td>
                      <a 
                        href="<?= $adminUrl ?>trung-bay-sp/edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>

                      <a 
                        href="javascript:;" 
                        linkurl="<?= $adminUrl ?>trung-bay-sp/remove.php?id=<?= $item['id']?>" 
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
             <div class="box-footer clearfix ">
               <ul id="pagination" class="pagination-sm"></ul>
            </div>
          </div>
        </div>  
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'share/footer.php'; ?>
</div>
<!-- ./wrapper -->




<script type="text/javascript" src="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.js""></script>
<script type="text/javascript">
  
  <?php if (isset($_GET['success']) && $_GET['success'] == true) {
    ?>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "2000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success('Thêm thành công!')
    <?php
  } ?>

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá hay không?');

    if(conf){
      window.location.href = url;
    }
  });

  $('#pagination').twbsPagination({
      totalPages: <?= $totalPage?>,
      visiblePages: 3,
      initiateStartPageClick: false,
      startPage: <?= $pageNumber?>,
      onPageClick: function (event, page) {
        var url = '<?= $adminUrl?>trung-bay-sp';
        url += "?page=" + page;
        window.location.href = url;
      }
  });
</script>
</body>
</html>
