<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
	                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	                         <h3 align="center">Students!</h3><br />  
	                              <div  class="table-responsive"> 
	                              <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_student">
                                          Add Students                                       
                                        </button>
                                        </div>

                                        <table class="table table-bordered table-striped" id='students'>  
              						                  <tr>  
                                                 <th width="10%">Student #</th>  
                                                 <th width="25%">Student Name</th>  
                                                 <th width="25%">Department</th>  
                                                 <th width="10%">Course</th>  
                                                 <th width="10%">Command</th>  
                                            </tr>  
              						                <tbody id="student_table"></tbody> 
								      </table> 
                                   </div> 
	                              </div>  
	                    </div>  
                </div>
           </div>  
<?php 
include 'includes/footer.php';
?>
