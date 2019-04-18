<?php
session_start();
$type = $_SESSION['type'];
$id= $_SESSION['id'];
// echo $type;
// echo $id;

include_once '../../../classes/Student.php';
// include_once '../../../classes/User.php';
// include_once '../../../classes/Course.php';
$s = new Student();
$s->setId($id); // from session
$courses = $s->getRegisterCourses($s);
for ($i = 0; $i < count($courses); $i++) {
    echo '<option value =' . $courses[$i]["c_id"] . '>';   //fe mo4kla f el value w kman b3d kda hit8air el table ll courses ely msglha el student
    echo " {$courses[$i]['c_name']}</option>";
}
 ?>
