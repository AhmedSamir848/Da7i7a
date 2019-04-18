<?php
session_start();
error_reporting(E_ERROR);
$type = $_SESSION['type'];
$id = $_SESSION['id'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path, $type)) {
    header("Location: ../Start/privent_admin.php");
    exit();
}
include 'header.php';
include_once '../../../classes/Team.php';
include_once '../../../classes/Student.php';
include_once '../../../classes/Course.php';
//error_reporting(E_ERROR);

$course_id = $team_desc = $actualnum = $maxnum = "";
if (isset($_POST['done'])) {

    $course_id = $_POST['selco'];
    if (empty($_POST["maxnum"])) {
        echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> please enter the max number of your team</div>
                        ';
    } else {
        $maxnum = test_input($_POST["maxnum"]);
    }
    if (empty($_POST["actualnum"])) {
        echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> please enter the actual number of your team</div>
                        ';
    } else if ($maxnum < $_POST['actualnum']) {
        echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong>Please Enter the actual number correct</div>
                        ';
    } else {
        $actualnum = test_input($_POST["actualnum"]);
    }
    if (empty($_POST["tdesc"])) {
        echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong>please enter the description about your team</div>
                        ';
    } else {
        $team_desc = test_input($_POST["tdesc"]);
    }

    if (!empty($actualnum) && !empty($maxnum) && !empty($team_desc)) {
        $user = new Student();
        $t = new Team();
        $t->setTeamDesc($team_desc);
        $t->setMaxNumber($maxnum);
        $t->setActuallNumber($actualnum);
        $user->setId($id);
        $user->CreateTeam($t, $user, $course_id);
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
        <link rel="shortcut icon" href="../../images/pp.png" />
        <title>Da7i7a - Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../Css/Resources/css/bootstrap.min.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../Css/Resources/css/bootstrap.css" rel="stylesheet" >
        <link href="../../Css/Resources/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../Css/Resources/js/bootstrap.min.js" >
        <link href="../../Css/Resources/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <style>
            .ct .form-group{
                margin: 10px;
            }
            .ct input ,textarea ,select{
                margin: 10px;
            }


        </style>
    </head>
    <body>
        <div class="well col-lg-12 ct">
            <form class="form-control" method="post" name="createteam">
                <div class="form-group">
                    <label class="col-lg-5 lable " >Select Course : </label>
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
                    <label class="col-lg-5 lable " > Team Max numbers </label>
                    <input type="number" class="col-lg-5  input-lg" name="maxnum" min="2" max="20" required="required">

                    <label class="col-lg-5 lable " >Team Actual numbers</label>
                    <input type="number" class="col-lg-5 input-lg" name="actualnum" min="2" max="20" required="required">
                    <label class="col-lg-5 lable " >Team Description</label>
                    <textArea cols="20" rows="10" required="required" class="col-lg-5 input-lg" placeholder="Tell them about your team members and description about your team" name="tdesc"></textArea>
                 <button class="col-lg-1 btn-primary" name="done">Done</button>
                    </div>
                </form>
        </div>
    </body>
</html>
