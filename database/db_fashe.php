<?php
	session_start();
	//url
	define('SITELINK', 'http://localhost:6969/');
	define('SITELINKADMIN', 'http://localhost:6969/admin');

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

	function checkXss($string)
	{
		return preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
	}
 ?>