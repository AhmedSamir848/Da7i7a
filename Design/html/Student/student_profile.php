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
include 'header.php';
include '../../../classes/Student.php';
?>
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

<!DOCTYPE html>
<html>
    <head>

        <style>
            .msrq{
                float: left;
            }
            .row{
                text-align: center;
                font-family: monospace;
            }
        </style>
    </head>
    <body>
        <div class="msrq col-lg-12">
            <button class="btn btn-danger" type="button">
                Requests <span class="badge">4</span>
            </button>
            <button class="btn btn-success" type="button">
                Messages <span class="badge">20</span>
            </button>    
        </div>
        <div class="row ">
            <div class="col-lg-4 ">
                <div class="thumbnail">
                    <a href="#"><div>
                        </div><img src=<?php echo '../../images/profile_pc/' . $image[0]; ?> ></a>                    
                         <div class="caption">
                        <?php                         
                        echo '<h3>';
                        echo $_SESSION['fname']; 
                        echo $_SESSION['lname'];
                        echo '<h3>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
