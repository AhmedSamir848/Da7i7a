<?php
@session_start();
$type = $_SESSION['type'];
//echo $type."<br>";
include_once './System.php';
$sys = new System();
$path = basename(__FILE__, '.php');

if (!$sys->check_accessability($path, $type)) {
    echo 'Sorry Forbiden To Access <br>';
    exit();
}

include './Admin.php';
$ad = new Admin();
$ad->SendMail();

?>



