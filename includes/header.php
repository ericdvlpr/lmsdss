 <?php  

 include 'core/database.php';  
$object = new Database();
if(!isset($_SESSION['username'])){
 	header("location:login.php");
}
 ?> 
 <html>  
      <head>  
           <title>Library Management System</title>  
           
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
           	<link rel="stylesheet" type="text/css" href="css/chosen.css">
           <link rel="stylesheet" href="css/bootstrap.min.css" />
           <link rel="stylesheet" href="css/jquery.dataTables.min.css" />   
<!--            <link rel="stylesheet" href="css/jquery.dataTables.min.css" />    -->
         	    <link rel="stylesheet" href="css/style.css">
              <link rel="stylesheet" href="css/bootstrap-select.min.css">
              <link rel="stylesheet" href="css/jquery-ui.css">
              <link rel="stylesheet" href="css/style.css"> 
         	    <!-- <script src="js/webcam.js"></script> -->
         	    
         	   
      </head> 
 <body>  
 	<?php include 'includes/nav.php';?>