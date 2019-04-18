<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
$id= $_SESSION['id'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path, $type)) {
    header("Location: ../Start/privent_admin.php");
    exit();
}
include_once '../../../classes/Student.php';
include_once '../../../classes/Question.php';
include_once '../../../classes/Course.php';
include 'header.php';
if (isset($_POST['done'])) {
    $ques = $userid = $course_id = '';
    if (empty($_POST['q'])) {
        echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> Please Enter The Question</div>
                        ';
    } else {
        $ques = test_input($_POST['q']);
    }
    if (!empty($ques)) {
        $user = new Student();
        $user->setId($id);
        $qq = new Question();
        $qq->setCourseID($_POST['selco']);
        $qq->setQuestion($ques);
        if ($user->AskQuestion($qq, $user)) {
            echo'
                          
                        <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Done .</strong> Your Question added Successfully
                        <a href="question.php"><strong>Click Here</strong></a> To Show it
                        </div>
                        ';
        } else {
            echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> Error</div>
                        ';
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="../../Css/Resources/css/bootstrap.min.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../Css/Resources/css/bootstrap.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../Css/Resources/js/bootstrap.min.js" >
        <link href="../../Css/Resources/fonts/glyphicons-halflings-regular.eot">
    </head>
    <body>
        <form class="form-control" method="post" >
            <div class="well" >
                <div class="form-group ">
                    <label class="col-lg-2 lable " >Select Course : </label>
                    <select class="col-lg-5 input-sm" name="selco">

                        <?php
                        $s = new Student();
                        $s->setId($id);
                        $courses = $s->getRegisterCourses($s);
                        for ($i = 0; $i < count($courses); $i++) {
                            echo '<option value =' . $courses[$i]["c_id"] . '>';   //fe mo4kla f el value w kman b3d kda hit8air el table ll courses ely msglha el student
                            echo " {$courses[$i]['c_name']}</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label class="col-lg-12 control-label" >Enter your Question  :</label>
                    <textarea name="q" class="form-control" required="required"></textarea>
                </div>
                <button name="done" class="btn btn-primary">Done</button>

            </div>
        </form>

    </body>
</html>