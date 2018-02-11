<?php 
include 'core/database.php';
$data = new Database;

session_start(); 
$exeque = "INSERT INTO `logs`
              (student_no, description, date_time) VALUES ('".$_SESSION['id']."', 'Logout', NOW())
              ";
$execute = $data->execute_query($exeque);
session_destroy(); 
header("location: login.php");

?>