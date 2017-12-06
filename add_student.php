<?php include 'includes/header.php';?>  
	<div class="container-fluid"> 
		<div class="row">
              
            <?php include 'includes/sidemenu.php'; ?>
     		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     			<div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <form class="form-horizontal" name="studentform" novalidate id="studentform" method="Post" class="collapse">
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
                        <label for="inputPassword3" class="col-sm-3 control-label text-left">Type</label>
                        <div class="col-sm-5">
                              <select name="type" class="form-control" id="type" required>
                                <option value="">Please Select</option>
                                <option value="regStud">Regular Student</option>
                                <option value="visDis">Visual Disability</option>
                                <option value="hearDis">Hearing Disability</option>
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
                      <hr />
                      <br />
                        <input type="text" name="action" id="action" value="addStudent" />
                        <input type="hidden" name="student_id" id="student_id" />
                            <div class="form-group pull-right">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
                                </div>
                            </div>
                      </form>
                </div>
                 
                </div>
		 	</div>

		</div>  
	</div>  
<?php 
include 'includes/footer.php';
?>
