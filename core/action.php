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
           echo $object->get_book_data("SELECT * FROM book b LEFT JOIN authors a ON a.id =b.author LEFT JOIN publishers p ON p.id=b.book_pub LEFT JOIN status s ON s.id = b.status ");  
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



      //Insert queries   
      if($_POST["action"] == "addBook")  
      {  

            $book_no = mysqli_real_escape_string($object->connect, $_POST["book_no"]);  
            $book_name = mysqli_real_escape_string($object->connect, $_POST["book_name"]);  
            $category = mysqli_real_escape_string($object->connect, $_POST["category"]);  
            $author = mysqli_real_escape_string($object->connect, $_POST["author"]);  
            $publisher = mysqli_real_escape_string($object->connect, $_POST["publisher"]);  
            $book_copies = mysqli_real_escape_string($object->connect, $_POST["book_copies"]);  
            $cp_yr = mysqli_real_escape_string($object->connect, $_POST["cp_yr"]);  
            $date_rcv = mysqli_real_escape_string($object->connect, $_POST["date_rcv"]);  
            $status = mysqli_real_escape_string($object->connect, $_POST["status"]);  
             $isbn = mysqli_real_escape_string($object->connect, $_POST["isbn"]);
           $query = "  
           INSERT INTO book  
           (book_no,book_title, category_id, author, book_copies, book_pub, isbn, copyright_year,date_receive,status)   
           VALUES ('".$book_no."', '".$book_name."', '".$category."','".$author."','".$book_copies."','".$publisher."','".$isbn."','".$cp_yr."','".$date_rcv."','".$status."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      } 





      //Fetch Queries 
      if($_POST["action"]=="Fetch Book Data"){
      
                $output =array();
               $query = "SELECT * FROM book b LEFT JOIN authors a ON a.id = b.author LEFT JOIN publishers p ON p.id=b.book_pub LEFT JOIN status s ON s.id = b.status WHERE book_id ='".$_POST['bookID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result))
                {
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

      //Generate Number
      if($_POST['action']=="vin"){
                
                
              $newcode=$object->get_number("SELECT bookNum FROM bookNumber");

                
                $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -1);
                       $num = substr(str_shuffle("0123456789"), -4);
                       $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -3);
            /*          $newcode=str_pad(10000 +$cvin, 5, 0, STR_PAD_LEFT);*/

                       //$vin = "0514-0225A-";
                       $vin=  $alpha.$num.$end.$newcode;
                      echo $vin;
      }


      //Update queries
      if($_POST['action']=="Edit"){
              
              
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


      //Delete Queries      
        if($_POST['action']=="Delete"){
        
          $query = "DELETE FROM residents WHERE id = '".$_POST['res_id']."' ";
           $object->execute_query($query);
           echo "Data Deleted";
        }

        if($_POST["action"]=="Search") {
            $output = '';
             if($_POST["type"]=="author") {
                   $search = mysqli_real_escape_string($object->connect,  $_POST["search"]);
                    $query = "
                    SELECT * FROM author 
                    WHERE author_name LIKE '%".$search."%'";
                    $result = $object->execute_query($query);
                     while($row = mysqli_fetch_array($result))
                         {
                          $output .= '
                            <li>'.$row["CustomerName"].'</li>
                          ';
                         }
                         echo $output;
                }
           
          }
 }  
 ?>  