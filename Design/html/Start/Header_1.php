<?php
include_once '../../../classes/User.php';
error_reporting(E_ERROR);
$id = $_SESSION['id'];
$col = array("profile_picture");
$T_Name = "user";
$key = "user_id";
$val = $id;
$user = new user();
$image = $user->image($col, $T_Name, $key, $val);
?>
<!-- start navbar --> <!--  -->
<nav>
    <div class="logo">
        <h3><span>d</span>a7i7a</h3>
        <a href="#"><img src="../../images/pp.png" alt="logo"></a>
        <div class="clear"></div>
    </div>
    <div class="item">
        <a href="#">Home </a>
        <a href="../Student/Challenge.php">Challenge</a>
        <a href="../Student/team_1.php">Teams</a>
        <a href="../Student/uploadmaterial_student.php">Materials</a>
        <a href="#">About Us</a>
        <a href="../Start/logout.php" >Logout</a>

        <a href="#"><div><?php echo $_SESSION['fname']; ?></div><img src=<?php echo '../../images/profile_pc/' . $image[0]; ?> ></a>
    </div>

    <div class="clear"></div>
</nav>
<!------------------------------------------------------------- -->
