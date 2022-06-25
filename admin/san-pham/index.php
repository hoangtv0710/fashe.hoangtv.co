<?php 
  $path = "../";
  require_once $path.'../database/db_fashe.php';

  include_once $path.'share/check_login.php';
  
  $pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
  $pageSize = 15;

  $offset = ($pageNumber-1)*$pageSize;
  $sql = "select p.*, c.name as catename from products p join product_categories c on p.cate_id = c.id order by id desc  limit $offset, $pageSize";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $products = $stmt->fetchAll();

  $sql = "select count(*) as total from products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $totalProduct = $stmt->fetch();

  $totalPage = ceil($totalProduct['total']/$pageSize);

  $i = 1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sản phẩm</title>
  <link rel="stylesheet" href="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.css"></style> 
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
        Danh sách sản phẩm
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?= SITELINKADMIN ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản phẩm</li>
        <li class="active">Danh sách</li>
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
                  <th>#</th>
                  <th>Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th>Giá</th>
                  <th>Giá KM</th>
                  <th style="width: 150px">Ảnh</th>
                  <th>Trạng thái</th>
                  <th>Lượt xem</th>
                  <th style="width: 120px">
                    <a 
                      href="<?= SITELINKADMIN ?>/san-pham/add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>
                
                <?php foreach ($products as $item): ?>
                  
                  <tr>
                    
                    <td><?= $i++ ?>.</td>

                    <td><?= $item['product_name']?></td>

                    <td><?= $item['catename']?></td>

                    <td><?= $item['price']?></td>

                    <td><?= $item['sell_price']?></td>

                    <td><img src="<?= SITELINK . $item['image']?>" width="100%" height="120"></td>

                    <td><?= $item['status'] ?></td>

                    <td><?= $item['views']?></td>

                    <td>
                      <a 
                        href="<?= SITELINKADMIN ?>/san-pham/edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>
                      <a 
                        href="javascript:;" 
                        linkurl="<?= SITELINKADMIN ?>/san-pham/remove.php?id=<?= $item['id']?>" 
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


<script type="text/javascript" src="<?= SITELINKADMIN ?>/adminlte/plugins/Toastr/toastr.min.js"></script>

<script type="text/javascript">
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
  <?php if (isset($_GET['success']) && $_GET['success'] == true) {
    ?>
    toastr.success('Thêm sản phẩm thành công!')
    <?php
  } ?>
   <?php if (isset($_GET['error'])) {
    ?>
    toastr.error('<?php echo $_GET['error'] ?>')
    <?php
  } ?>

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?');

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
        var url = '<?php echo SITELINKADMIN ?>/san-pham';
        url += "?page=" + page;
        window.location.href = url;
      }
  });
</script>

</body>
</html>
