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
<!DOCTYPE html>

<html>
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../Css/Resources/style.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <!--Cover and Profile Photo-->
            <section class="cover">
                <div class="name"><a href=""><h2>@User_name</h2></a></div>
                <div class="pimg"><img src="../../images/Logomakr_4KFwIu.png" alt="#Profile_Image">
                </div>
            </section>
            <!-- Tools-->
            <section class="tools">
                <div class="home">
                    <a href=""><img src="../../images/home.png" ></a>
                    <a href="" class="f" >Home</a>
                </div>
                <div class="profile">
                    <a href="student_profile.php"><img src="../../images/profile.png" ></a>
                    <a href="student_profile.php" class="f" >My Profile</a>
                </div>                
                <div class="compete">
                    <a href=""><img src="../../images/compete.png" ></a>
                    <a href="" class="f" >Competition</a>
                </div> 
                <div class="material">
                    <a href=""><img src="../../images/material.png" ></a>
                    <a href="" class="f" >Materials</a>
                </div>    
                <div class="team">
                    <a href="team.php"><img src="../../images/team.png" ></a>
                    <a href="team.php" class="f" >Teams</a>
                </div>    
            </section>
            <section class="navss">
                <div class="leftnav">
                    <ul>
                        <li><a href="yourInfo.php">Your Info</a></li>
                        <li><a href="yourteams.php">Your Teams</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
                <div class="info">
                    <label>Name : user name</label><br>
                    <label>Email : Example@email.com</label><br>
                    <label>University : user_univ</label><br>
                    <label>Faculty : user_faculty</label><br>
                    <label>Course : His Courses</label>
                </div>
            </section>


        </div>
    </body>
</html>
