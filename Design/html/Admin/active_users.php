<?php
$path = __DIR__;
$path = rtrim($path, "classes");
include_once "../../../Database/DB.php";
$db = DB::getInstance(); //object mn el database
$tarr = $db->fulljoin("*","active_users","user"," active_users.user_id = user.user_id");
// DRAW TABLE 
    echo "<div id=\"QTable\">";
    echo "<table border=3 width=100% >";
    echo "<tr>";
    foreach ($tarr as $key => $value) {
        foreach ($value as $r => $c) {
            echo "<th style=\"background-color: gray;color: white;\">";
            echo $r . "<br>";
            echo "</th>";
        }
        break;
    }
    
    echo "</tr>";
    $firstelementval = "one";
    $firstelementname = "name";
    foreach ($tarr as $key => $value) {
        echo "<tr>";
        foreach ($value as $row => $colval) {
            if ($firstelementval == "one") {
                $firstelementval = $colval;
                $firstelementname = $row;
            }
//
            echo "<td >";
            echo $colval;
            echo "</td>";
        }
        echo '</tr>';

    }


    echo "</table>";
    echo "</div>";
?>
