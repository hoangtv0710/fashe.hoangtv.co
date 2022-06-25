 <?php 
    require_once $path.'../database/db_fashe.php';
    $sql = "select * from users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $kq = $stmt->fetchAll();
  ?>

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= SITELINKADMIN ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You don't have messages</li>

              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You don't have notifications</li>

              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You don't have tasks</li>

              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php foreach ($kq as $avt): ?>
                  <?php if ($avt['id']==$_SESSION['login']['id']): ?>
                    
                    <?php if (!empty($avt['avatar'])): ?>
                       <img src="<?= SITELINK . $avt['avatar'] ?>" class="img-circle" height="21" width="22" alt="User Image">
                    <?php else: ?>
                       <img src="<?= SITELINKADMIN ?>dist/img/logoadmin.png" class="img-circle" alt="User Image" height="21" width="30">
                    <?php endif ?>

                  <?php endif ?>
                <?php endforeach ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              
                <?php foreach ($kq as $avt): ?>
                  <?php if ($avt['id']==$_SESSION['login']['id']): ?>
                    
                    <?php if (!empty($avt['avatar'])): ?>
                       <img src="<?= SITELINK . $avt['avatar'] ?>" class="img-circle" alt="User Image">
                    <?php else: ?>
                       <img src="<?= SITELINKADMIN ?>dist/img/logoadmin.png" class="img-circle" alt="User Image" height="21" width="30">
                    <?php endif ?>

                  <?php endif ?>
                <?php endforeach ?>

                <p>
                  <?= $_SESSION['login']['fullname'] ?>
                  <small>
                    <?php if ($_SESSION['login']['role'] == 3): ?>
                        Admin
                    <?php else: ?>
                        Moderator
                    <?php endif ?>
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
              <?php if ($_SESSION['login']['role'] == 3): ?>
                <div class="pull-left">
                  <a href="<?= SITELINK ?>account.php" class="btn btn-default btn-flat" target=_blank>Profile</a>
                </div>
                <?php endif ?>
                <div class="pull-right">
                  <a href="<?= SITELINKADMIN ?>/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>