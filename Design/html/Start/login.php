<?php
error_reporting(E_ERROR);
include_once '../../../classes/User.php';
include_once '../../../classes/professor.php';
$email = addslashes(htmlentities($_POST['mail']));
$pass = addslashes(htmlspecialchars($_POST['pass']));
session_start();
if (isset($_POST['submit'])) {
    $error = "";
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($pass)) {
        $user = new user();
        $user->setEmail($email);
        $user->setPassword($pass);

        if ($user->Login()) { //check type of user if student or prof or admin
            $type = $_SESSION['type'];
            $id = $_SESSION['id'];
            if ($type == 1) {
                header("Location: ../Admin/AdminPannel.php");
            } else if ($type == 3) {
                $prof = new Professor();
                $result = $prof->checkAccepte($id);
                if ($result >= 1) {
                    header("Location: waiting.php");
                } else {
                    header("Location: ../Professor/proPage.php");
                }
            } else {
                header("Location: ../Student/student_profile.php");
            }
        } else if ($user->Login_rand()) { //if user enter random password // new ya abo 5aled
            $type = $_SESSION['type'];
            $id = $_SESSION['id'];
            header("Location: new_password.php");
        } else {
            $error = "Sorry , Invalid Email or password...";
        }
    } else {
        $error = "check from your email and password are vaild";
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
        <section class="main">
            <form action="login.php" method="post">
                <h1 class="header">Login Form</h1>
                <input type="email" name="mail" placeholder="EmailAddress: example@example.com" required><br>
                <input type="password" name="pass" placeholder="Password" required><br>
                <input type="submit" name="submit" value="Login"><br>
                <!--redirect user to page to send request to change login on system " new " -->
                <h3 class="log"><a href="forget_pass.php">or Forget password</a></h3>
                <h6 class="warn"><?php echo $error; ?></h6> 
            </form>
            <!--  Forget Password   -->
        </section>
        <!--      Start footer       -->
        <?php include("Footer.php"); ?>
        <!--    end footer     -->
    </body>
</html>
