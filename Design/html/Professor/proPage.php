<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path,$type)) {
        header("Location: ../Start/privent_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
     <head>
       <meta charset="utf-8">
        <title>Professor page</title>
      <link href="../../Css/Professor/Admin.css" rel="stylesheet" >
      <link href="../../Css/Professor/ManipulateCompQuestions.css" rel="stylesheet">
      <link href="../../Css/Professor/responsive.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../Css/Resources/css/bootstrap.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../Css/Resources/js/bootstrap.min.js" >
        <link href="../../Css/Resources/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>

     </head>
     <body>
         <!---------------------- START HEADER ----------------->
           <?php
              require_once "Header.php";
           ?>
         <!-------------------------- NAV BAR--------------------->
           <?php
              require_once "Navbar.php";
           ?>
         <!------------------------ END HEADER ----------------->
         
         <!------------------------ Footer ----------------->
         <?php
             // require_once "Footer.php";
         ?>
         


 </body>
</html>