<?php  
 //action.php  
 include 'database.php';  
 $object = new Database();  
 if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "Load")  
      {  
           echo $object->get_data_in_table("SELECT * FROM book ");  
      }
      if($_POST["action"] == "Book")  
      {  
           echo $object->get_book_data("SELECT * FROM book ");  
      }  
       if($_POST["action"] == "Category")  
      {  
           echo $object->get_category_data("SELECT * FROM category ");  
      } 
       if($_POST["action"] == "Author")  
      {  
           echo $object->get_author_data("SELECT * FROM authors ");  
      }
        if($_POST["action"] == "Borrow")  
      {  
           echo $object->get_borrowered_data("SELECT * FROM borrowdetails LEFT JOIN borrow USING (borrow_id) LEFT JOIN students USING (student_id) LEFT JOIN book USING (book_id)");  
      }
       if($_POST["action"] == "Students")  
      {  
           echo $object->get_student_data("SELECT * FROM students ");  
      }   
       if($_POST["action"] == "Users")  
      {  
           echo $object->get_user_data("SELECT * FROM users WHERE access_level != 0  ");  
      }     
      if($_POST["action"] == "Insert")  
      {  
           $first_name = mysqli_real_escape_string($object->connect, $_POST["first_name"]);  
           $last_name = mysqli_real_escape_string($object->connect, $_POST["last_name"]);  
           $image = $object->upload_file($_FILES["user_image"]);  
           $query = "  
           INSERT INTO users  
           (first_name, last_name, image)   
           VALUES ('".$first_name."', '".$last_name."', '".$image."')  
           ";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }  
 }  
 ?>  