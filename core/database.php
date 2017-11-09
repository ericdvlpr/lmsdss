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
      public function get_book_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
 
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>        
                     <td>'.$row->book_id.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>  
                     <td>'.$row->book_pub.'</td>  
                     <td>'.$row->publisher_name.'</td>   
                     <td>'.$row->book_copies.'</td>  
                     <td>'.$row->status.'</td>  
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
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
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
                     <td>'.$row->lastname.' '.$row->firstname.' '.$row->middle_name.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->date_borrow.'</td>  
                     <td>'.$row->date_return.'</td>  
                     <td><button type="button" name="update" id="'.$row->borrow_no.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->borrow_no.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 
        public function get_category_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  

           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->category_id.'</td>  
                     <td>'.$row->categoryname.'</td>  
                     <td><button type="button" name="update" id="'.$row->category_id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->category_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           return $output;  
      } 
    // public function get_catalogue_data($query)  
    //   {  
    //        $output = '';  
    //        $result = $this->execute_query($query);  
    //        $output .= '  
           
    //        ';  
    //        while($row = mysqli_fetch_object($result))  
    //        {  
    //             $output .= '  
    //             <tr>       
    //                  <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
    //                  <td>'.$row->first_name.'</td>  
    //                  <td>'.$row->last_name.'</td>  
    //                  <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button></td>  
    //                  <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
    //             </tr>  
    //             ';  
    //        }  
    //        $output .= '';  
    //        return $output;  
    //   } 


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
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">#</th>  
                     <th width="20%">First Name</th>  
                     <th width="20%">Middle Name</th>  
                     <th width="20%">Last Name</th>  
                     <th width="20%">Year level</th>  
                     <th width="20%">Command</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->student_id.'</td>  
                     <td>'.$row->firstname.'</td>  
                     <td>'.$row->middle_name.'</td>  
                     <td>'.$row->lastname.'</td>  
                     <td>'.$row->year_level.'</td>  
                     <td><button type="button" name="update" id="'.$row->student_id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->student_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
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