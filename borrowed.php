<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    	<h3 align="center">Borrowed!</h3><br />  
                              <div class="table-responsive"> 
                              	 <table class="table table-bordered table-striped" id="borrowed">  
						                <tr>  
						                     <th width="10%">#</th>  
						                     <th width="22%">Name</th>    
						                     <th width="22%">Book Name</th>    
						                     <th width="10%">Date Borrowed</th>    
						                     <th width="10%">Date Returned</th>    
						                     <th width="8%">Command</th>  
						                     
						                </tr> 
						                <tbody  id="borrowed_table"></tbody> 
								</table>
                              </div>  
                    </div>
                         
                  
                </div>
           </div>  
<?php 
include 'includes/footer.php';
?>
