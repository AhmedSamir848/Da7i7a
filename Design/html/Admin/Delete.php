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

require './Listdbtable.php';
if (isset($_POST['DeleteStd'])) {
DrawTable("student", "student");
} else if (isset($_POST['DeleteProf'])) {
DrawTable("user", "prof");
} else if (isset($_POST['DeleteCourse'])) {
DrawTable("course", "course");
} else if (isset($_POST['DeleteUniv'])) {
DrawTable("university", "univ");
} else if (isset($_POST['DeleteFac'])) {
DrawTable("faculty", "fac");
} else if (isset($_POST['DeleteQues'])) {
DrawTable("q_reply", "ques");
} else if (isset($_POST['DeleteCompQues'])) {
DrawTable("q_choices", "compques");
} else if (isset($_POST['DeleteRep'])) {
DrawTable("report", "rep");
} else if (isset($_POST['DeleteTeam'])) {
DrawTable("team", "team");
} else if (isset($_POST['DeleteMate'])) {
DrawTable("uploaded_files", "materials");
}
require_once 'DeleteHome.php';
?>
