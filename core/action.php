<?php  
 //action.php  
 include 'database.php';  
 $object = new Database();  
 if(isset($_POST["action"])){
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
        if($_POST["action"] == "Issued")  
      {  

           echo $object->get_borrowered_data("SELECT * FROM borrowdetails LEFT JOIN borrow USING (borrow_id) LEFT JOIN member USING (member_id) LEFT JOIN book USING (book_id)");  

           echo $object->get_book_issued_data("SELECT * FROM issue_book");  

      }
       if($_POST["action"] == "Students")  
      {  
           echo $object->get_student_data("SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course ");  
      }   
       if($_POST["action"] == "Users")  
      {  

           echo $object->get_user_data("SELECT * FROM users ");  

      } 
       if($_POST["action"] == "Faculty")  
      {  
           echo $object->get_faculty_data("SELECT * FROM faculty f LEFT JOIN departments d ON d.dept_id = f.dept ");  

      } 
      if($_POST["action"] == "Book Request")  
      {  
           echo $object->get_request_data("SELECT * FROM book_request ");  

      }    
      if($_POST["action"] == "Insert")  
      {  
           $first_name = mysqli_real_escape_string($object->connect, $_POST["first_name"]);  
           $last_name = mysqli_real_escape_string($object->connect, $_POST["last_name"]);  
           $image = $object->upload_file($_FILES["user_image"]);  

           echo $object->get_user_data("SELECT * FROM users WHERE access != 0 ");  
      }  
      if($_POST["action"] == "Department")
           {
            $output ='';
            $output .='<option value="">Please Select</option>';
            $query = "SELECT * FROM departments";
            $result = $object->execute_query($query);
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
      if($_POST["action"] == "addStudent") {  
             $student_no=mysqli_real_escape_string($object->connect, $_POST["student_no"]);
             $student_name=mysqli_real_escape_string($object->connect, $_POST["student_name"]);
             $sex=mysqli_real_escape_string($object->connect, $_POST["sex"]);
             $contact=mysqli_real_escape_string($object->connect, $_POST["contact"]);
             $dept=mysqli_real_escape_string($object->connect, $_POST["department"]);
             $course=mysqli_real_escape_string($object->connect, $_POST["course"]);
             $courYr=mysqli_real_escape_string($object->connect, $_POST["course-year"]);
             $courYr=mysqli_real_escape_string($object->connect, $_POST["course-year"]);
             $passcode=md5(mysqli_real_escape_string($object->connect, $_POST["passcode"]));
             $type=mysqli_real_escape_string($object->connect, $_POST["type"]);
            $query = "  
           INSERT INTO students  
           (student_id,student_name,gender,contact,type,passcode,dept,course)   
           VALUES ('".$student_no."', '".$student_name."', '".$sex."', '".$contact."','".$type."','".$passcode."','".$dept."','".$course."')"; 
            $object->execute_query("INSERT INTO users(username,password,access)VALUES('".$student_no."','".$passcode."','5')");
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }
      if($_POST["action"] == "addIssueBook") {  
             $book_no=mysqli_real_escape_string($object->connect, $_POST["book_no"]);
             $book_name=mysqli_real_escape_string($object->connect, $_POST["book_name"]);
             $student_name=mysqli_real_escape_string($object->connect, $_POST["student_name"]);
             $qty=mysqli_real_escape_string($object->connect, $_POST["qty"]);
             $date_issued=mysqli_real_escape_string($object->connect, $_POST["date_issued"]);
             $date_returned=mysqli_real_escape_string($object->connect, $_POST["date_returned"]);
            
           $query = "  
           INSERT INTO issue_book  
           (book_no,book_title,student_name,copies,date_issued,date_returned,status)   
           VALUES ('".$book_no."', '".$book_name."', '".$student_name."', '".$qty."', '".$date_issued."','".$date_returned."','1')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }
      if($_POST["action"] == "addUser") {  
             $username=mysqli_real_escape_string($object->connect, $_POST["username"]);
             $password=md5(mysqli_real_escape_string($object->connect, $_POST["password"]));
             $access=mysqli_real_escape_string($object->connect, $_POST["access"]);
            
           $query = "  
           INSERT INTO users  
           (username,password,access)   
           VALUES ('".$username."', '".$password."', '".$access."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }
      if($_POST["action"] == "addRequest") {  
              $request_no=mysqli_real_escape_string($object->connect, $_POST["request_no"]);
              $book_title=mysqli_real_escape_string($object->connect, $_POST["book_title"]);
              $author=mysqli_real_escape_string($object->connect, $_POST["author"]);
              $copies=mysqli_real_escape_string($object->connect, $_POST["copies"]);
               $date_requested = date("Y-m-d");
            $query = "  
           INSERT INTO book_request  
           (request_no,book_title,author,copies,date_requested,status,user_id)   
           VALUES ('".$request_no."', '".$book_title."', '".$author."','".$copies."','".$date_requested."','pending','".$_SESSION['id']."')";  
           $object->execute_query("INSERT INTO notification(notif_id_type,notif_type,notif_subject,notif_text,notif_status,user_id) VALUES('1','request','Requested for Book','".$book_title."','0','".$_SESSION['id']."')"); 
           $object->execute_query($query); 

           echo 'Data Inserted';  
      }
      if($_POST["action"] == "addFaculty") {  
              $faculty_no=mysqli_real_escape_string($object->connect, $_POST["faculty_no"]);
              $faculty_name=mysqli_real_escape_string($object->connect, $_POST["faculty_name"]);
              $department=mysqli_real_escape_string($object->connect, $_POST["department"]);
              $passcode=md5(mysqli_real_escape_string($object->connect, $_POST["passcode"]));
             
            
              $query = "INSERT INTO faculty(faculty_no,faculty_name,dept)VALUES ('".$faculty_no."', '".$faculty_name."', '".$department."')";
             
               $object->execute_query("INSERT INTO users(username,password,access)VALUES('".$faculty_no."','".$passcode."','4')");
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
      if($_POST["action"]=="Fetch Request Data") {
      
                $output =array();
               $query = "SELECT * FROM book_request WHERE request_id ='".$_POST['requestID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["request_id"] = $row["request_id"];
                 $output["request_no"] = $row["request_no"];
                  $output["book_title"] = $row["book_title"];
                   $output["author"] = $row["author"];
                   $output["copies"] = $row["copies"];
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Author Data") {
      
                $output =array();
               $query = "SELECT * FROM authors WHERE id ='".$_POST['authorID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["id"] = $row["id"];
                 $output["author_no"] = $row["author_id"];
                  $output["author_name"] = $row["author_name"];
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Catalogue Data") {
      
                $output =array();
               $query = "SELECT * FROM catalogue WHERE catalogue_id ='".$_POST['catalogueID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["catalogue_id"] = $row["catalogue_id"];
                 $output["catalogue_no"] = $row["catalogue_no"];
                  $output["catalogue_name"] = $row["cataloguename"];
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Student Data") {
      
                $output =array();
               $query = "SELECT * FROM students WHERE id ='".$_POST['studentID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                   $output["student_id"] =$row["student_id"];
                   $output["student_name"] =$row["student_name"];
                   $output["gender"] =$row["gender"];
                   $output["address"] =$row["address"];
                   $output["contact"] =$row["contact"];
                   $output["pwd"] =$row["pwd"];
                   $output["passcode"] =$row["passcode"];
                   $output["dept"] =$row["dept"];
                   $output["course"] =$row["course"];
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Data") {
      
                $output =array();
               $query = "SELECT * FROM book WHERE book_no ='".$_POST['bookID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                  $output["book_title"] = $row["book_title"];
                }

                echo json_encode($output);
                
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
            if($_POST['action']=="Edit Catalogue") {
                $catalogue_name = mysqli_escape_string($object->connect,$_POST["catalogue_name"]);
                $query = "UPDATE catalogue SET cataloguename = '$catalogue_name' WHERE catalogue_id = '".$_POST['catalogue_id']."' ";
                $object->execute_query($query);
                echo 'Data Updated';
            } 
            if($_POST['action']=="Edit Request") {
                
              $request_no=mysqli_real_escape_string($object->connect, $_POST["request_no"]);
              $book_title=mysqli_real_escape_string($object->connect, $_POST["book_title"]);
              $author=mysqli_real_escape_string($object->connect, $_POST["author"]);
              $copies=mysqli_real_escape_string($object->connect, $_POST["copies"]);
              $date_requested = date("Y-m-d");
              $query = "UPDATE book_request SET book_title = '$book_title',author = '$author',copies='$copies' WHERE request_id = '".$_POST['request_id']."' ";
                $object->execute_query($query);
                echo 'Data Updated';
            } 
            if($_POST['action']=="Edit Student") {
                echo $student_no=mysqli_real_escape_string($object->connect, $_POST["student_no"]);
                echo $student_name=mysqli_real_escape_string($object->connect, $_POST["student_name"]);
                echo $dept=mysqli_real_escape_string($object->connect, $_POST["department"]);
                echo $course=mysqli_real_escape_string($object->connect, $_POST["course"]);
                echo $courYr=mysqli_real_escape_string($object->connect, $_POST["course-year"]);
                echo $passcode=mysqli_real_escape_string($object->connect, $_POST["passcode"]);
                echo $pwd=mysqli_real_escape_string($object->connect, $_POST["pwd"]);
                echo $address=mysqli_real_escape_string($object->connect, $_POST["address"]);
                echo $sex=mysqli_real_escape_string($object->connect, $_POST["sex"]);
                echo $contact=mysqli_real_escape_string($object->connect, $_POST["contact"]);


                $query = "UPDATE students SET student_no = '$student_no',student_name='$student_name',address='$address',sex='$sex',contact='$contact',dept='$dept',course='$course',pwd='$pwd',passcode='$passcode' WHERE id = '".$_POST['student_id']."' ";
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
        if($_POST['action']=="Delete Catalogue"){
        
          $query = "DELETE FROM catalogue WHERE catalogue_id = '".$_POST['catalogue_id']."' ";
           $object->execute_query($query);
           echo "Data Deleted";
        }
        if($_POST['action']=="Delete Student"){
        
          $query = "DELETE FROM students WHERE id = '".$_POST['student_id']."'";
           $object->execute_query($query);
           echo "Data Deleted";
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
      if($_POST['action']=="Request"){
                $newcode=date("Y d F");
                $uniqueCode = strtotime($newcode);
                $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-1);
                       $num = substr(str_shuffle("0123456789"),-8);
                       $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-3);
            /*          $newcode=str_pad(10000 +$cvin, 5, 0, STR_PAD_LEFT);*/

                       // //$vin = "0514-0225A-";
                       $request_num=trim($num);
                      echo $request_num;
      }
        // Search Queries
      /*
        if($_POST["action"]=="Search") {
            $output = '';
             if($_POST["type"]=="author") {
                    $search = mysqli_real_escape_string($object->connect,  $_POST["search"]);
                    $output = '<ul class="list-unstyled author">';  
                    $query = "
                    SELECT * FROM authors
                    WHERE author_name LIKE '%".$search."%' LIMIT 5";
                    $result = $object->execute_query($query);
                     if(mysqli_num_rows($result) > 0)  
                      {  
                       while($row = mysqli_fetch_array($result))
                           {
                            $output .= '
                              <li>'.$row["author_name"].'</li>
                            ';
                           }
                         }else{
                          $output .= '<li>Author Not Found</li>';  
                         }
                          $output .= '</ul>';  
                         echo $output;
                }
                if($_POST["type"]=="publisher") {
                        $search = mysqli_real_escape_string($object->connect,  $_POST["search"]);
                        $output = '<ul class="list-unstyled publisher">';  
                        $query = "
                        SELECT * FROM publishers
                        WHERE publisher_name LIKE '%".$search."%' OR book_publisher LIKE '%".$search."%'  LIMIT 5";
                        $result = $object->execute_query($query);
                          if(mysqli_num_rows($result) > 0)  
                          {  
                           while($row = mysqli_fetch_array($result))
                               {
                                $output .= '
                                  <li>'.$row["publisher_name"].'</li>
                                ';
                               }
                             }else{
                              $output .= '<li>Publisher Not Found</li>';  
                             }
                              $output .= '</ul>';  
                             echo $output;
                    }
                if($_POST["type"]=="bookNo") {
                        $search = mysqli_real_escape_string($object->connect,  $_POST["search"]);
                        $output = '<ul class="list-unstyled bookNo">';  
                        $query = "
                        SELECT * FROM book
                        WHERE book_no LIKE '%".$search."%' LIMIT 5";
                        $result = $object->execute_query($query);
                          if(mysqli_num_rows($result) > 0)  
                          {  
                           while($row = mysqli_fetch_array($result))
                               {
                                $output .= '
                                  <li>'.$row["book_no"].'</li>
                                ';
                               }
                             }else{
                              $output .= '<li>Invalid Book No</li>';  
                             }
                              $output .= '</ul>';  
                             echo $output;
                      }
                }

          // $expired = (strtotime('2017-12-01') == strtotime('2017-12-01'));
          // if ($expired) {
          //   // Do something, like output an error
          //   echo 'expired';
          //   // die();
          // }
          */
     if($_POST["action"] == "Search")  
      {
          //"searching for ".$_POST["srch_name"]; 
          echo $object->get_search_data("SELECT b.book_title, b.book_no AS book_id, a.author_name AS author, b.copyright_year, p.publisher_name, p.book_publisher AS book_pub, b.isbn, b.location, b.department  FROM book b LEFT JOIN authors a ON a.id = b.author LEFT JOIN publishers p ON p.id=b.book_pub LEFT JOIN status s ON s.id = b.status WHERE book_title LIKE '%".$_POST["srch_name"]."%' ORDER BY b.book_title ASC");
      }
      if($_POST["action"] == "Book_select")  
      {
          //"searching for ".$_POST["srch_name"]; 
          echo $object->get_selected_data("SELECT b.book_title, b.book_no AS book_id, a.author_name AS author, b.copyright_year, p.publisher_name, p.book_publisher AS book_pub, b.isbn, b.book_copies, b.location as location, b.department as department FROM book b LEFT JOIN authors a ON a.id = b.author LEFT JOIN publishers p ON p.id=b.book_pub WHERE book_no ='".$_POST["id"]."'","SELECT COUNT(*) AS CNT FROM `borrow` WHERE book_no = '".$_POST["id"]."'");
      }
      if($_POST["action"] == "Book_Reserve")  
      {
          $bk_id = mysqli_real_escape_string($object->connect, $_POST['id']);
          $st_id = mysqli_real_escape_string($object->connect, $_POST['std']);
          $date = date('Y-m-d');
          $due= date('Y-m-d',strtotime("+3 day"));
          //*
          $query = "
          INSERT INTO `borrow`
          (member_id, book_no, on_date, due_date, status) VALUES ('".$st_id."', '".$bk_id."', '".$date."', '".$due."', 'reserve')
          ";

          $object->execute_query($query);
          
          return true;
          //*/
        }

        if($_POST['action']  == "Login"){
          
          /*
          $query = "SELECT * FROM students WHERE student_id = '".$_POST['user']."' AND passcode = '".$_POST['pass']."'";
          $results = $object->execute_query($query);
          if(mysqli_fetch_assoc($results)){
            echo "null,".$_POST['user'].",Student";
          }else{
            echo "null,0,none";
          }
          */

          echo $object->login($_POST['user'],$_POST['pass']);
        }
        
        if($_POST['action']  == "Tapin"){
            echo $object->tapin_data("SELECT * FROM logs WHERE student_no = '".$_POST['user']."' ORDER by log_id DESC",$_POST['user']);

        }



  }
 ?>  