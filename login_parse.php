<?php
	session_start();
	include 'core/database.php';
	$data = new Database;
	$query = "SELECT * FROM students WHERE student_id ='".$_GET['id']."'";
	$result =  $data->execute_query($query);
	
	$row = mysqli_fetch_object($result);
		$_SESSION['id'] = $row->student_id;;
		$_SESSION['name'] = $row->student_name;
		$_SESSION['type'] = "Student";
		header("location: searchBook.php");	

?>