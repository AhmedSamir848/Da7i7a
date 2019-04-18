<?php
session_start();
error_reporting(E_ERROR);
$type = $_SESSION['type'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path, $type)) {
    header("Location: ../Start/privent_admin.php");
    exit();
}
include '../Admin/UserTable.php';
include_once '../../../classes/User.php';
$U = new User();
?>

<form method="post" action="">
    <div class="Div_ID">
        <label>User ID</label><br>
        <input type="number" name="User_ID">
    </div>
    <div class="Options1">
        <button type="Add" class="Options" id="Editbtn" name="ADD">ADD ADMIN</button>
    </div>  
</form>
