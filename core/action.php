<?php  
 //action.php  
 include 'database.php';  
 $object = new Database();  
 if(isset($_POST["action"]))  
 {  
      //Load queries
      if($_POST["action"] == "Load")  
      {  
           echo $object->get_data_in_table("SELECT * FROM book ");  
      }
      if($_POST["action"] == "Book")  
      {  
           echo $object->get_book_data("SELECT * FROM book b LEFT JOIN authors a ON a.id =b.author LEFT JOIN publishers p ON p.id=b.book_pub LEFT JOIN status s ON s.id = b.status LEFT JOIN catalogue c on b.category_id = c.catalogue_id ");  
      }  
       if($_POST["action"] == "Catalogoue")  
      {  
           echo $object->get_catalogue_data("SELECT * FROM catalogue ");  
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
      if($_POST["action"] == "Department")
           {
            $output ='';
            $query = "SELECT * FROM departments";
            $result = $object->execute_query($query);
            $output .='<option value="">Please Select</option>';
            while($row = mysqli_fetch_array($result))
            {
             $output .= '<option value="'.$row["dept_id"].'">'.$row["department_name"].'</option>';
            }
            echo $output;
       }
       if($_POST["action"] == "Course") {
            $output ='';
            $query = "SELECT * FROM courses WHERE department_code='".$_POST['val']."' ";
            $result = $object->execute_query($query);
            $output .='<option value="">Please Select</option>';
            while($row = mysqli_fetch_array($result))
            {
             $output .= '<option value="'.$row["course_id"].'">'.$row["course_name"].'</option>';
            }
            echo $output;
         }

      //Insert queries   
      if($_POST["action"] == "addBook") {  

            $book_no = mysqli_real_escape_string($object->connect, $_POST["book_no"]);  
            $book_name = mysqli_real_escape_string($object->connect, $_POST["book_name"]);  
            $category = mysqli_real_escape_string($object->connect, $_POST["category"]);  
            $author = mysqli_real_escape_string($object->connect, $_POST["author"]); 
            $author_id = $object->get_auth_id($author);
            $publisher = mysqli_real_escape_string($object->connect, $_POST["publisher"]);  
            $publisher_id = $object->get_pub_id($publisher);
            $book_copies = mysqli_real_escape_string($object->connect, $_POST["book_copies"]);  
            $cp_yr = mysqli_real_escape_string($object->connect, $_POST["cp_yr"]);  
            $date_rcv = mysqli_real_escape_string($object->connect, $_POST["date_rcv"]);  
            $status = mysqli_real_escape_string($object->connect, $_POST["status"]);  
             $isbn = mysqli_real_escape_string($object->connect, $_POST["isbn"]);
           $query = "  
           INSERT INTO book  
           (book_no,book_title, category_id, author, book_copies, book_pub, isbn, copyright_year,date_receive,status)   
           VALUES ('".$book_no."', '".$book_name."', '".$category."','".$author_id."','".$book_copies."','".$publisher_id."','".$isbn."','".$cp_yr."','".$date_rcv."','".$status."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      } 
      if($_POST["action"] == "addAuthor") {  

            $author_no = mysqli_real_escape_string($object->connect, $_POST["author_no"]);  
            $author_name = mysqli_real_escape_string($object->connect, $_POST["author_name"]);  
           $query = "  
           INSERT INTO authors  
           (author_id,author_name)   
           VALUES ('".$author_no."', '".$author_name."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      } 
      if($_POST["action"] == "addCatalogue") {  

            $catalogue_no = mysqli_real_escape_string($object->connect, $_POST["catalogue_no"]);  
            $catalogue_name = mysqli_real_escape_string($object->connect, $_POST["catalogue_name"]);  
           $query = "  
           INSERT INTO catalogue  
           (catalogue_no,cataloguename)   
           VALUES ('".$catalogue_no."', '".$catalogue_name."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }



      //Fetch Queries 
      if($_POST["action"]=="Fetch Book Data") {
      
                $output =array();
               $query = "SELECT * FROM book b LEFT JOIN authors a ON a.id = b.author LEFT JOIN publishers p ON p.id=b.book_pub LEFT JOIN status s ON s.id = b.status WHERE book_id ='".$_POST['bookID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["book_id"] = $row["book_id"];
                  $output["book_no"] = $row["book_no"];
                  $output["book_title"] = $row["book_title"];
                  $output["category_id"] = $row["category_id"];
                  $output["author"] = $row["author_name"];
                  $output["book_copies"] = $row["book_copies"];
                  $output["book_pub"] = $row["book_publisher"];
                  $output["isbn"] = $row["isbn"];
                  $output["copyright_year"] = $row["copyright_year"];
                  $output["date_receive"] = $row["date_receive"];
                  $output["status"] = $row["id"];
                  
            
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Author Data") {
      
                $output =array();
               $query = "SELECT * FROM authors WHERE id ='".$_POST['authorID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["id"] = $row["id"];
                 $output["author_id"] = $row["author_id"];
                  $output["author_name"] = $row["author_name"];
                }

                echo json_encode($output);
                
      }

      //Generate Number
      if($_POST['action']=="vin") {
              $newcode=$object->get_number("SELECT bookNum FROM bookNumber");
                $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -1);
                $num = substr(str_shuffle("0123456789"), -4);
                $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -3);
                $vin=trim($alpha.$num.$end.$newcode);
                echo $vin;
      }
       if($_POST['action']=="author num"){
                $newcode=date("Y d F");
                $uniqueCode = strtotime($newcode);
                $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-1);
                       $num = substr(str_shuffle("0123456789"),-4);
                       $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-3);
            /*          $newcode=str_pad(10000 +$cvin, 5, 0, STR_PAD_LEFT);*/

                       // //$vin = "0514-0225A-";
                       $author_code=trim($alpha.$num.$end.$uniqueCode);
                      echo $author_code;
      }
      if($_POST['action']=="catalogue num"){
                $newcode=date("Y d F");
                $uniqueCode = strtotime($newcode);
                $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-1);
                       $num = substr(str_shuffle("0123456789"),-4);
                       $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-3);
            /*          $newcode=str_pad(10000 +$cvin, 5, 0, STR_PAD_LEFT);*/

                       // //$vin = "0514-0225A-";
                       $catalogue_code=trim($alpha.$num.$end.$uniqueCode);
                      echo $catalogue_code;
      }
      if($_POST['action']=="Generate"){
                $newcode=date("Y d F");
                $uniqueCode = strtotime($newcode);
                $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-1);
                       $num = substr(str_shuffle("0123456789"),-8);
                       $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-3);
            /*          $newcode=str_pad(10000 +$cvin, 5, 0, STR_PAD_LEFT);*/

                       // //$vin = "0514-0225A-";
                       $passcode=trim($num);
                      echo $passcode;
      }
      //Update queries
      if($_POST['action']=="Edit") {
              
              
               $book_id = mysqli_escape_string($object->connect,$_POST["book_id"]);
               $book_title = mysqli_escape_string($object->connect,$_POST["book_name"]);
               $category_id = mysqli_escape_string($object->connect,$_POST["category"]);
               $author_name = mysqli_escape_string($object->connect,$_POST["author"]);
               $book_copies = mysqli_escape_string($object->connect,$_POST["book_copies"]);
               $book_publisher = mysqli_escape_string($object->connect,$_POST["publisher"]);
               $cp_yr = mysqli_escape_string($object->connect,$_POST["cp_yr"]);
               $date_rcv = mysqli_escape_string($object->connect,$_POST["date_rcv"]);
               $status = mysqli_escape_string($object->connect,$_POST["status"]);
               $isbn = mysqli_escape_string($object->connect,$_POST["isbn"]);

              $query = "UPDATE book SET book_title ='$book_title', category_id = '$category_id', author='$author_name', book_copies='$book_copies', book_pub='$book_publisher', isbn='$isbn',copyright_year='$cp_yr',date_receive='$date_rcv',status='$status' WHERE book_id = '".$_POST['book_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
            } 
            if($_POST['action']=="Edit Author") {
              
              
               $author_no = mysqli_escape_string($object->connect,$_POST["author_no"]);
               $author_name = mysqli_escape_string($object->connect,$_POST["author_name"]);

              $query = "UPDATE authors SET author_id ='$author_no', author_name = '$author_name' WHERE id = '".$_POST['author']."' ";
              $object->execute_query($query);
              echo 'Data Updated';
            } 


      //Delete Queries      
        if($_POST['action']=="Delete Book"){
        
          $query = "DELETE FROM book WHERE book_id = '".$_POST['book_id']."' ";
           $object->execute_query($query);
           echo "Data Deleted";
        }
        if($_POST['action']=="Delete Author"){
        
          $query = "DELETE FROM authors WHERE author_id = '".$_POST['author_id']."' ";
           $object->execute_query($query);
           echo "Data Deleted";
        }
        // Search Queries
        if($_POST["action"]=="Search") {
            $output = '';
             if($_POST["type"]=="author") {
                    $search = mysqli_real_escape_string($object->connect,  $_POST["search"]);
                    $query = "
                    SELECT * FROM authors
                    WHERE author_name LIKE '%".$search."%' LIMIT 5";
                    $result = $object->execute_query($query);
                     while($row = mysqli_fetch_array($result))
                         {
                          $output .= '
                            <option value="'.$row["author_name"].'">
                          ';
                         }
                         echo $output;
                }
            if($_POST["type"]=="publisher") {
                    $search = mysqli_real_escape_string($object->connect,  $_POST["search"]);
                    $query = "
                    SELECT * FROM publishers
                    WHERE publisher_name LIKE '%".$search."%' OR book_publisher LIKE '%".$search."%'  LIMIT 5";
                    $result = $object->execute_query($query);
                     while($row = mysqli_fetch_array($result))
                         {
                          $output .= '
                            <option value="'.$row["publisher_name"].'">
                          ';
                         }
                         echo $output;
                }
          }
 }  
 ?>  