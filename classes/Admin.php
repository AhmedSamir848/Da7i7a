<?php

error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';
require 'PHPMailer-master/PHPMailerAutoload.php';
include_once 'User.php';
include_once 'Iregister.php';

class Admin extends USER {

    function deletehelper($ifdeltestudent) {
// echo "hellllllllllllllllllllllllllllo<br>";
        $db = DB::getInstance();
        $clicked = false;
        if (isset($_POST['id'])) {
            $firstcolval = $_POST['id'];
//   echo $firstcolval."<br>";
            $firstelementname = $_GET['fcona'];
            $TName = $_GET['tname'];

            if ($ifdeltestudent == true) {
                $studentdata = $db->select_one_assoc($TName, $firstelementname, $firstcolval);
                $firstcolval = $studentdata['user_id'];
//echo $firstelementname . "<br>" . $firstcolval;
//echo $val ."<br>";
                $TName = "user";
                $firstelementname = "user_id";
                $clicked = true;
            }
//"user", "user_id" , $userid['user_id'])
            if ($db->Delete($TName, $firstelementname, $firstcolval)) {
                echo "<font color='red' style='margin: 40%'>User Deleted Successfully</font>";
            } else {
                echo '<br>Failed to Delete';
            }
            $clicked = true;
        }
        return $clicked;
    }

    /*     * *********************** */

// Print All Professor Requests on requests Table
    function show_profNamee_request($fname_col, $T_Name2, $col, $key) {
        $db = DB::getInstance();
        $assoc = $db->select_Specific_cols($fname_col, $T_Name2, $col, $key);
        return $assoc;
    }

    function get_profId($col, $T_Name) {
        $db = DB::getInstance();
        return $db->select_cols($col, $T_Name);
    }

    /*     * ************************ */

    function AcceptDoctorJoin($prof_id) { //Accepte professor request and delete prof from requests table
        $db = DB::getInstance(); //object mn el database
        $T_Name = "requests";
        $col = "fromuserid";
        $val = $prof_id;
        if ($db->Delete($T_Name, $col, $val)) {
            return TRUE;
        }
    }

// send mail ---samir---
    function SendMail() {
        $user_id = $_POST['ID'];
        $idsarr = explode(",", $user_id);
        $mailSub = $_POST['Subject'];
        $mailMsg = $_POST['mail_msg'];

        $db = DB::getInstance();

//Create a new PHPMailer instance
        $mail = new PHPMailer;

        for ($index = 0; $index < count($idsarr); $index++) {
            $email = $db->select_Specific_cols(array("email"), "user", "user_id", $idsarr[$index]);
            $mailto = $email['email'];
// echo $index;
            $mail->addAddress($mailto);
        }


//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');


//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'ssl';

//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;

        $mail->IsHTML(true);

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "da7i7amail.dm848@gmail.com";

//Password to use for SMTP authentication
        $mail->Password = "As01112918965";

        $mail->SetFrom("da7i7amail.dm848@gmail.com", 'Da7i7a support Center');

//Set the subject line
        $mail->Subject = $mailSub;

// Msg Body
        $mail->Body = $mailMsg;

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually For Testing
//$mail->AltBody = 'Test';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for error 
        if (!$mail->send()) {
            echo "<h1 style='color: Black ;'>Message sent!</h1>";
        } else {
            echo "<h1 style='color: red;'>Message sent!</h1>";
            echo '<a href="../Design/html/Admin/AdminPannel.php">Back To Admin Pannel</a>';
        }
    }

    function DeleteStudent() {

        $this->deletehelper(true);
    }

    function DeleteDoctor() {

        $this->deletehelper(false);
    }

    function DeleteReport() {
        $this->deletehelper(false);
    }

    function DeleteCourse() {
        $this->deletehelper(FALSE);
    }

    function DeleteFaculty() {
        $this->deletehelper(FALSE);
    }

    function Deleteuniversity() {
        $this->deletehelper(FALSE);
    }

    function DeleteMaterial() {
        $this->deletehelper(FALSE);
    }

    function DeleteTeam() {
        $this->deletehelper(false);
    }

//8irt esmga mn delete doctor l refuse doctor

    function Refusedoctor($prof_id) { //Delete professor request and delete prof from all tables
        $db = DB::getInstance(); //object mn el database
        $val = $prof_id;
        $T_Name1 = "requests";
        $col_1 = "fromuserid";
        $T_Name2 = "user_university";
        $col_2 = "user_id";
        $T_Name3 = "user_faculty";
        $col_3 = "user_id";
        $T_Name4 = "user";
        $col_4 = "user_id";
        if ($db->Delete($T_Name1, $col_1, $val)) {
            if ($db->Delete($T_Name2, $col_2, $val)) {
                if ($db->Delete($T_Name3, $col_3, $val)) {
                    if ($db->Delete($T_Name4, $col_4, $val)) {
                        return TRUE;
                    }
                }
            }
        }
    }

}
