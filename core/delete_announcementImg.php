<?php 
  
  if(!empty($_POST['filename'])) {
      $file = $_POST['filename'];
      unlink($file);
      echo 'File has been deleted';      
  }
 ?>