<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                         <h3 align="center">Users!</h3><br />  
                              <div  class="table-responsive"> 
                                    <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_user" >
                                          Add User                                       
                                        </button>
                                        </div>
                                        <table class="table table-bordered table-striped" id="users">  
                                          <tr>  
                                            
                                               <th width="35%">Username</th>   
                                               <th width="35%">Access Level</th>   
                                               <th width="20%">Command</th>  
                                          </tr> 
                                          <tbody id="user_table"></tbody> 
                                      </table> 
                              </div>  
                	 </div>

                </div>
           </div>
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
                     <input type="text" class="form-control"  name="username" id="username" required="true" placeholder="Username">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Password</label>
                  <div class="col-sm-9">
                     <input type="password" class="form-control"  name="password" id="password" required="true" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Access Level</label>
                  <div class="col-sm-9">
                     <select class="form-control" name="access" required>
                            <option value="">Please Select</option>
                            <option value="1">Librarian</option>
                            <option value="2">Asst-Librarian</option>
                            <option value="3">Library Staff</option>
                            <option value="4">Student Assistant</option>
                            <option value="5">Student</option>
                     </select>
                  </div>
                </div>
                <input type="text" name="action" id="action" value="addUser" />
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
