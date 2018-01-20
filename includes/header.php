 <?php  

 include 'core/database.php';  
$object = new Database();
// if(!isset($_SESSION['username'])){
// 	header("location:login.php");

// }
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">  
            <title>Library Management System</title>   
            <link rel="stylesheet" type="text/css" href="css/chosen.css">
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/jquery.dataTables.min.css" />   
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/bootstrap-select.min.css">
            <link rel="stylesheet" href="css/jquery-ui.css">

            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
             
      </head> 
 <body>  
  <?php include 'includes/nav.php';?>
