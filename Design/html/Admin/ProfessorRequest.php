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
?>
<form action="AdminPannel.php" method="post">
    <?php
    $RowNum = 10;
    $ColumnNum = 4;
    echo "<div id=\"QTable\">";
    echo "<table border=3 width=100% >";
    echo "<tr>";
    echo "<th>";
    echo "Request ID";
    echo "</th>";
    echo "<th>";
    echo "User ID";
    echo "</th>";
    echo "<th>";
    echo "Accept";
    echo "</th>";
    echo "<th>";
    echo "Refuse";
    echo "</th>";
    echo "</tr>";
    for ($r = 1; $r <= $RowNum; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $ColumnNum; $c++) {
            if ($c == 1) {
                echo "<td id=\"td1\">";
                echo "Row " . $r . "Column " . $c . "";
                echo "</td>";
            } else {
                if ($c == 3 || $c == 4) {
                    echo "<td>";
                    // echo "<input type=\"radio\" name='Choice'.$r.''>";
                    echo " <input type=\"radio\" name=$r value=\"\"> ";
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo "Row " . $r . " Column " . $c . "";
                    echo "</td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<button id=\"RequestSubmitbtn\"> Submit </button>";
    ?>
</form>
<?php
require_once "BackToAdminPannel.php";
?>