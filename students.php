<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
	                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	                         <h3 align="center">Students!</h3><br />  
	                              <div  class="table-responsive"> 
	                              <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_student" data-toggle="modal" data-target="#students">
                                          Add Students                                       
                                        </button>
                                        </div>

                                        <table class="table table-bordered table-striped">  
              						                <tr>  
              						                     <th width="10%">#</th>  
              						                     <th width="35%">Student Name</th>   
              						                     <th width="20%">Command</th>  
              						                </tr> 
              						                <tbody id="student_table"></tbody> 
								      </table> 
                                   </div> 
	                              </div>  
	                    </div>  
                </div>
           </div>  
<div class="modal fade" id="students" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Students</h4>
              </div>
              <form class="form-horizontal" id="bookform" method="Post" class="collapse">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Student No</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="catalogue_no" id="catalogue_no" placeholder="Catalogue No" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">First Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="first_name" id="first_name" required="true" placeholder="First Name">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Middle Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="middle_name" id="middle_name" required="true" placeholder="Middle Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Address</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="address" id="address" required="true" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Department</label>
                  <div class="col-sm-9">
                     <select name="department"></select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Course</label>
                  <div class="col-sm-9">
                     <select name="course"></select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Year</label>
                  <div class="col-sm-9">
                     <select name="course-year"></select>
                  </div>
                </div>
                <input type="hidden" name="action" id="action" value="addStudent" />
                <input type="hidden" name="student" id="student_id" />
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
              </div>
              </form>
        </div> 
     </div> 
</div> 
<?php 
include 'includes/footer.php';
?>
