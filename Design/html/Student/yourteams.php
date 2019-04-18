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
include_once '../../../classes/Student.php';
include_once '../../../classes/Team.php';
include_once '../../../classes/DB.php';
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


        <?php
        $s = new Student();
        $s->setId($_SESSION['id']);

        if (isset($_POST['del'])) {
            $t_id = $_POST['del'];
//                echo $t_id;
            $s->DeleteTeam($t_id);
        }
        $db = DB::getInstance();
        $result = $db->select_all('team');
        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]['leader_id'] == $s->getId()) {
                echo "<div class=\"col-lg-8 swteams\" id=''>";
                echo"<form class='form control' method='post'>";
                echo "<pre class='col-lg-12 '  id=  >";
                echo "<strong>About The Team : </strong>" . " " . $result[$i]['t_details'] . "</br>";
                echo "<strong>Team Maximum Number : </strong>" . " " . $result[$i]['max_num'] . "</br>";
                echo "<strong>Team Actual Number : </strong>" . " " . $result[$i]['actual_num'] . "</br>";
                $team_id = $result[$i]['team_id'];
                echo"<button class='btn btn-danger btnleft del' id='$team_id'  value='$team_id' name='del'>Delete</button>";
                echo "</pre>";
                echo '</form>';
                echo "</div>";
            }
        }
        ?>

    </body>
</html>