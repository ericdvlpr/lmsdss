<?php include 'includes/header.php';?>  
<?php include 'includes/nav.php'; ?> 
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/menu.php'; ?>
                         <h3 align="center">Catalogs!</h3><br />  
                              <div  class="table-responsive"> 
                              <table class="table table-bordered table-striped">  
						                <tr>  
						                     <th width="10%">#</th>  
						                     <th width="35%">Catalog Name</th>   
						                     <th width="20%">Command</th>  
						                </tr> 
						                <tbody id="catalogue_table"></tbody> 
								</table> 
                              </div>  
                  
                </div>
           </div>  
<?php 
include 'includes/footer.php';
?>
