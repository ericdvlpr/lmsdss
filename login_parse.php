<?php
	//session_start();
	include 'core/database.php';
	$data = new Database;
	if($_GET['type'] == "0" || $_GET['type'] == "1" || $_GET['type'] == "2"){
		$query = "SELECT * FROM students WHERE student_id ='".$_GET['id']."'";
		$result =  $data->execute_query($query);
		$row = mysqli_fetch_object($result);
		$_SESSION['id'] = $row->student_id;
		$_SESSION['username'] = $row->student_name;
		$_SESSION['name'] = $row->student_name;
		$_SESSION['type'] = $_GET['type'];
		$_SESSION['access'] = "5";

		if($_GET['type'] == "2"){
			header("location: searchBook.php");
		}else{
			header("location: student_index.php");
		}
	}else if($_GET['type'] == "3"){
		$query = "SELECT * FROM faculty WHERE faculty_no ='".$_GET['id']."' ";
		$result =  $data->execute_query($query);
		$row = mysqli_fetch_object($result);
		$_SESSION['id'] = $row->faculty_no;
		$_SESSION['username'] = $row->faculty_name;
		$_SESSION['name'] = $row->faculty_name;
		$_SESSION['type'] = $_GET['type'];
		$_SESSION['access'] = "4";
		header("location: faculty_index.php");
	}else if($_GET['type'] == "4"){
		$query = "SELECT * FROM users WHERE username = '".$_GET['id']."'  ";
		$result = $data->execute_query($query);
		$row = mysqli_fetch_object($result);
		$_SESSION['id'] = $row->id;
		$_SESSION['username'] = $row->username;
		$_SESSION['access'] = $row->access;
		$_SESSION['department'] = $row->department;
		header("location:index.php");

	}
	// if(isset($_GET['id'])){
	// 	$query = "SELECT * FROM users WHERE user_id = '".$_GET['id']."'  ";
	// 	$result = $data->execute_query($query);
	// 	$row = mysqli_fetch_object($result);
	// 	$_SESSION['id'] = $row->user_id;
	// 	$_SESSION['username'] = $row->username;
	// 	$_SESSION['access'] = $row->access;
	// 	$_SESSION['department'] = $row->department;
	// 	header("location:index.php");
	// }else{
	// 	header("location:login.php");
	// }

?>
