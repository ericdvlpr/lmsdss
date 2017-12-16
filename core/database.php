<?php 
session_start(); 
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
      public function can_login($user, $pass) {
          
          //Login for all Division
          $query = "SELECT * FROM students WHERE student_id ='".$user."' AND passcode ='".$pass."'";
          

          $result = mysqli_query($this->connect, $query);
          if(mysqli_num_rows($result)){
            $row = mysqli_fetch_object($result);
            return array($row->student_id,$row->student_name,'searchBook','Student');
            return true;
          }else{
            return false;
          }

          /*
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
          */

        }
        public function check_access($id) {
         
          $query = "SELECT access FROM users WHERE user_id='".$id."' ";
            $result = $this->execute_query($query);
           $row = mysqli_fetch_assoc($result);
            $access = $row['access'];
          return $access;
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
                     <td>'.$row->author_name.'</td>  
                     <td>'.$row->cataloguename.'</td>   
                     <td>'.$row->isbn.'</td>   
                     <td>'.$row->book_copies.'</td>  
                     <td>'.$row->status.'</td>  
                     <td><button type="button" name="update" id="'.$row->book_id .'" class="btn btn-success btn-xs update">Update</button> <button type="button" name="delete" id="'.$row->book_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                     <td>'.$row->status_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->book_id .'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->book_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
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
                     <td>'.$row->borrow_id.'</td>  
                     <td>'.$row->lastname.', '.$row->firstname.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->date_borrow.'</td>  
                     <td>'.$row->date_return.'</td>  
                     <td><button type="button" name="update" id="'.$row->borrow_id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->borrow_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  

                     <td>'.$row->book_no.'</td>  
                     <td>'.$row->book_title.'</td> 
                     <td>'.$row->student_name.'</td>   
                     <td>'.$row->copies.'</td>  
                     <td>'.$row->date_issued.'</td>  
                     <td>'.$row->date_returned.'</td>  
                     <td>'.$row->status.'</td>  
                     <td><button type="button" name="update" id="'.$row->issue_book_id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->issue_book_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  

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
           $output .= '';  
           return $output;  
      } 


      public function get_user_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->user_id.'</td>  
                     <td>'.$row->username.'</td>  
                    
                     <td><button type="button" name="update" id="'.$row->user_id.'" class="btn btn-success btn-xs update">Update</button> <button type="button" name="delete" id="'.$row->user_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>';
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
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updatestudent">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deletestudent">Delete</button></td>  
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


         $output = '';

         
         $output .='
         <table class="table table-bordered table-striped>
            <tr>
              <td align="right" width="50%">Call #: </td>
              <td width="50%">Not Available</td>
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
              <td>'.$row->publisher_name.', '.$row->book_pub.'</td>
            </tr>
            <tr>
              <td align="right" >ISBN: </td>
              <td>'.$row->isbn.'</td>
            </tr>
            <tr>
              <td align="right" >Available: </td>
              <td>'.($row->book_copies-$row2->CNT).'</td>
            </tr>
            ';

          
         if(($row->book_copies-$row2->CNT)!=0){     
           $output .= 
              '<td colspan="2" align="center">Would you like to Reserve this Book?<br>
              <button>(1)Yes</button> <button>(2)No</button></td>';  
             }else{
               $output .= 
              '<td colspan="2" align="center">No Longer Available</td>';
             }

        $output  .=  '</tr>
          </table>';



         $output .= '|The book ' .$row->book_title. ' by ' . $aut . ' located in some location, books available ' .($row->book_copies-$row2->CNT). '. ' ;
         if(($row->book_copies-$row2->CNT) == 0){
            $output .= 'Sorry... This Book is no longer available. Try Again Later.|false|'.$row->book_title.'/'.$aut;
         }else{
            $output .= 'Would you like to reserve this book? type 1 for Yes, or Type 2 for No.|true|'.$row->book_title.'/'.$aut;
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
          <table name="sc_table" id="sc_table" class="table table-bordered table-striped">  
             <thead>
             <tr>
                <th width="100%"></th>  
              </tr>
              </thead>
              <tbody>
                            
        ';
          while($row = mysqli_fetch_object($result))
          {
             $output .= '
              <tr>
                <td><div class="book_title">'.$row->book_title.'</div>
                <div class="book_specks">'.$row->author.'</br>
                '.$row->copyright_year.' ed.</br>
                '.$row->publisher_name.', '.$row->book_pub.'</br>
                ISBN: '.$row->isbn.'</br>
                Call #: </br>
                </div></br>
                </td>  
              </tr> ';
              $array .= $row->book_id.'*'.$row->book_title.'*'.$row->author.'/';

          }
          $output .='
            </tbody>
            </table>
          ';
          $output .= '|'.$array;
        }else{
          $output = 0; 
        }
       
       return $output;

      }





      function get_notification($query){
        $result = $this->execute_query($query);
           $output = '';
           
           if(mysqli_num_rows($result) > 0)
           {
            while($row = mysqli_fetch_array($result))
            {
             $output .= '
             <li>
              <a href="#">
               <strong>'.$row["notif_subject"].'</strong><br />
               <small><em>'.$row["notif_text"].'</em></small>
              </a>
             </li>
             <li class="divider"></li>
             ';
            }
           }
           else
           {
            $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
           }
           $query_1 = "SELECT * FROM notification WHERE notif_status=0";
           $result_1 =$this->execute_query($query_1);
           $count = mysqli_num_rows($result_1);
           $data = array(
              'notification'   => $output,
              'unseen_notification' => $count
             );
           echo json_encode($data);
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