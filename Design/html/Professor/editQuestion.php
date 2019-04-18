<?php
//error_reporting(E_ERROR);
//session_start();
//$type = $_SESSION['type'];
//include_once './../../../classes/System.php';
//$sys = new System();
//$path = basename(__FILE__, '.php');
//if (!$sys->check_accessability($path, $type)) {
//    header("Location: ../Start/privent_admin.php");
//    exit();
//}
?>

<?php
error_reporting(E_ERROR);
include '../../../classes/System.php';
include '../../../classes/Question_Competetion.php';
$qc = new Question_Competion();
$sys = new System;
$arr = array("q_id", "question");
$sys->ViewTable($arr, "question", "question_type", 2);
if (isset($_POST['retrieve'])) {
    $q_id = $_POST['Ques_ID'];
    $retrieve = $qc->RetrieveQ_C($q_id);
}
if (isset($_POST['Submit'])) {
    $qid = $_POST['Questionid'];
    $Question = $_POST['Question'];
    $Choice1 = $_POST['Choice1'];
    $Choice2 = $_POST['Choice2'];
    $Choice3 = $_POST['Choice3'];
    $Choice4 = $_POST['Choice4'];
    $RightAnswer = $_POST['right'];
    if ($RightAnswer == $Choice1 || $RightAnswer == $Choice2 || $RightAnswer == $Choice3 || $RightAnswer == $Choice4) {

        $arrQ = array('question' => $Question);
        $arrC = array('ch1' => $Choice1, 'ch2' => $Choice2, 'ch3' => $Choice3, 'ch4' => $Choice4, 'answer' => $RightAnswer);
        $qc->EditQuestion($arrQ, $arrC, $qid);
    }
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
        <div class="container">
            <form method="post" action="">
                <div class="Div_ID">
                    <label>Enter Question ID To Edit on it</label><br>
                    <input type="number" name="Ques_ID" class="edit">
                </div>
                <div class="Options1">
                    <button type="Add" class="Options" id="Editbtn" name="retrieve">Retrieve Question</button>
                </div>  
            </form>

            <form action="" method="post" class="form2">
                <div id="QTable">
                    <label class="Question" >Question id</label>
                    <input type="text" name="Questionid" class="Question" value="<?php echo $q_id ?>" required><br>
                    <label class="Question" >Question</label>
                    <input type="text" name="Question" class="Question" value="<?php echo $retrieve['question']; ?>" required><br>
                    <label class="Question" >Choice1</label>
                    <input type="text" name="Choice1" class="Answer" value="<?php echo $retrieve['ch1']; ?>" required><br>
                    <label class="Question" >Choice2</label>
                    <input type="text" name="Choice2"  class="Answer" value="<?php echo $retrieve['ch2']; ?>" required><br>
                    <label class="Question" >Choice3</label>
                    <input type="text" name="Choice3"  class="Answer" value="<?php echo $retrieve['ch3']; ?>" required><br>
                    <label class="Question" >Choice4</label>
                    <input type="text" name="Choice4" class="Answer" value="<?php echo $retrieve['ch4']; ?>" required><br>
                    <label class="Question" >Correct answer</label>
                    <input type="text" name="right"  class="Answer" value="<?php echo $retrieve['answer']; ?>" required><br>
                    <input type="submit" name="Submit" id="SubmitEditebtn" class="Options" value="Edit">
                </div>
            </form>
    </body>
</html>
