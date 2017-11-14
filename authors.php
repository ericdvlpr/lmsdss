<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/menu.php'; ?>
                         <h3 align="center">Authors!</h3><br />  
                              <div  class="table-responsive">
                              <table class="table table-bordered table-striped" id='authors'>  
					                <tr>  
					                     <th width="10%">Author #</th>  
					                     <th width="35%">Name</th>  
					                     <th width="35%">No of Book Published</th>  
					                     <th width="20%">Command</th>  
					                     
					                </tr> 
					                <tbody id="author_table"></tbody> 
								</table>  
                              </div>  
                  
                </div>
           </div>  
<?php 
include 'includes/footer.php';
?>
