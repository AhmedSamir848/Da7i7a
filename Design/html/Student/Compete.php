<?php

echo 'hello';
//  echo $result[$R[0]]['answer'];
include '../../../classes/Student.php';
//include '../../../Database/DB.php';
$st = new Student();
$DB = DB::getInstance();

static $count = 0;
$Q1 = $_POST['ch0'];
$Q2 = $_POST['ch1'];
$Q3 = $_POST['ch2'];
$Q4 = $_POST['ch3'];
$Q5 = $_POST['ch4'];
$Q6 = $_POST['ch5'];
$Q7 = $_POST['ch6'];
$Q8 = $_POST['ch7'];
$Q9 = $_POST['ch8'];
$Q10 = $_POST['ch9'];
$ans1 = $_POST['resul0'];
$ans2 = $_POST['resul1'];
$ans3 = $_POST['resul2'];
$ans4 = $_POST['resul3'];
$ans5 = $_POST['resul4'];
$ans6 = $_POST['resul5'];
$ans7 = $_POST['resul6'];
$ans8 = $_POST['resul7'];
$ans9 = $_POST['resul8'];
$ans10 = $_POST['resul9'];

if ($st->Check_RightAnswer($Q1, $ans1)) {
    $count++;
}
if ($st->Check_RightAnswer($Q2, $ans2)) {
    $count++;
}
if ($st->Check_RightAnswer($Q3, $ans3)) {
    $count++;
}
if ($st->Check_RightAnswer($Q4, $ans4)) {
    $count++;
}
if ($st->Check_RightAnswer($Q5, $ans5)) {
    $count++;
}
if ($st->Check_RightAnswer($Q6, $ans6)) {
    $count++;
}
if ($st->Check_RightAnswer($Q7, $ans7)) {
    $count++;
}
if ($st->Check_RightAnswer($Q8, $ans8)) {
    $count++;
}
if ($st->Check_RightAnswer($Q9, $ans9)) {
    $count++;
}
if ($st->Check_RightAnswer($Q10, $ans10)) {
    $count++;
}
echo 'your points is' . $count;
?>