<?php include 'includes/header.php';?>  
<?php include 'includes/sidemenu.php'; ?>
  <section class="content">
          <div class="col-md-12">
               <br />
                  <div class="box box-solid box-primary">
                    <div class="box-header">
                           <h3 class="box-title">Students</h3>
                    </div>
                      <div class="box-body">
                          <div  class="table-responsive"> 
                                <div class="btn-group">
                                      <button type="button" class="btn btn-primary" id="add_user" >
                                      Add User                                       
                                    </button>
                                    </div>
                                    <table class="table table-bordered table-striped" id="users">  
                                      <thead>  
                                          <tr>  
                                            
                                               <th width="35%">Username</th>   
                                               <th width="35%">Access Level</th>   
                                               <th width="35%">Library Assigned</th>   
                                               <th width="10%">Status</th>   
                                               <th width="20%">Command</th>  
                                          </tr> 
                                      </thead> 
                                      <tbody id="user_table"></tbody> 
                                  </table> 
                           </div>  
                      </div>
                  </div>
          </div>
      </section>
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
              </div>
              <form class="form-horizontal" id="userform" method="Post" class="collapse">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Username</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="user-name" id="user-name" required="true" placeholder="Username">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Password</label>
                  <div class="col-sm-9">
                     <input type="password" class="form-control"  name="passcode" id="passcode" required="true" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Access Level</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="access" id="access" required>
                            <option value="">Please Select</option>
                            <option value="1">Librarian</option>
                            <option value="2">Asst-Librarian</option>
                            <option value="3">Library Staff</option>
                            
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Library</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="library" id="library" required>
                            <option value="">Please Select</option>
                            <option value="1">College Library</option>
                            <option value="2">GradeSchool Library</option>
                            <option value="3">HighSchool Library</option>
                            <option value="4">Graduate School Library</option>
                            
                     </select>
                  </div>
                </div>
                <input type="hidden" name="action" id="action" value="addUser" />
                <input type="hidden" name="user" id="user_id" />
                
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
