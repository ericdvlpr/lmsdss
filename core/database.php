<?php  
 class Database  
 {  
      //crud class  
      public $connect;  
      private $host = "localhost";  
      private $username = 'root';  
      private $password = '123456';  
      private  $database = 'db_lms';  
      function __construct()  
      {  
           $this->database_connect();  
      }  
      public function database_connect()  
      {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
      }  
      public function execute_query($query)  
      {  
           return mysqli_query($this->connect, $query);  
      }


      //load query  
      public function get_book_data($query)  
      {  
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
                     <td>'.$row->status_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->book_id .'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->book_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  

           return $output;  
      }
      public function get_author_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->author_id.'</td>  
                     <td>'.$row->author_name.'</td>  
                     <td></td>  
                     <td><button type="button" name="update" id="'.$row->author_id.'" class="btn btn-success btn-xs updateauthor">Update</button><button type="button" name="delete" id="'.$row->author_id.'" class="btn btn-danger btn-xs deleteauthor">Delete</button></td>  
                </tr>  
                ';  
           }  

           return $output;  
      } 
       public function get_borrowered_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  

           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->borrow_no.'</td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->date_borrow.'</td>  
                     <td>'.$row->date_return.'</td>  
                     <td><button type="button" name="update" id="'.$row->borrow_no.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->borrow_no.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 

    public function get_catalogue_data($query)  
      {  
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


      public function get_user_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped" >  
                <tr>  
                     <th width="10%">Image</th>  
                     <th width="35%">Username</th>  
                     <th width="35%">Access level</th>  
                     <th width="10%">Command</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->username.'</td>  
                     <td>'.$row->access_level.'</td>  
                     <td><button type="button" name="update" id="'.$row->user_id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->user_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      } 


      public function get_student_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);   
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->student_id.'</td>  
                     <td>'.$row->student_name.'</td>  
                     <td>'.$row->department_name.'</td>  
                     <td>'.$row->course_code.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updatestudent">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deletestudent">Delete</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 


        public function get_pub_id($name){
            $query = "SELECT id FROM publishers WHERE publisher_name LIKE '%".$name."%' ";
            $result = $this->execute_query($query) ;
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            return $id;
          } 
        public function get_auth_id($name){
            $query = "SELECT id FROM authors WHERE author_name LIKE '%".$name."%' ";
            $result = $this->execute_query($query) ;
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            return $id;
          }   
       public function get_number($query){
              $result = $this->execute_query($query);
              $row = mysqli_fetch_object($result);
              return $row->bookNum;
             }
 public function get_selected_data($query)
      {
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

     
      public function get_search_data($query)
      {
        
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
              <tbody>
                            
        ';
          while($row = mysqli_fetch_object($result))
          {
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