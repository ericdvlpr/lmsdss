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
         
          $query = "SELECT access FROM users WHERE id='".$id."' ";
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


      public function get_user_data($query) {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped" >  
                <tr>  
                     <th width="10%">ID</th>  
                     <th width="35%">Username</th>  
                     <th width="35%">Name</th>
                     <th width="10%">Command</th>   
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->user_id.'</td>  
                     <td>'.$row->username.'</td>  
                     <td>'.$row->lastname.', '.$row->firstname.'</td>  
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
      public function get_selected_data($query) {
             $result = $this->execute_query($query);
             $row = mysqli_fetch_object($result);
             $output = '';

             $output .='
             <table class="table table-bordered table-striped">
                <tr>
                  <td>'. $row->book_title .' by '. $row->author .'</td> 
                  <td rowspan="2"> LOCATION </td>
                </tr>
                <tr>
                  <td>'. $row->book_copies .'</td>
                </tr>
              </table>
             |The book ' .$row->book_title. ' by ' . $row->author . ' located in some location, books available ' .$row->book_copies. '.' ;

             return $output;
      }

     
      public function get_search_data($query) {
          $result = $this->execute_query($query);
          $numrow = mysqli_num_rows($result);
          $output = '';

          if($numrow>0){
            $output .= $numrow.'|';
            $output .= '
            <table name="sc_table" id="sc_table">  
               <thead>
               <tr>  
                  <th width="10%">#</th>  
                  <th width="30%">Book</th>    
                  <th width="20%">Author</th>    
                  <th width="20%">Published</th>    
                </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_object($result)) {
               $output .= '
                <tr>

                  <td>'.$row->book_id.'</td>  
                  <td>'.$row->book_title.'</td>  
                  <td>'.$row->author.'</td>  
                  <td>'.$row->publisher_name.'</td>  
               </tr> ';
            }
            $output .='
              </tbody>
              </table>
            ';

          }else{
            $output = 0; 
          }
          
          return $output;
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