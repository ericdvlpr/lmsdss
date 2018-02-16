<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand() . '.' . $ext;
 $path = "images/books/" . $name; 
$location = "../images/books/". $name; 
 // $location = '../img/books/' . $name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo '<img src="'.$path.'" height="150" width="225" class="img img-thumbnail" />';
 echo '<input type ="hidden" name="path" id="path" value="'.$path.'"/>';
 echo '<div class="pull-right">  
                          <button type="button" data-path="'.$location.'" id="remove_button" class="btn btn-danger">x</button>  
                     </div>';
}
?>