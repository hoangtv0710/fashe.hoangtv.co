   <?php 
    require_once $path.'../database/db_fashe.php';
  ?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php foreach ($kq as $avt): ?>
          <?php if ($avt['id']==$_SESSION['login']['id']): ?>
            
            <?php if (!empty($avt['avatar'])): ?>
               <img src="<?= SITELINK . $avt['avatar'] ?>" class="img-circle" alt="User Image">
            <?php else: ?>
               <img src="<?= SITELINKADMIN ?>/adminlte/dist/img/logoadmin.png" class="img-circle" alt="User Image">
            <?php endif ?>

          <?php endif ?>
        <?php endforeach ?>
      </div>
      <div class="pull-left info">
        <p><?= $_SESSION['login']['fullname'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">MAIN NAVIGATION</li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Tổng quan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/"><i class="fa fa-circle-o"></i> Thống kê</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cubes"></i> <span>Sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/danh-muc-sp"><i class="fa fa-circle-o"></i>Danh mục</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/san-pham"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/phan-hoi-sp"><i class="fa fa-circle-o"></i>Bình luận</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-level-down"></i> <span>Mã giảm giá</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/ma-giam-gia"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/ma-giam-gia/add.php"><i class="fa fa-circle-o"></i>Thêm mã giảm giá</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Bài viết</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/danh-muc-bv"><i class="fa fa-circle-o"></i>Danh mục</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/bai-viet"><i class="fa fa-circle-o"></i>Danh sách bài viết</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/phan-hoi-bv"><i class="fa fa-circle-o"></i>Bình luận</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Liên hệ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/lien-he"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Hóa đơn</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/hoa-don"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/hoa-don-chi-tiet"><i class="fa fa-circle-o"></i>Chi tiết hóa đơn</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-sliders"></i> <span>Slideshow</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/slide-show"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/slide-show/add.php"><i class="fa fa-circle-o"></i>Thêm slide</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-truck"></i> <span>Đối tác</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/doi-tac"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/doi-tac/add.php"><i class="fa fa-circle-o"></i>Thêm đối tác</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-picture-o"></i> <span>Banners</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/banner"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-list-alt"></i> <span>Menus</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/menu"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/dropdown-menu"><i class="fa fa-circle-o"></i>Dropdown-menu</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Tài khoản</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/tai-khoan"><i class="fa fa-circle-o"></i>Danh sách</a>
          </li>
          <li class="">
            <a href="<?= SITELINKADMIN ?>/tai-khoan/add.php"><i class="fa fa-circle-o"></i>Thêm tài khoản</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Cấu hình hệ thống</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= SITELINKADMIN ?>/thong-tin-chung"><i class="fa fa-circle-o"></i>Thông tin chung</a>
          </li>
        </ul>
      </li>
      
    </ul>
  </section>
<!-- /.sidebar -->
</aside>