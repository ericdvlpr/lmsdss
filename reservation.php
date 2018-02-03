<?php include 'includes/header.php';?>  

                    <?php include 'includes/sidemenu.php'; ?>
                        <div class="content-wrapper">
                         <h3 align="center">Reserved Books!</h3> 
                              <div  class="table-responsive"> 
                               <table class="table table-bordered table-striped" id="reserve_list">  
          					                <thead align="center">  
          					                     <th width="12%" align="center">Issue No</th>  
                                         		 <th width="20%" align="center">Student / Faculty Name</th>    
          					                     <th width="28%" align="center">Book(s)</th> 
          					                     <th width="12%" align="center">Date Issued</th>  
          					                     <th width="12%" align="center">Return Date</th>   
                                                 <th width="8%" align="center">Status</th>  
          					                     <th width="8%" align="center">Command</th>  
          					                </thead> 
          					                <tbody id="reserve_table">
          					                	
          					                </tbody> 
          					            </table>
                            </div>  
                      </div>  

<?php 
include 'includes/footer.php';
?>
