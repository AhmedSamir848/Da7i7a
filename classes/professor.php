<?php

error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';
include_once 'Iregister.php';
include_once 'Student.php';

class Professor extends USER {

    private $reg;

    //new 
    function UploadMaterial($Info, Professor $user) {
        $student = new Student();
        $student->UploadMaterial($Info, $user); //Delegation
    }


    public function SetReg(Iregister $register){
        $this->reg = $register;
    }

    // Professor Must Has the courses Which he Teaches This Semester
    public function Register() {
        //$this->reg = new ProfRegister();
        $this->SetReg(new ProfRegister);
        $this->reg->Register($this);
    }

}
