<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
	                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	                         <h3 align="center">Students!</h3><br />  
	                              <div  class="table-responsive"> 
	                              <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_student" data-toggle="modal" data-target="#book">
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
<div class="modal fade" id="students" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Students</h4>
              </div>
              <form class="form-horizontal" id="studentform" method="Post" class="collapse">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Student No</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="student_no" id="student_no" placeholder="Student No">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Student Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="student_name" id="student_name" required="true" placeholder="Student Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Address</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="address" id="address" required="true" placeholder="Student Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Contact Number</label>
                  <div class="col-sm-9">
                     <input type="number" class="form-control"  name="contact" id="contact" required="true" placeholder="Student Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Sex</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="sex" id="sex" required="true">
                       <option value="">Please Select</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Department</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="department" id="department" required="true">
                       <option value="">Please Select</option>
                       <?php 
                           $output ='';
                            $query = "SELECT * FROM departments";
                            $result = $object->execute_query($query);
                            while($row = mysqli_fetch_array($result))
                            {
                             $output .= '<option value="'.$row["dept_id"].'">'.$row["department_name"].'</option>';
                            }
                            echo $output;
                       ?>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Course</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="course" id="course" required="true">
                        <option value="">Please Select</option>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Year</label>
                  <div class="col-sm-9">
                     <input type="number" min="1" max="5" disabled="true" class="form-control" name="course-year" id="course-year" required="true" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">PassCode</label>
                  <div class="col-sm-6">
                     <input type="text" class="form-control" name="passcode" id="passcode" required="true" />
                     
                  </div>
                  <div class="btn-group col-sm-3">
                    <button type="button" class="btn btn-primary btn-sm " id="generate" >Generate Passcode</button>
                  </div>
                </div>
                <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">With Disability</label>
                <div class="col-sm-9">
                      <div class="checkbox">
                          <label class="checkbox-inline">
                              <input type="radio" name="pwd" value="0">None
                          </label>
                          <label class="checkbox-inline">
                              <input type="radio" name="pwd" value="1">Visual Disability
                          </label>
                          <label class="checkbox-inline">
                              <input type="radio" name="pwd" value="1">Hearing Disability
                          </label>
                      
                      </div>
                  </div>
                </div>
                <input type="hidden" name="action" id="action" />
                <input type="hidden" name="student_id" id="student_id" />
                
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
