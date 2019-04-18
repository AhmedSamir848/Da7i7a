<?php
include_once '../../../classes/Student.php';
session_start();
if (isset($_POST['submit'])) {
    $course = $_POST['course'];
    echo $course;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>challenge</title>
        <link rel="stylesheet" href="../../Css/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/Student/challengeP1.css">
        <link rel="stylesheet" href="../../Css/font-awesome.css">
        <link rel="stylesheet" href="../../Css/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header -->
        <?php include_once '../Start/Header_1.php'; ?>
        <!---------------------------End Header--------------------- -->

        <section class="container">
            <!-- Type of challenge -->
            <div class="big">
                <form action="Challenge.php" method="post">
                    <div class="type">
                        <h2>Select type Competition</h2><br>
                        <select name="type">
                            <option value="" >System</option>
                            <option value="" disabled="">Friend</option>
                            <option value="" disabled="">Random User</option>
                        </select>
                    </div>
                    <!-- Type of Courses-->
                    <div class="Subject">
                        <h2>Select type Competition</h2><br>
                        <select name="course">
                            <?php // print course registerd
                            $val=$_SESSION['id'];
                            $student = new Student();
                            $result_1= $student->getCOurseName($val);
                            for ($i = 0; $i < count($result_1); $i++) {
                                echo "<option  value='" . $result_1[$i]['c_id'] . "'>" . $result_1[$i]['c_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                     <input type="submit" name="submit" value="Let's Go"  >
                </form>
            </div>
            <div class="clear"></div>    
           
        </section>

                    <!-- Start Footer -->
            <?php include_once '../Start/Footer.php'; ?>
                    <!-- End Footer -->
        
    </body>
</html>