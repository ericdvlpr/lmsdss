<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
           </div>  
<?php 
include 'includes/footer.php';
?>
