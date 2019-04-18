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
<!-- <button id="AddID" height="25px" width="30px"> Add ID </button> -->
<form method="post" action="../../../Classes/Email_Config.php" class="MailForm">
    <div class="Info">
        <label> Subject </label>
        <input type="text" name="Subject" placeholder="text">
        <div id="content">
            <label> User ID If Multiple Separate by " , " </label>
            <input type="text" name="ID" placeholder="ID Number">
        </div>
    </div>
    <textarea maxlength="300" placeholder="Write Your Message" name="mail_msg"></textarea>
    <input type="submit" value="Send" class="Submit">
</form>

<?php
require_once "BackToAdminPannel.php";
?>