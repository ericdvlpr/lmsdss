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
                                <div class="btn-group">
                                    <a href="returnBook.php" id="issue_book" class="btn btn-primary"  >
                                      Returned Book
                                    </a>
                                </div>
                               <table class="table table-bordered table-striped" id="bookissue">  
          					                <thead align="center">  
          					                     <th width="12%" align="center">Issue No</th>  
                                         <th width="24%" align="center">Student / Faculty Name</th>    
          					                     <th width="28%" align="center">Book(s)</th>    
                                         <th width="12%" align="center">Date Issued</th>  
          					                     <th width="12%" align="center">Return Date</th>  
          					                     <th width="12%" align="center">Status</th>  
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

