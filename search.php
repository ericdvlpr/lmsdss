<?php include 'includes/schheader.php';?>  
<?php //include 'includes/nav.php'; ?> 
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php// include 'includes/menu.php'; ?>
                         <h3 align="center">Search</h3><br />  
                            
                            <div align="center">
                            	<form class="form-horizontal" id="srch_form" name="srch_form" method="Post" class="collapse">
                            	
                            	<input type="text" name="searchname" id="searchname" > 
                            	<button class="btn btn-success btn-xs update" name="schbttn" id="schbttn">SEARCH</button>
                            	</form>

                            </div><br />
                             
                              <div id="search_table" name="search_table" class="table-responsive">
                              </div>

                              <div id="modal_select" name="modal_select" class="modal">
                                <div id="modal_data" name="modal_data"  class="modal-content">
                                  
                                </div>
                              </div>
                              


                  
                </div>
           </div>  
   
<?php 
include 'includes/schfooter.php';
?>,