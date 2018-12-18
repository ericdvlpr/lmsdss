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
                              <li ><a href="books.php" >Books</a></li>
                              <li ><a href="periodical.php">Periodical Article</a></li>
                              <li class="active"><a href="audio_visual.php" >Audio Visual</a></li>
                              
                            </ul>
                            <div class="box-body">
                                  <div  class="table-responsive"> 
                                      
                                   <table class="table table-bordered table-striped" id="audio_visual">  
                                        <thead>  
                                             <th width="10%">Accession No</th>  
                                             <th width="10%">Author</th>  
                                             <th width="20%">Category Title</th>  
                                             <th width="15%">Copies</th>
                                             <th width="14%">Command</th>  
                                        </thead> 
                                        <tbody id="audio_visual_table">
                                          
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
                


        <div class="row" id='audio_form' >
             <div class='col-md-6'>
                     <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label text-left">Accession No</label>
                          <div class="col-sm-8">
                             <input type="text" class="form-control" autofocus name="accession_no" id="accession_no"  placeholder="Please Scan Accession No" >

                          </div>
                          <div id="book_no"></div>
                    </div>
                    <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label text-left">Category Title</label>
                          <div class="col-sm-8">
                             <input type="text" class="form-control"  name="category_title" id="category_title"  placeholder="Title Article" >
                          </div>
                  </div>
                  <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label text-left">Publisher</label>
                          <div class="col-sm-8">
                             <input type="text" class="form-control"  name="publisher" id="publisher"  placeholder="Publisher" >
                          </div>
                  </div>
                  <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label text-left">Running Time</label>
                          <div class="col-sm-8">
                             <input  class="form-control"  name="run_time" id="run_time"  placeholder="hrs:mins" >
                          </div>
                        
                  </div>
                  <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label text-left">Author</label>
                          <div class="col-sm-8">
                             <input type="text" class="form-control"  name="author" id="author"  placeholder="Author" >
                          </div>
                  </div>
                  <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label text-left">Copyright</label>
                          <div class="col-sm-8">
                             <input type="number" class="form-control"  name="copyright" id="copyright"  placeholder="Copyright" >
                          </div>
                  </div>
                  <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-left">Call Num</label>
                            <div class="col-sm-8">
                             
                               <input type="text" class="form-control" name="location" id="location" required="true" placeholder="Call #" />
                            </div>
                  </div>
              </div>
              <div class='col-md-6'>
              <div class="form-group">  
                      <label class="col-sm-4 control-label image text-left">Select Image</label>  
                       <div class="col-sm-8">
                          <input class="form-control" type="file" name="file" id="file" required />   
                       </div>  
               </div>
               <div class="form-group">
                     <div class="col-sm-4"></div>
                      <div class=" col-sm-8 img-thumbnail" id="uploaded_image">  
                    </div>    
               </div>
               <input type="hidden" name="action" id="action" value="addAudio" />
               <input type="hidden" name="audio_id" id="audio_id" />
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

