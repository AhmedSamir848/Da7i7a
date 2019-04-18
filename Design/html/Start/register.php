<?php
//error_reporting(E_ERROR);
include_once '../../../classes/User.php';
include_once '../../../classes/Student.php';
include_once '../../../classes/professor.php';
if (isset($_POST['submit'])) {
    $error = "";
    $fname = addslashes(htmlspecialchars($_POST['fname']));
    $lname = addslashes(htmlspecialchars($_POST['lname']));
    $mail = addslashes(htmlspecialchars($_POST['mail']));
    $pass = addslashes(htmlspecialchars($_POST['pass']));
    $university = $_POST['uni_id'];
    $faculty = $_POST['fac_id'];
    $level = $_POST['level'];
    /*     * ******************** */
    // Upload Profile Picture
    $folder = "../../images/profile_pc";
    if (!is_dir($folder)) {
        mkdir($folder);
    }
    $fileName = $_FILES['profile_pic']['name'];
    $fileTempName = $_FILES['profile_pic']['tmp_name'];
    $server_path = $folder . '/' . basename($_FILES['profile_pic']['name']);
    // change name of image if the same name was found befor on folder
    $out = 0;
    $count = 0;
    while ($out < 1) {
        if (file_exists($server_path)) {
            $server_path = $folder . '/' . $count . basename($_FILES['profile_pic']['name']);
        } else {
            $out++;
        }
        $count++;
    }
    $profile_pc = "";
    $arrToImg = explode("/", $server_path);
    $myImg = $arrToImg[count($arrToImg) - 1];
    $checkMove = move_uploaded_file($fileTempName, $server_path);
    if ($checkMove) {
        $profile_pc = $myImg;
    }
    /*     * ******************** */
    // check user is student or professor
    $result = $_POST['1'];
    if ($result == "student" && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        if (!empty($level) && $level != "Phd") {
            $user = new Student();
            $user->setfName($fname);
            $user->setlName($lname);
            $user->setEmail($mail);
            $user->setPassword($pass);
            $user->setUniversity($university); //set university ID
            $user->setFaculty($faculty); //set faculty ID
            $user->setProfile_pc($profile_pc); //set Profile picture and save path on database
            $user->setLevel($level);
            $check = $user->Register();
            if ($check) {
                header("Location: login.php");
            } else {
                $error = "Your email was been used befor";
            }
        } else {
            $error = "choose your level";
        }
    } else if ($result == "professor") {
        if ($level == "0") {
            $user_prof = new Professor();
            $user_prof->setfName($fname);
            $user_prof->setlName($lname);
            $user_prof->setEmail($mail);
            $user_prof->setProfile_pc($profile_pc);
            $user_prof->setPassword($pass);
            $user_prof->setUniversity($university); //set university ID
            $user_prof->setFaculty($faculty); //set faculty ID
            $reg = $user_prof->Register();
            if ($reg) {

                header("Location: waiting.php");
            } else {
                $error = "Your email was been used befor";
            }
        } else {
            $error = "choose your degree";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , intial-scale =1.0">
        <title>Da7i7a</title>
        <link rel="stylesheet" href="../../Css/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/login.css">
        <link rel="stylesheet" href="../../Css/regis.css">
        <link rel="stylesheet" href="../../Css/font-awesome.css">
        <link rel="stylesheet" href="../../Css/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header   -->
        <?php include("Header.php"); ?>
        <!-- End Header -->

        <!--          Start content            -->
        <section class="main">
            <div class="form" id="reg">
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <div class="face">
                        <h2> <a href="#"><span class="fa fa-facebook-official"></span>create with facebook</a></h2>
                    </div>
                    <div class="gmail">
                        <h2> <a href="#"><span class="fa fa-google-plus"></span>create with Google</a></h2>
                    </div>
                    <input type="text" name="fname" placeholder="First name*" onkeyup="lettersOnly(this)" required>
                    <input type="text" name="lname" placeholder="Last name*" onkeyup="lettersOnly(this)" required><br>
                    <input type="email" name="mail" placeholder="EmailAddress: example@example.com" required><br>
                    <input type="password" name="pass" placeholder="Password" required><br>
                    <div class="type">
                        <select name="uni_id" class="name_uni" required>
                            <?php
                            $user = new user(); //Object from user class 
                            $T_Name = "university";
                            $col = array('univ_id', 'univ_name');
                            $arr = array();
                            $arr = $user->drop_box($col, $T_Name); //call drop_box func to get column
                            for ($i = 0; $i < count($arr); $i++) {
                                echo "<option  value='" . $arr[$i][0] . "'>" . $arr[$i][1] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="Subject">
                        <select name="fac_id" class="name_fac" required>
                            <?php
                            $user = new user(); //Object from user class 
                            $T_Name = "faculty";
                            $col = array('fac_id', 'fac_name');
                            $arr = array();
                            $arr = $user->drop_box($col, $T_Name); //call drop_box func to get column
                            for ($i = 0; $i < count($arr); $i++) {
                                echo "<option  value='" . $arr[$i][0] . "'>" . $arr[$i][1] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="level">
                        <select name="level">       
                            <option value="0">Phd</option>
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                            <option value="4">Level 4</option>
                        </select><br>
                    </div>

                    <label class="ch1">Student</label><input type="radio" value="student" name="1" required>
                    <label class="ch1">professor</label> <input type="radio" value="professor" name="1" > 

                    <!-- Upload Profile picture -->
                    <div class="file">
                        <label>choose profile image*</label>
                        <input type="file" name="profile_pic" required>
                    </div>

                    <input type="submit" name="submit" value="Create account"><br>
                    <h3 class="log"> or <a href="login.php">press here to Login</a><br></h3>
                    <h6 class="warn"><?php echo $error; ?></h6>
                </form>
            </div>
        </section>
        <!--          end content            -->

        <!--      Start footer       -->
        <?php include("Footer.php"); ?>
        <!--    end footer     -->

<!-- <img src="../img/563688_410555672406034_1802478308_n.jpg"> -->
        <script>
            function  lettersOnly(input) { //to restrict any number or spaces
                var regex = /[^a-z]/gi;
                input.value = input.value.replace(regex, "");
            }
        </script>
    </body>
</html>

