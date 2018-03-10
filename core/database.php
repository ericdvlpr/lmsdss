<?php 
session_start(); 
error_reporting(0);
 date_default_timezone_set('Asia/Manila');
 class Database  
 {  
      //crud class  
      public $connect;  
      private $host = "localhost";  
      private $username = 'root';  
      private $password = '';  
      private  $database = 'db_lms';  
      function __construct() {  
           $this->database_connect();  
      }  
      public function database_connect() {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
      }  
      public function execute_query($query) {  
           return mysqli_query($this->connect, $query);  
      }
      public function can_login($table_name,$where_condition) {
          $condition = '';
          echo $table_name;
          foreach ($where_condition as $key => $value) {
              $condition .= $key . " = '".$value."' AND ";

          }
             $condition = substr($condition, 0, -5);
           $query = "SELECT * FROM ".$table_name." WHERE ". $condition;
          $result = mysqli_query($this->connect, $query);  
             while ($record = mysqli_fetch_array($result)) {
                  $array[] = $record;
              }
              return $array;
              if(mysqli_num_rows($result) ){
                return true;
              }else{
                $this->error .= "<p>Wrong data</p>";
              }

        }
        //Index Header
        public function count_books($query){
          $result_1 =$this->execute_query($query);
           $count = mysqli_num_rows($result_1);
           return $count;
        }
        public function count_students($query){
          $result_1 =$this->execute_query($query);
           $count = mysqli_num_rows($result_1);
           return $count;
        }
        public function count_borrowed_books($query){
          $result_1 =$this->execute_query($query);
           $count = mysqli_num_rows($result_1);
           return $count;
        }
        public function count_returned_books($query){
          $result_1 =$this->execute_query($query);
           $count = mysqli_num_rows($result_1);
           return $count;
        }
    //REPORTS TABLES
     public function get_bookReport($query) {  
               $output = '';  
               $result = $this->execute_query($query);  
               while($row = mysqli_fetch_object($result))  
               {  

                $date=date_create($row->date_added);
                 
                    $output .= '  
                    <tr>       
                         <td>'.$row->book_no.'</td>  
                         <td>'.date_format($date,"d/m/Y").'</td>  
                         <td>'.$row->location.'</td>  
                         <td>'.$row->author.'</td>    
                         <td>'.$row->book_title.'</td>  
                         <td>'.$row->book_pub.'</td>  
                         <td>'.$row->copyright_year.'</td>  
                       
                    </tr>  
                    ';  
               }  
               return $output;  
          }
       public function get_studentReport($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
               $output .= '  
                <tr>       
                     <td><a href="student_card.php?studID='.$row->student_id.'">'.$row->student_id.'</a></td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->department_name.'</td>  
                     <td>'.$row->course_code.'</td>    
                   
                </tr>  
                ';  
           }  
           return $output;  
      }
      public function get_request_report($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
              $output .= '  
                <tr>       
                     <td>'.$row->request_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>  
                     <td>'.$row->copies.'</td>
                      <td>'.$row->faculty_name.'</td>   
                     <td>'.$row->date_requested.'</td>  

                    
                </tr>  
                ';  
            }    
           return $output;  
      } 
      public function get_borrow_report($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
              $output .= '  
                <tr>       
                     <td>'.$row->borrow_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->copies.'</td>  
                     <td>'.$row->on_date.'</td>  
                     <td>'.$row->due_date.'</td>  
                     <td>'.$row->activity.'</td> 

                    
                </tr>  
                ';  
            }    
           return $output;  
      }
      public function get_return_report($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
              $output .= '  
                <tr>       
                     <td>'.$row->borrow_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->copies.'</td>  
                     <td>'.$row->on_date.'</td>  
                     <td>'.$row->due_date.'</td>  
                     <td>'.$row->activity.'</td> 

                    
                </tr>  
                ';  
            }    
           return $output;  
      }
      public function get_bulliten($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result)) {  
            $badge = '';
            $number = rand('1','6');
            switch ($number) {
              case 1:
                $badge = 'fa fa-comments';
                $color ='bg-yellow';
                break;
              case 2:
                $badge = 'fa fa-bullhorn';
                 $color ='bg-red';
                break;
              case 3:
                $badge = 'fa fa-calendar-o';
                 $color ='info';
                break;
              case 4:
                $badge = 'fa fa-photo';
                 $color ='bg-blue';
                break;
              case 5:
                $badge = 'fa fa-pencil-square-o';
                 $color ='bg-aqua';
                break;
              case 6:
                $badge = 'fa fa-instagram';
                $color ='bg-purple';
                break;
              default:
               $badge = 'Error';
                break;
            }


            $output .='<li>
                      <i class="'.$badge.' '.$color.'"></i>
                              
                      <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> '.$this->time_ago($row->date).'</span>
                      
                          <div class="timeline-header">
                              <h4>'.$row->title.'</h4>
                              
                          </div>
                          <div class="timeline-body">
                              <p>'.$row->content.'</p>
                              <img src="'.$row->img.'" class="img" />
                          </div>
                      </div>
                </li>';
          }
           return $output;  
      }
      // Index Function
      public function get_announcements_index($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
            if($row->status== 0){
              $status = 'Pending';
            }else{
               $status = 'Approved';
            }
                $output .= '  
                <tr>       
                     <td>'.$row->title.'</td>  
                     <td>'.$row->content.'</td>  
                     <td>'.$row->date.'</td>  
                     <td>'.$status.'</td>  
                   
                </tr>  
                ';  
           }  

           return $output;  
      } 
       public function get_book_index($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
 
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>        
                     <td>'.$row->book_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>    
                     <td>'.$row->book_copies.'</td>  
                     <td>'.$row->status_name.'</td>  
                     
                </tr>  
                ';  
           }  

           return $output;
      }   
 public function get_book_issued_index($query) {  
           $output = '';  
           $result = $this->execute_query($query);  

           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->borrow_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->copies.'</td>  
                     <td>'.$row->on_date.'</td>  
                     <td>'.$row->due_date.'</td>  
                     <td>'.$row->activity.'</td>  
                     

                </tr>  
                ';  
           }  
           return $output;  
      } 
public function get_user_index($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  

            switch($row->access){
              case 0:
              $access = 'Administrator';
              break;
              case 1:
              $access = 'Chief Librarian';
              break;
              case 2:
              $access = 'Asst-Librarian';
              break;
              case 3:
              $access = 'Library Staff';
              break;
               case 4:
                   $access = 'Faculty';
                break;
              case 5:
                   $access = 'Student';
                break;
            }
            if($row->active == 1){
              $active = '<span class="label label-success">Active</span>';
            }else{
               $active = '<span class="label label-danger">Inactive</span>';
            }
                $output .= '  
                <tr>       
                     <td>'.$row->username.'</td>  
                     <td>'.$access.'</td>  
                     <td>'.$active.'</td>  
                </tr>s'; 
          
      }
       return $output;  
    } 
public function get_student_index($query) {  
           $output = '';  
           $result = $this->execute_query($query);   
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><a href="student_card.php?studID='.$row->student_id.'">'.$row->student_id.'</a></td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->department_name.'</td>  
                     <td>'.$row->course_code.'</td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 
public function get_faculty_index($query) {  
           $output = '';  
           $result = $this->execute_query($query);   
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->faculty_name.'</td>  
                     <td>'.$row->department_name.'</td>   
                </tr>  
                ';  
           }  
           return $output;  
      } 
//---------------
        public function check_access($id) {
          $query = "SELECT access FROM users WHERE user_id='".$id."' ";
            $result = $this->execute_query($query);
           $row = mysqli_fetch_assoc($result);
            $access = $row['access'];
          return $access;
        }
        public function get_faculty_name($id) {
           $query = "SELECT * FROM faculty WHERE faculty_no ='".$id."' ";
            $result = $this->execute_query($query);
           $row = mysqli_fetch_assoc($result);
            $data = $row['faculty_name'];
          return $data;
        }

      //load query  
      public function get_book_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
 
           while($row = mysqli_fetch_object($result))  
           {  
            if($row->book_copies==0){
              $statusColor = 'class="danger"';
            }elseif($row->book_copies<5){
              $statusColor = 'class="warning"';
            }else{
                $statusColor = '';
            }

                $output .= '  
                <tr>        
                     <td>'.$row->book_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>    
                     <td '.$statusColor.'>'.$row->book_copies.'
                      
                     </td>  
                     <td>'.$row->status_name.'</td>  
                     <td><button type="button" name="view" id="'.$row->book_id.'" class="btn btn-primary btn-xs view">View</button><button type="button" name="update" id="'.$row->book_id .'" class="btn btn-success btn-xs update">Update</button></td>  
                </tr>  
                ';  
           }  

           return $output;  
      }
         public function get_announcements_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
            if($row->status== 0){
              $status = 'Pending';
            }else{
               $status = 'Approved';
            }
            $date= date_create($row->date);
                $output .= '  
                <tr>       
                     <td>'.$row->title.'</td>  
                     <td>'.$row->content.'</td>  
                     <td>'.date_format($date,"Y/m/d g:i A").'</td>  
                     <td>'.$status.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateannouncement">Update</button>
                     <button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteannouncement">Delete</button></td>  
                </tr>  
                ';  
           }  

           return $output;  
      } 
      public function get_author_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->author_id.'</td>  
                     <td>'.$row->author_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateauthor">Update</button></td>  
                </tr>  
                ';  
           }  

           return $output;  
      } 
         public function get_book_issued_data() {  
            $output = '';  
           

           $query = "SELECT s.student_name AS Name, f.faculty_name AS fname, bd.borrow_no AS borrow_no, bd.activity AS status FROM borrow_details bd LEFT JOIN students s ON s.student_id = bd.member_id LEFT JOIN faculty f ON f.faculty_no = bd.member_id";
           
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  

                $query2 = "SELECT bk.book_title AS title1, av.av_title as title2, p.per_article AS title3, bb.on_date AS ondate, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no LEFT JOIN audio_visual av ON bb.book_no = av.av_num LEFT JOIN periodical p ON p.per_num = bb.book_no WHERE bb.borrow_no = '".$row->borrow_no."'";
                $result2 = $this->execute_query($query2);
                $row1 = mysqli_fetch_object($result2);


                $output .= '  
                <tr>       
                    <td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->borrow_no.'</td>';
                if($row->fname == NULL){    
         $output.='<td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->Name.'</td>';
                }else{
         $output.='<td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->fname.'</td>';
                }
        
                if($row1->title1 == NULL && $row1->title3 == NULL){
        $output .='<td>'.$row1->title2.' (Audio Visual)</td>';
                }else if($row1->title1 == NULL && $row1->title2 == NULL){
        $output .='<td>'.$row1->title3.' (Periodical)</td>';
                }else{
        $output .='<td>'.$row1->title1.'</td>';
                }
        $output .='<td>'.$row1->ondate.'</td>
                   <td >'.$row1->due.'</td>
                   <td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->status.'</td>
                </tr>';
                  
                  while ($row2=mysqli_fetch_object($result2)) {
                    
                      $output .='
                      <tr>';
                         if($row2->title1 == NULL && $row2->title3 == NULL){
                $output .='<td>'.$row2->title2.' (Audio Visual)</td>';
                         }else if($row2->title1 == NULL && $row2->title2 == NULL){
                $output .='<td>'.$row2->title3.' (Periodical)</td>';
                         }else{
                $output .='<td>'.$row2->title1.'</td>';
                          }
                         
                $output .='<td>'.$row2->ondate.'</td>
                          <td>'.$row2->due.'</td>
                      </tr>';

                    
                  }
           }  
           return $output;   
      } 

    public function get_catalogue_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->catalogue_no.'</td>  
                     <td>'.$row->cataloguename.'</td>  
                     <td><button type="button" name="update" id="'.$row->catalogue_id.'" class="btn btn-success btn-xs updatecatalogue">Update</button></td>  
                </tr>  
                ';  
           }  
           $output .= '';  
           return $output;  
      } 
      public function get_request_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '';  
           while($row = mysqli_fetch_object($result))  
           {  

            $access=$this->check_access($_SESSION['id']);
            $faculty = $this->get_faculty_name($row->faculty_id);
            if($row->status==0){
              $status = 'Pending';
            }else{
              $status = 'Approved';
            }
              $output .= '  
                <tr>       
                     <td>'.$row->request_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>  
                     <td>'.$row->copies.'</td>
                      <td>'.$faculty.'</td>   
                     <td>'.$row->date_requested.'</td>  
                     <td>'.$status.'</td>  
                     <td><button type="button" name="update" id="'.$row->request_id.'" class="btn btn-primary btn-xs viewRequest">View</button><button type="button" name="approve" id="'.$row->request_id.'" class="btn btn-success btn-xs approveRequest">Approve</button></td> 
                </tr>  
                '; 
            }  
           //  }else{
           //    $output .= '  
           //      <tr>       
           //           <td>'.$row->request_no.'</td>  
           //           <td>'.$row->book_title.'</td>  
           //           <td>'.$row->author.'</td>  
           //           <td>'.$row->copies.'</td>  
           //           <td>'.$row->date_requested.'</td>  
           //           <td>'.$status.'</td>  
           //           <td><button type="button" name="update" id="'.$row->request_id.'" class="btn btn-success btn-xs updaterequest">Update</button> 
           //      </tr>  
           //      ';  
           //  }
                
           // }  
           return $output;  
      } 


      public function get_user_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  

            switch($row->access){
              case 0:
              $access = 'Administrator';
              break;
              case 1:
              $access = 'Chief Librarian';
              break;
              case 2:
              $access = 'Asst-Librarian';
              break;
              case 3:
              $access = 'Library Staff';
              break;
                case 4:
                   $access = 'Faculty';
                break;
              case 5:
                   $access = 'Student';
                break;
            }
            switch($row->department){
              case 1:
              $department = 'College Library';
              break;
              case 2:
              $department = 'GradeSchool Library';
              break;
              case 3:
              $department = 'HighSchool Library';
              break;
              case 4:
              $department = 'Graduate School Library';
              break;
            }
            if($row->active == 1){
              $active = '<span class="label label-success">Active</span>';
            }else{
               $active = '<span class="label label-danger">Inactive</span>';
            }
                 $output .= '  
                <tr>       
                     <td>'.$row->username.'</td>  
                     <td>'.$access.'</td>  
                     <td>'.$department.'</td>  
                     <td>'.$active.'</td>  
                    
                     <td><button type="button" name="update" id="'.$row->user_id.'" class="btn btn-success btn-xs updateUser">Update</button></td>
                </tr>';
           }  
           return $output;  

    } 


      public function get_student_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);   
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><a href="student_card.php?studID='.$row->student_id.'">'.$row->student_id.'</a></td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->department_name.'</td>  
                     <td>'.$row->course_code.'</td>  
                     <td><button type="button" name="update" id="'.$row->student_id.'" class="btn btn-success btn-xs updatestudent">Update</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 
    public function get_faculty_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);   
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><a href="faculty_card.php?facID='.$row->faculty_no.'">'.$row->faculty_no.'</a></td>  
                     <td>'.$row->faculty_name.'</td>  
                     <td>'.$row->department_name.'</td>   
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateFaculty">Update</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 
      public function get_pub_id($name) {
            $query = "SELECT id FROM publishers WHERE publisher_name LIKE '%".$name."%' ";
            $result = $this->execute_query($query) ;
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            return $id;
      } 
      public function get_auth_id($name) {
            $query = "SELECT id FROM authors WHERE author_name LIKE '%".$name."%' ";
            $result = $this->execute_query($query);
            $rowcount=mysqli_num_rows($result);
            if($rowcount==1){
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                return $id;
            }else{
                  $newcode=date("Y d F");
                  $uniqueCode = strtotime($newcode);
                  $alpha = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-1);
                  $num = substr(str_shuffle("0123456789"),-4);
                  $end = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),-3);
                  $author_code=trim($alpha.$num.$end.$uniqueCode);
                     
              $query = "INSERT INTO authors(author_id,author_name)VALUES('".$author_code."','".$name."')";
               $object->execute_query($query);
              $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                return $id;
            }
            
      }   
      public function get_number($query) {
              $result = $this->execute_query($query);
              $row = mysqli_fetch_object($result);
              return $row->bookNum;
      }

      function get_request_notification($query){
        $result = $this->execute_query($query);
           $output = '';
           
           if(mysqli_num_rows($result) > 0)
           {
            while($row = mysqli_fetch_array($result))
            {
             $output .= '
              <a href="referrence.php"class="list-group-item">
                <i class="fa fa-comment"></i>
               <strong>'.$row["notif_subject"].'</strong><br />
               <small><em>'.$row["notif_text"].'</em></small>
              </a>
             ';
            }
           }
           else
           {
            $output .= '<li><p>No Notification Found</p></li>';
           }
           $query_1 = "SELECT * FROM notification WHERE notif_id_type = 1 AND notif_status=0";
           $result_1 =$this->execute_query($query_1);
           $count = mysqli_num_rows($result_1);
           $data = array(
              'notification'   => $output,
              'unseen_notification' => $count
             );
           echo json_encode($data);
      }
      function get_feedback_notification($query){
        $result = $this->execute_query($query);
           $output = '';
           
           if(mysqli_num_rows($result) > 0)
           {
            while($row = mysqli_fetch_array($result))
            {
             $output .= '
              <a href="referrence.php"class="list-group-item">
                <i class="fa fa-bullhorn"></i>
               <strong>'.$row["notif_subject"].'</strong><br />
               <small><em>'.$row["notif_text"].'</em></small>
              </a>
             ';
            }
           }
           else
           {
            $output .= '<li><p>No FeedBack Found</p></li>';
           }
           $query_1 = "SELECT * FROM notification WHERE notif_id_type = 2 AND notif_status=0";
           $result_1 =$this->execute_query($query_1);
           $count = mysqli_num_rows($result_1);
           $data = array(
              'notification'   => $output,
              'unseen_notification' => $count
             );
           echo json_encode($data);
      }
        function get_user_logs($query){
        $result = $this->execute_query($query);
           $output = '';
           if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
              $output .= '
                              <a href="#"class="list-group-item">
                            
                              <h4><i class="fa fa-users  fa-fw"></i> <strong> '.$row["student_no"].'-'.$row["description"].'</strong><br />
                               <small><em>'.$row["date_time"].'</em></small></h4>
                              </a>
                             ';
              }
           }
           echo json_encode($output);
         }
      function get_panel_notification($query){
        $result = $this->execute_query($query);
           $output = '';
           
           if(mysqli_num_rows($result) > 0)
           {
            while($row = mysqli_fetch_array($result)) {
                  
                  if($row["notif_id_type"]==1){
                      $output .= '
                              <a href="referrence.php"class="list-group-item">
                           <h4> <i class="fa fa-bell  fa-fw"></i>
                               <strong>'.$row["notif_type"].'</strong><br />
                               <small><em>'.$row["notif_text"].'</em></small></h4>
                              </a>
                             ';
                  }else{
                     $output .= '
                              <a href="referrence.php"class="list-group-item">
                            <h4><i class="fa fa-bullhorn  fa-fw"></i>
                               <strong>'.$row["notif_type"].'</strong><br />
                               <small><em>'.$row["notif_text"].'</em></small></h4>
                              </a>
                             ';
                  }
                   
                  
              }
           }else{
            $output .= '<a href="#"><li>No FeedBack Found</li></a>';
           }
           $query_1 = "SELECT * FROM notification";
           $result_1 =$this->execute_query($query_1);
           $count = mysqli_num_rows($result_1);
           $data = array(
              'notification'   => $output,
              'unseen_notification' => $count
             );
           echo json_encode($data);
      }
      function get_last_id(){
          $last_id = $this->insert_id;
          return $last_id;
      }
   public function get_selected_data($id,$mid)
      {
          $query = "SELECT b.book_title AS ab_title, b.book_no AS ab_id, b.author AS ab_author, b.copyright_year AS ab_year, b.book_pub AS ab_pub, b.isbn AS ab_isbn, b.book_copies AS ab_copies, b.location as ab_loc, l.library_name as ab_dept, b.img as ab_img ,cat.catalogue_image as ab_map, b.types AS ab_type FROM book b LEFT JOIN libraries l ON b.department = l.id JOIN catalogue cat ON cat.catalogue_id=b.category_id WHERE book_no ='".$id."' UNION SELECT av.av_title AS ab_title, av.av_num AS ab_id, av.author AS ab_author, av.copyright AS ab_year, av.publisher AS ab_pub, av.isbn as ab_isbn , av.copies AS ab_copies, av.location as ab_loc, l.library_name as ab_dept, av.img as ab_img ,cat.catalogue_image as ab_map, av.types AS ab_type FROM audio_visual av LEFT JOIN libraries l ON av.department = l.id JOIN catalogue cat ON cat.catalogue_id = av.category_id WHERE av.av_num ='".$id."' UNION SELECT p.per_article AS ab_title, p.per_num AS ab_id, p.author AS ab_author, p.copyright_year AS ab_year, p.publisher AS ab_pub, p.isbn as ab_isbn , p.copies AS ab_copies, p.location as ab_loc, l.library_name as ab_dept, p.img as ab_img ,cat.catalogue_image as ab_map, p.types AS ab_type FROM periodical p LEFT JOIN libraries l ON p.department = l.id JOIN catalogue cat ON cat.catalogue_id = p.category_id WHERE p.per_num ='".$id."'";
         
         $query2 = "SELECT bb.copies as CNT FROM borrow_book bb WHERE bb.book_no = '".$id."'";
         
         $query3 = "SELECT * FROM students WHERE student_id='".$mid."'";
         
         $query4 = "SELECT * FROM borrow_book bb LEFT JOIN borrow_details bd ON bd.borrow_no = bb.borrow_no WHERE bb.book_no = '".$id."' AND bd.member_id = '".$mid."' AND (bd.activity = 'reserved' OR bd.activity = 'borrowed' OR bd.activity = 'overdue')";
         
         $query5 = "SELECT bb.copies AS copy FROM borrow_book bb LEFT JOIN borrow_details bd ON bb.borrow_no = bd.borrow_no WHERE bd.member_id = '".$mid."'";

         $query6 = "SELECT m.men_1 AS CON FROM maintenace m WHERE m.pri_id = '1'";


         $result = $this->execute_query($query);
         $result2 = $this->execute_query($query2);
         $result3 = $this->execute_query($query3);
         $result4 = $this->execute_query($query4);
         $result5 = $this->execute_query($query5);
         $result6 = $this->execute_query($query6);




         $row = mysqli_fetch_object($result);
         $row6 = mysqli_fetch_object($result6);
         
         
         $calc2 = 0;
         $calc = 0;
         $calc3 = 0;
         
         while ($row3 = mysqli_fetch_object($result5)) {
           $calc3 += $row3->copy;
         }
         while ($row2 = mysqli_fetch_object($result2)) {
           $calc2 += $row2->CNT;
         }

          $calc =  $row->ab_copies - $calc2;
          $calc = max($calc,0);



         
         $tloc='';
         $loc = explode(' ', $row->ab_loc);
         foreach ($loc as $locs) {
           $tloc .= $locs. '<br />'; 
         }

         if($row->ab_type == 2){
          $title = $row->ab_title.' (Audio Visual)';
          $btitle = $row->ab_title.' an audio visual ';
         }else if($row->ab_type == 3){
          $title = $row->ab_title.' (Periodical)';
          $btitle = $row->ab_title.' a periodical ';
         }else{
          $title = $row->ab_title;
          $btitle = $row->ab_title;
         }

         $output = '';

         
         $output .='
         

         <table>
          <tr>
          <td width = "50%">
         <table>
            <tr>
              <td align="right" width="20%">Call #: </td>
              <td width="20%" class="calln"> '. $tloc .'</td>
              <td width="60%"><img src="'.$row->ab_img.'" width="50%" height="auto"></td>
            </tr>
         </table>
         <br />
         <table class="table table-bordered book_specs">
            <tr>
              <td align="right" width="25%">Library: </td>
              <td width="75%">'.$row->ab_dept.'</td>
            </tr>
            
            <tr>
              <td align="right" >Main Title: </td>
              <td>'.$title.'</td>
            </tr>
            <tr>
              <td align="right" >Author: </td>
              <td>'.$row->ab_author.'</td>
            </tr>
            <tr>
              <td align="right" >Edition: </td>
              <td>'.$row->ab_year.'</td>
            </tr>
            <tr>
              <td align="right" >Published: </td>
              <td>'.$row->ab_pub.'</td>
            </tr>
            <tr>
              <td align="right" >ISBN: </td>
              <td>'.$row->ab_isbn.'</td>
            </tr>
            <tr>
              <td align="right" >Available: </td>
              <td>'.$calc.'</td>
            </tr>
        
        </table>
          </td>
          <td width "50%"><a href="'.$row->ab_map.'" data-lightbox="image-1"><img src="'.$row->ab_map.'" width="100%" height="auto"></a></td>
          </tr>
          
          </table
        ';



         $output .= '|The book material ' .$btitle. ' by ' . $row->ab_author . ' located in the '.$row->ab_dept.', call number '.$row->ab_loc.', books available ' .$calc. '. ' ;
         if($calc == 0){
            $output .= 'Sorry... This Book is no longer available. Try Again Later. To Close Press the Escape Button.|false|'.$title.'/'.$row->ab_author.'|'.$calc.'|No longer available.';
         }else{
            
            if(mysqli_num_rows($result4)){
              $output .= 'You already borrowed this book. Please Return this Book Immediately. To Close Press the Escape Button.|false|'.$title.'/'.$row->ab_author.'|0|Already Borrowed/Reserved, Please Return this Book Immediately';
            }else if((mysqli_num_rows($result3)) && ($calc3>=$row6->CON)){
              $output .= 'Your Borrowing books limit has been reached. Please Return All of your borrowed Books Immediately. To Close Press the Escape Button.|false|'.$title.'/'.$row->ab_author.'|0|Borrow Limit Reached, Please Return All of your borrowed Books Immediately.';
            }else{
              $output .= 'Would you like to reserve this book? type 1 for Yes, or Type 2 for No.|true|'.$title.'/'.$row->ab_author.'|'.$calc.'|N/A';
            }
         }
         //*/
         return $output;

      }
public function get_search_data($query)
      {
        
        $result = $this->execute_query($query);
        $numrow = mysqli_num_rows($result);
        $output = '';
        $array = '';


        if($numrow>0){
          $output .= $numrow.'|';
          
          $output .= '
          
                            
        ';
          while($row = mysqli_fetch_object($result))
          {
             $output .= '
              <tr>
                <td>';
                if($row->ab_type == 2){
                  $output .= '<div class="book_title">'.$row->ab_title.' (Audio Visual)</div>';
                }else if($row->ab_type == 3){
                  $output .= '<div class="book_title">'.$row->ab_title.' (Periodical)</div>';
                } else{
                  $output .= '<div class="book_title">'.$row->ab_title.'</div>';
                }
               $output .= '<div class="book_specs">'.$row->ab_author.'</br>
                '.$row->ab_year.' ed.</br>
                '.$row->ab_pub.'</br>
                ISBN: '.$row->ab_isbn.'</br>
                Call #: '.$row->ab_loc.'</br>
                '.$row->ab_dept.'</br>
                </div>

                </br>
                </td>
                <td>
                    <img src="'.$row->ab_img.'" width="40%" height="auto">
                </td>  
              </tr> ';
              if($row->ab_type == 2){
                $array .= $row->ab_id.'*'.$row->ab_title.' an audio visual*'.$row->ab_author.'/';
              }else{
                $array .= $row->ab_id.'*'.$row->ab_title.'*'.$row->ab_author.'/';
              }
          }
          $output .= '|'.$array;
        }else{
          $output = 0; 
        }
       
       return $output;

      }

      public function get_borrow_reserves($query){
          $result = $this->execute_query($query);
          if($row=mysqli_fetch_assoc($result))
            return $row['id_no'];
          else
            return '0';
      }
//-------------------------------------------------------------------------------------------------
      public function get_book_reserved_data($query){
        $result = $this->execute_query($query);
          $output = '';
          while($row = mysqli_fetch_object($result)){
              $query2="SELECT bk.book_title AS title1, av.av_title as title2, p.per_article as title3, bb.copies AS copies, bb.on_date AS ondate, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no LEFT JOIN audio_visual av ON bb.book_no = av.av_num LEFT JOIN periodical p ON bb.book_no = p.per_num WHERE bb.borrow_no = '".$row->borrow_no."'";
              $results = $this->execute_query($query2);
              $row1 = mysqli_fetch_object($results);
              $output .='
                <tr>
                  <td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->borrow_no.'</td>';
              if($row->faculty==NULL){
        $output.='<td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->student."\n(".$row->Id.')</td>';
              }else{
        $output.='<td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->faculty."\n(".$row->Id.')</td>';
              }
              if($row1->title1 == NULL && $row1->title3 == NULL){
        $output.='<td>('.$row1->copies.') '.$row1->title2.' (Audio Visual)</td>';
               }else if($row1->title2 == NULL && $row1->title1 == NULL){
        $output.='<td>('.$row1->copies.') '.$row1->title3.' (Periodical)</td>';
               }else{
        $output.='<td>('.$row1->copies.') '.$row1->title1.'</td>';        
               }
        $output.='<td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->Stats.'</td>
                  <td rowspan = "'.mysqli_num_rows($results).'" align="center"><a href="issuedBook.php?stud='.$row->Id.'" class = "btn btn-success btn-xs">Issued</a> 
                </tr>
              ';
            }
              while($row2 = mysqli_fetch_object($results)){
                  $output .='
                  <tr>';
                     if($row2->title1 == NULL && $row2->title3 == NULL){
             $output.='<td>('.$row2->copies.') '.$row2->title2.' (Audio Visual)</td>';
                      }else if($row2->title2 == NULL && $row2->title1 == NULL){
             $output.='<td>('.$row2->copies.') '.$row2->title3.' (Periodical)</td>';
                      }else{
             $output.='<td>('.$row2->copies.') '.$row2->title1.'</td>';
                      }
                     
         $output.='</tr>';
              }

              
          return $output;
      }
//-------------------------------------------------------------------------------------------------
//Login/Tapin
  public function login($user,$pass){
        $query = "SELECT * FROM students WHERE student_id = '".$user."' AND passcode = '".md5($pass)."'";
        $query2 = "SELECT * FROM faculty WHERE faculty_no = '".$user."' AND passcode = '".md5($pass)."'";
        $query3 = "SELECT * FROM users WHERE username = '".$user."' AND password = '".md5($pass)."'";
        $exeque = "INSERT INTO `logs`
              (student_no, description, Date_time) VALUES ('".$user."', 'Login', NOW())
              ";
        $execute = $this->execute_query($exeque);
        $results = $this->execute_query($query);
        $results2 = $this->execute_query($query2);
        $results3 = $this->execute_query($query3);
        if($row = mysqli_fetch_object($results)){
            if($row->active){
              if(($row->type=="0") || ($row->type=="1")){
                  echo "0,".$user;//------------Student(Norm, Deaf/Disfigure)
              }else if($row->type=="2"){
                  echo "2,".$user;//------------Student(Blind)
              }
              
            }else{
              echo "5,".$user;//----------------Not Active
            }
        }else if($row = mysqli_fetch_object($results2)){
            if($row->active){
              echo "3,".$user;//----------------Faculty
            }else{
              echo "5,".$user;//----------------Not Active 
            }
        }else if($row = mysqli_fetch_object($results3)){
            echo "4,".$user;//------------------Librian/Admin
        }else{
            echo "6,".$user;//------------------Wrong Password / ID No
        }

      }
           
 public function tapin_data($query,$id){
        $result = $this->execute_query($query);
        $stuque = "SELECT students.student_name as stdname FROM students WHERE student_id='".$id."'";
        $studexe = $this->execute_query($stuque);

        date_default_timezone_set("Asia/Manila");
        

          if(mysqli_num_rows($studexe)){
          $rows=mysqli_fetch_object($result);
          if(mysqli_num_rows($result)){
              if($rows->description == "Just Login"){
              $exeque = "INSERT INTO `logs`
              (student_no, description, date_time) VALUES ('".$id."', 'Just Logout', NOW())
              ";
              $execute = $this->execute_query($exeque);
              $row = mysqli_fetch_object($studexe);
              echo $row->stdname. " just Logged Out.";   
            }else{
              $exeque = "INSERT INTO `logs`
              (student_no, description, date_time) VALUES ('".$id."', 'Just Login', NOW())
              ";
              $execute = $this->execute_query($exeque);
              $row = mysqli_fetch_object($studexe);
              echo $row->stdname. " just Logged In.";
            }

          }else{
            $exeque = "INSERT INTO `logs`
            (student_no, description, date_time) VALUES ('".$id."', 'Just Login', NOW())
            ";
            $execute = $this->execute_query($exeque);
            $row = mysqli_fetch_object($studexe);
            echo $row->stdname. " just Logged In.";

          }
        }else{
          echo $id. " is not a student here...";
        }
      }
      public function get_issue_data($id){
          $query = "SELECT bk.book_no AS ab_no1, av.av_num as ab_no2, p.per_num AS ab_no3, bk.book_title AS title1, av.av_title as title2, p.per_article AS title3, br.copies AS copies, br.on_date AS on_date, br.due_date AS due_date, s.student_name AS name, f.faculty_name AS fname, s.contact AS contact, f.contacs AS fcontact, br.borrow_no AS borrow_no, br.id AS id FROM borrow_book br LEFT JOIN book bk ON bk.book_no=br.book_no LEFT JOIN borrow_details bd ON bd.borrow_no = br.borrow_no LEFT JOIN students s ON s.student_id=bd.member_id LEFT JOIN faculty f ON f.faculty_no = bd.member_id LEFT JOIN audio_visual av ON br.book_no = av.av_num LEFT JOIN periodical p ON p.per_num = br.book_no WHERE bd.member_id ='".$id."' AND bd.activity = 'reserved' ORDER BY br.id Asc";
          $result = $this->execute_query($query);
          
          date_default_timezone_set("Asia/Manila");
          $date = date('Y-m-d');
          $due= date('Y-m-d',strtotime("+6 day"));
          $num = substr(str_shuffle("0123456789"), -8);  

          $data = '';
          

          if($dat = mysqli_fetch_assoc($result)){
            if($dat['title1'] == NULL && $dat['title3'] == NULL){
                $titles = $dat['title2'].' (Audio Visual)';
                $bk_ids = $dat['ab_no2'];
              }else if($dat['title2'] == NULL && $dat['title1'] == NULL){
                $titles = $dat['title3'].' (Periodical)';
                $bk_ids = $dat['ab_no3'];
              }else{
                $titles = $dat['title1'];
                $bk_ids = $dat['ab_no1'];
              }
            if(mysqli_num_rows($result)>1){
              $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$bk_ids."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required value='".$titles."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='1' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$dat['id']."'> </td>
                </tr>";
              while($row = mysqli_fetch_object($result)){
                if($row->title1 == NULL && $row->title3 == NULL){
                  $titles = $row->title2.' (Audio Visual)';
                  $bk_ids = $row->ab_no2;
                }else if($row->title1 == NULL && $row->title2 == NULL){
                  $titles = $row->title3.' (Periodical)';
                  $bk_ids = $row->ab_no3;
                }else{
                  $titles = $row->title1;
                  $bk_ids = $row->ab_no1;
                }
                $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$bk_ids."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required value='".$titles."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='".$row->copies."' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$row->id."'></td>
                </tr>";

              }
            }else{
              $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$bk_ids."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required value='".$titles."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='".$dat['copies']."' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$dat['id']."'> </td>
                </tr>";                
            }
            if($dat['fname'] == NULL){
              $data .="|".$dat['name'];
              $data .="|".$dat['contact'];
            }else{
              $data .="|".$dat['fname'];
              $data .="|".$dat['fcontact'];
            }
            $data .="|".$dat['borrow_no'];
            }else{
              $query2 = "SELECT s.student_name AS name, s.contact AS contact FROM students s WHERE s.student_id= '".$id."'";
              $query3 = "SELECT f.faculty_name AS name, f.contacs as contac FROM faculty f WHERE f.faculty_no = '".$id."'";
              
              $result2 = $this->execute_query($query2);
              $result3 = $this->execute_query($query3);


              $dat2 = mysqli_fetch_assoc($result2);
              $dat3 = mysqli_fetch_assoc($result3);

              $data .="<tr> 
              <td width='19%'><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td>
              <td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly='true' required /></td> 
              <td width='7%'><input type='number' min='1' value ='1' name='copies[]' class='form-control copies' required /></td> 
              <td width='14%'><input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /></td>
              <td  width='14%'><input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned' required  /></td> 
              <td width='16%'><button type='button' name='remove' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-minus'></span></button> <input type='hidden' name='rs_id[]' id='rs_id' value='0'> </td> 
              </tr>";
              if(mysqli_num_rows($result2)>0){
                $data .="|".$dat2['name'];
                $data .="|".$dat2['contact'];
              }else{
                $data .="|".$dat3['name'];
                $data .="|".$dat3['contac'];
              }
              $data .="|".$num;

            }

            
            
            echo $data;
          }

          public function loctatebook($query){
            $result = $this->execute_query($query);
            
            if($row = mysqli_fetch_assoc($result)){
              if($row['type'] == '2'){
                return '|'.$row['title'].' (Audio Visual)';
              }else if($row['type'] == '3'){
                return '|'.$row['title'].' (Periodical)';
              }else{
                return '|'.$row['title'];
              }
            }else{
              
              return "|No Book";
            }
          }


          public function get_return_info($query){
            $result = $this->execute_query($query);
            

            if($row = mysqli_fetch_assoc($result)){
                $output = "
                <tr> 
                  <td width='19%'><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td>
                  <td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required /></td>
                  <td width='7%'><input type='number' min='1' value ='1' name='copies[]' class='form-control copies' readonly = 'true' required /></td> 
                  <td width='14%'><input type='text' name='date_issued[]' id='date_issued' value='' class='form-control date_issued' readonly = 'true' required  /></td>
                  <td  width='14%'><input type='text' name='date_returned[]' id='date_returned' value='' class='form-control date_returned' readonly = 'true' required  /></td> 
                  <td width='16%'><button type='button' name='removes' class='btn btn-danger btn-sm removes'><span class='glyphicon glyphicon-minus'></span></button></td> 
                </tr>";
                return $row['Name'].'|'.$row['contact'].'|'.$row['borrow_no'].'|'.$output;
            }else{
              return 0;
            }
          }
          public function loctatebook2($query){
            $result = $this->execute_query($query);
            
            if($row = mysqli_fetch_assoc($result)){
              if($row['Title1']==NULL && $row['Title3']==NULL){
                $output = '|'.$row['Title2'].' (Audio Visual)|'.$row['Copies'].'|'.$row['Ondate'].'|'.$row['Due'];
              }else if($row['Title1']==NULL && $row['Title2']==NULL){
                $output = '|'.$row['Title3'].' (Periodical)|'.$row['Copies'].'|'.$row['Ondate'].'|'.$row['Due'];
              }else{
                $output = '|'.$row['Title1'].'|'.$row['Copies'].'|'.$row['Ondate'].'|'.$row['Due'];
              }
              $query2 = "UPDATE borrow_book SET ret ='1' WHERE id = '".$row['Id']."' ";
              $this->execute_query($query2);

              return $output;

            }else{
              return 0;
            }
          }
          public function get_return_data($IDs,$Contact){
              $query ="SELECT * FROM borrow_book WHERE borrow_no='".$IDs."'";
              $query2 = "SELECT * FROM borrow_book WHERE borrow_no='".$IDs."' AND ret='1'";
              $result = $this->execute_query($query);
              $result2 = $this->execute_query($query2);
              
              if(mysqli_num_rows($result) == mysqli_num_rows($result2)){
                $output = "Return Books Complete. All in Accounted For.\n Thank You Very Much :)";
                $output2 = "All Your Borrowed Books Have Been Returned. \n Thank You And Come Again";

                $query2 = "UPDATE borrow_details SET activity = 'returned' WHERE borrow_no ='".$IDs."'";
                $this->execute_query($query2);
                
                $query3 = "SELECT * FROM over_due od WHERE  od.issue_id='".$IDs."'";
                $result3 = $this->execute_query($query3);
                
                if(mysqli_fetch_assoc($result3)){
                  $delque = "DELETE FROM over_due od WHERE od.issue_id = '".$IDs."'";
                  $this->execute_query($delque);
                }

                return $output2.'|'.$Contact.'|'.$output;
              }else{
                $onD = 0;
                $ovD = 0;

                $odckq = "SELECT bb.due_date AS due FROM borrow_book bb LEFT JOIN borrow_details bd ON bb.borrow_no = bd.borrow_no WHERE bb.borrow_no = '".$IDs."' AND bb.ret = '0' AND bd.activity = 'limbo'";
                $odckr = $this->execute_query($odckq);

                while ($odckrw = mysqli_fetch_object($odckr)){
                    if(date('Y-m-d')<=$odckrw->due){
                      $onD++;
                    }else if(date('Y-m-d')>$odckrw->due){
                      $ovD++;
                    }

                }
                if($onD == mysqli_num_rows($odckr)){
                  $query3 = "UPDATE borrow_details SET activity = 'borrowed' WHERE borrow_no ='".$IDs."'";
                  $this->execute_query($query3);
                }else if($ovD == mysqli_num_rows($odckr)){
                  $query3 = "UPDATE borrow_details SET activity = 'overdue' WHERE borrow_no ='".$IDs."'";
                  $this->execute_query($query3);
                }


                $output = "Warning: \n \tThe Following Book(s) Have not been return: \n";
                $output2 = "Good Day, \n \t The Following Book(s) is Not been return: \n";
                
                $query2 = "SELECT bk.book_title AS title1, av.av_title AS title2, p.per_article AS title3, bb.due_date AS Due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no LEFT JOIN audio_visual av ON av.av_num = bb.book_no LEFT JOIN periodical p ON p.per_num = bb.book_no WHERE bb.borrow_no = '".$IDs."' AND ret = '0' ";
                


                $results = $this->execute_query($query2);
                  while($row=mysqli_fetch_object($results)){
                    if($row->title1 == NULL && $row->title3 == NULL){
                      $output .= "\t\t ".$row->title2."(Audio Visual) (".$row->Due.") \n";
                      $output2 .= "\t\t ".$row->title2."(Audio Visual) (".$row->Due.") \n";
                    }else if($row->title1 == NULL && $row->title2 == NULL){
                      $output .= "\t\t ".$row->title3." (Periodical) (".$row->Due.") \n";
                      $output2 .= "\t\t ".$row->title3." (Periodical) (".$row->Due.") \n";
                    }else{
                      $output .= "\t\t ".$row->title1." (".$row->Due.") \n";
                      $output2 .= "\t\t ".$row->title1." (".$row->Due.") \n";
                    }

                  }
                 $output2 .= "\t Please Return The Following Book(s) Imideately To Avoid Penalties.";

                 return $output2.'|'.$Contact.'|'.$output ; 
                
              } 
          }
//-------------------------------------------------------------------------------------------------
//check status          
         public function time_due_check(){
            //-------------------------------------------------------------------------------------
            //Validate Division

            $query = "SELECT bd.borrow_no AS borrow_no, bd.member_id AS member_id, s.contact AS contact FROM borrow_details bd LEFT JOIN students s ON bd.member_id = s.student_id WHERE bd.activity = 'borrowed' OR bd.activity = 'limbo'";
            $result = $this->execute_query($query);
            $output = '';
            $date = date('Y-m-d');
            $dues = date('Y-m-d',strtotime("+3 day"));
            $empty = true;            
            
            while($row=mysqli_fetch_object($result)){
              $bkque = "SELECT bb.due_date AS due FROM borrow_book as bb WHERE bb.borrow_no = '".$row->borrow_no."' AND ret ='0'";
              $bkres = $this->execute_query($bkque);
              $cnt = 0;
              $ovli = false;
              $newbie = false;

              while($row2 = mysqli_fetch_object($bkres)){
                  if(date('Y-m-d')>$row2->due){
                      $cnt++;
                  }
              }

                if($cnt == mysqli_num_rows($bkres)){
                    
                    $bdque = "UPDATE borrow_details SET activity = 'overdue' WHERE borrow_no ='".$row->borrow_no."'";
                    $this->execute_query($bdque);
                    $ovli = true;
                
                }else if($cnt == 0){
                    $ovli = false;
                }else{
                    $bdque = "UPDATE borrow_details SET activity = 'limbo' WHERE borrow_no ='".$row->borrow_no."'";
                    $this->execute_query($bdque);
                    $ovli = true;
                }
                //--------------------------------------------------------------------------------------------------------------
                // Insert on over due (if any...)
                if($ovli){
                    $odque = "SELECT * FROM over_due WHERE issue_id='".$row->borrow_no."'";
                    $odres = $this->execute_query($odque);
                    if(mysqli_num_rows($odres) == 0){
                        $odaqu = "INSERT INTO `over_due`(issue_id, prev_send, next_send, member_id) VALUES ('".$row->borrow_no."', '".$date."', '".$dues."', '".$row->member_id."')";
                        $this->execute_query($odaqu);
                        $newbie = true;
                    }
                    

                }              
                //---------------------------------------------------------------------------------------------------------------
                // Message Division
                if($newbie){
                  $output .= "][Good Day\n \tThe Following book(s) is now over due: \n";
                  $obque = "SELECT bk.book_title AS title1, av.av_title AS title2, p.per_article AS title3, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bb.book_no = bk.book_no LEFT JOIN audio_visual av ON av.av_num = bb.book_no LEFT JOIN periodical p ON p.per_num = bb.book_no LEFT JOIN borrow_details bd ON bb.borrow_no = bd.borrow_no WHERE bb.borrow_no = '".$row->borrow_no."' AND bb.ret = '0' AND ((bd.activity = 'overdue') OR (bd.activity = 'limbo'))"; 
                  $obret = $this->execute_query($obque);
                  while($obrow = mysqli_fetch_object($obret)){
                      if(date('Y-m-d')>=$obrow->due){

                        if($obrow->title1 == NULL && $obrow->title3 == NULL){
                          $output .= "\t\t".$obrow->title2." (Audio Visual) (".$obrow->due.") \n";
                        }else if($obrow->title1 == NULL && $obrow->title2 == NULL){
                          $output .= "\t\t".$obrow->title3." (Periodical) (".$obrow->due.") \n";
                        }else{
                          $output .= "\t\t".$obrow->title1." (".$obrow->due.") \n";
                        }

                      }
                  }
                  $output .= "\tPlease Return The Following Book(s) Imideately to avoid further penalties.|".$row->contact; 
                  $empty = false;
                }


            }
            //Message V2
            $odcqu = "SELECT s.contact AS contact, od.issue_id AS borrow_no, od.prev_send AS prv, od.next_send AS nxt, od.sent AS sent FROM over_due od LEFT JOIN students s ON s.student_id = od.member_id ";
            $odcre = $this->execute_query($odcqu);
            while($odcrow = mysqli_fetch_object($odcre)){

                  if(((date('Y-m-d')) == $odcrow->nxt) && ($odcrow->sent == '0')){

                    $output .= "][Good Day\n \tThe Following book(s) is now over due: \n";
                    $obque = "SELECT bk.book_title AS title1, av.av_title AS title2, p.per_article AS title3, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bb.book_no = bk.book_no LEFT JOIN audio_visual av ON av.av_num = bb.book_no LEFT JOIN periodical p ON p.per_num = bb.book_no LEFT JOIN borrow_details bd ON bb.borrow_no = bd.borrow_no WHERE bb.borrow_no = '".$odcrow->borrow_no."' AND bb.ret = '0' AND ((bd.activity = 'overdue') OR (bd.activity = 'limbo'))"; 
                    $obret = $this->execute_query($obque);
                    while($obrow = mysqli_fetch_object($obret)){
                        if(date('Y-m-d')>=$obrow->due){
                          
                        if($obrow->title1 == NULL && $obrow->title3 == NULL){
                          $output .= "\t\t".$obrow->title2." (Audio Visual) (".$obrow->due.") \n";
                        }else if($obrow->title1 == NULL && $obrow->title2 == NULL){
                          $output .= "\t\t".$obrow->title3." (Periodical) (".$obrow->due.") \n";
                        }else{
                          $output .= "\t\t".$obrow->title1." (".$obrow->due.") \n";
                        };
                        
                        }
                    }
                    $output .= "\tPlease Return The Following Book(s) Imideately to avoid further penalties.|".$odcrow->contact."";

                    $odtque = "UPDATE over_due SET prev_send = '".$date."', next_send='".$dues."', sent = '1' WHERE issue_id ='".$odcrow->borrow_no."'";
                    $this->execute_query($odtque);
                    $empty = false;
                  }else if(((date('Y-m-d')) != $odcrow->prv) && ($odcrow->sent == '1')){
                    $odtque = "UPDATE over_due SET sent = '0' WHERE issue_id ='".$odcrow->borrow_no."'";
                    $this->execute_query($odtque);
                  }
              }
            
            if($empty){
              return "0";
            }else{
              return $output;
            }
         }
          public function message_info_startup($query){
           
            $result = $this->execute_query($query);
            $output ='';
            while($row = mysqli_fetch_object($result)){
              $output .= $row->heads."\n";
              $output .= "\t\tBook (Due Date)\n";
              $output .= "\t\tBook (Due Date)\n";
              $output .= "\t\tBook (Due Date)\n";
              $output .= $row->foots."|";
            }
            return $output;

         }

         public function message_info_select($query){
          $result = $this->execute_query($query);
          $row = mysqli_fetch_object($result);

          return '|'.$row->heads.'|'.$row->foots.'|'.$row->doc;

         }

         public function message_edit($header,$footer,$id){
            
            $query = "UPDATE message_board SET header = '".$header."', footer = '".$footer."' WHERE doc_id ='".$id."'";
            $this->execute_query($query);
            return true;
         }

         public function get_message_head($code){
            $query ="SELECT hb.header AS heads FROM message_board hb WHERE hb.doc_id='".$code."'";
            $result = $this->execute_query($query);
            $row = mysqli_fetch_object($result);
            return $row->heads; 
         }

         public function get_message_foot($code){
            $query ="SELECT hb.footer AS foots FROM message_board hb WHERE hb.doc_id='".$code."'";
            $result = $this->execute_query($query);
            $row = mysqli_fetch_object($result);
            return $row->foots; 
         }

         public function maintenace_view($query){
            $result = $this->execute_query($query);
            $row = mysqli_fetch_object($result);

            return "|".$row->men_1."|".$row->men_2."|".$row->men_3.'|'; 
         }
         public function Dates_view($query){
            $result = $this->execute_query($query);
            $row = mysqli_fetch_object($result);

            return $row->days;
         }

         function time_ago($timestamp) {  
                $time_ago = strtotime($timestamp);  
                $current_time = time();  
                $time_difference = $current_time - $time_ago;  
                $seconds = $time_difference;  
                $minutes      = round($seconds / 60 );           // value 60 is seconds  
                $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
                $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
                $weeks          = round($seconds / 604800);          // 7*24*60*60;  
                $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
                $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
                if($seconds <= 60)  
                {  
               return "Just Now";  
             }  
                else if($minutes <=60)  
                {  
               if($minutes==1)  
                     {  
                 return "one minute ago";  
               }  
               else  
                     {  
                 return "$minutes minutes ago";  
               }  
             }  
                else if($hours <=24)  
                {  
               if($hours==1)  
                     {  
                 return "an hour ago";  
               }  
                     else  
                     {  
                 return "$hours hrs ago";  
               }  
             }  
                else if($days <= 7)  
                {  
               if($days==1)  
                     {  
                 return "yesterday";  
               }  
                     else  
                     {  
                 return "$days days ago";  
               }  
             }  
                else if($weeks <= 4.3) //4.3 == 52/12  
                {  
               if($weeks==1)  
                     {  
                 return "a week ago";  
               }  
                     else  
                     {  
                 return "$weeks weeks ago";  
               }  
             }  
                 else if($months <=12)  
                {  
               if($months==1)  
                     {  
                 return "a month ago";  
               }  
                     else  
                     {  
                 return "$months months ago";  
               }  
             }  
                else  
                {  
               if($years==1)  
                     {  
                 return "one year ago";  
               }  
                     else  
                     {  
                 return "$years years ago";  
               }  
             }  
           } 
 }  
 ?>  