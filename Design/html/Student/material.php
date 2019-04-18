<?php

include './header.php';
include '../../../classes/Student.php';
error_reporting(E_ERROR);

?>

<!DOCTYPE html>

<html>
    <head>
        <style>
            .matrs pre{
                font-family: monospace;
                font-size: 20px;
            }
            .matrs strong{
                color:#009900;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <?php 
$s=new Student();
$s->getMaterilas(1);
?>
    </body>
</html>
