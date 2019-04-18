<?php
//session_start();
//error_reporting(E_ERROR);
//$type = $_SESSION['type'];
//include_once './../../../classes/System.php';
//$sys = new System();
//$path = basename(__FILE__, '.php');
//if (!$sys->check_accessability($path, $type)) {
//    header("Location: ../Start/privent_admin.php");
//    exit();
//}
?>
<?php include 'proPage.php';
      include '../../../classes/Question_Competetion.php';
      include '../../../classes/System.php';
$sys = new System;
$arr=array("q_id","question");
$sys->ViewTable($arr,"question","question_type",2);
      $QC=new Question_Competion();
      if (isset($_POST['delete'])){
      $q_id=$_POST['Ques_ID'];
      $QC->DeleteQuestion($q_id);
      echo 'yessssssss';
      }
      ?>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="../../Css/Admin/ManipulateCompQuestions.css" rel="stylesheet">
    <link href="../../Css/Admin/Admin.css" rel="stylesheet">
    <link href="../../Css/Admin/responsive.css" rel="stylesheet" >
    </head>
    <body>
<form method="post" action="">
<div class="Div_ID">
            <label>Question ID</label><br>
            <input type="number" name="Ques_ID">
            
        </div>
<button type="Delete" class="Options" id="DeleteQuesbtn" name="delete">Delete</button>
</form>
    </body>
</html>