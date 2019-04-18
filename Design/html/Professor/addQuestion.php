<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
$id = $_SESSION['id'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path, $type)) {
    header("Location: ../Start/privent_admin.php");
    exit();
}
?>
<?php
require_once "proPage.php";

error_reporting(E_ERROR);
include_once '../../../classes/Question_Competetion.php';
include_once '../../../classes/Question.php';
include '../../../classes/Course.php';
include '../../../classes/USER.php';
$q = new Question();
$user = new USER();
$C = new Course();
$C->setCourseID('1');
$user->setId($id);
$QC = new Question_Competion();
if (isset($_POST['Submit'])) {
    $Question = $_POST['Question'];
    $Choice1 = $_POST['Choice1'];
    $Choice2 = $_POST['Choice2'];
    $Choice3 = $_POST['Choice3'];
    $Choice4 = $_POST['Choice4'];
    $RightAnswer = $_POST['right'];
    if ($RightAnswer == $Choice1 || $RightAnswer == $Choice2 || $RightAnswer == $Choice3 || $RightAnswer == $Choice4) {
        $q->setQuestion($Question);
        $QC->setChoice1($Choice1);
        $QC->setChoice2($Choice2);
        $QC->setChoice3($Choice3);
        $QC->setChoice4($Choice4);
        $QC->setRightAnswer($RightAnswer);
    }
    $result = $QC->ADDCompQuestion($QC, $q, $C, $user);
    if ($result) {
        echo 'mar7b y 3m el 7ag';
    }
}// check if right answer is one of the 4 choices
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
        <div class="container">     

            <form action="" method="post" class="form2">
                <div id="QTable">
                    <!--
                    <label class="Question" >Question id</label>
                    <input type="text" name="Questionid" class="Question"  required><br> -->
                    <label class="Question" >Question</label>
                    <input type="text" name="Question" class="Question"  required><br>
                    <label class="Question" >Choice1</label>
                    <input type="text" name="Choice1" class="Answer"  required><br>
                    <label class="Question" >Choice2</label>
                    <input type="text" name="Choice2"  class="Answer"  required><br>
                    <label class="Question" >Choice3</label>
                    <input type="text" name="Choice3"  class="Answer" required><br>
                    <label class="Question" >Choice4</label>
                    <input type="text" name="Choice4" class="Answer"  required><br>
                    <label class="Question" >Correct answer</label>
                    <input type="text" name="right"  class="Answer" required><br>
                    <input type="submit" name="Submit" id="SubmitEditebtn"  value="ADD">
                </div>
            </form>
        </div>
    </body>
</html>