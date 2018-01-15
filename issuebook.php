<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                         <h3 align="center">Borrowed Books!</h3> 
                              <div  class="table-responsive"> 
                              	  <div class="btn-group">
                                      <a href="issuedBook.php" id="issue_book" class="btn btn-primary"  >
                                      Issue Book
                                    </a>
                                </div>
                               <table class="table table-bordered table-striped" id="bookissue">  
          					                <thead>  
          					                     <th width="12%">Book No</th>  
                                         <th width="12%">Book Title</th>    
          					                     <th width="12%">Student Name</th>    
                                         <th width="12%">Book Copies</th>  
                                         <th width="12%">Date Issued</th>  
          					                     <th width="12%">Return Date</th>  
          					                     <th width="12%">Status</th>  
          					                     <th width="12%">Command</th>  
          					                </thead> 
          					                <tbody id="bookissue_table">
          					                	
          					                </tbody> 
          					            </table>
                            </div>  
                      </div>  
                </div>
           </div>  
      </div>
<?php 
include 'includes/footer.php';
?>

