<?php  

 include 'core/database.php';  
$object = new Database();
if(!isset($_SESSION['username'])){
  header("location:login.php");

}
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
            <link rel="stylesheet" href="css/jquery-ui.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'nav.php'; ?>
