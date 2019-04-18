<?php
include_once '../../../classes/User.php';
session_start();

$error="";
$note="";
if(isset($_POST['update']))
{
    $pass=$_POST['pass'];
    $pass_2=$_POST['pass_2'];
    $user=new user();
    if($pass==$pass_2)
    {
    $Info=array("password"=>$pass,
        "rand_pass"=>" "
        );
    $value=$_SESSION['email'];
    $result=$user->update_pass($Info, "user", "email", $value);
    if($result)
    {
       $note="your password was chanaged ";
       header("refresh:3; url=login.php");
    }
    else {
        $error= 'ssorry -_- !';
    }
    }
    else{
        $error="your password are not identical ";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Da7i7a</title>
        <link rel="stylesheet" href="../../Css/login.css">
        <link rel="stylesheet" href="../../Css/regis.css">
        <link rel="stylesheet" href="../../Css/profile.css">
        <link rel="stylesheet" href="../../Css/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/forget.css">
        <link rel="stylesheet" href="../../Css/font-awesome.css">
        <link rel="stylesheet" href="../../Css/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header   -->
        <?php include "Header_1.php"; ?>
        <!-- End Header -->
        <section class="main">
        <br><br>
        <form action="new_password.php" method="post">
            <input type="password" placeholder="wirite your new paasword" name="pass" required><br>
            <input type="password" placeholder="wirite your new paasword again" name="pass_2" required><br>
            <input  type="submit" value="Update Password" name="update"><br>
        </form>
        <h2 style="text-align: center"><?php echo $note; ?></h2>
        <h2 style="text-align: center"><?php echo $error; ?></h2>
        </section>
       
        
                            <!--      Start footer       -->
                             <?php  include "Footer.php"; ?>
                            <!--    end footer     -->
    </body>
</html>