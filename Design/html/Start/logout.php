<?php
error_reporting(E_ERROR);
session_start();
$id = $_SESSION['id'];
error_reporting(E_ERROR);
include_once '../../../classes/user.php';
$user= new user();
$user->Logout($id);
header("Location: login.php");