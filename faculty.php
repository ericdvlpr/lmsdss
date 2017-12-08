<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
	                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	                         <h3 align="center">Faculty</h3><br />  
	                              <div  class="table-responsive"> 
	                              <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_faculty">Add Faculty</button>
                                        </div>

                                        <table class="table table-bordered table-striped" id='faculty'>  
                  						                  <tr>  
                                                     <th width="10%">Faculty #</th>  
                                                     <th width="25%">Faculty Name</th>  
                                                     <th width="25%">Department</th>  
                                                     <th width="10%">Command</th>  
                                                </tr>  
                  						                <tbody id="faculty_table"></tbody> 
								                       </table> 
                                   </div> 
	                              </div>  
	                    </div>  
                </div>
           </div>
<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Faculty</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="facultyform" method="Post" class="collapse">
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
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Department</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="department" id="department" required="true">
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
                <input type="hidden" name="action" id="action" value="addFaculty" />
                <input type="hidden" name="faculty_id" id="faculty_id" />
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
              </div>
              </form>
    </div>
  </div>
</div>  
<!-- <div class="modal fade" id="faculty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Department</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="department" id="department" required="true">
                       <option value="">Please Select</option>
                       <?php 
                           $output //='';
                            // $query = "SELECT * FROM departments";
                            // $result = $object->execute_query($query);
                            // while($row = mysqli_fetch_array($result))
                            // {
                            //  $output .= '<option value="'.$row["dept_id"].'">'.$row["department_name"].'</option>';
                            // }
                            // echo $output;
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
                <input type="hidden" name="faculty_id" id="faculty_id" />
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
              </div>
              </form>
        </div> 
     </div> 
</div>  -->
<?php 
include 'includes/footer.php';
?>
