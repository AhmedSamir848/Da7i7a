<?php

error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';
include_once './Course.php';

class USER {

    private $Name;
    private $Email;
    private $Password;
    private $Gender;
    private $Id;
    private $University;
    private $Faculty;
    private $profile_pc; //new

    function setProfile_pc($profile_pc) {//new
        $this->profile_pc = $profile_pc;
    }

    function getProfile_pc() {//new
        return $this->profile_pc;
    }

    function setfName($fName) {
        $this->fName = $fName;
    }

    function setlName($lName) {
        $this->lName = $lName;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }

    function setGender($Gender) {
        $this->Gender = $Gender;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setUniversity($University) {
        $this->University = $University;
    }

    function setFaculty($Faculty) {
        $this->Faculty = $Faculty;
    }

    function getfName() {
        return $this->fName;
    }

    function getlName() {
        return $this->lName;
    }

    function getEmail() {
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function getGender() {
        return $this->Gender;
    }

    function getId() {
        return $this->Id;
    }

    function getUniversity() {
        return $this->University;
    }

    function getFaculty() {
        return $this->Faculty;
    }

    function Login() {
        $db = DB::getInstance(); //object mn el database
        $mail = $this->getEmail();
        $pass = $this->getPassword();
        $T_Name = "user";
        $result = $db->get_user_by_username_password($mail, $pass, $T_Name);
        if ($result) {
            $_SESSION['type'] = $result['usertypeid'];
            $_SESSION['id'] = $result['user_id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['fname'] = $result['userfname'];
            $userdata = array("user_id" => $_SESSION['id']);
            $db->insert($userdata, "active_users");
            return true;
        } else {
            return FALSE;
        }
    }

    function Login_rand() { //Login with random password if he forget the password
        $db = DB::getInstance();
        $mail = $this->getEmail();
        $pass = $this->getPassword();
        $T_Name = "user";
        $result = $db->get_user_by_mail_rand($mail, $pass, $T_Name);
        if ($result) {
            $_SESSION['type'] = $result['usertypeid'];
            $_SESSION['id'] = $result['user_id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['fname'] = $result['userfname'];
            $_SESSION['pass'] = $result['password'];
            $userdata = array("user_id" => $_SESSION['id']);
            $db->insert($userdata, "active_users");
            return true;
        } else {
            return FALSE;
        }
    }

    function Logout($id) {
        $db = DB::getInstance(); //object mn el database
        $db->Delete("active_users", "user_id", $id);
        if (isset($_SESSION['fname'])) {
            unset($_SESSION['fname']);
            unset($_SESSION['email']);
            unset($_SESSION['id']);
        }
    }

    function ForgetPassword($value) {// new forget password
        $db = DB::getInstance(); //object mn el database
        $new_pass = rand(1000, 5623);
        $Info = array("rand_pass" => $new_pass);
        $key = "email";
        $T_name = "user";
        $this->update_pass($Info, $T_name, $key, $value);
        $arr = array("rand_pass");
        $result = $db->select_Specific_cols($arr, $T_name, $key, $value);
        return $result;
    }

    function ReplyQuestion() {
        $db = DB::getInstance(); //object mn el database
    }


    function DeleteQuestion() {
        $user = new Admin();
        $user->deletehelper(false);
    }

    function UploadMaterial($Info) {
        $T_Name = "uploaded_files";
        $db = DB::getInstance();

        if ($db->insert($Info, $T_Name)) {
            return true;
        } else {
            return FALSE;
        }
    }

    function ADDCompQuestion() {
        $db = DB::getInstance(); //object mn el database
    }

    function EditCompQuestion() {
        $db = DB::getInstance(); //object mn el database
    }

    function DeleteCompQuestion() {
        $user = new Admin();
        $user->deletehelper(false);
    }

    function ADD_Course(Course $Course_Name) {
        $db = DB::getInstance();
        $info = array("c_name" => $Course_Name->getCourseName());
        $T_Name = "course";
        $select_course = $db->select_all($T_Name);
//        echo '<pre>';
//        print_r($select_course);
//        echo '</pre>';
        $test = $select_course[$i]['c_name'];
        for ($i = 0; $i < count($select_course); $i++) {
            if ($Course_Name==$test) {
                echo 'Course aleady exist';
                return 0;
            }
        }
        $ADD_Course = $db->insert($info, $T_Name);
        if ($ADD_Course) {
            echo 'yessss';
        } else {
            echo 'nooooo';
        }
    }

    function RetrieveUSER($User_id) {
        $db = DB::getInstance();
        $QT_Name = 'user'; //tablename
        $arrU = array("user_id", "usertypeid");
        $result = $db->select_Specific_cols($arrU, $QT_Name, "user_id", $User_id); //select array feha el question mn el database
        if ($result) {
            return $result; //return el array de
        } else {
            echo 'error';
        }
    }

    function AddAdmin($User_id) {
        $db = DB::getInstance();
        $U_tableName = 'user'; //assign question tablename to variable
        $arrayU = array("usertypeid" => "1");
        $U_update = $db->update($arrayU, $U_tableName, 'user_id', $User_id); //hna ht3ml updata ll question
        if ($U_update) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkAccepte($id) {
        $db = DB::getInstance();
        $val = $id;
        $T_Name = "requests";
        $key = "fromuserid";
        $result = $db->element_exist($T_Name, $key, $val,"");

        return $result;
    }

    // Print column
    function drop_box($col, $T_Name) {//new
        $db = DB::getInstance();
        $result = $db->select_cols($col, $T_Name);
        return $result;
    }

    // show Profile pictuer : get path of image
    public function image($arr, $T_Name, $key, $val) {//new
        $db = DB::getInstance();
        $result = $db->select_Specific_cols($arr, $T_Name, $key, $val);
        return $result;
    }

    // update password
    public function update_pass($Info, $T_name, $key, $value) {//new
        $db = DB::getInstance();
        $db->update($Info, $T_name, $key, $value);
        return TRUE;
    }

    //
    function getUser($user_id) {
        $db = DB::getInstance();
        $result = $db->select_one('user', 'user_id', $user_id);
        return $result;
    }

}
