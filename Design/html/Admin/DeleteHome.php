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
<link rel="stylesheet" type="text/css" href="../../Css/Admin/Delete.css">

<section class="Container">

    <form action="AdminPannel.php?Option=5" method="POST" >

        <input type="submit" name="DeleteStd" value="Delete Student" id="Dbtn">  

        <input type="submit" name="DeleteProf" value="Delete Professor" id="Dbtn">

        <input type="submit" name="DeleteCourse" value="Delete Course" id="Dbtn">

        <input type="submit" name="DeleteUniv" value="Delete University" id="Dbtn">

        <input type="submit" name="DeleteFac" value="Delete Faculty" id="Dbtn">

        <input type="submit" name="DeleteQues" value="Delete Question" id="Dbtn">

        <input type="submit" name="DeleteCompQues" value="Delete Competetion Question" id="Dbtn">

        <input type="submit" name="DeleteRep" value="Delete Report" id="Dbtn">

        <input type="submit" name="DeleteTeam" value="Delete Team" id="Dbtn">

        <input type="submit" name="DeleteMate" value="Delete Material" id="Dbtn">

    </form>
</section>
