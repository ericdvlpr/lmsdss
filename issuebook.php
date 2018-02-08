<?php include 'includes/header.php';?>  
                    <?php include 'includes/sidemenu.php'; ?>
    <section class="content">
                     <div class="col-md-12">
                        <br />
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                       <h3 class="box-title">Borrowed Books</h3>
                                </div>
                                <div class="box-body">
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
                                            <tbody id="bookissue_table"></tbody> 
                                        </table>
                                    </div> 
                                </div>
                            </div>
                       </div> 
      </section>      
<?php 
include 'includes/footer.php';
?>s