<?php
include_once '../../../classes/user.php';
include_once '../../../classes/Admin.php';
$note = "";
if (isset($_POST['forget'])) {
    $user = new user();
    $email = addslashes(htmlentities($_POST['email']));
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = $user->ForgetPassword($email);
        if ($result) {
            $note = "we are send meassge to your email ";
            $admin = new Admin();
            /*  $subject="Da7aia Staff"; // this is data wil be sent to user by attache with new password 
              $da7i7a_mail="";
              mail($email, $subject, $message, $da7i7a_mail); */
            $message = "Your Password changed based on your request and your new password is : " . $result[0];
            $admin->SendMail($email, $message);
            header("refresh:3; url=login.php");
        } else {
            $note = "sorry, try again";
        }
    } else {
        $note = "wtite valid password";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Da7i7a</title>
        <link rel="stylesheet" href="../../Css/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/forget.css">
        <link rel="stylesheet" href="../../Css/font-awesome.css">
        <link rel="stylesheet" href="../../Css/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header   -->
        <?php include("Header.php"); ?>
        <!-- End Header -->
        <div class="forget">
            <form action="forget_pass.php" method="post">
                <input type="email" name="email" placeholder="Write your email*" required><br>
                <input type="submit" name="forget" value="Forget Password">
            </form>
            <h2><?php echo $note; ?></h2>
        </div>
        <!--      Start footer       -->
        <?php include("Footer.php"); ?>
        <!--    end footer     -->
    </body>
</html>