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
include 'header.php';
include '../../../classes/Team.php';
include_once '../../../classes/Student.php';
//error_reporting(E_ERROR);

$user = new Student();
$user->setId($_SESSION['id']); //elmford b2a b3d maytzbat el id dh yb2a lly da5el now
if (isset($_POST['join'])) {
    $to = $_POST['join'];
    $user->SendJoinRequest($user, $to);
}
if (isset($_POST['del'])) {
    $t_id = $_POST['del'];
    $user->DeleteTeam($t_id);
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
        <link href="../../Css/Resources/style.css" rel="stylesheet">
        <style>
            .alltem {
                margin: 10px;
                padding: 10px;
            }
            .btnleft{
                float: left;
                padding: 10px;
                width:auto;
                height: auto;
                margin: 10px;
            }
            .swteams pre{
                font-size: 20px;
                font-family:monospace ;
                height: auto;
            }
            .swteams strong {
                color: #c7254e;
            }
            .crsfrm{
                padding: 10px;
            }
            .crsfrm button{
                margin-left: 20px;
                position: absolute;
            }
        </style>

    </head>
    <body>

        <div class="alltem">
            <?php
            $team = new Team();
            $allteams = $team->getTeams();

            $reqs = $team->getRequests();
            for ($i = 0; $i < count($allteams); $i++) {
                $team_id = $allteams[$i]['team_id'];
                if ($allteams[$i]['leader_id'] == $user->getId()) {   // 2 hena tt3adel bel user ely da5el nw
                    echo "<div class=\"col-lg-8 swteams\" id=''>";
                    echo"<form class='form control' method='post'>";
                    echo "<pre class='col-lg-12 '  id=  >";
                    echo "<strong>About The Team : </strong>" . " " . $allteams[$i]['t_details'] . "</br>";
                    echo "<strong>Team Maximum Number : </strong>" . " " . $allteams[$i]['max_num'] . "</br>";
                    echo "<strong>Team Actual Number : </strong>" . " " . $allteams[$i]['actual_num'] . "</br>";
                    $team_id = $allteams[$i]['team_id'];
                    echo"<button class='btn btn-danger btnleft del' id='$team_id'  value='$team_id' name='del'>Delete</button>";
                    echo "</pre>";
                    echo '</form>';
                    echo "</div>";
                } else {
                    echo "<div class=\"col-lg-8 swteams\" id='$team_id'>";
                    echo"<form class='form control' method='post'>";
                    echo "<pre class='col-lg-12 '  id=$team_id  >";
                    echo "<strong>Leader Name : </strong>" . " " . $allteams[$i]['leader_name'] . "</br>";
                    echo "<strong>Course Name : </strong>" . " " . $allteams[$i]['course_name'] . "</br>";
                    echo "<strong>Team Maximum Number : </strong>" . " " . $allteams[$i]['max_num'] . "</br>";
                    echo "<strong>Team Actual Number : </strong>" . " " . $allteams[$i]['actual_num'] . "</br>";
                    echo "<strong>About The Team : </strong>" . " " . $allteams[$i]['t_details'] . "</br>";
                    $leader_id = $allteams[$i]['leader_id'];
                    echo"<button class='btn btn-success btnleft join' id='$team_id'  value='$leader_id' name='join'>Join</button>";
                    echo"<button class='btn btn-warning btnleft'>Send a Message</button>";
                    echo"<button class='btn btn-danger btnleft'>Report</button>";
                    echo "</pre>";
                    echo '</form>';
                    echo "</div>";
                }
            }
            ?>
        </div>
    </body>
</html>
<script>
    $(document).ready(function () {
        $('.join').click(function () {
            $(this).hide(1000);
            var id = $(this).attr('id');
            $('#'.id).remove();
        });
    });
</script>