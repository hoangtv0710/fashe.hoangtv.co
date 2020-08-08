<?php 
	require_once '../database/db_fashe.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/tailwindcss@1.0.4/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
</head>

<body class="font-mono h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
	<!-- Container -->
	<div class="container">
		<div class="flex justify-center px-6 my-12">
			<div class="w-full xl:w-3/4 lg:w-11/12 flex">
				<!-- Col -->
				<div
					class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
					style="background-image: url('../images/icon-login-admin.jpg')"
				></div>
				<!-- Col -->
				<div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
					<div class="flex justify-center">
						<a href="<?= SITELINK ?>">
							<img src="<?= SITELINK ?>images/icons/logo.png" id="icon">
						</a>
					</div>
					<h3 class="pt-4 text-2xl text-center">Đăng nhập để tiếp tục!</h3>
					
					<?php if (isset($_GET['err'])): ?>
						<h3 style="color: red; text-align: center; padding-bottom: 10px;"><?= $_GET['err'] ?></h3>
					<?php endif ?>
					<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="post-login.php" method="post">
						<div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700">
								Email
							</label>
							<input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
							type="text" name="email" placeholder="Email" autofocus <?php if (isset($_GET['email'])): ?>
								value="<?= $_GET['email'] ?>"
							<?php endif ?>>

							<?php if (isset($_GET['errorEmail'])): ?>
								<span class="text-xs italic text-red-500"><?= $_GET["errorEmail"] ?></span>
							<?php endif ?>
						</div>

						<div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
								Mật khẩu
							</label>
							<input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
							type="password" name="password" placeholder="***********" />
							<?php if (isset($_GET['errorPass'])): ?>
								<span class="text-xs italic text-red-500"><?= $_GET["errorPass"] ?></span>
							<?php endif ?>
							
							<?php if (isset($_GET['msg'])): ?>
								<span class="text-xs italic text-red-500"><?= $_GET["msg"] ?></span>
							<?php endif ?>
						</div>
					
						<div class="mb-6 text-center">
							<button class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
								Đăng nhập
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

