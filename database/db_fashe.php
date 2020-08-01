<?php
	//url
	define('SITELINK', 'http://localhost/Fashe/');
	define('SITELINKADMIN', 'http://localhost/Fashe/admin');

	//database
	$host = "localhost";
	$dbname = "db_fashe";
	$username = "root";
	$password = "root";

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);

	//role user
	const USER_ROLES = [
		'Member' =>1,
		'Moderator' => 2,
		'Admin' => 3	
	];
 ?>