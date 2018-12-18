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
                              <li class="active"><a href="periodical.php">Periodical Article</a></li>
                              <li><a href="audio_visual.php" >Audio Visual</a></li>
                              
                            </ul>
                            <div class="box-body">
                                  <div  class="table-responsive"> 
                                      
                                   <table class="table table-bordered table-striped" id="periodical">  
                                        <thead>  
                                             <th width="10%">Accession No</th>  
                                             <th width="20%">Title Article</th>  
                                             <th width="20%">Issue No</th>  
                                             <th width="10%">Call #</th>  
                                             <th width="14%">Command</th>  
                                        </thead> 
                                        <tbody id="periodical_table">
                                          
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
        <div class="row" id='periodical_form' >
          <div class="col-md-6">
              <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Accession No</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" autofocus name="accession_no" id="accession_no"  placeholder="Please Scan Accession No" >

                    </div>
                    <div id="book_no"></div>
              </div>
              <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Title Article</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control"  name="article_title" id="article_title"  placeholder="Title Article" >
                    </div>
              </div>
              <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Title Periodical</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control"  name="period_title" id="period_title"  placeholder="Title Periodical" >
                    </div>
              </div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Publisher</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control"  name="publisher" id="publisher"  placeholder="Publisher" >
                    </div>
            </div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Volumn #</label>
                    <div class="col-sm-8">
                       <input type="number" class="form-control"  name="volumn_num" id="volumn_num"  placeholder="Volumn #" >
                    </div>
                  
            </div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Issue #</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control"  name="issue_num" id="issue_num"  placeholder="Issue #" >
                    </div>
            </div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Total Pages</label>
                    <div class="col-sm-8">
                       <input type="number" class="form-control"  name="total_pages" id="total_pages"  placeholder="Total Pages" >
                    </div>
            </div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-left">Author</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control"  name="author" id="author"  placeholder="Author" >
                    </div>
            </div>
            <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label text-left">Call Num</label>
                      <div class="col-sm-8">
                       
                         <input type="text" class="form-control" name="location" id="location" required="true" placeholder="Call #" />
                      </div>
                  </div>
          </div>
          <div class="col-md-6">
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
               <input type="hidden" name="action" id="action" value="addPeriodical" />
                <input type="hidden" name="periodical_id" id="periodical_id" />
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

