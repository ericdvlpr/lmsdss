
<?php include 'includes/head.php';?>  
    <div class="container"> 

                <div class="col-sm-10">
                       <!--  <div class="page-header"><h1 class="text-center">DWCL LIBRARY</h1></div> -->
                            <div class="page-header"><h1 class="text-center">DWCL LIBRARY</h1></div>
                            <div align="center">
                            	<form class="form-horizontal" id="srch_form" name="srch_form" method="Post" class="collapse">
                            	
                            	<input type="text" class="form-control" name="searchname" id="searchname" > 
                            	<button class="btn btn-success btn-xs update" name="schbttn" id="schbttn">SEARCH</button>
                            	</form>
                            </div>
                              <div id="search_table" name="search_table" class="table-responsive"></div>
                                <div id="modal_select" name="modal_select" class="modal">
                                    <div id="modal_data" name="modal_data"  class="modal-content"></div>
                                </div>
   

                              <div id="modal_data" name="modal_data"  class="modal-content"></div>
                </div>
            </div>
            <button class="btn btn-success  update" id="schbttn">SEARCH</button>
        </div>

    </form>      
  </div>  
   
<?php 
include 'includes/footer.php';
?>,