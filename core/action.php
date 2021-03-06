<?php  
 //action.php  
 include 'database.php';  
 $object = new Database();  
 if(isset($_POST["action"])){

      //REPORT QUERIES
      if($_POST["action"] == "bookReport"){
            $query = "SELECT * FROM book  ";
            if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
              $query.="WHERE date_receive BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."'";
            }
             if(!empty($_POST['status'])){
              $query.=" AND status = '".$_POST['status']."'";
            }
           
          echo $object->get_bookReport($query);
        }
        if($_POST["action"] == "studentReport") {
              $query = "SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course WHERE true ";
            if(!empty($_POST['department'])){
              $query.="AND dept = '".$_POST['department']."'";
            }
             if(!empty($_POST['course'])){
              $query.=" AND course = '".$_POST['course']."'";
            }
            if(!empty($_POST['year'])){
              $query.=" AND year_level = '".$_POST['year']."'";
            }
            if(!empty($_POST['id'])){
              $query.=" AND student_id LIKE '%".$_POST['id']."%'";
            }
            
          echo $object->get_studentReport($query);
        }
        if($_POST["action"] == "BookRequestReport") { 
           $query = "SELECT * FROM book_request br JOIN faculty f ON br.faculty_id=f.faculty_no ";
           if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
              $query.="WHERE date_requested BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."'";
            }
           
           echo $object->get_request_report($query);  

        }
        if($_POST["action"] == "BookIssueReport") { 
            $query = "SELECT * FROM borrow_book bb JOIN borrow_details bd  USING (borrow_no) JOIN book b USING (book_no) JOIN students s ON bd.member_id = s.student_id";
           if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
            $from_date = date("Y-m-d",strtotime($_POST['from_date']));
            $to_date = date("Y-m-d",strtotime($_POST['to_date']));
              $query.=" WHERE on_date >= '".$from_date."' AND due_date <= '".$to_date."'  ";
            }
           
           echo $object->get_borrow_report($query);  

        }
       if($_POST["action"] == "Bulliten"){
          echo $object->get_bulliten("SELECT * FROM announcements WHERE status = 1");
      } 
        //INDEX FUNCTION
      if($_POST["action"] == "announcementIndex"){
          echo $object->get_announcements_index("SELECT * FROM announcements LIMIT 5");
      }
      if($_POST["action"] == "bookIndex"){
        echo $object->get_book_index("SELECT * FROM book b LEFT JOIN authors a ON a.id =b.author LEFT JOIN publishers p ON p.id=b.book_pub JOIN status s ON s.id = b.status LEFT JOIN catalogue c on b.category_id = c.catalogue_id LIMIT 5 ");
      }
      if($_POST["action"] == "bookIssuedIndex"){
        echo $object->get_book_issued_index("SELECT * FROM borrow_book bb JOIN borrow_details bd  USING (borrow_no) JOIN book b USING (book_no) JOIN students s ON bd.member_id = s.student_id LIMIT 5 ");
      }
      if($_POST["action"] == "userIndex"){
        echo $object->get_user_index("SELECT * FROM users WHERE access != 0 ");
      }
      if($_POST["action"] == "studentIndex"){
        echo $object->get_student_index("SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course ");
      }
      if($_POST["action"] == "facultyindex"){
        echo $object->get_faculty_index("SELECT * FROM faculty f LEFT JOIN departments d ON d.dept_id = f.dept ");
      }
       //Load queries
      if($_POST["action"] == "Announcements")  
      {  
           echo $object->get_announcements_data("SELECT * FROM announcements ");  
      }
      if($_POST["action"] == "Book")  
      {  
           echo $object->get_book_data("SELECT * FROM book b LEFT JOIN authors a ON a.id =b.author LEFT JOIN publishers p ON p.id=b.book_pub JOIN status s ON s.id = b.status LEFT JOIN catalogue c on b.category_id = c.catalogue_id ");  
      }  
       if($_POST["action"] == "Catalogoue")  
      {  
           echo $object->get_catalogue_data("SELECT * FROM catalogue ");  
      } 
       if($_POST["action"] == "Author")  
      {  
           echo $object->get_author_data("SELECT * FROM authors ");  
      }
       if($_POST["action"] == "Students")  
      {  
           echo $object->get_student_data("SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course ");  
      }   
       if($_POST["action"] == "Users")  
      {  

           echo $object->get_user_data("SELECT * FROM users WHERE access != 0 ");  

      } 
       if($_POST["action"] == "Faculty")  
      {  
           echo $object->get_faculty_data("SELECT * FROM faculty f LEFT JOIN departments d ON d.dept_id = f.dept ");  

      } 
      if($_POST["action"] == "Book Request")  
      {  
           echo $object->get_request_data("SELECT * FROM book_request ");  

      }
      if($_POST["action"] == "Issue Book")  
      {  
           echo $object->get_book_issued_data();  

      } 
      if($_POST["action"] == "Reserve Book")  
      {  
           echo $object->get_book_reserved_data("SELECT s.student_name AS student, f.faculty_name AS faculty, bd.member_id AS Id, bd.borrow_no AS borrow_no, bd.activity AS Stats FROM borrow_details bd LEFT JOIN students s ON s.student_id = bd.member_id LEFT JOIN faculty f ON f.faculty_no = bd.member_id WHERE bd.activity = 'reserved'");  

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
         if($_POST["action"] == "Course Year"){
             $output ='';
          
            $query = "SELECT * FROM courses WHERE course_id='".$_POST['val']."' ";
            $result = $object->execute_query($query);
            $output .='<option value="">Please Select</option>';
            while($row = mysqli_fetch_array($result))
            {
             $years = $row["numYear"];
                    if($years == 7){
                       for($a = 7;$a<=10;$a++){
                        $output .= '<option value='.$a.'>'.$a.'</option>';
                        }
                    }elseif($years == 6){
                       for($a = 1;$a<=6;$a++){
                        $output .= '<option value='.$a.'>'.$a.'</option>';
                        }
                    }elseif($years == 5){
                      $output .= '<option value="1">1st</option>';
                      $output .= '<option value="2">2nd</option>';
                      $output .= '<option value="3">3rd</option>';
                      $output .= '<option value="4">4th</option>';
                      $output .= '<option value="5">5th</option>';
                    }elseif($years == 4){
                      $output .= '<option value="1">1st</option>';
                      $output .= '<option value="2">2nd</option>';
                      $output .= '<option value="3">3rd</option>';
                      $output .= '<option value="4">4th</option>';
                    }elseif($years == 2){
                      $output .= '<option value="1">1st</option>';
                      $output .= '<option value="2">2nd</option>';
                    }elseif($years == 2 && $_POST['val'] == 7 || $_POST['val'] == 8){
                      $output .= '<option value="1">11</option>';
                      $output .= '<option value="2">12</option>';
                    }
                
            }
            echo $output;
         }
         if($_POST["action"] == "BookNo") {
            $output ='';
            $query = "SELECT * FROM book ";
            $result = $object->execute_query($query);
           $output .='<option value="">Please Select</option>';
            while($row = mysqli_fetch_array($result))
            {
             $output .= '<option value="'.$row["book_no"].'">'.$row["book_title"].'</option>';
            }
            echo $output;
         }
      //Insert queries   
      if($_POST["action"] == "addBook") { 
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
             $path = mysqli_real_escape_string($object->connect, $_POST["path"]);
             $location = mysqli_real_escape_string($object->connect, $_POST["location"]);
            $query = "  
           INSERT INTO book  
           (book_no,book_title, category_id, author, book_copies, book_pub, isbn, copyright_year,date_receive,img,location,department,status)   
           VALUES ('".$book_no."', '".$book_name."', '".$category."','".$author."','".$book_copies."','".$publisher."','".$isbn."','".$cp_yr."','".$date_rcv."','".$path."','".$location."','".$_SESSION["department"]."','".$status."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';  

      }
      if($_POST["action"] == "addAnnouncement") {  

             $title = mysqli_real_escape_string($object->connect, $_POST["title"]);  
            $content = mysqli_real_escape_string($object->connect, $_POST["content"]);  
            $img = mysqli_real_escape_string($object->connect, $_POST["path"]);  
           $query = "  
           INSERT INTO announcements(title,content,img,posted_by)VALUES ('".$title."', '".$content."','".$img."','".$_SESSION["id"]."')";  
           $object->execute_query($query);  
           echo 'Annoucement Posted';  
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
        $output =array();  
             $student_no=mysqli_real_escape_string($object->connect, $_POST["student_no"]);
             $student_name=mysqli_real_escape_string($object->connect, $_POST["student_name"]);
             $sex=mysqli_real_escape_string($object->connect, $_POST["sex"]);
             $contact=mysqli_real_escape_string($object->connect, $_POST["contact"]);
             $dept=mysqli_real_escape_string($object->connect, $_POST["department"]);
             $course=mysqli_real_escape_string($object->connect, $_POST["course"]);
             $courYr=mysqli_real_escape_string($object->connect, $_POST["course-year"]);
             $passcode=md5(mysqli_real_escape_string($object->connect, $_POST["passcode"]));
             $type=mysqli_real_escape_string($object->connect, $_POST["type"]);
              $path = mysqli_real_escape_string($object->connect, $_POST["path"]);
            $query = "  
           INSERT INTO students  
           (student_id,student_name,gender,contact,type,passcode,dept,course,active,image)   
           VALUES ('".$student_no."', '".$student_name."', '".$sex."', '".$contact."','".$type."','".$passcode."','".$dept."','".$course."','1','".$path."')"; 
           
           $object->execute_query($query);

           $last=mysqli_insert_id($object->connect);  
           echo 'Data Inserted';
          
      }
      if($_POST['action'] == "IssueList"){
            echo $object->get_issue_data($_POST['id']);
      }
      if($_POST['action'] == "ReserveDel"){
            $id = $_POST['id'];
            $bk = $_POST['bk'];
           $query="DELETE FROM borrow_book WHERE id ='".$id."'";
           $result = $object->execute_query($query);
            
            $query2 = "SELECT * FROM  borrow_book WHERE borrow_no='".$bk."'";
            $result2 = $object->execute_query($query2);

            if(!(mysqli_num_rows($result2))){
              $query3 ="DELETE FROM borrow_details WHERE borrow_no ='".$bk."'";
              $result3 = $object->execute_query($query3); 
            }

            return true;

      }

      if($_POST["action"] == "BookSL") {
         echo $object->loctatebook("SELECT bk.book_title AS title FROM book bk WHERE bk.book_no='".$_POST['bk_no']."'");
      }

      if($_POST["action"] == "addIssueBook") {  

               $issueNo=$_POST["issueID"];
               $studentName=$_POST["studentName"];
               $contactN=$_POST['contactNumber'];
               $missing = false;
               
               if(isset($_POST["bookID"])){
                for($count = 0; $count < count($_POST["bookID"]); $count++)
                  {
                      $bookNo=$_POST["bookID"][$count];
                      $bookTitle=$_POST["bookTitle"][$count];
                      if(($bookNo == "") ||($bookTitle == "")){
                        $missing = true;
                        break;

                      }   
                  }
               }else{
                $missing = true;
               }

               if(!$missing){ 
<<<<<<< HEAD
               $Mess="Good Day.. \n";
               $Mess.="\t\t\tThe following books has been borrowed: \n";
=======
               $Mess = $object->get_message_head('NWBRBK002')."\n";
>>>>>>> origin/Francis
               for($count = 0; $count < count($_POST["bookID"]); $count++)
                {  
                  
                $bookNo=$_POST["bookID"][$count];
                $bookTitle=$_POST["bookTitle"][$count];
                $copies=$_POST["copies"][$count];
                $date_borrowed=$_POST["date_issued"][$count];
                $date_returned=$_POST["date_returned"][$count];
                $rs_id = $_POST["rs_id"][$count];
                //*
                  if($rs_id == "0"){
                    $query0 = '
                    INSERT INTO borrow_book(borrow_no,book_no, copies, on_date, due_date) 
                    VALUES("'.$issueNo.'","'.$bookNo.'", "'.$copies.'", "'.$date_borrowed.'", "'.$date_returned.'")';
                     $object->execute_query("UPDATE book SET book_copies = book_copies-".$copies." WHERE book_no = ".$bookNo." ");
                    $object->execute_query($query0);
                  }else{
                    $query0 ="
                    UPDATE borrow_book SET on_date = '".$date_borrowed."', due_date = '".$date_returned."', copies='".$copies."' WHERE borrow_book.id = '".$rs_id."'";
                    $object->execute_query($query0);
                  }
                //*/
<<<<<<< HEAD
               $Mess.=$bookTitle." (".$date_returned.") \n "; 
=======
               $Mess.="\t\t".$bookTitle." (".$date_returned.") \n "; 
>>>>>>> origin/Francis
               
                }
                //*
                $query2 = "SELECT * FROM borrow_details WHERE borrow_details.borrow_no= '".$issueNo."'";
                $result = $object->execute_query($query2);
                
                if(mysqli_num_rows($result)){
                  $query1 = "
                      UPDATE borrow_details SET activity = 'borrowed' WHERE borrow_details.borrow_no = '".$issueNo."'";
                      $object->execute_query($query1);
                }else{
                  $query1 = "
                    INSERT INTO borrow_details(borrow_no, member_id, activity) 
                    VALUES('".$issueNo."','".$studentName."','borrowed')";
                    $object->execute_query($query1);
                }
               //*/
                
<<<<<<< HEAD
                $Mess .= "\t\tPlease Be Advise that you must return the following book(s) before or on date to avoid penalties.";
=======
                $Mess .= $object->get_message_foot('NWBRBK002');
>>>>>>> origin/Francis
                echo $Mess.'|'.$contactN.'|Issue Inserted, Message Sent';
              }else{
                echo '0';
              }
      }
      if($_POST['action'] == "ReturnInfo"){
          echo $object->get_return_info("SELECT s.student_name AS Name, s.contact AS contact, bd.borrow_no AS borrow_no  FROM borrow_details bd LEFT JOIN students s ON s.student_id=bd.member_id WHERE (bd.activity = 'borrowed' OR bd.activity = 'limbo' OR bd.activity = 'overdue') AND bd.member_id = '".$_POST['id']."'");
      }
      
      if($_POST["action"] == "BookSL2") {
         echo $object->loctatebook2("SELECT bk.book_title AS Title, bb.id as Id, bb.copies AS Copies, bb.on_date AS Ondate, bb.due_date as Due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no LEFT JOIN borrow_details bd ON bd.borrow_no = bb.borrow_no WHERE bb.book_no = '".$_POST['bk_no']."' AND bb.borrow_no = '".$_POST['is_no']."'");
      }
       if($_POST["action"] == "DeleteReverse") {
          $query = " 
            UPDATE borrow_book SET ret ='0' WHERE borrow_no = '".$_POST['issNo']."' AND book_no ='".$_POST['bk_no']."'";
            $object->execute_query($query);

            echo 'true';

       }
       if($_POST["action"] == "returnBook"){
              $missing = false;
               if(isset($_POST["bookID"])){
                for($count = 0; $count < count($_POST["bookID"]); $count++)
                  {
                      $bookNo=$_POST["bookID"][$count];
                      $bookTitle=$_POST["bookTitle"][$count];
                      
                      if(($bookNo == "") ||($bookTitle == "")){
                        $missing = true;
                        break;

                      }   
                  }
               }else{
                $missing = true;
               }

          if(!$missing){
            echo $object->get_return_data($_POST['returnID'],$_POST['contactNum']);
           }else{
            echo '0';
          }
       }
      if($_POST["action"] == "addUser") {  
             $username=mysqli_real_escape_string($object->connect, $_POST["username"]);
             $password=md5(mysqli_real_escape_string($object->connect, $_POST["password"]));
             $access=mysqli_real_escape_string($object->connect, $_POST["access"]);
             $library=mysqli_real_escape_string($object->connect, $_POST["library"]);
            
           $query = "  
           INSERT INTO users  
           (username,password,access,department,active)   
           VALUES ('".$username."', '".$password."', '".$access."','".$library."','1')";  
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
           VALUES ('".$request_no."', '".$book_title."', '".$author."','".$copies."','".$date_requested."','0','".$_SESSION['id']."')";  
           $object->execute_query("INSERT INTO notification(notif_id_type,notif_type,notif_subject,notif_text,notif_status,user_id) VALUES('1','request','Requested for Book','".$book_title."','0','".$_SESSION['id']."')"); 
           $object->execute_query($query); 
<<<<<<< HEAD

           echo 'Data Inserted';  
      }
      if($_POST["action"] == "addFaculty") {  
              $faculty_no=mysqli_real_escape_string($object->connect, $_POST["faculty_no"]);
              $faculty_name=mysqli_real_escape_string($object->connect, $_POST["faculty_name"]);
              $department=mysqli_real_escape_string($object->connect, $_POST["department"]);
              $passcode=md5(mysqli_real_escape_string($object->connect, $_POST["passcode"]));
             
            
              $query = "INSERT INTO faculty(faculty_no,faculty_name,passcode,dept)VALUES ('".$faculty_no."', '".$faculty_name."','".$passcode."','".$department."')";
             
               $object->execute_query("INSERT INTO users(username,password,access)VALUES('".$faculty_no."','".$passcode."','4')");
               $object->execute_query($query);  
               echo 'Data Inserted';  
      }
      if($_POST["action"] == "addFeedBack") {  
              $subject=mysqli_real_escape_string($object->connect, $_POST["subject"]);
              $body=mysqli_real_escape_string($object->connect, $_POST["body"]);
              $student_id=mysqli_real_escape_string($object->connect, $_POST["student_id"]);
            $query = "  
           INSERT INTO feedback  
           (subject,body,student_id)   
           VALUES ('".$subject."', '".$body."', '".$student_id."')";  
           $object->execute_query("INSERT INTO notification(notif_id_type,notif_type,notif_subject,notif_text,notif_status,user_id) VALUES('2','feedback','Feedback from Student','".$subject."','0','".$student_id."')"); 
           $object->execute_query($query); 

=======

           echo 'Data Inserted';  
      }
      if($_POST["action"] == "addFaculty") {  
              $faculty_no=mysqli_real_escape_string($object->connect, $_POST["faculty_no"]);
              $faculty_name=mysqli_real_escape_string($object->connect, $_POST["faculty_name"]);
              $department=mysqli_real_escape_string($object->connect, $_POST["department"]);
              $passcode=md5(mysqli_real_escape_string($object->connect, $_POST["passcode"]));
             
            
              $query = "INSERT INTO faculty(faculty_no,faculty_name,passcode,dept)VALUES ('".$faculty_no."', '".$faculty_name."','".$passcode."','".$department."')";
             
               $object->execute_query("INSERT INTO users(username,password,access)VALUES('".$faculty_no."','".$passcode."','4')");
               $object->execute_query($query);  
               echo 'Data Inserted';  
      }
      if($_POST["action"] == "addFeedBack") {  
              $subject=mysqli_real_escape_string($object->connect, $_POST["subject"]);
              $body=mysqli_real_escape_string($object->connect, $_POST["body"]);
              $student_id=mysqli_real_escape_string($object->connect, $_POST["student_id"]);
            $query = "  
           INSERT INTO feedback  
           (subject,body,student_id)   
           VALUES ('".$subject."', '".$body."', '".$student_id."')";  
           $object->execute_query("INSERT INTO notification(notif_id_type,notif_type,notif_subject,notif_text,notif_status,user_id) VALUES('2','feedback','Feedback from Student','".$subject."','0','".$student_id."')"); 
           $object->execute_query($query); 

>>>>>>> origin/Francis
           echo 'FeedBack Sent';  
      }
      //Fetch Queries 
       if($_POST["action"]=="Load Books") {
      
                $output =array();
               $query = "SELECT * FROM book";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $book_id = $row["book_id"];
                  $book_no = $row["book_no"];
                  $book_title = $row["book_title"];
                  
                  
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Book Data") {
      
                $output =array();
                $query = "SELECT * FROM book b LEFT JOIN authors a ON a.id = b.author LEFT JOIN publishers p ON p.id=b.book_pub LEFT JOIN status s ON s.id = b.status WHERE book_id ='".$_POST['bookID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["book_id"] = $row["book_id"];
                  $output["book_no"] = $row["book_no"];
                   $output["book_title"] = $row["book_title"];
                  $output["category_id"] = $row["category_id"];
                  $output["author"] = $row["author"];
                  $output["book_copies"] = $row["book_copies"];
                  $output["book_pub"] = $row["book_pub"];
                  $output["isbn"] = $row["isbn"];
                  $output["copyright_year"] = $row["copyright_year"];
                  $output["date_receive"] = $row["date_receive"];
                  $output["img"] = "<img src='".$row["img"]."' class='img img-thumbnail' height='50' weight='50'?>";
                  $output["location"] = $row["location"];
                  $output["status"] = $row["status"];
                  
            
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Request Data") {
      
                $output =array();
               $query = "SELECT * FROM book_request br JOIN faculty f ON br.faculty_id = f.faculty_no WHERE request_id ='".$_POST['requestID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["request_id"] = $row["request_id"];
                 $output["request_no"] = $row["request_no"];
                 $output["request_by"] = $row["faculty_name"];
                  $output["book_title"] = $row["book_title"];
                  $output["date_requested"] = $row["date_requested"];
                   $output["author"] = $row["author"];
                   $output["copies"] = $row["copies"];
                   $output["status"] = $row["status"];
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Announcement Data") {
      
                $output =array();
               $query = "SELECT * FROM announcements WHERE id ='".$_POST['announcementID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["id"] = $row["id"];
                 $output["title"] = $row["title"];
                  $output["content"] = $row["content"];
                   $output["image"] = "<img src='".$row["img"]."' class='img img-thumbnail' height='150' weight='150'?>";
                  $output["status"] = $row["status"];
                }

                echo json_encode($output);
                
      }
      if($_POST["action"]=="Fetch Faculty Data") {
      
                $output =array();
               $query = "SELECT * FROM faculty WHERE id ='".$_POST['facultyID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["id"] = $row["id"];
                 $output["faculty_no"] = $row["faculty_no"];
                  $output["faculty_name"] = $row["faculty_name"];
                  $output["department"] = $row["dept"];
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
      if($_POST["action"]=="Fetch User Data") {
      
                $output =array();
               $query = "SELECT * FROM users WHERE user_id ='".$_POST['userID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                 $output["user_id"] = $row["user_id"];
                 $output["username"] = $row["username"];
                  $output["access"] = $row["access"];
                  $output["department"] = $row["department"];
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
               $query = "SELECT * FROM students WHERE student_id ='".$_POST['studentID']."'";
               $result = $object->execute_query($query);
                while($row = mysqli_fetch_array($result)) {
                   $output["student_id"] =$row["student_id"];
                   $output["student_name"] =$row["student_name"];
                   $output["gender"] =$row["gender"];
                   $output["address"] =$row["address"];
                   $output["contact"] =$row["contact"];
                   $output["type"] =$row["type"];
                   $output["passcode"] =$row["passcode"];
                   $output["dept"] =$row["dept"];
                   $output["course"] =$row["course"];
                   $output["year_level"] =$row["year_level"];
                   $output["image"] = "<img src='".$row["image"]."' class='img img-thumbnail' height='50' weight='50'?>";
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
            if($_POST['action']=="Edit Announcement") {
               $title = mysqli_escape_string($object->connect,$_POST["title"]);
               $content = mysqli_escape_string($object->connect,$_POST["content"]);
               $status = mysqli_escape_string($object->connect,$_POST["status"]);
               $path = mysqli_escape_string($object->connect,$_POST["path"]);

              $query = "UPDATE announcements SET title ='$title', content = '$content',status='$status',img='$path' WHERE id = '".$_POST['announcement_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';
            } 
            if($_POST['action']=="Edit Author") {
               $author_no = mysqli_escape_string($object->connect,$_POST["author_no"]);
               $author_name = mysqli_escape_string($object->connect,$_POST["author_name"]);

              $query = "UPDATE authors SET author_id ='$author_no', author_name = '$author_name' WHERE id = '".$_POST['author']."' ";
              $object->execute_query($query);
              echo 'Data Updated';
            }
            if($_POST['action']=="Edit Faculty") {
              $faculty_no=mysqli_real_escape_string($object->connect, $_POST["faculty_no"]);
              $faculty_name=mysqli_real_escape_string($object->connect, $_POST["faculty_name"]);
              $department=mysqli_real_escape_string($object->connect, $_POST["department"]);
              $passcode=md5(mysqli_real_escape_string($object->connect, $_POST["passcode"]));

              $query = "UPDATE faculty SET faculty_no ='$faculty_no', faculty_name = '$faculty_name',dept='$department',passcode='$passcode' WHERE id = '".$_POST['faculty_id']."' ";
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
            if($_POST['action']=="approveRequest") {
               $status=mysqli_real_escape_string($object->connect, $_POST["status"]);
              $query = "UPDATE book_request SET status =' $status' WHERE request_id = '".$_POST['request_id']."' ";
                $object->execute_query($query);
                echo 'Data Approved';
            } 
            if($_POST['action']=="Edit Student") {
                 $student_no=mysqli_real_escape_string($object->connect, $_POST["student_no"]);
                 $student_name=mysqli_real_escape_string($object->connect, $_POST["student_name"]);
                 $dept=mysqli_real_escape_string($object->connect, $_POST["department"]);
                 $course=mysqli_real_escape_string($object->connect, $_POST["course"]);
                 $courYr=mysqli_real_escape_string($object->connect, $_POST["course-year"]);
                 $passcode=mysqli_real_escape_string($object->connect, $_POST["passcode"]);
                 $pwd=mysqli_real_escape_string($object->connect, $_POST["pwd"]);
                 $address=mysqli_real_escape_string($object->connect, $_POST["address"]);
                 $sex=mysqli_real_escape_string($object->connect, $_POST["sex"]);
                 $contact=mysqli_real_escape_string($object->connect, $_POST["contact"]);


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


      if($_POST["action"] == "Search2")  
      {
          //"searching for ".$_POST["srch_name"]; 
          echo $object->get_search_data("SELECT b.book_title, b.book_no AS book_id, b.author AS author, b.copyright_year, b.book_pub AS book_pub, b.isbn, b.location, l.library_name as department, b.img AS img  FROM book b LEFT JOIN status s ON s.id = b.status LEFT JOIN libraries l ON b.department = l.id WHERE book_title LIKE '%".$_POST["srch_name"]."%' ORDER BY b.book_title ASC");
      }
     if($_POST["action"] == "Book_select")  
      {
          //"searching for ".$_POST["srch_name"]; 
<<<<<<< HEAD
          echo $object->get_selected_data("SELECT b.book_title, b.book_no AS book_id, b.author AS author, b.copyright_year, b.book_pub AS book_pub, b.isbn, b.book_copies, b.location as location, l.library_name as department, b.img as img FROM book b LEFT JOIN libraries l ON b.department = l.id WHERE book_no ='".$_POST["id"]."'","SELECT bb.copies as CNT FROM borrow_book bb WHERE bb.book_no = '".$_POST["id"]."'");
=======
          echo $object->get_selected_data($_POST['id'],$_POST['mem']);
>>>>>>> origin/Francis
      }
      if($_POST["action"] == "Book_Reserve")  
      {
          $bk_id = mysqli_real_escape_string($object->connect, $_POST['id']);
          $st_id = mysqli_real_escape_string($object->connect, $_POST['std']);
          $date = date('Y-m-d');
          $due= date('Y-m-d',strtotime("+3 day"));
          

          $relay = $object->get_borrow_reserves("SELECT bd.borrow_no AS id_no FROM borrow_details bd WHERE bd.member_id='".$st_id."' AND activity='reserved'");
          
          if($relay=="0"){// New Reserve
              $num = substr(str_shuffle("0123456789"), -8);
              $query = "
              INSERT INTO `borrow_book`
              (borrow_no, book_no, on_date, due_date) VALUES ('".$num."', '".$bk_id."', '".$date."', '".$due."')
              ";
              $object->execute_query($query);
              $query2 = "
              INSERT INTO `borrow_details`
              (borrow_no, member_id, activity) VALUES ('".$num."', '".$st_id."', 'reserved')
              ";
              $object->execute_query($query2);

          }else{ // Already Reserve / Prev Reserve
              $query = "
              INSERT INTO `borrow_book`
              (borrow_no, book_no, on_date, due_date) VALUES ('".$relay."', '".$bk_id."', '".$date."', '".$due."')
              ";
              $object->execute_query($query);  
          }
          
          //*
          return true;
          //*/
        }

        if($_POST['action']  == "Login"){
        echo $object->login($_POST['user'],$_POST['pass']);
        }
        if($_POST['action']  == "Tapin"){
                echo $object->tapin_data("SELECT * FROM logs WHERE student_no = '".$_POST['user']."' ORDER by log_id DESC",$_POST['user']);

            }
          if($_POST["action"] == "RequestNotification"){
             echo $object->get_request_notification("SELECT * FROM notification WHERE notif_id_type = 1 AND notif_status=0 ORDER BY notif_id DESC LIMIT 5");
              if($_POST["view"] != '') {
                $update_query = "UPDATE notification SET notif_status=1 WHERE notif_id_type = 1 AND notif_status=0";
               $object->execute_query($update_query);
               } 
          }
          if($_POST["action"] == "FeedBackNotification"){
             echo $object->get_feedback_notification("SELECT * FROM notification WHERE notif_id_type = 2 AND notif_status=0 ORDER BY notif_id DESC LIMIT 5");
              if($_POST["view"] != '') {
                 $update_query = "UPDATE notification SET notif_status=1 WHERE notif_id_type = 2 AND notif_status=0 ";
                $object->execute_query($update_query);
               }   
          }
           if($_POST["action"] == "PanelNotification"){
             echo $object->get_panel_notification("SELECT * FROM notification ORDER BY notif_id DESC LIMIT 5");
               
          }
          if($_POST["action"] == "userLogs"){
             echo $object->get_user_logs("SELECT * FROM logs ORDER BY log_id DESC LIMIT 5");
               
          }
          if($_POST['action'] == "Time Over"){
          echo $object->time_due_check();
        
          }
          if($_POST['action']=="Total Books"){
           echo $object->count_books("SELECT * FROM book");
          }
          if($_POST['action']=="Total Student"){
           echo $object->count_students("SELECT * FROM students");
          }
          if($_POST['action']=="Total Borrow Books"){
           echo $object->count_borrowed_books("SELECT * FROM borrow_book");
          }
          if($_POST['action']=="Total Return Books"){
           echo $object->count_returned_books("SELECT * FROM borrow_book WHERE ret=1");
          }
          if($_POST['action'] == "Message Info"){
          echo $object->message_info_startup("SELECT hb.header AS heads, hb.footer AS foots FROM message_board hb");
<<<<<<< HEAD
        
=======
>>>>>>> origin/Francis
          }

          if($_POST['action'] == "Message Update Select"){
          echo $object->message_info_select("SELECT hb.header AS heads, hb.footer AS foots, hb.doc_id as doc FROM message_board hb WHERE hb.doc_id ='".$_POST['id']."'");
        
          }

          if($_POST['action'] == "Message Editing"){
          echo $object->message_edit($_POST['header'],$_POST['footer'],$_POST['id']);  
          }
<<<<<<< HEAD
=======
          if($_POST['action'] == "Maintenance"){
          echo $object->maintenace_view("SELECT * FROM `maintenace` WHERE pri_id = '1'");  
          }

          if($_POST['action'] == "Maintenace_Edit"){
              $query="UPDATE maintenace SET men_1 = '".$_POST['day']."', men_2 = '".$_POST['pen']."', men_3 = '".$_POST['qua']."' WHERE pri_id = '1'";
              $object->execute_query($query);
              echo true;
          }

          if($_POST['action'] == "Checkdates"){
            echo $object->Dates_view("SELECT men_1 AS days FROM `maintenace` WHERE pri_id = '1'");  
          }
>>>>>>> origin/Francis

  }
 ?>  