<?php include 'includes/header.php';?>  
                    <?php include 'includes/sidemenu.php'; ?>
      <section class="content">
                  <div class="col-md-12">
                    <br />
                      <div class="box box-solid box-primary">
                            <div class="box-header">
                                          <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-success" id="add_faculty">Add Faculty</button>
                                          </div>
                                   <h3 class="box-title">Faculty</h3>
                            </div>
                            <div class="box-body">
                                <div  class="table-responsive"> 
                                  

                                          <table class="table table-bordered table-striped" id='faculty'>  
                                                  <thead>  
                                                      <tr>  
                                                           <th width="10%">Faculty #</th>  
                                                           <th width="25%">Faculty Name</th>  
                                                           <th width="25%">Department</th>  
                                                           <th width="10%">Command</th>  
                                                      </tr>  
                                                  </thead>  
                                                <tbody id="faculty_table"></tbody> 
                                         </table> 
                                </div>
                            </div>
                        </div>
                    </div>
	       </section>                    

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
</div>
<?php 
include 'includes/footer.php';
?>
