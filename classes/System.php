<?php

$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';

class System {

    function timer() {
        
    }

    //function calculatePoints(){}
    function RankDa7i7() {
        
    }

    function RankSuperDa7i7() {
        
    }

//    function GenerateUserId(){}
//    function GenerateCourseId(){}
//    function GenerateQuestionId(){}
    function GenerateReportId() {
        
    }

    function Checkonline() {
        
    }

    function ActiveUser() {
        
    }

    function ChooseRandomActiveUser() {
        
    }

    function ViewTable($arr, $T_name, $col, $val) {
        $db = DB::getInstance();
        $result = $db->select_Specific_cols_return_all($arr, $T_name, $col, $val);
        echo "<div id=\"QTable\">";
        echo "<table border=5 width=100% >";
        echo "<tr><th>Question ID</th><th>Competetion Question</th></tr>";
        for ($i = 0; $i < count($result); $i++) {
            echo "<tr>";
            echo "<th>" . $result[$i]['0'] . "</th>" . "<th>" . $result[$i]['1'] . "</th>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }

    function delete_from_table($TName, $deletetype) {
        $db = DB::getInstance();
        switch ($deletetype) {
            case "student":
// CONDITION = 1 = ALWAYES TRUE 
                $tarr = $db->fulljoin("*", $TName, "user", "user.user_id = student.user_id AND usertypeid=2");
                break;
            case "prof":
                $tarr = $db->select_all_by_condition($TName, "usertypeid = 3");
                break;
            case "course":
                $tarr = $db->select_all($TName);
                break;
            case "univ":
                $tarr = $db->select_all($TName);
                break;
            case "fac":
                $tarr = $db->select_all($TName);
                break;
            case "ques" :
// Return All Questions ID That Have Replay 
                $tarr = $db->select_all_by_condition("question", "question_type = 1");

                break;
            case "compques":
// Return All Questions ID That Have Choices 
                $tarr = $db->select_all_by_condition("question", "question_type = 2");

                break;
            case "rep":
                $tarr = $db->select_all($TName);
                break;
            case "materials":
                $tarr = $db->select_all($TName);
                break;
            case "team":
                $tarr = $db->fulljoin("*", "team", "course", "team.course_id = course.c_id ");
                break;
            default:
                break;
        }

        return $tarr;
    }

    /* Prevent anyoune from accessing pages that he don't has permissions for * */

    function check_accessability($pagename, $usertypeid) {
        $db = DB::getInstance();
        $p_id = array("p_id");
        // to get page id 
        $page_id = $db->select_Specific_cols($p_id, "page", "p_name", $pagename);
        //echo 'Page ID Is '. $page_id[0]. "<br>";
        // get user type id 
        // check if row exist or not in table user_page
        $numofrows = $db->element_exist("user_pages", "", "", "p_id = '" . $page_id[0] . "' AND usertype_id = '" . $usertypeid . "'");
        //var_dump($numofrows);
        if ($numofrows > 0) {
            //echo 'Authenticated<br>';
            return TRUE;
        } else {
            //echo 'UnAuthenticated<br>';
            return FALSE;
        }
    }

}
