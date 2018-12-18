<?php include 'includes/header.php';?>  
                    <?php include 'includes/sidemenu.php'; ?>
         <section class="content">
                  <div class="col-md-12">
                      <div class="box box-solid box-primary">
                            <div class="box-header">
                                  <div class="btn-group pull-right">
                                          <button type="button" class="btn btn-success" id="add_book" data-toggle="modal" >
                                          Add Material/Resources
                                        </button>
                                        
                                    </div>
                                   <h3 class="box-title">Material/Resources</h3>
                            </div>
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="books.php">Books</a></li>
                              <li><a href="periodical.php">Periodical Article</a></li>
                              <li><a href="audio_visual.php">Audio Visual</a></li>
                              
                            </ul>
                            <div class="box-body">
                                  <div  class="table-responsive"> 
                                      
                                   <table class="table table-bordered table-striped" id="books">  
                                        <thead>  
                                             <th width="10%">Accession No</th>  
                                             <th width="20%">Title</th>  
                                             <th width="15%">Author</th>   
                                             <th width="10%">Copies</th>  
                                             <th width="7%">Status</th>  
                                              
                                             <th width="14%">Command</th>  
                                        </thead> 
                                        <tbody id="book_table">
                                          
                                        </tbody> 
                                    </table>
                                </div> 
                            </div>
                      </div>
                  </div> 
          </section>
<div class="modal fade bs-example-modal-lg" id="book" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Entry</h4>
      </div>
      <form class="form-horizontal" id="bookform" method="Post" class="collapse">
      <div class="modal-body">
        <div class="row" id="book_form">
          <div class="col-md-6">
              <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Accession No</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" autofocus name="book_no" id="book_no"  placeholder="Please Scan Accession No" >

                    </div>
                    <div id="book_no"></div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Title</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control"  name="book_name" id="book_name" required="true" placeholder="Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Catergory</label>
                    <div class="col-sm-8">
                     <select class="selectpicker form-control" name='category' id='category' required>
                      <option value="">Please Select</option>
                   <?php 
                      
                       $output='';
                       echo $query="SELECT * FROM catalogue";
                         $result =mysqli_query($object->connect,$query);
                         while ($row = mysqli_fetch_array($result)) {
                            $output .='<option value='.$row["catalogue_id"].'> '.$row["cataloguename"]. '</option>';
                          }
                          echo $output;
                         ?>
                     </select>
                    </div>
                  </div>      
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Author</label>
                    <div class="col-sm-8">
                      <input type="text" name="author" id="author" placeholder="Author" class="form-control" required />
                     <!-- <select class="selectpicker form-control" name='author' data-live-search="true"  id='author' tabindex="2" required>
                      <option value="">Please Select</option>
                   <?php 
                      
                       // $output='';
                       //  $query="SELECT * FROM authors";
                       //  $result =mysqli_query($object->connect,$query);
                       //   while ($row = mysqli_fetch_array($result)) {
                       //      $output .='<option value='.$row["id"].'> '.$row["author_name"]. '</option>';
                       //    }
                       //    echo $output;
                         ?>
                     </select> -->
                    </div>
                  </div>       
                 <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Publisher</label>
                      <div class="col-sm-8">
                        <input type="text" name="publisher" id="publisher" placeholder="Publisher" class="form-control" required />
                      <!--  <select class="selectpicker form-control" name='publisher' data-live-search="true" id='publisher' tabindex="2" required>
                        <option value="">Please Select</option>
                     <?php 
                       
                         // $output='';
                         //  $query="SELECT * FROM publishers";
                         //  $result =mysqli_query($object->connect,$query);
                         //   while ($row = mysqli_fetch_array($result)) {
                         //      $output .='<option value='.$row["id"].'> '.$row["book_publisher"]. '-'.$row["publisher_name"].'</option>';
                         //    }
                         //    echo $output;
                           ?>
                       </select> -->

                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Copies</label>
                      <div class="col-sm-8">
                       
                         <input type="number" class="form-control" name="book_copies"  id="book_copies" placeholder="Copies" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Status</label>
                      <div class="col-sm-8">
                       <select class="selectpicker form-control" name='status'  id='status' required>
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
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Copyright</label>
                      <div class="col-sm-8">
                       
                         <input type="text" class="form-control" name="cp_yr" id="cp_yr" min="1900" max="2099" step="1" placeholder="Copyright" required="true" />
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">ISBN</label>
                      <div class="col-sm-8">
                       
                         <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" required="true" />
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Call Num</label>
                      <div class="col-sm-8">
                       
                         <input type="text" class="form-control" name="location" id="location" required="true" />
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Acquisition Date</label>
                      <div class="col-sm-8">
                       
                         <input type="date" class="form-control"  name="date_rcv"  id="date_rcv" required/>
                      </div>
                  </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">  
                      <label class="col-sm-3 control-label image text-left">Select Image</label>  
                       <div class="col-sm-8">
                          <input class="form-control" type="file" name="file" id="file" required />   
                       </div>  
                   </div>
                   <div class="form-group">
                         <div class="col-sm-3"></div>
                          <div class=" col-sm-8 img-thumbnail" id="uploaded_image">  
                        </div>    
                   </div>  
                   <input type="hidden" name="action" id="action" value="addBook" />
                    <input type="hidden" name="book_id" id="book_id" />
          </div>
        </div>
      </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" id="button_action" value="Save"/>
          </div>
          </form>
    </div> 
</div> 
</div> 
<?php 
include 'includes/footer.php';
?>

