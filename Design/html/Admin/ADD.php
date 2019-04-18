<?php

include '../../../classes/User.php';
include_once '../../../classes/course.php';
$U = new USER();
$C = new course();
if (isset($_POST["Add_course"])) {
    include './ADDCourse.php';
}
if (isset($_POST['add'])) {
    $Course_name = $_POST['Course'];
    $C->setCourseName($Course_name);
    $U->ADD_Course($C);
}
if(isset($_POST['ADD'])){
    $U_id=$_POST['User_ID'];
    $U->AddAdmin($U_id);
     include './addAdmin.php';
}

if (isset($_POST["Add_Admin"])) {
    include './addAdmin.php';
}
?>
<section class="Container">
    <form method="POST" action="AdminPannel.php?Option=6">
        <input type="submit" name="Add_course" value="ADD Course" id="Dbtn">  
        <input type="submit" name="Add_Admin" value="ADD Admin" id="Dbtn">
    </form>
</section>