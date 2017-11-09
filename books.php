<?php include 'includes/header.php';?>  
<?php include 'includes/nav.php'; ?> 
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/menu.php'; ?>
                         <h3 align="center">Books!</h3><br />  
                              <div  class="table-responsive"> 
                               <table class="table table-bordered table-striped" id="books">  
					                <thead>  
					                     <th width="10%">Book No</th>  
					                     <th width="10%">Book Title</th>  
					                     <th width="14%">Book Author</th>  
					                     <th width="21%">Book Published</th>  
					                     <th width="21%">Publisher Name</th>  
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
<?php 
include 'includes/footer.php';
?>
