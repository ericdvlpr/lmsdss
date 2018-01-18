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
       public function get_book_issued_data() {  
           $output = '';  
           

           $query = "SELECT s.student_name AS Name, bd.borrow_no AS borrow_no, bd.activity AS status FROM borrow_details bd LEFT JOIN students s ON s.student_id = bd.member_id";
           
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  

                $query2 = "SELECT bk.book_title AS title, bb.on_date AS ondate, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no WHERE bb.borrow_no = '".$row->borrow_no."'";
                $result2 = $this->execute_query($query2);
                $row1 = mysqli_fetch_object($result2);


                $output .= '  
                <tr>       
                    <td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->borrow_no.'</td>
                    <td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->Name.'</td>
                    <td>'.$row1->title.'</td>
                    <td>'.$row1->ondate.'</td>
                    <td >'.$row1->due.'</td>
                    <td rowspan="'.mysqli_num_rows($result2).'" align="center" valign="center">'.$row->status.'</td>
                </tr>';
                  
                  while ($row2=mysqli_fetch_object($result2)) {
                    
                      $output .='
                      <tr>
                         <td>'.$row2->title.'</td>
                         <td>'.$row2->ondate.'</td>
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

      function get_notification($query){
        $result = $this->execute_query($query);
           $output = '';
           
           if(mysqli_num_rows($result) > 0)
           {
            while($row = mysqli_fetch_array($result))
            {
             $output .= '
             <li>
              <a href="referrence.php">
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
      function get_last_id(){
          $last_id = $this->insert_id;
          return $last_id;
      }
       public function get_selected_data($query, $query2)
      {
         $result = $this->execute_query($query);
         $result2 = $this->execute_query($query2);
         
         $row = mysqli_fetch_object($result);
         
         $dat = explode(',',$row->author);
         $dcnt = count($dat);
         $aut = '';
         $calc = 0;
         while ($row2 = mysqli_fetch_object($result2)) {
           $calc += $row2->CNT;
         }

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
              <td>'.($row->book_copies-$calc).'</td>
            </tr>
        
        </table>';



         $output .= '|The book ' .$row->book_title. ' by ' . $aut . ' located in the '.$row->department.' Library, call number '.$row->location.', books available ' .($row->book_copies-$calc). '. ' ;
         if(($row->book_copies-$calc) == 0){
            $output .= 'Sorry... This Book is no longer available. Try Again Later.|false|'.$row->book_title.'/'.$aut.'|'.($row->book_copies-$calc);
         }else{
            $output .= 'Would you like to reserve this book? type 1 for Yes, or Type 2 for No.|true|'.$row->book_title.'/'.$aut.'|'.($row->book_copies-$calc);
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
      public function get_book_reserved_data($query){
        $result = $this->execute_query($query);
          $output = '';
          while($row = mysqli_fetch_object($result)){
              $query2="SELECT bk.book_title AS title, bb.copies AS copies, bb.on_date AS ondate, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no WHERE bb.borrow_no ='".$row->borrow_no."'";
              $results = $this->execute_query($query2);
              $row1 = mysqli_fetch_object($results);
              $output .='
                <tr>
                  <td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->borrow_no.'</td>
                  <td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->student.' ('.$row->Id.')</td>
                  <td>('.$row1->copies.') '.$row1->title.'</td>
                  <td>'.$row1->ondate.'</td>
                  <td>'.$row1->due.'</td>
                  <td rowspan = "'.mysqli_num_rows($results).'" align="center">'.$row->Stats.'</td>
                  <td rowspan = "'.mysqli_num_rows($results).'" align="center"><a href="issuedBook?stud='.$row->Id.'" class = "btn btn-success btn-xs">Issued</a> 
                </tr>
              ';

              while($row2 = mysqli_fetch_object($results)){
                  $output .='
                  <tr>
                     <td>('.$row2->copies.') '.$row2->title.'</td>
                     <td>'.$row2->ondate.'</td>
                     <td>'.$row2->due.'</td> 
                  </tr>
                  ';
              }
          }
          return $output;
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
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required value='".$dat['title']."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='1' class='form-control copies' required /> </td>
               <td width='14%'> <input type='date' name='date_issued[]' id='date_issued' value='".$date."' class='form-control date_issued' required  /> </td>
                <td  width='14%'> <input type='date' name='date_returned[]' id='date_returned' value='".$due."' class='form-control date_returned'  required  /> </td>
                <td width='16%'> <button type='button' name='remove' class='btn btn-danger btn-sm remove'> <span class='glyphicon glyphicon-minus'> </span> </button> <input type='hidden' name='rs_id[]' id='rs_id' value='".$dat['id']."'> </td>
                </tr>";
              while($row = mysqli_fetch_object($result)){
                $data .= "
                <tr>
                <td width='19%''> <input type='text' name='bookID[]' id='bookID' class='form-control bookID' required value='".$row->book_no."' /> </td>
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required value='".$row->title."'/> </td>
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
               <td width='26%'> <input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required value='".$dat['title']."'/> </td>
                <td width='7%'> <input type='number' min='1' name='copies[]' value='".$dat['copies']."' class='form-control copies' required /> </td>
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
              <td width='19%'><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td>
              <td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly='true' required /></td> 
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
              return $row['title'];
            }else{
              return "No Book";
            }
          }


          public function get_return_info($query){
            $result = $this->execute_query($query);
            

            if($row = mysqli_fetch_assoc($result)){
                $output = "
                <tr> 
                  <td width='19%''><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td>
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
              
              $output = '|'.$row['Title'].'|'.$row['Copies'].'|'.$row['Ondate'].'|'.$row['Due'];
              
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
                $query3 = "DELETE FROM over_due od WHERE od.issue_id = '".$IDs."'";


                return $output.'|'.$output2.'|'.$Contact;
              }else{
                $output = "Warning: \n \tThe Following Book(s) Have not been return: \n";
                $output2 = "Good Day, \n \t The Following Book(s) is Not been return: \n";
                
                $query2 = "SELECT bk.book_title AS title, bb.due_date AS Due FROM borrow_book bb LEFT JOIN book bk ON bk.book_no = bb.book_no WHERE bb.borrow_no = '".$IDs."' AND ret = '0'";
                
                $results = $this->execute_query($query2);
                  while($row=mysqli_fetch_object($results)){
                    $output .= "\t\t ".$row->title."(".$row->Due.") \n";
                    $output2 .= "\t\t ".$row->title."(".$row->Due.") \n"; 
                  }
                 $output2 .= "\t Please Return The Following Book(s) Imideately To Avoid Penalties.";

                 return $output.'|'.$output2.'|'.$Contact; 
                
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
              $bkque = "SELECT bb.due_date AS due FROM borrow_book as bb WHERE bb.borrow_no = '".$row->borrow_no."'";
              $bkres = $this->execute_query($bkque);
              $cnt = 0;
              $ovli = false;
              $newbie = false;

              while($row2 = mysqli_fetch_object($bkres)){
                  if(date('Y-m-d')>=$row2->due){
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
                  $obque = "SELECT bk.book_title AS title, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bb.book_no = bk.book_no LEFT JOIN borrow_details bd ON bb.borrow_no = bd.borrow_no WHERE bb.borrow_no = '".$row->borrow_no."' AND ((bd.activity = 'overdue') OR (bd.activity = 'limbo'))"; 
                  $obret = $this->execute_query($obque);
                  while($obrow = mysqli_fetch_object($obret)){
                      if(date('Y-m-d')>=$obrow->due){
                        $output .= "\t\t".$obrow->title." (".$obrow->due.") \n";
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
                    $obque = "SELECT bk.book_title AS title, bb.due_date AS due FROM borrow_book bb LEFT JOIN book bk ON bb.book_no = bk.book_no LEFT JOIN borrow_details bd ON bb.borrow_no = bd.borrow_no WHERE bb.borrow_no = '".$odcrow->borrow_no."' AND ((bd.activity = 'overdue') OR (bd.activity = 'limbo'))"; 
                    $obret = $this->execute_query($obque);
                    while($obrow = mysqli_fetch_object($obret)){
                        if(date('Y-m-d')>=$obrow->due){
                          $output .= "\t\t".$obrow->title." (".$obrow->due.") \n";
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