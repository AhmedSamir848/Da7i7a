<?php
error_reporting(E_ERROR);
session_start();
$type = $_SESSION['type'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path,$type)) {
        header("Location: ../Start/privent_admin.php");
    exit();
}
include_once '../../../classes/Admin.php';
$notes = "";
if (isset($_POST['a_request'])) {
    //echo $_POST['requst_id'] . "<br>";
    $prof_id = $_POST['requst_id'];
    $admin = new Admin();
    if ($admin->AcceptDoctorJoin($prof_id)) {
        $notes = "Accepted professor successfully";
    } else {
        $notes = "Sorry , can't accepte professor";
    }
} else if (isset($_POST['d_request'])) {
    $prof_id = $_POST['requst_id'];
    $admin = new Admin();
    if ($admin->Refusedoctor($prof_id)) {
        $notes = "professor was Deleted successfully";
    } else {
        $notes = "Sorry , can't delete professor";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , intial-scale =1.0">
        <title>Dahiha</title>
        <link rel="stylesheet" href="../../Css/navAndFooter.css">
        <link rel="stylesheet" href="../../Css/login.css">
        <link rel="stylesheet" href="../../Css/admin_profile.css">
        <link rel="stylesheet" href="../../Css/font-awesome.css">
        <link rel="stylesheet" href="../../Css/font-awesome.min.css">
        <link rel="icon" href="../../images/pp.png">
    </head>
    <body>
        <!-- Header   -->
<?php include("Header_1.php"); ?>
        <!-- End Header -->
        <section class="main">
          <!--  <h1>User id =: <?php echo $_SESSION['id']; ?></h1> -->
            <h1>welcome admin </h1>
            <form action="profile_admin.php" method="post">
                <div class="request">
                    <select name="requst_id" class="prof_request">
<?php
$admin = new Admin();
$T_Name = "requests";
$T_Name2 = "user";
$col = array('fromuserid', 'r_type');
$arr = $admin->get_profId($col, $T_Name); // user requests ID
$fname_col = array('userfname');
$arr_name = array(); //Array contain first name from table of user
for ($i = 0; $i < count($arr); $i++) {       // Get first name from user table and push in $arr_name
    $assoc = $admin->show_profNamee_request($fname_col, $T_Name2, "user_id", $arr[$i][0]);
    array_push($arr_name, $assoc);
}
for ($i = 0; $i < count($arr); $i++) {
    //Print All First name of user requests 
    echo "<option  value='" . $arr[$i][0] . "'>" . $arr_name[$i][0] . "</option>";
}
?>
                    </select>
                </div>
                <button name="a_request">Accept</button>
                <button name="d_request">Delete</button><br>
                <h4><?php echo $notes; ?></h4>
            </form>
                        <?php
                        /* echo '<pre>';
                          print_r($arr_name);
                          echo '</pre>'; */
                        ?>

        </section>

        <!--      Start footer       -->
            <?php //include_once 'Footer.php'; ?>
        <!--    end footer     -->
    </body>
</html>