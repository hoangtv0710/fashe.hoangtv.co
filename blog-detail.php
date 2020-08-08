<?php 
	require_once 'database/db_fashe.php';
	$id = $_GET['id'];

	error_reporting(0);

	$sessionKey = 'blog_' . $id;
    $sessionView = $_SESSION[$sessionKey];
    if (!$sessionView) { 
        $_SESSION[$sessionKey] = 1; 
        $conn->query("update posts set views = views + 1 where id = '$id'");
	}

	$sql = "select * from posts where id = '$id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$posts = $stmt->fetch();
	if (!$posts) {
		header("location:". SITELINK);
		die;
	}

	$cate_id = $_GET['categories'];

	$sql = "select * from posts where cate_id = '$cate_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$bloglq = $stmt->fetchall();

	if (!$bloglq) {
		header("location: " . SITELINK);
		die;
	}

	$sql = "select * from post_categories where id = '$cate_id'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$categories = $stmt->fetch();

	$categoriesBlog = "select * from post_categories";
	$stmt = $conn->prepare($categoriesBlog);
	$stmt->execute();
	$cB = $stmt->fetchall();

	$conmentSql = "select * from post_comments where post_id = $id and status = 1 order by id desc";
	$kq = $conn->prepare($conmentSql);
	$kq->execute();
	$comments = $kq->fetchall();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $posts['title'] ?></title>
    <meta charset="UTF-8">
    <?php include 'share/top_asset.php'; ?>
    <style>
    .content_post p img {
        width: 100%;
    }
    </style>
</head>

<body class="animsition">

    <!-- Header -->
    <?php include 'share/header.php'; ?>

    <!-- breadcrumb -->
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
        <a href="<?= SITELINK ?>" class="s-text16">
            Home
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="blog.php" class="s-text16">
            Blog
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="<?= "blog.php?id=".$categories['id'] ?>" class="s-text16 text-uppercase">
            <?= $categories['name'] ?>
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <span class="s-text17">
            <?= $posts['title'] ?>
        </span>
    </div>

    <!-- content page -->
    <section class="bgwhite p-t-60 p-b-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="p-r-50 p-r-0-lg">
                        <div class="p-b-100">
                            <div class="blog-detail-img wrap-pic-w">
                                <img src="<?= $posts['image'] ?>" alt="IMG-BLOG">
                            </div>

                            <div class="blog-detail-txt p-t-33">
                                <h4 class="p-b-11 m-text24">
                                    <?= $posts['title'] ?>
                                </h4>

                                <div class="s-text8 flex-w flex-m p-b-21">
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <?= $posts['author_name'] ?>
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>

                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?= $posts['created_date'] ?>
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>

                                    <span>
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <?= $posts['views'] ?>
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>

                                    <span>
                                        <?= $categories['name'] ?>
                                    </span>
                                </div>

                                <p class="s-text3">
                                    <?= $posts['short_desc'] ?>
                                </p>

                                <p class="p-b-25">
                                    <div class="content_post">
                                        <?= $posts['content'] ?>
                                    </div>
                                </p>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 col-lg-3 p-b-50">
                    <div class="rightbar">
                        <!-- Search -->
                        <div class="pos-relative bo11 of-hidden">
                            <form action="search_post.php" method="GET">
                                <input class="s-text7 size16 p-l-23 p-r-50" type="text" name="keyword"
                                    placeholder="Search" required="">

                                <button type="submit" class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
                                    <i class="fs-13 fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Categories -->
                        <h4 class="m-text23 p-t-56 p-b-34">
                            Danh mục
                        </h4>

                        <ul>
                            <li class="p-t-6 p-b-8 text-uppercase">
                                <a href="blog.php" class="s-text13 p-t-5 p-b-5">
                                    Tất cả
                                    <hr>
                                </a>
                            </li>
                            <?php foreach ($cB as $c): ?>
                                <li class="p-t-6 p-b-8 text-uppercase">
                                    <a href="<?= "blog.php?id=".$c['id'] ?>" class="s-text13 p-t-5 p-b-5">
                                        <?= $c['name'] ?>
                                        <hr>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>

                        <!-- Featured Products -->
                        <h4 class="m-text23 p-t-65 p-b-34">
                            Bài viết liên quan
                        </h4>

                        <ul class="bgwhite">

                            <?php foreach ($bloglq as $mp): ?>
                                <?php if ($mp != $posts): ?>
                                    <li class="p-b-20">
                                        <a href="<?= "blog-detail.php?id=".$mp['id']."&categories=".$mp['cate_id'] ?>"
                                            class="dis-block wrap-pic-w trans-0-4 hov4">
                                            <img src="<?= $mp['image'] ?>" alt="IMG-PRODUCT">
                                        </a>

                                        <div class="p-t-5">
                                            <a href="<?= "blog-detail.php?id=".$mp['id']."&categories=".$mp['cate_id'] ?>"
                                                class="s-text100">
                                                <?= $mp['title'] ?>
                                            </a>
                                        </div>
                                    </li>
                                <?php endif ?>
                            <?php endforeach ?>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="row">
                <form class="col-md-6" action="<?= SITELINK ?>submitcmtpost.php" method="POST" name="formcmt"
                    onsubmit="return cmt()">
                    <input type="hidden" name="id" value="<?= $id?>">
                    <input type="hidden" name="categories" value="<?= $cate_id ?>">
                    <h4 class="m-text25 p-b-30">
                        Nhận xét về bài viết
                    </h4>
                    <input type="hidden" name="email" value="<?= $_SESSION['login']['email'] ?>">


                    <textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="content"
                        placeholder="Nhận xét..."></textarea>
                    <span class="text-danger" id="errcontent"></span>

                    <div class="w-size24">
                        <!-- Button -->
                        <button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Đăng nhận xét
                        </button>
                    </div>
                    <div class="m-t-10"></div>
                    <a href="<?= SITELINK ?>authenticator/login-client.php" id="err" class="text-danger s-text2"></a>
                </form>

                <div class="col-md-6">
                    <div class="wrap-dropdown-content p-t-15 p-b-14 active-dropdown-content">
                        <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                            Xem các bình luận
                            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                        </h5>

                        <div class="dropdown-content dis-none p-t-15 p-b-23">
                            <p class="s-text8">
                                <?php foreach ($comments as $cmt): ?>
                                    <img src="<?= $cmt['avatar'] ?>" height="40px" width="40px" style="border-radius: 50%;">
                                    <span class="s-text9"
                                        style="color: #059; font-size: 17px;"><b><?= $cmt['email']?></b></span>
                                    <span style="color: black;"><?= $cmt['content']?></span><br>
                                    <span style="font-size: 12px; color: #ccc"><?= $cmt['created_date'] ?></span>
                                    <hr>
                                <?php endforeach ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include 'share/footer.php'; ?>



    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>

    <?php include 'share/bottom_asset.php'; ?>

    <script>
		<?php if (!isset($_SESSION['login'])): ?>
			function cmt () {
				document.getElementById('err').innerHTML = "Bạn cần đăng nhập để bình luận!";
				return false;
			}
		<?php else: ?>
			function cmt() {
				var f = document.formcmt;	
				if (f.content.value == "") {
					document.getElementById("errcontent").innerHTML = 'Vui lòng nhập nội dung!';
					f.content.focus();
					return false;
				} else {
					document.getElementById("errcontent").style.display = 'none';
				}

				return true;
			}
		<?php endif ?>
	</script>

	<script type="text/javascript">

		<?php if (isset($_GET['success']) && $_GET['success'] == true) {
	   		 ?>
		    toastr.options = {
		      "closeButton": false,
		      "debug": false,
		      "newestOnTop": false,
		      "progressBar": true,
		      "positionClass": "toast-top-right",
		      "preventDuplicates": false,
		      "onclick": null,
		      "showDuration": "300",
		      "hideDuration": "1000",
		      "timeOut": "4000",
		      "extendedTimeOut": "1000",
		      "showEasing": "swing",
		      "hideEasing": "linear",
		      "showMethod": "fadeIn",
		      "hideMethod": "fadeOut"
		    }
		    toastr.success('Đăng bình luận thành công!')
		    <?php
		  } ?>
	</script>


</body>
</html>