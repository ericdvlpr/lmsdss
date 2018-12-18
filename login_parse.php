<?php
	//session_start();
	include 'core/database.php';
	$data = new Database;
	if(isset($_GET['id'])){
		$query = "SELECT * FROM users WHERE user_id = '".$_GET['id']."'  ";
		$result = $data->execute_query($query);
		$row = mysqli_fetch_object($result);
		$_SESSION['id'] = $row->user_id;
		$_SESSION['username'] = $row->username;
		$_SESSION['access'] = $row->access;
		$_SESSION['department'] = $row->department;
		header("location:index.php");
	}else{
		header("location:login.php");
	}

?>
