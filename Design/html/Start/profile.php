<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path, $type)) {
    header("Location: ../Start/privent_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , intial-scale =1.0">
        <title>Dahiha</title>
        <link rel="stylesheet" href="../../Css/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/login.css">
        <link rel="stylesheet" href="../../Css/regis.css">
        <link rel="stylesheet" href="../../Css/font-awesome.css">
        <link rel="stylesheet" href="../../Css/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header   -->
        <?php include("Header_1.php"); ?>
        <!-- End Header -->
        <section class="main">
            <h1>User id =: <?php echo $_SESSION['id']; ?></h1>

<!-- <h6 class="warn"><?php echo $error; ?></h6> -->
            <br><br>
        </section>

        <!--      Start footer       -->
        <?php include("Footer.php"); ?>
        <!--    end footer     -->
    </body>
</html>