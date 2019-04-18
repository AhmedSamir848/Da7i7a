<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
$id = $_SESSION['id'];
//include_once './../../../classes/System.php';
//$sys = new System();
//$path = basename(__FILE__, '.php');
//if (!$sys->check_accessability($path, $type)) {
//    header("Location: ../Start/privent_admin.php");
//    exit();
//}
?>
<?php
include './header.php';
include_once '../../../classes/Student.php';
include_once '../../../classes/Course.php';

if (isset($_POST['done'])) {
    $cs_IDs = $_POST['selco'];
    $user = new Student();
    $user->setId($id);
    $user->registerCourses($user, $cs_IDs);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .spnc{
                color: #CC0000;
            }
        </style>
    </head>
    <body>
        <form class="form-control" method="post" >
            <div class="well" >
                <div class="form-group ">
                    <label class="col-lg-2 lable " >Select your Courses : </label>
                    <span class="spnc">Please Press Ctrl+up or Ctrl+down to select your courses</span></br>
                    <select class="col-lg-5 input-sm" name="selco[]" multiple="" required="">

                        <?php
                        $s = new Course();
                        $courses = $s->selectCourses();
                        for ($i = 0; $i < count($courses); $i++) {
                            echo '<option value =' . $courses[$i]["c_id"] . '>';   //fe mo4kla f el value w kman b3d kda hit8air el table ll courses ely msglha el student
                            echo " {$courses[$i]['c_name']}</option>";
                        }
                        ?> 

                    </select>
                </div>
                </br>
                <button name="done" class="btn btn-primary">Register</button>

            </div>
        </form>
    </body>
</html>

