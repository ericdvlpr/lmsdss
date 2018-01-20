<?php 
session_start(); 
error_reporting(0);
 class Database  
 {  
      //crud class  
      public $connect;  
      private $host = "localhost";  
      private $username = 'root';  
      private $password = '123456';  
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
//REPORTS TABLES
 public function get_bookReport($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
              switch ($row->status) {
                case '1':
                 $status = 'New';
                  break;
                case '2':
                 $status = 'Archive';
                  break;
                  case '3':
                 $status = 'Damage';
                  break;
                  case '4':
                 $status = 'Lost';
                  break;
                  case '5':
                 $status = 'Old';
                  break;
                default:
                $status = 'Error!';
                  break;
              }
                $output .= '  
                <tr>       
                     <td>'.$row->book_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>    
                     <td>'.$row->book_copies.'</td>  
                     <td>'.$status.'</td>   
                   
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
           $query = "SELECT * FROM users u JOIN faculty f ON f.faculty_no=u.username  WHERE user_id='".$id."' ";
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
                $output .= '  
                <tr>        
                     <td>'.$row->book_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>    
                     <td>'.$row->book_copies.'</td>  
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
                $output .= '  
                <tr>       
                     <td>'.$row->title.'</td>  
                     <td>'.$row->content.'</td>  
                     <td>'.$row->date.'</td>  
                     <td>'.$status.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateannouncement">Update</button></td>  
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
                     <td></td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateauthor">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteauthor">Delete</button></td>  
                </tr>  
                ';  
           }  

           return $output;  
      } 
         public function get_book_issued_data($query) {  
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
                     <td><button type="button" name="update" id="'.$row->borrow_no.'" class="btn btn-success btn-xs updateReturn">Update</button> 

                </tr>  
                ';  
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
                     <td><button type="button" name="update" id="'.$row->catalogue_id.'" class="btn btn-success btn-xs updatecatalogue">Update</button><button type="button" name="delete" id="'.$row->catalogue_id.'" class="btn btn-danger btn-xs deletecatalogue">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '';  
           return $output;  
      } 
      public function get_request_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           
           ';  
           while($row = mysqli_fetch_object($result))  
           {  

            $access=$this->check_access($_SESSION['id']);
            $faculty = $this->get_faculty_name($row->user_id);
            if($row->status==0){
              $status = 'pending';
            }else{
              $status = 'approved';
            }
            if($access == 1){
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
            }else{
              $output .= '  
                <tr>       
                     <td>'.$row->request_no.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>  
                     <td>'.$row->copies.'</td>  
                     <td>'.$row->date_requested.'</td>  
                     <td>'.$row->status.'</td>  
                     <td><button type="button" name="update" id="'.$row->request_id.'" class="btn btn-success btn-xs updaterequest">Update</button> 
                </tr>  
                ';  
            }
                
           }  
           $output .= '';  
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
                    
                     <td><button type="button" name="update" id="'.$row->user_id.'" class="btn btn-success btn-xs update">Update</button></td>';
           while($row = mysqli_fetch_object($result))  
           {  

            switch ($row->access) {
              case 1:
                  $access = 'Librarian';
                break;
               case 2:
                  $access = 'Asst Librarian';
                break;
                case 3:
                   $access = 'Staff';
                break;
                case 4:
                   $access = 'Faculty';
                break;
              case 5:
                   $access = 'Student';
                break;
              default:
                $access = 'Admin';
                break;
            }

                $output .= '  
                <tr>         
                     <td>'.$row->username.'</td>  
                     <td>'.$access.'</td>  
                     <td><button type="button" name="update" id="'.$row->user_id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->user_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      }
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
                     <td><button type="button" name="update" id="'.$row->student_id.'" class="btn btn-success btn-xs updatestudent">Update</button><button type="button" name="delete" id="'.$row->student_id.'" class="btn btn-danger btn-xs deletestudent">Delete</button></td>  
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
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updatestudent">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deletestudent">Delete</button></td>  
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
            $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
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
            $output .= '<li><a href="#" class="text-bold text-italic">No FeedBack Found</a></li>';
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
      function get_panel_notification($query){
        $result = $this->execute_query($query);
           $output = '';
           
           if(mysqli_num_rows($result) > 0)
           {
            while($row = mysqli_fetch_array($result)) {
                  
                  if($row["notif_id_type"]==1){
                      $output .= '
                              <a href="referrence.php"class="list-group-item">
                            <i class="fa fa-bell  fa-fw"></i>
                               <strong>'.$row["notif_type"].'</strong><br />
                               <small><em>'.$row["notif_text"].'</em></small>
                              </a>
                             ';
                  }else{
                     $output .= '
                              <a href="referrence.php"class="list-group-item">
                            <i class="fa fa-bullhorn  fa-fw"></i>
                               <strong>'.$row["notif_type"].'</strong><br />
                               <small><em>'.$row["notif_text"].'</em></small>
                              </a>
                             ';
                  }
                   
                  
              }
           }else{
            $output .= '<li><a href="#" class="text-bold text-italic">No FeedBack Found</a></li>';
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
   public function get_selected_data($query, $query2)
      {
         $result = $this->execute_query($query);
         $result2 = $this->execute_query($query2);
         $row2 = mysqli_fetch_object($result2); 
         $row = mysqli_fetch_object($result);
         
         $dat = explode(',',$row->author);
         $dcnt = count($dat);
         $aut = '';
         if($dcnt>1){
          $cnt=0;
          foreach ($dat as $did){
              if($cnt == ($dcnt-1)){
                $aut .= 'and '. $did;
              }elseif($cnt == ($dcnt-2)){
                $aut .= $did . ' ';
              }else{
                $aut .= $did . ', ';
              }
              $cnt++;
          }
         }else{
          $aut=$row->author;
         }
         $tloc='';
         $loc = explode(' ', $row->location);
         foreach ($loc as $locs) {
           $tloc .= $locs. '<br />'; 
         }

         $output = '';

         
         $output .='
         <table>
            <tr>
              <td align="right" width="20%">Call #: </td>
              <td width="20%" class="calln"> '. $tloc .'</td>
              <td width="60%"><img src="'.$row->img.'" width="80%" height="auto"></td>
            </tr>
         </table>
         <br />
         <table class="table table-bordered">
            <tr>
              <td align="right" width="25%">Library: </td>
              <td width="75%">'.$row->department.'</td>
            </tr>
            
            <tr>
              <td align="right" >Main Title: </td>
              <td>'.$row->book_title.'</td>
            </tr>
            <tr>
              <td align="right" >Author: </td>
              <td>'.$aut.'</td>
            </tr>
            <tr>
              <td align="right" >Edition: </td>
              <td>'.$row->copyright_year.'</td>
            </tr>
            <tr>
              <td align="right" >Published: </td>
              <td>'.$row->book_pub.'</td>
            </tr>
            <tr>
              <td align="right" >ISBN: </td>
              <td>'.$row->isbn.'</td>
            </tr>
            <tr>
              <td align="right" >Available: </td>
              <td>'.($row->book_copies-$row2->CNT).'</td>
            </tr>
        
        </table>';



         $output .= '|The book ' .$row->book_title. ' by ' . $aut . ' located in the '.$row->department.' Library, call number '.$row->location.', books available ' .($row->book_copies-$row2->CNT). '. ' ;
         if(($row->book_copies-$row2->CNT) == 0){
            $output .= 'Sorry... This Book is no longer available. Try Again Later.|false|'.$row->book_title.'/'.$aut.'|'.($row->book_copies-$row2->CNT);
         }else{
            $output .= 'Would you like to reserve this book? type 1 for Yes, or Type 2 for No.|true|'.$row->book_title.'/'.$aut.'|'.($row->book_copies-$row2->CNT);
         }
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
                <td>

                <div class="book_title">'.$row->book_title.'</div>
                <div class="book_specks">'.$row->author.'</br>
                '.$row->copyright_year.' ed.</br>
                '.$row->book_pub.'</br>
                ISBN: '.$row->isbn.'</br>
                Call #: '.$row->location.'</br>
                '.$row->department.' Library</br>
                </div>

                </br>
                </td>
                <td>
                    <img src="'.$row->img.'" width="20%" height="auto">
                </td>  
              </tr> ';
              $array .= $row->book_id.'*'.$row->book_title.'*'.$row->author.'/';

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
//Login/Tapin
  public function login($user,$pass){
        $query = "SELECT * FROM students WHERE student_id = '".$user."' AND passcode = '".$pass."'";
        $query2 = "SELECT * FROM faculty WHERE faculty_no = '".$user."' AND passcode = '".$pass."'";
        $query3 = "SELECT * FROM users WHERE username = '".$user."' AND password = '".$pass."'";

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
              (student_no, description, Date_time) VALUES ('".$id."', 'Just Logout', NOW())
              ";
              $execute = $this->execute_query($exeque);
              $row = mysqli_fetch_object($studexe);
              echo $row->stdname. " just Logged Out.";   
            }else{
              $exeque = "INSERT INTO `logs`
              (student_no, description, Date_time) VALUES ('".$id."', 'Just Login', NOW())
              ";
              $execute = $this->execute_query($exeque);
              $row = mysqli_fetch_object($studexe);
              echo $row->stdname. " just Logged In.";
            }

          }else{
            $exeque = "INSERT INTO `logs`
            (student_no, description, Date_time) VALUES ('".$id."', 'Just Login', NOW())
            ";
            $execute = $this->execute_query($exeque);
            $row = mysqli_fetch_object($studexe);
            echo $row->stdname. " just Logged In.";

          }
        }else{
          echo $id. " is not a student here...";
        }
      }
      public function get_book_status($id){
        
      }
      public function get_issue_data($id){
          $query = "SELECT bk.book_no AS book_no, bk.book_title AS title, br.copies AS copies, br.on_date AS on_date, br.due_date AS due_date, s.student_name AS name, s.contact AS contact, br.borrow_no AS borrow_no, br.id AS id FROM borrow_book br LEFT JOIN book bk ON bk.book_no=br.book_no LEFT JOIN borrow_details bd ON bd.borrow_no = br.borrow_no LEFT JOIN students s ON s.student_id=bd.member_id  WHERE bd.member_id ='".$id."' AND bd.activity = 'reserved' ORDER BY br.id Asc";
          $result = $this->execute_query($query);
          
          date_default_timezone_set("Asia/Manila");
          $date = date('Y-m-d');
          $due= date('Y-m-d',strtotime("+6 day"));
          $num = substr(str_shuffle("0123456789"), -8);  

          $data = '';
          

          if($dat = mysqli_fetch_assoc($result)){
            if(mysqli_num_rows($result)>1){
             $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$dat['book_no']."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' required value='".$dat['title']."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='1' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$dat['id']."'> </td>
                </tr>";
              while($row = mysqli_fetch_object($result)){
                $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$row->book_no."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' required value='".$row->title."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='".$row->copies."' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$row->id."'></td>
                </tr>";

              }
            }else{
              $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$dat['book_no']."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' required value='".$dat['title']."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$dat['id']."'> </td>
                </tr>";                
            }
            $data .="|".$dat['name'];
            $data .="|".$dat['contact'];
            $data .="|".$dat['borrow_no'];
            }else{
              $query2 = "SELECT s.student_name AS name, s.contact AS contact FROM students s WHERE s.student_id = '".$id."'";
              $result2 = $this->execute_query($query2);

              $dat2 = mysqli_fetch_assoc($result2);
              
              $data .="<tr> 
              <td width='19%''><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td>
              <td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' required /></td> 
              <td width='7%'><input type='number' min='1' value ='1' name='copies[]' class='form-control copies' required /></td> 
              <td width='14%'><input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /></td>
              <td  width='14%'><input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned' required  /></td> 
              <td width='16%'><button type='button' name='remove' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-minus'></span></button> <input type='text' name='rs_id[]' id='rs_id' value='0'> </td> 
              </tr>";
              $data .="|".$dat2['name'];
              $data .="|".$dat2['contact'];
              $data .="|".$num;

            }

            
            
            echo $data;
          }

          public function loctatebook($query){
            $result = $this->execute_query($query);
            
            if($row = mysqli_fetch_assoc($result)){
              echo $row['title'];
            }else{
              echo "No Book ";
            }
          }
      // function upload_file($file)  
      // {  
      //      if(isset($file))  
      //      {  
      //           $extension = explode('.', $file["name"]);  
      //           $new_name = rand() . '.' . $extension[1];  
      //           $destination = './upload/' . $new_name;  
      //           move_uploaded_file($file['tmp_name'], $destination);  
      //           return $new_name;  
      //      }  
      // }  
 }  
 ?>  