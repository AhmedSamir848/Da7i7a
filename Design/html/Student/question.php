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
//note q_id course_id , value of question id ,value of course id $ el reply added to the question on the page
include 'header.php';
include_once '../../../classes/Student.php';
include_once '../../../classes/Question.php';
include_once '../../../classes/Course.php';

if (isset($_POST['comment'])) {

    $comm = "";
    $qid = "";
    $qid = $_POST['comment'];

    if (empty($_POST['comta'])) {
        echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> Please Enter your Comment!.</div>
                        ';
    } else {
        $comm = trim($_POST['comta']); //3l4an el textarea bia5od value 7ata lw m4 ktbt
        if ($comm == "")
            echo 'error';
        else {
            $user = new Student();
            $user->setId(1);
            $user->ReplyQuestion($user, $comm, $qid);
        }
    }
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
        <!--        <link href="../../Css/Resources/style.css" rel="stylesheet">-->
    </head>
    <body>
        <div class="container">
            <div class="row">


                <form class="form-control" method="post">
                    <label class="col-sm-2 control-label">Select Course:</label>
                    <select class="col-lg-3 input-sm" name="selco">
                        <?php
                        $s = new Student();
                        $s->setId(1);
                        $courses = $s->getRegisterCourses($s);
                        for ($i = 0; $i < count($courses); $i++) {
                            echo '<option value =' . $courses[$i]["c_id"] . '>';   //fe mo4kla f el value w kman b3d kda hit8air el table ll courses ely msglha el student
                            echo " {$courses[$i]['c_name']}</option>";
                        }
                        ?>

                    </select>
                    <button type="submit" class="btn-success" name="submit">Search</button>
                </form></br>
                <?php
                if (isset($_POST['submit'])) {
                    $c_id = $_POST['selco'];
                    $q = new Question();
                    $info = $q->getSpecficQuestion($c_id);
                }
                ?>
            </div>

        </div>
    </body>
</html>
