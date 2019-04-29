<?php


interface Iregister {

   // function Register();
    
    
}


class ProfRegister implements Iregister
{
	
	public function Register($prof)
	{
		
		# code...
        $db = DB::getInstance();
        $data = array("userfname" => $prof->getfName(),
            "userlname" => $prof->getlName(),
            "email" => $prof->getEmail(),
            "password" => $prof->getPassword(),
            "profile_picture" => $prof->getProfile_pc(),
            "usertypeid" => "3"
        );
        $Table_Name = "user"; //  1st Table

        if ($db->insert($data, $Table_Name)) {
            $table_1 = "user_university"; //2st Table
            $table_2 = "user_faculty"; //3st Table
            $table_3 = "requests";
            $test = $db->getLastElement("user_id", "user");
            $id = $test[0];
            $prof->setId($id);

            $data_1 = array("univ_id" => $prof->getUniversity(), // Data's user_university table
                "user_id" => $prof->getId()
            );
            $data_2 = array("faculty_id" => $prof->getFaculty(), // Data's user_faculty table
                "user_id" => $prof->getId()
            );
            $data_3 = array("fromuserid" => $prof->getId(),
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



/**
 * 
 */
class StuRegister implements Iregister
{
	
	function Register($student)
	{
		# code...
        $db = DB::getInstance(); //object mn el database
        $data = array(
            "userfname" => $student->getfName(),
            "userlname" => $student->getlName(),
            "email" => $student->getEmail(),
            "password" => $student->getPassword(),
            "profile_picture" => $student->getProfile_pc(),
            "usertypeid" => "2" // Must be Dynamic
        );
        $Table_Name = "user"; //  1st Table

        if ($db->insert($data, $Table_Name)) {
            $table_1 = "user_university"; //2st Table
            $table_2 = "user_faculty"; //3st Table
            $table_3 = "student"; //4st Table
            $test = $db->getLastElement("user_id", "user");
            $id = $test[0];
            // echo "This is befor get " . $id . "<br>";
            $student->setId($id);

            $data_1 = array("univ_id" => $student->getUniversity(), // Data's user_university table
                "user_id" => $student->getId()
            );
            $data_2 = array("faculty_id" => $student->getFaculty(), // Data's user_faculty table
                "user_id" => $student->getId()
            );
            $data_3 = array("level" => $student->getLevel(), // Data's Studnet table
                "user_id" => $student->getId()
            );
            //check that data was inserted successfully
            if ($db->insert($data_1, $table_1)) {
                if ($db->insert($data_2, $table_2)) {
                    if ($db->insert($data_3, $table_3)) {
                        return TRUE;
                    }
                }
            }
        } else {
            return FALSE;
        }		
	}
}