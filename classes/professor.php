<?php

error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';
include_once 'Iregister.php';
include_once 'Student.php';

class Professor extends USER implements Iregister {

    //new 
    function UploadMaterial($Info, Professor $user) {
        $student = new Student();
        $student->UploadMaterial($Info, $user); //Delegation
    }

    // Professor Must Has the courses Which he Teaches This Semester
    public function Register() {
        $db = DB::getInstance();
        $data = array("userfname" => $this->getfName(),
            "userlname" => $this->getlName(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "profile_picture" => $this->getProfile_pc(),
            "usertypeid" => "3"
        );
        $Table_Name = "user"; //  1st Table

        if ($db->insert($data, $Table_Name)) {
            $table_1 = "user_university"; //2st Table
            $table_2 = "user_faculty"; //3st Table
            $table_3 = "requests";
            $test = $db->getLastElement("user_id", "user");
            $id = $test[0];
            $this->setId($id);

            $data_1 = array("univ_id" => $this->getUniversity(), // Data's user_university table
                "user_id" => $this->getId()
            );
            $data_2 = array("faculty_id" => $this->getFaculty(), // Data's user_faculty table
                "user_id" => $this->getId()
            );
            $data_3 = array("fromuserid" => $this->getId(),
                "touserid" => "1",
                "r_type" => "2"
            );
            //check that data was inserted successfully
            if ($db->insert($data_1, "user_university")) {
                // echo 'Hello from fac';
                if ($db->insert($data_2, "user_faculty")) {
                    // echo 'Hello from UNIV';
                    if ($db->insert($data_3, "requests")) {
                        //  echo 'Hello from REQ';
                        return TRUE;
                    }
                }
            } else {
                return FALSE;
            }
        }
    }

}
