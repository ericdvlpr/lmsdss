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
<div class="modal fade" id="student" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Book</h4>
      </div>
 <form class="form-horizontal" id="studentform" method="Post">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="inputPassword3" class="text-left col-sm-3 control-label text-left">Student No</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control"  name="student_no" id="student_no" placeholder="Student No">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 text-left control-label text-left">Student Name</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control"  name="student_name" id="student_name" required="true" placeholder="Student Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="text-left col-sm-3 control-label text-left">Contact Number</label>
                            <div class="col-sm-9">
                               <input type="number" class=" text-left form-control"  name="contact" id="contact" required="true" placeholder="Contact Number">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 text-left control-label text-left">Sex</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="sex" id="sex" required="true">
                                 <option value="">Please Select</option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                               </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="text-left col-sm-3 control-label text-left">Department</label>
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
                            <label for="inputPassword3" class="text-left col-sm-3 control-label text-left">Course</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="course" id="course" required="true">
                                  <option value="">Please Select</option>
                               </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 text-left control-label text-left">Year</label>
                            <div class="col-sm-9">
                               <input type="number" min="1" max="5" disabled="true" class="form-control" name="course-year" id="course-year" required="true" />
                            </div>
                          </div>
                           <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label text-left">Type</label>
                          <div class="col-sm-5">
                                <select name="type" class="form-control" id="type" required>
                                  <option value="">Please Select</option>
                                  <option value="0">Regular Student</option>
                                  <option value="1">Visual Disability</option>
                                  <option value="2">Hearing Disability</option>
                                </select>
                            </div>
                          </div>

                          <div class="form-group" id='divPasscode'>
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">PassCode</label>
                            <div class="col-sm-5">
                               <input type="text" class="form-control" name="passcode" id="passcode" required="true" placeholder="Generate Password" />
                               
                            </div>
                            <div class="btn-group col-sm-4">
                              <button type="button" class="btn btn-primary btn-sm " id="generate" >Generate Passcode</button>
                            </div>
                          
                        </div>
                        <div class="form-group" id='divPwd'>
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">PassCode</label>
                            <div class="col-sm-5">
                                  <input type="text" class="form-control" name="passcode" id="searchname" required="true" placeholder="Enter Password" > 
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="form-group">  
                          <label class="col-sm-3 control-label image text-left">Select Image</label>  
                           <div class="col-sm-9">
                              <input class="form-control" type="file" name="studentImage" id="studentImage" required />   
                           </div>  
                       </div>
                       <div class="form-group">
                             <div class="col-sm-3"></div>
                              <div class=" col-sm-9 img-thumbnail" id="student_image">  
                            </div>    
                       </div>
                       <div class="modal-footer"> 
                          <input type="hidden" name="action" id="action" value="addStudent" />
                          <input type="hidden" name="student_id" id="student_id" />
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-primary" id="button_action" value="Submit"  />
                          </div>
                        </div>
            </form>
    </div> 
</div> 