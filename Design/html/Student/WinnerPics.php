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

include_once '../../../classes/User.php';
include_once '../../../classes/Student.php';
//error_reporting(E_ERROR);
$st = new Student();
$High = $st->highScore();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>HIGH SCORES</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="../../Css/Student/5rastyle.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <!-- start header -->
        <div id="header">
            <h1>HIGH SCORES</h1>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="wrapper">
            <div class="top">
                <div id="page">
                    <div class="bgtop">
                        <div class="bgbtm">
                            <!-- start content -->
                            <div id="content">
                                <div class="post">
                                    <h1 class="title"><a><?php echo $High[0]["userfname"] . " " . $High[0]["userlname"]; ?></a></h1>
                                    <p class="byline">points:<?php echo $High[0]["point"]; ?></p>

                                </div>

                                <div class="post">
                                    <h1 class="title"><a><?php echo $High[1]["userfname"] . " " . $High[1]["userlname"]; ?></a></h1>
                                    <p class="byline">points:<?php echo $High[1]["point"]; ?></p>
                                </div>
                                <div class="post">
                                    <h1 class="title"><a><?php echo $High[2]["userfname"] . " " . $High[2]["userlname"]; ?></a></h1>
                                    <p class="byline">points:<?php echo $High[2]["point"]; ?></p>
                                </div>
                            </div>
                            <!-- end content -->
                            <!-- start sidebar -->
                            <div id="sidebar">
                                <ul>
                                    <li>
                                        <h2>THE FRIST</h2>
                                        <ul>
                                            <li> <img class="img" width="200px" height="200px" src=<?php echo "../../images/profile_pc/" . $High[0]["profile_picture"]; ?> /></li>
                                        </ul>
                                    </li> 
                                </ul>
                                <ul>
                                    <li>
                                        <h2>THE SECOND</h2>
                                        <ul>

                                            <li>     <img class="img" width="200px" height="200px" src=<?php echo "../../images/profile_pc/" . $High[1]["profile_picture"]; ?> /></li>
                                        </ul>   
                                    </li>  
                                </ul>
                                <ul>
                                    <li>
                                        <h2>THE THIRD</h2>
                                        <ul>
                                            <li> <img class="img" width="200px" height="200px" src=<?php echo "../../images/profile_pc/" . $High[2]["profile_picture"]; ?> /></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <!-- end sidebar -->
                            <div style="clear:both">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</html>
