<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/menu.php'; ?>
                         <h3 align="center">Books!</h3><br />  
                              <div  class="table-responsive"> 
                              	  <button type="button" class="btn btn-primary" id="add_book" data-toggle="modal" data-target="#book">
							            Add Book
							          </button>
                               <table class="table table-bordered table-striped" id="books">  
					                <thead>  
					                     <th width="10%">Book No</th>  
					                     <th width="10%">Book Title</th>  
					                     <th width="14%">Book Author</th>  
					                     <th width="21%">Publisher Name</th>  
					                     <th width="16%">ISBN</th>  
					                     <th width="7%">Book Copies</th>  
					                     <th width="7%">Status</th>  
					                      
					                     <th width="14%">Command</th>  
					                </thead> 
					                <tbody id="book_table">
					                	
					                </tbody> 
					            </table>
                              </div>  
                  
                </div>
           </div>  
           <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Book</h4>
      </div>
      <form class="form-horizontal" id="bookform" method="Post" class="collapse">
      <div class="modal-body">
      	<div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label text-left">Book No</label>
          <div class="col-sm-9">
             <input type="text" class="form-control"  name="book_no" id="book_no" placeholder="Book No" readonly="true">
          </div>
        </div>
      	<div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label text-left">Book Title</label>
          <div class="col-sm-9">
             <input type="text" class="form-control"  name="book_name" id="book_name" required="true" placeholder="Book Title">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label text-left">Catergory</label>
          <div class="col-sm-9">
           <select  class="chosen-select form-control" name='category'  id='category' tabindex="2" required>
            <option value="">Please Select</option>
         <?php 
            
             $output='';

             echo $query="SELECT * FROM category";
               $result =mysqli_query($object->connect,$query);
               while ($row = mysqli_fetch_array($result)) {

                  $output .='<option value='.$row["category_id"].'> '.$row["categoryname"]. '</option>';

                }
                echo $output;
               ?>
           </select>
          </div>
        </div>      
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label text-left">Author</label>
          <div class="col-sm-9">
           <select  class="chosen-select form-control" name='author'  id='author' tabindex="2" required>
            <option value="">Please Select</option>
         <?php 
            
             $output='';

              $query="SELECT * FROM authors";
              $result =mysqli_query($object->connect,$query);
               while ($row = mysqli_fetch_array($result)) {

                  $output .='<option value='.$row["id"].'> '.$row["author_name"]. '</option>';

                }
                echo $output;
               ?>
           </select>
          </div>
        </div>       
	     <div class="form-group">
	          <label for="inputPassword3" class="col-sm-3 control-label text-left">Publisher</label>
	          <div class="col-sm-9">
	           <select  class="chosen-select form-control" name='publisher'  id='publisher' tabindex="2" required>
	            <option value="">Please Select</option>
	         <?php 
	           
	             $output='';

	              $query="SELECT * FROM publishers";
	              $result =mysqli_query($object->connect,$query);
	               while ($row = mysqli_fetch_array($result)) {

	                  $output .='<option value='.$row["id"].'> '.$row["book_publisher"]. '-'.$row["publisher_name"].'</option>';

	                }
	                echo $output;
	               ?>
	           </select>

	          </div>
        </div>
        <div class="form-group">
	          <label for="inputPassword3" class="col-sm-3 control-label text-left">Book Copies</label>
	          <div class="col-sm-9">
	           
	             <input type="number" class="form-control" min='1'  name="book_copies"  id="book_copies" placeholder="Book Copies" >
	          </div>
        </div>
        <div class="form-group">
	          <label for="inputPassword3" class="col-sm-3 control-label text-left">Status</label>
	          <div class="col-sm-9">
			       <select  class="chosen-select form-control" name='status'  id='status' tabindex="2" required>
			            <option value="">Please Select</option>
			         <?php 
			             
			             $output='';

			              $query="SELECT * FROM status";
			              $result =mysqli_query($object->connect,$query);
			               while ($row = mysqli_fetch_array($result)) {

			                  $output .='<option value='.$row["id"].'> '.$row["status_name"].'</option>';

			                }
			                echo $output;
			               ?>
		           </select>
	          </div>
        </div>
        <div class="form-group">
	          <label for="inputPassword3" class="col-sm-3 control-label text-left">Copyright year</label>
	          <div class="col-sm-9">
	           
	             <input type="number" class="form-control" name="cp_yr" id="cp_yr" min="1900" max="2099" step="1" placeholder="Copyright Year" required="true" />
	          </div>
        </div>
        <div class="form-group">
	          <label for="inputPassword3" class="col-sm-3 control-label text-left">ISBN</label>
	          <div class="col-sm-9">
	           
	             <input type="text" class="form-control" name="isbn" id="isbn" required="true" />
	          </div>
        </div>
        <div class="form-group">
	          <label for="inputPassword3" class="col-sm-3 control-label text-left">Date Receive</label>
	          <div class="col-sm-9">
	           
	             <input type="date" class="form-control"  name="date_rcv"  id="date_rcv" required/>
	          </div>
        </div>
        <input type="hidden" name="action" id="action" value="addBook" />
        <input type="hidden" name="book" id="book_id" />
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
      </div>
      </form>
    </div>
<?php 
include 'includes/footer.php';
?>
