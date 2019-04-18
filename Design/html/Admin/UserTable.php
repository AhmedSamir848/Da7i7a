<?php
error_reporting(E_ERROR);
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';
 $db = DB::getInstance();
 $arr=array("user_id","userfname","userlname","usertypeid");
$result = $db->select_cols($arr, "user");
echo "<div id=\"QTable\">";
echo "<table border=3 width=100% >";
echo "<tr><th>User ID</th><th>User FName</th><th>User LName</th><th>User Type</th></tr>";
 for($i=0;$i<count($result);$i++)
        {     if ($result[$i]['3'] != 1){
             echo "<tr>";
             echo "<th>" . $result[$i]['0']."</th>" ."<th>". $result[$i]['1']. "</th><th>" . $result[$i]['2']."</th><th>" . $result[$i]['3']."</th>";
             echo "</tr>";
        
        }
        }
echo "</table>";
echo "</div>";

?>
