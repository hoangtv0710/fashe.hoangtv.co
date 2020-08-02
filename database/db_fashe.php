<?php
	//url
	define('SITELINK', 'http://localhost:8080/Fashe/');
	define('SITELINKADMIN', 'http://localhost:8080/Fashe/admin');

	//database
	$host = "localhost";
	$dbname = "db_fashe";
	$username = "root";
	$password = "";

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);

	//role user
	const USER_ROLES = [
		'Member' =>1,
		'Moderator' => 2,
		'Admin' => 3	
	];
 ?>