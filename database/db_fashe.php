<?php 
	$siteurl = "http://localhost/Fashe/";
	$siteurlz = "http://localhost/Fashe/z-client/";
	$adminUrl = "http://localhost/Fashe/admin/";
	$adminAssetUrl = "http://localhost/Fashe/admin/adminlte/";
	$host = "localhost";
	$dbname = "db_fashe";
	$username = "root";
	$password = "";

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);

	const USER_ROLES = [
		'Member' =>1,
		'Moderator' => 2,
		'Admin' => 3	
	];
 ?>