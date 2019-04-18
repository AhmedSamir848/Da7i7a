<?php
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';

class Course {

    private $courseName;
    private $courseID;

    function getCourseName() {
        return $this->courseName;
    }

    function getCourseID() {
        return $this->courseID;
    }

    function setCourseName($courseName) {
        $this->courseName = $courseName;
    }

    function setCourseID($courseID) {
        $this->courseID = $courseID;
    }

    //new 
    function getspecificCourse($c_id) {
        $db = DB::getInstance();
        $course = $db->select_one('course', 'c_id', $c_id);
        return $course;
    }

    //new 
    function selectCourses() {
        $db = DB::getInstance();
        return $db->select_all('course');
    }

}
