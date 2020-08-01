<?php 
	session_start();
	session_destroy();
	require_once '../database/db_fashe.php';
	header("location: " . $siteurlz . "login-client.php");
 ?>