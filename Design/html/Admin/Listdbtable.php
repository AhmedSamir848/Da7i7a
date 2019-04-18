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
<link href="../../Css/Admin/Admin.css" rel="stylesheet" >
<link href="../../Css/Admin/ManipulateCompQuestions.css" rel="stylesheet">
<a href="AdminPannel.php?Option=5" style="
   font-size: 50px;
   margin: 10% 36%;
   "> Back To Home </a>
<?php
require '../../../Classes/Admin.php';

$ad = new Admin();

switch (@$_GET['dt']) {
    case "student":
        $ad->DeleteStudent();
        DrawTable("student", "student");
        break;
    case "prof" :
        $ad->DeleteDoctor();
        DrawTable("user", "prof");

        break;
    case "course":
        $ad->DeleteCourse();
        DrawTable("course", "course");

        break;
    case "univ":
        $ad->Deleteuniversity();
        DrawTable("university", "univ");

        break;
    case "fac":
        $ad->DeleteFaculty();
        DrawTable("faculty", "fac");

        break;
    case "ques":
        $ad->DeleteQuestion();     // BREAKE POINT DELETE COMPETETION QUESTION OR ORDINARY QUESTION 
        DrawTable("q_reply", "ques");

        break;
    case "compques":
        $ad->DeleteCompQuestion();     // BREAKE POINT DELETE COMPETETION QUESTION OR ORDINARY QUESTION 
        DrawTable("q_choices", "compques");

        break;
    case "rep":
        $ad->DeleteReport();
        DrawTable("report", "rep");

        break;
    case "team":
        $ad->DeleteTeam();
        DrawTable("team", "team");

        break;
    case "materials":
        $ad->DeleteMaterial();
        DrawTable("uploaded_files", "materials");

        break;
    default:
        break;
}

function DrawTable($TName, $deletetype) {
    include_once '../../../classes/System.php';
    // USER TYPE 1 => ADMIN , 2 => STUDENT , 3 => PROFESSOR 
    // USER TYPE 1 => ADMIN , 2 => STUDENT , 3 => PROFESSOR 
    $sys = new System();
    $tarr = $sys->delete_from_table($TName, $deletetype);
    // DRAW TABLE 
    echo "<div id=\"QTable\">";
    echo "<table border=3 width=100% >";
    echo "<tr>";
    foreach ($tarr as $key => $value) {
        foreach ($value as $r => $c) {
            echo "<th style=\"background-color: gray;color: white;\">";
            echo $r . "<br>";
            echo "</th>";
        }
        break;
    }

    echo '<th>';
    echo"Option";
    echo '</th>';
    echo "</tr>";
    $firstelementval = "one";
    $firstelementname = "name";
    foreach ($tarr as $key => $value) {
        echo "<tr>";
        foreach ($value as $row => $colval) {
            if ($firstelementval == "one") {
                $firstelementval = $colval;
                $firstelementname = $row;
            }
//
            echo "<td >";
            echo $colval;
            echo "</td>";
        }
        echo '<td><form method="post" action= "Listdbtable.php?fcona=' . $firstelementname . '&tname=' . $TName . '&dt=' . $deletetype . '" width: 100%;  >'
        . '<input type="hidden" name="id" value=' . $firstelementval . ' id="td1">'
        . '<input type="submit" name="delete" value="Delete" style=" width: 100%; ">'
        . '</form></td></tr>';

        echo "</tr>";
        $firstelementval = "one";
    }


    echo "</table>";
    echo "</div>";
}
?>