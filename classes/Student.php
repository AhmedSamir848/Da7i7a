<?php

error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php'; // Saib El path 3l4an t4t8l
require_once 'Iregister.php';
require_once 'User.php';
include 'Course.php';

class Student extends USER {

    private $Level;
    private $TotalScore;
    private $reg;

    function getTotalScore() {
        return $this->Level;
    }

    function setTotalScore($TotalScore) {
        $this->$TotalScore = $TotalScore;
    }

    function getLevel() {
        return $this->Level;
    }

    function setLevel($Level) {
        $this->Level = $Level;
    }

//    function CompeteFriend() {
//        $DB = DB::getInstance(); //object mn el database
//
//    }

    function CompeteSystem($Course_id) {
        $DB = DB::getInstance();
        $QT_Name = 'question'; //tablename
        $CT_Name = 'q_choices'; //tablename
        $result = $DB->select_all4($QT_Name, $CT_Name, "question.q_id", "q_choices.q_id", "course_id", $Course_id); //select array feha el question mn el database
        // echo '<pre>';
        //print_r($result);
        //echo '</pre>';
        return $result;
    }

    function Check_RightAnswer($selected_RadioButton, $RightAnswer) {
        if ($selected_RadioButton == $RightAnswer) {
            echo $selected_RadioButton . ' equal ' . $RightAnswer . "<br>";
            return 1;
        } else {
            echo $selected_RadioButton . ' not equal ' . $RightAnswer . "<br>";
            return 0;
        }
    }

    function CompeteRandom() {
        $DB = DB::getInstance(); //object mn el database
    }

    function DownloadMaterial() {
        $DB = DB::getInstance(); //object mn el database
    }

    function CreateTeam(Team $team, Student $user, $course_id) {

        $db = DB::getInstance();
        $tbname = "team";
        $error = FALSE;
        $std_teams = $db->select_all('team');
        for ($i = 0; $i < count($std_teams); $i++) {
            if ($std_teams[$i]['course_id'] == $course_id && $std_teams[$i]['leader_id'] == $user->getId()) {
                $error = TRUE;
            }
        }
        if ($error) {
            echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> you already created team for this course</div>';
        }
        if (!$error) {
            //make asoc array stored with the data
            $Info = array("t_details" => $team->getTeamDesc(), "leader_id" => $user->getId(), "course_id" => $course_id, "max_num" => $team->getMaxNumber(), "actual_num" => $team->getActuallNumber());

            if ($db->insert($Info, $tbname)) {
                echo'

                        <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Done .</strong> Team Created Successfully
                        <a href="team_1.php"><strong>Click Here</strong></a> To Show your Team
                        </div>
                        ';
                return true;
            } else {
                echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> Error</div>
                        ';
                return FALSE;
            }
        }
    }

    //new
    //info is asoc array from the form in it will store fname,fpath,ftype
    function UploadMaterial($Info, Student $user) {
        parent::UploadMaterial();
        $T_Name = "uploaded_files";
        $db = DB::getInstance();
        try {
            if ($db->insert($Info, $T_Name))
                return true;
        } catch (Exception $e) {
            echo"error fe el connection";
            return FALSE;
        }
    }

//new
    function getMaterilas($course_id) {
        $db = DB::getInstance();
        $files = $db->select_all('uploaded_files');
        for ($i = 0; $i < count($files); $i++) {
            echo '  <div class="col-lg-12 matrs"> ';
            echo '<pre class=col-lg-8>';
            $cors = new Course();
            $result = $cors->getspecificCourse($files[$i]['course_id']);
            $user = $this->getUser($files[$i]['user_id']);
            echo "<strong>User Name : </strong>" . " " . $user['userfname'] . " " . $user['userlname'] . "</br>";

            echo "<strong>Course Name : </strong>" . " " . $result['c_name'] . "</br>";
            echo "<strong>File Name : </strong><a href='../uploads/material/";
            echo $files[$i]["f_name"];
            echo '\' target="_blank" >';
            echo $files[$i]['f_name'];
            echo '</a> </br>';
            echo "<strong>Uploaded at : </strong>" . " " . $files[$i]['upload_date'] . "</br>";
            echo '</pre>';
            echo '</div>';
        }
    }

    //new
    function SendJoinRequest(Student $from, $to) {

        $Info = array("fromuserid" => $from->getId(), "touserid" => $to, "r_type" => 3);  //r_type =1 because in data base team type =1
        $db = DB::getInstance();
        $error = FALSE;
        $result = $db->select_all('requests');
        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]['fromuserid'] == $from->getId() && $result[$i]['touserid'] == $to) {
                $error = TRUE;
            }
        }

        if ($error) {
            echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning !</strong> you cant send join again to this user .</div> ';
        } else if (!$error) {
            if ($db->insert($Info, 'requests')) {
                echo'

                        <div class="alert alert-success alert-dismissable fade in col-lg-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Done!</strong>your request was send .. best wishes</div>
                        ';
                return $result;
            } else {
                echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> there was Error :(</div>
                        ';
            }
        }
    }

    function AcceptRequest() {
        $DB = DB::getInstance(); //object mn el database
    }

    function RefuseRequest() {
        $DB = DB::getInstance(); //object mn el database
    }

    //new
    function DeleteTeam($teamID) {
        $table = "team";
        $col = "team_id";
        $DB = DB::getInstance(); //object mn el database
        if ($DB->Delete($table, $col, $teamID)) {

            echo'

                        <div class="alert alert-success alert-dismissable fade in col-lg-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Done!</strong>your Team was Deleted Successfully</div>';
        } else {
            echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> there was Error :(</div>';
        }
    }

    function EditTeamName() {
        $DB = DB::getInstance(); //object mn el database
    }

    //new
    function AskQuestion(Question $qq, Student $user) {
        $T_Name = 'question';
        $Info = array("question" => $qq->getQuestion(), "user_id" => $user->getId(), "course_id" => $qq->getCourseID(), "question_type" => 1);
        $DB = DB::getInstance(); //object mn el database
        try {
            if ($DB->insert($Info, $T_Name))
                return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

//new
    function ReplyQuestion(Student $user, $reply, $q_id) {
        $Info = array("reply" => $reply, "q_id" => $q_id, "user_id" => $user->getId());
        $DB = DB::getInstance(); //object mn el database
        if ($DB->insert($Info, 'q_reply')) {
            echo'

                        <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Congrats!</strong>your reply added Successfully</div>
                        ';
        } else {
            echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> there was Error :(</div>
                        ';
        }
    }

    function DeleteTwoAnswer() {
        $DB = DB::getInstance(); //object mn el database
    }

    function SendFeedback() {
        $DB = DB::getInstance(); //object mn el database
    }

    function DeleteMember() {
        $DB = DB::getInstance(); //object mn el database
    }

    public function SetReg(Iregister $register){
        $this->reg = $register;
    }

    public function Register() {
        //$this->reg = new StuRegister();
        $this->SetReg(new StuRegister);
        $this->reg->Register($this);
    }

    ///new function cal the frist 3 students high points
    function highScore() {
        $T_Name1 = 'user'; //name bta3 table el user
        $T_Name2 = 'student'; //name table student
        $Db = DB::getInstance(); //object mn el db
        $result = $Db->select_all4($T_Name1, $T_Name2, "user.user_id", "student.user_id", "usertypeid", "2"); //cal function in class db
        $sortArray = array(); //make variable as array
        foreach ($result as $data) { //hna 2 foreach ht3dy 3la el 2d array
            foreach ($data as $key => $value) {
                if (!isset($sortArray[$key])) {
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
        }
        $orderby = "point"; //change this to whatever key you want from the array
        $Sort_array = array_multisort($sortArray[$orderby], SORT_DESC, $result);
        /*  echo '<pre>';
          print_r($result);
          echo '</pre>'; */
        return $result;
    }

    function registerCourses(Student $user, $cs_IDs) {
        $db = DB::getInstance();
        $Info = $Info2 = '';
        $rt = '';
        $i = 0;
        $Info = $db->select_one('user_course', 'user_id', $user->getId());
        if ($Info) {
            echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note .</strong> you Registered Before
                        <a href="updateregisteredcourses.php"><strong>Click Here</strong></a> To Update Your Courses
                        </div>
                        ';
        } else {
            while ($i < count($cs_IDs)) {

                $Info2 = array('course_id' => $cs_IDs[$i], 'user_id' => $user->getId());
                if ($db->insert($Info2, 'user_course')) {
                    $rt = TRUE;
                } else {
                    $rt = FALSE;
                }
                $i++;
            } if ($rt) {
                echo'

                        <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Done</strong> You Registered Successfully</div>
                        ';
            } else {
                echo'

                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> Sorry it was Error Please Back to the Admin</div>
                        ';
            }
        }
    }

    function updateRegisteredCourses(Student $user, $cs_IDs) {
        $db = DB::getInstance();
        $db->Delete('user_course', 'user_id', $user->getId());
        $this->registerCourses($user, $cs_IDs);
    }

    //new
    function getRegisterCourses(Student $user) {
        $db = DB::getInstance();
        $result = $courses = "";
        $result = $db->select_all('user_course');
        $cs_id ;
        $finalcourses ;
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        for ($i = 0; $i < count($result); $i++) {
          // echo $result[$i]['user_id']." - ".$user->getId()." * ".$result[$i]['course_id']."<br>";
            if ($result[$i]['user_id'] == $user->getId()) {
                $cs_id[] = $result[$i]['course_id'];
            }
        }
        $c = $db->select_all('course');
        for ($j = 0; $j < count($c); $j++) {
            for ($i = 0; $i < count($cs_id); $i++) {
                if ($c[$j]['c_id'] == $cs_id[$i]) {
                    $finalcourses[] = array('c_id' => $c[$j]['c_id'], 'c_name' => $c[$j]['c_name']);
                }
            }
        }
        return $finalcourses;
    }

    public function getCourseID($id) {
        $val = $id;
        $db = DB::getInstance();
        // $db= new DB();
        $T_Name = "user_course";
        $key = "user_id";
        $arr = array("course_id");
        return $db->select_Specific_cols_return_all($arr, $T_Name, $key, $val);
    }

    public function getCOurseName($id) {
        $db = DB::getInstance();
        $temp = $this->getCourseID($id);
        $array = array();
        for ($i = 0; $i < count($temp); $i++) {
            $result = $db->select_one_assoc("course", "c_id", $temp[$i][0]);
            array_push($array, $result);
        }
        return $array;
    }

}
