<?php
session_start();
error_reporting(E_ERROR);
$type = $_SESSION['type'];
//include_once './../../../classes/System.php';
//$sys = new System();
//$path = basename(__FILE__, '.php');
//if (!$sys->check_accessability($path, $type)) {
//    header("Location: ../Start/privent_admin.php");
//    exit();
//}
include '../../../classes/Student.php';
//session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>challenge System</title>
        <link rel="stylesheet" href="../../Css/Student/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/Student/cSss.css">
        <link rel="stylesheet" href="../../Css/Student/font-awesome.css">
        <link rel="stylesheet" href="../../Css/Student/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header -->
        <?php include_once('../Start/Header_1.php'); ?>
        <!---------------------------End Header--------------------- -->

        <section class="container">
            <div class="c1">
    
            </div> 
            <?php
            $st = new Student();
            $result = $st->CompeteSystem(1);
//             echo '<pre>';
//            print_r($result);
//            echo '</pre>';
            //echo 'hello';
            $qu = array_rand($result,5);
//            echo '<pre>';
//            print_r($qu);
//            echo '</pre>';
            echo " <form action=\"Compete.php\" method=\"post\">";

            for ($i = 0; $i < count($qu); $i++) {
                if ($result[$qu[$i]]['question_type'] == 2) {
                    echo "<div class=\"question\">  ";
                    echo $result[$qu[$i]]['question'];
                    echo " </div>";
                    echo "<div class=\"r1\">";
                    echo "<input type='radio' class='an1'  id='an1'  value=" . $result [$qu[$i]][ch1] . " name='ch$i'>";
                    echo "<h5 class='an'>";
                    echo $result [$qu[$i]]['ch1'];
                    echo "</h5> ";
                    echo "<input type=\"radio\" class=\"an1\"  id=\"an1\"  value=" . $result [$qu[$i]][ch2] . "   name='ch$i'>";
                    echo "<h5 class='an'>";
                    echo $result [$qu[$i]]['ch2'];
                    echo "</h5> ";
                    echo "</div>";
                    echo "  <div class=\"r1\">";
                    echo "<input type=\"radio\" class=\"an1\"  id=\"an1\"  value=" . $result [$qu[$i]][ch3] . "   name='ch$i'>";
                    echo "<h5 class='an'>";
                    echo $result [$qu[$i]]['ch3'];
                    echo "</h5> ";
                    echo "<input type=\"radio\" class=\"an1\"  id=\"an1\"  value=" . $result [$qu[$i]][ch4] . "   name='ch$i'>";
                    echo "<h5 class='an'>";
                    echo $result [$qu[$i]]['ch4'];
                    echo "</h5> ";
                    echo " </div>";
                    echo'<input type="hidden" value=' . $result [$qu[$i]]['answer'] . ' name=resul' . $i . ' >';
                }
            }
            ?>
            <input type='submit' value="done" name="done" class="submit" >

            </form>     

        </section>

        <div class="hala"></div>
        <!-- Start Footer -->
        <?php //include_once('../Start/Footer.php'); ?>
        <!-- End Footer -->
    </body>
</html>
