<?php include 'includes/header.php';?>  
<section class="content">
      <?php include 'includes/sidemenu.php'; ?>
      <div class="col-md-12">
        <br />
          <div class="box box-solid box-primary">
            <div class="box-header">
                   <h3 class="box-title">Reserved Books</h3>
            </div>
              <div class="box-body">
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
          </div>
      </div>                         
</section> 

<?php 
include 'includes/footer.php';
?>
