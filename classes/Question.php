<?php

error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';

class Question {

    private $Question;
    private $QuestionID;
    private $QuestionDate;
    private $course_id;

    function getCourseID() {
        return $this->course_id;
    }

    function setCourseID($course) {
        $this->course_id = $course;
    }

    function getQuestion() {
        return $this->Question;
    }

    function getQuestionID() {
        return $this->QuestionID;
    }

    function getQuestionDate() {
        return $this->QuestionDate;
    }

    function setQuestion($Question) {
        $this->Question = $Question;
    }

    function setQuestionID($QuestionID) {
        $this->QuestionID = $QuestionID;
    }

    function setQuestionDate() {
        $this->QuestionDate;
    }

    function AddQuestion(Question $q, Course $course, USER $user) {
        $db = DB::getInstance(); //object mn el database
        $Q_tableName = 'question'; //assign question tablename to variable  
        echo 'hello from add question :)';
        $ArrayQuestion = array("question" => $q->getQuestion(), "user_id" => $user->getId(), "course_id" => $course->getCourseID(),"question_type"=>2); //hna hn5ly el7aga tb2a f array
        $Q_insert = $db->insert($ArrayQuestion, $Q_tableName); //insert to database
        echo '<pre>';
        print_r($Q_insert);
                echo '</pre>';

        }
    //new 
    function getSpecficQuestion($CourseID) {
        $db = DB::getInstance(); //object mn el database
        $result = $db->select_all('question');
        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]['question_type'] == 1 && $result[$i]['course_id']==$CourseID) {
                echo '<form class="form-group" method="post">';
                echo '  <div class="col-lg-12"> ';
                echo "<div class=\"col-lg-12\" id=\"ques\">";
                echo "<div class=\"col-lg-12 \" >";
                echo '<pre>';
                echo $result[$i]['question'];
                echo '</pre>';
                echo '</div>';
                echo "<form class='\col-lg-12 form-inline\'method=\"post\">";
                echo "<div class=\"col-lg-12 form-gorup\">";
                $qid = $result[$i]['q_id'];
                echo "<textarea class='form-group' name='comta' cols='50' rows='1' value='$qid' required='required'></textarea>";
                echo "<button name='comment' class='btn btn-success' value= '$qid' >Comment</button>";
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
     //new 
    function getUser($user_id){
        $db = DB::getInstance(); //object mn el database
        $result=$db->select_one('user', 'user_id', $user_id);
        return $result;
    }


}
