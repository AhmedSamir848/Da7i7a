<?php
session_start();
$type = $_SESSION['type'];
include_once './../../../classes/System.php';
$sys = new System();
$path = basename(__FILE__, '.php');
if (!$sys->check_accessability($path,$type)) {
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
        <link href="../../Css/Admin/Admin.css" rel="stylesheet" >
        <link href="../../Css/Admin/ManipulateCompQuestions.css" rel="stylesheet">

    </head>
    <body>
        <?php
        
        require_once "Header.php";
        
        require_once "Navbar.php";

        require_once "AdminSidebar.php";
        if (isset($_GET['Option'])) {
            if ($_GET['Option'] == 1)
            /*             * ************************************** QUESTIONS TABLE AND OPTIONS START *********************** */ {
                require_once "active_users.php";
            }
            /*             * ************************************** QUESTIONS TABLE AND OPTIONS END *********************** */
            else if ($_GET['Option'] == 2) {
                require_once "SendMail.php";
            } else if ($_GET['Option'] == 4) {
                require_once "Profile_admin.php";
            } 
            else if ($_GET['Option'] == 5) {
                require_once "Delete.php";
            }else if ($_GET['Option'] == 6) {
                require_once "ADD.php";
            }
        }
   
        ?>
        <form action="../../../classes/report_pdf.php" method="post">
            <button name="report"> print Report</button>
        </form>
        
        <!------------------------------------------------------------------ END OF MAIN DIV -------------------------------------------->
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "255px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
    </script>
</body>
</html>