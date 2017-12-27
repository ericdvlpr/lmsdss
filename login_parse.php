<?php
	session_start();
	include 'core/database.php';
	$data = new Database;
	
	
	if($_GET['type'] == "0" || $_GET['type'] == "1" || $_GET['type'] == "2"){
		$query = "SELECT * FROM students WHERE student_id ='".$_GET['id']."'";
		$result =  $data->execute_query($query);
		$row = mysqli_fetch_object($result);		
		$_SESSION['id'] = $row->student_id;
		$_SESSION['name'] = $row->student_name;
	}else if($_GET['type'] == "3"){
		$query = "SELECT * FROM faculty WHERE faculty_no ='".$_GET['id']."'";
		$result =  $data->execute_query($query);
		$row = mysqli_fetch_object($result);
		$_SESSION['id'] = $row->faculty;
		$_SESSION['name'] = $row->student_name;
	}
		$_SESSION['type'] = $_GET['type'];
		header("location: searchBook.php");
		
	

?>