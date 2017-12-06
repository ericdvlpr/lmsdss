<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
	                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	                         <h3 align="center">Students!</h3><br />  
	                              <div  class="table-responsive"> 
	                              <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_student" data-toggle="modal" data-target="#faculty">
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
<div class="modal fade" id="faculty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Faculty</h4>
              </div>
              <form class="form-horizontal" id="studentform" method="Post" class="collapse">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Faculty No</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="faculty_no" id="faculty_no" placeholder="Faculty No">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Faculty Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="faculty_name" id="faculty_name" required="true" placeholder="Faculty Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Contact Number</label>
                  <div class="col-sm-9">
                     <input type="number" class="form-control"  name="contact" id="contact" required="true" placeholder="Faculty Name">
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
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">PassCode</label>
                  <div class="col-sm-6">
                     <input type="text" class="form-control" name="passcode" id="passcode" required="true" />
                     
                  </div>
                  <div class="btn-group col-sm-3">
                    <button type="button" class="btn btn-primary btn-sm " id="generate" >Generate Passcode</button>
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
