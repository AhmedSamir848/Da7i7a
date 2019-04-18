<?php
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';
include_once 'Student.php';

class Team {

    private $student;
    private $CourseName;
    private $TeamId;
    private $TeamDesc;
    private $MaxNumber;
    private $ActuallNumber;

    function getStudent() {
        return $this->student;
    }

    function getCourseName() {
        return $this->CourseName;
    }

    function getTeamId() {
        return $this->TeamId;
    }

    function getTeamDesc() {
        return $this->TeamDesc;
    }

    function getMaxNumber() {
        return $this->MaxNumber;
    }

    function getActuallNumber() {
        return $this->ActuallNumber;
    }

    function setStudent($student) {
        $this->student = $student;
    }

    function setCourseName($CourseName) {
        $this->CourseName = $CourseName;
    }

    function setTeamId($TeamId) {
        $this->TeamId = $TeamId;
    }

    function setTeamDesc($TeamDesc) {
        $this->TeamDesc = $TeamDesc;
    }

    function setMaxNumber($MaxNumber) {
        $this->MaxNumber = $MaxNumber;
    }

    function setActuallNumber($ActuallNumber) {
        $this->ActuallNumber = $ActuallNumber;
    }

    //new 
    function getTeams() {
        $db =  DB::getInstance();
        $allteams = $db->select_all('team');
        $c_id;
        $leader_id;
        $count = 0 ;
        for ($i = 0; $i < count($allteams); $i++) {
            $c_id[$i] = $allteams[$i]['course_id'];
            $leader_id[$i] = $allteams[$i]['leader_id'];
            $count++ ;
        }
        $j = 0;
        $leaders = $courses = "";
        while ($j < count($c_id) && $j < count($leader_id)) {
            $courses[$j] = $db->select_one('course', 'c_id', $c_id[$j]);
            $leaders[$j] = $db->select_one('user', 'user_id', $leader_id[$j]);
            $j++;
        }
        $s = 0;
        $courses_name = $leaders_name = "";
        while ($s < count($courses) && $s < count($leaders)) {
            $courses_name[$s] = $courses[$s]['c_name'];
            $fullname = $leaders[$s]['userfname'] . " " . $leaders[$s]['userlname'];
            ;
            $leaders_name[$s] = $fullname;
            $s++;
        }
        $Teams = "";
        for ($i = 0; $i < count($allteams); $i++) {
            for ($j = 0; $j < 8; $j++) {
                $Teams[$i] = array("leader_name" => $leaders_name[$i],
                    "course_name" => $courses_name[$i],
                    "max_num" => $allteams[$i]['max_num'],
                    "actual_num" => $allteams[$i]['actual_num'],
                    "t_details" => $allteams[$i]['t_details'],
                    "team_id" => $allteams[$i]['team_id'],
                    "course_id" => $allteams[$i]['course_id'],
                    "leader_id" => $allteams[$i]['leader_id']);
            }
        }

        return $Teams;
    }

//new 
    function getSpecficTeams(Student $s) {
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
                echo"<button class='btn btn-danger btnleft'>Delete</button>";
                echo "</pre>";
                echo '</form>';
                echo "</div>";
            }
        }
    }

    function getRequests() {
        $db = DB::getInstance();
        $res = $db->select_all('requests');
        return $res;
    }

}
