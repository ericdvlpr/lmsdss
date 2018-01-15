<?php
 include 'database.php'; 
  $object = new Database();  
//set random name for the image, used time() for uniqueness
if(isset($_SESSION['lastID'])){
	$filename =  time() . '.jpg';
	$filepath = 'img/student_images/';

	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

	$imagePath= $filepath.$filename;
	echo $query = "UPDATE students SET image = '$imagePath' WHERE id='".$_SESSION['lastID']."'";
	$object->execute_query($query);
}

?>
