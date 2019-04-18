<?php
include 'C:\xampp\htdocs\SW1Project\classes\Question.php';
error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';

class Question_Competion extends Question {

    private $question;
    private $QID;
    private $choice1;
    private $choice2;
    private $choice3;
    private $choice4;
    private $RightAnswer;

    function getRightAnswer() {
        return $this->RightAnswer;
    }

    function setRightAnswer($RightAnswer) {
        $this->RightAnswer = $RightAnswer;
    }

    function getQuestion() {
        return $this->question;
    }

    function getQID() {
        return $this->QID;
    }

    function getChoice1() {
        return $this->choice1;
    }

    function getChoice2() {
        return $this->choice2;
    }

    function getChoice3() {
        return $this->choice3;
    }

    function getChoice4() {
        return $this->choice4;
    }

    function setQuestion($question) {
        $this->question = $question;
    }

    function setQID($QID) {
        $this->QID = $QID;
    }

    function setChoice1($choice1) {
        $this->choice1 = $choice1;
    }

    function setChoice2($choice2) {
        $this->choice2 = $choice2;
    }

    function setChoice3($choice3) {
        $this->choice3 = $choice3;
    }

    function setChoice4($choice4) {
        $this->choice4 = $choice4;
    }

//hna function add hta5od 4 prameter 
    // 1)object mn class question_Competion 2)object mn class question 3)hta5od el course id 4)w object mn el user
    function ADDCompQuestion(Question_Competion $qq, Question $q, Course $course, USER $user) {
        $db = DB::getInstance(); //object mn el database
        $QT_name = "question";
        $this->AddQuestion($q, $course, $user);
        $L_ID = $db->getLastElement('q_id', $QT_name);
        $CH_tableName = 'q_choices'; //assign questionchoices tablename to variable
        $ArrayChoices = array("ch1" => $qq->getChoice1(), "ch2" => $qq->getChoice2(), "ch3" => $qq->getChoice3(), "ch4" => $qq->getChoice4(), "answer" => $qq->getRightAnswer(), "q_id" => $L_ID['q_id']);
        $Ch_insert = $db->insert($ArrayChoices, $CH_tableName); //insert to database
    }

    //hna f el function de htrag3 el question b el choices f array w hn2dr ntl3ha f el inputs w edit 3leha
    //hta5od el question id bs
    function RetrieveQ_C($q_id) {
        $db = DB::getInstance(); //object mn el database
        $QT_Name = 'question'; //tablename
        $CT_Name = 'q_choices'; //tablename
        $arrQ = array("q_id", "question");
        $arrC = array("ch1", "ch2", "ch3", "ch4", "answer");
        $Q_select = $db->select_Specific_cols($arrQ, $QT_Name, "q_id", $q_id); //select array feha el question mn el database
        echo '<pre>';
        print_r($Q_select);
        echo '</pre>';
        $C_select = $db->select_Specific_cols($arrC, $CT_Name, "q_id", $q_id); //select array feha el choices mn el database
        echo '<pre>';
        print_r($C_select);
        echo '</pre>';
        $result = array_merge($Q_select, $C_select); //hna h3ml merge ll 2 array m3 b3d f array wa7da 
        echo '<pre>';
        print_r($result);
        echo '</pre>';

        if ($result) {
            return $result; //return el array de
        } else {
            echo 'bo2s';
        }
    }

    function EditQuestion($arrayQ, $arrayC, $q_id) {
        $db = DB::getInstance(); //object mn el database
        $Q_tableName = 'question'; //assign question tablename to variable
        $CH_tableName = 'q_choices'; //assign questionchoices tablename to variable
        $Q_update = $db->update($arrayQ, $Q_tableName, 'q_id', $q_id); //hna ht3ml updata ll question
        $Ch_update = $db->update($arrayC, $CH_tableName, 'q_id', $q_id); //hna updata ll choices 
        if ($Q_update && $Ch_update) {
            return 1;
        } else {
            return 0;
        }
    }

    //function delete question hta5od el question id 
    function DeleteQuestion($Question_id) {
        $db = DB::getInstance(); //object mn el database
        $Q_tableName = 'question'; //assign question tablename to variable
        $CH_tableName = 'q_choices'; //assign questionchoices tablename to variable
        $Q_delete = $db->Delete($Q_tableName, "q_id", $Question_id); //delete question from table question
        $Ch_delete = $db->Delete($CH_tableName, "question_id", $Question_id); //delete choices from table question choices
        if ($Q_delete && $Ch_delete) {
            echo 'hii';
        } else {
            echo 'shokran';
        }
    }

}

?>