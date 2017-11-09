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
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Book Catalog No</th>  
                     <th width="10%">Book Title</th>  
                     <th width="35%">Book Author</th>  
                     <th width="35%">Book Published</th>  
                     <th width="35%">Publisher Name</th>  
                     <th width="35%">Date Added</th>  
                     <th width="35%">Book Copies</th>  
                     <th width="35%">Status</th>  
                      
                     <th width="20%">Command</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>        
                     <td>'.$row->book_id.'</td>  
                     <td>'.$row->book_title.'</td>  
                     <td>'.$row->author.'</td>  
                     <td>'.$row->book_pub.'</td>  
                     <td>'.$row->publisher_name.'</td>  
                     <td>'.$row->date_added.'</td>  
                     <td>'.$row->book_copies.'</td>  
                     <td>'.$row->status.'</td>  
                     <td><button type="button" name="update" id="'.$row->book_id .'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->book_id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      }
      public function get_author_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Author #</th>  
                     <th width="35%">Name</th>  
                     <th width="35%">No of Book Published</th>  
                     <th width="20%">Command</th>  
                     
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->author_name.'</td>  
                     <td>'.$row->num_published.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      } 
       public function get_borrower_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">#</th>  
                     <th width="35%">Name</th>    
                     <th width="35%">Book Name</th>    
                     <th width="35%">Date Borrowed</th>    
                     <th width="35%">Date Returned</th>    
                     <th width="20%">Command</th>  
                     
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->borrower_name.'</td>  
                     <td>'.$row->book_name.'</td>  
                     <td>'.$row->date_borrowed.'</td>  
                     <td>'.$row->date_returned.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      } 

    public function get_catalog_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">#</th>  
                     <th width="35%">Catalog Name</th>   
                     <th width="20%">Command</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->first_name.'</td>  
                     <td>'.$row->last_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button></td>  
                     <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      } 
      public function get_user_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Image</th>  
                     <th width="35%">First Name</th>  
                     <th width="35%">Last Name</th>  
                     <th width="10%">Update</th>  
                     <th width="10%">Delete</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->first_name.'</td>  
                     <td>'.$row->last_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button></td>  
                     <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      } 
      public function get_member_data($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Image</th>  
                     <th width="35%">First Name</th>  
                     <th width="35%">Last Name</th>  
                     <th width="10%">Update</th>  
                     <th width="10%">Delete</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->first_name.'</td>  
                     <td>'.$row->last_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button></td>  
                     <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
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