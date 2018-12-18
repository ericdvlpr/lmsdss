<?php include 'includes/header.php';?>  
                    <?php include 'includes/sidemenu.php'; ?>
    <section class="content">
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                <div class="btn-group pull-right">
                                            <a href="issuedBook.php" id="issue_book" class="btn btn-success"  >
                                              Check Out
                                            </a> 
                                            
                                            <a href="returnBook.php" id="issue_book" class="btn btn-warning"  >
                                              Check In
                                            </a>
                                        </div>
                                       <h3 class="box-title">Check Out</h3>
                                </div>
                                <div class="box-body">
                                    <div  class="table-responsive"> 
                                          
                                       <table class="table table-bordered table-striped" id="bookissue">  
                                            <thead align="center">  
                                                 <th width="12%" align="center">Issue No</th>  
                                                 <th width="24%" align="center">Student / Faculty Name</th>    
                                                 <th width="28%" align="center">Material(s)</th>    
                                                 <th width="12%" align="center">Date Issued</th>  
                                                 <th width="12%" align="center">Return Date</th>  
                                                 <th width="12%" align="center">Status</th>  
                                            </thead> 
                                            <tbody id="bookissue_table"></tbody> 
                                        </table>
                                    </div> 
                                </div>
                            </div>
      </section>      
<?php 
include 'includes/footer.php';
?>s