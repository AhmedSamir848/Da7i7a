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
<head>
    <link href="../../Css/Admin/ManipulateCompQuestions.css" rel="stylesheet" >
    <link href="../../Css/Admin/Admin.css" rel="stylesheet" >
    <link href="../../Css/Admin/responsive.css" rel="stylesheet" >
</head>
<form action="" method="post">
    <div id="QTable">
        <label class="Question" >Question</label>
        <input type="text" name="Question" placeholder="Question" class="Question">
        <label class="Question" >Choice1</label>
        <input type="text" name="Choice1" placeholder="Answer1" class="Answer">
        <label class="Question" >Choice2</label>
        <input type="text" name="Choice2" placeholder="Answer2" class="Answer">
        <label class="Question" >Answer3</label>
        <input type="text" name="Choice3" placeholder="Answer3" class="Answer">
        <label class="Question" >Choice4</label>
        <input type="text" name="Choice4" placeholder="Answer4" class="Answer">
        <label class="Question" >RightAnswer</label>
        <input type="text" name="RightAnswer" placeholder="Right Answer" class="Answer">
        <input type="submit" name="Submit" id="SubmitEditebtn">
    </div>
</form>
<?php
require_once "BackToAdminPannel.php";
?>