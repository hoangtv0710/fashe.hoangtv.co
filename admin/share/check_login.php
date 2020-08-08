<?php
    if(isset($_SESSION['login']) == false || $_SESSION['login'] == null){
        header("location:". SITELINKADMIN . "/login.php");
        die;
    }
    if($_SESSION['login']['role'] != 2 &&  $_SESSION['login']['role'] != 3){
        header("location:". SITELINKADMIN . "/login.php");
        die;
    }
?>