<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path, $type)) {
    header("Location: ../Start/privent_admin.php");
    exit();
}
?>
<?php
include_once '../../../classes/Professor.php';
include_once '../../../classes/Course.php';
include_once '../../../classes/User.php';
include './proPage.php';

if (isset($_POST['submit'])) {
    $course_id = $_POST['selco'];
    $fileName = $_FILES['file']['name'];
    $storedin = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];


    $file_extention = array('pdf', 'jpg', 'jpeg', 'png', 'gif', 'PDF', 'doc', 'tex', 'txt', 'docx', 'doc', 'rar', 'pptx');
    $get_file_extention = strtolower(end(explode('.', $fileName)));
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $error = FALSE;
    if (!in_array($get_file_extention, $file_extention)) {
        echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> This Extention not allowed</div>
                        ';
        $error = true;
    }

    if (empty($fileName)) {
        echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> Image is Required</div>
                        ';
        $error = TRUE;
    }
    if (empty($fileSize < 20602968)) {
        echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Note!</strong> File Cant be Larger Than 20MB</div>
                        ';
        $error = TRUE;
    }
    $fName = rand(0, 100000) . "_" . $fileName;
    if (!$error && move_uploaded_file($storedin, "../uploads/material//" . $fName)) {
        $s = new User();
        $s->setId(3);
        $Info = array('f_name' => $fName, 'course_id' => $course_id, 'user_id' => $s->getId());
        if ($s->UploadMaterial($Info)) {
            echo'
                          
                        <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Done .</strong> File Uploaded Successfully
                        <a href="../Student/material.php"><strong>Click Here</strong></a> To Show Your File
                        </div>
                        ';
        } else {
            echo'
                          
                        <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error !</strong> Error in Uploaded Your File</div>
                        ';
        }
    }
}
?>
<!DOCTYPE html>

<html>
    <div class="col-lg-9">
        <form method="post" enctype="multipart/form-data" class="form-control" >
            <div class="well col-lg-12" >
                <div class="form-group ">
                    <label class="col-lg-3 lable " >Select Course : </label>
                    <select class="col-lg-5 input-sm" name="selco" >

                        <?php
                        $s = new Course();
                        $courses = $s->selectCourses();
                        for ($i = 0; $i < count($courses); $i++) {
                            echo '<option value =' . $courses[$i]["c_id"] . '>';   //fe mo4kla f el value w kman b3d kda hit8air el table ll courses ely msglha el student
                            echo " {$courses[$i]['c_name']}</option>";
                        }
                        ?> 

                    </select>
                </div></br>
                <div class="form-group">
                    <label for="file" class="col-lg-3 lable">Select Your Material : </label>
                    <input type="file" class="input-sm col-lg-5" name="file" required="required" ></br>
                    <button type="submit" name="submit" class="btn btn-success ">Upload</button>
                </div>
        </form>
    </div>
</html>