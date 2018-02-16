<?php include 'includes/header.php';?>  
    <?php include 'includes/sidemenu.php'; ?>
					<section class="content-header">
				  		<h1>
				        Setup
				      </h1>
				      <ol class="breadcrumb">
				        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				        <li class="active">Setup</li>
				      </ol>
				     </section>
					<section class="content">
						<div class="col-md-12">
						          <!-- Custom Tabs -->
						          <div class="nav-tabs-custom">
						            <ul class="nav nav-tabs">
						              <li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
						              <li><a href="#tab_2" data-toggle="tab">User</a></li>
						              <li><a href="#tab_3" data-toggle="tab">SMS</a></li>
						              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
						            </ul>
						            <div class="tab-content">
						              <div class="tab-pane active" id="tab_1">
						              <div class="page-header">
							              	<div class="btn-group pull-right">
							              		<button type="button" class="btn btn-default">Cancel</button>
											    <button type="button" class="btn btn-info pull-right" id="compt" name="compt">Compute</button>
							              	</div>
						              	<h3 >General Settings</h3>
						              	
						              </div>
						                <div class="row">
						                	<div class="col-md-4">
								                		<!-- Horizontal Form -->
												          <div class="box box-info">
												            <div class="box-header with-border">
												              <h3 class="box-title">Allowed Days</h3>
												            </div>
												            <!-- /.box-header -->
												            <!-- form start -->
												            <form class="form-horizontal">
												              <div class="box-body">
												                <div class="form-group">
												                  <label for="inputEmail3" class="col-sm-5 control-label">Days allowed for borrowing a book</label>

												                  <div class="col-sm-4">
												                    <input type="number" class="form-control" name="numDays" id="numDays" placeholder="Days">
												                  </div>
												                </div>
												              </div>
												              <!-- /.box-body -->
												            </form>
												          </div>
								              </div>
						                	<div class="col-md-4">
						                		<div class="box box-info">
												            <div class="box-header with-border">
												              <h3 class="box-title">Penalty</h3>
												            </div>
												            <!-- /.box-header -->
												            <!-- form start -->
												            <form class="form-horizontal">
												              <div class="box-body">
												                <div class="form-group">
												                  <label for="inputEmail3" class="col-sm-4 control-label">Amount Per Day</label>

												                  <div class="col-sm-4">
												                    <input type="number" class="form-control" name="penalty" id="penalty" placeholder="Amt">
												                  </div>
												                </div>
												              </div>
												              <!-- /.box-body -->
												            </form>
												  </div>
						                	</div>
						                	<div class="col-md-4">
						                		<div class="box box-info">
												            <div class="box-header with-border">
												              <h3 class="box-title">Allowed Qty</h3>
												            </div>
												            <!-- /.box-header -->
												            <!-- form start -->
												            <form class="form-horizontal">
												              <div class="box-body">
												                <div class="form-group">
												                  <label for="inputEmail3" class="col-sm-4 control-label">Quantity of Book can be Borrow</label>

												                  <div class="col-sm-4">
												                    <input type="number" class="form-control" name="Quant" id="Quant" placeholder="Qty">
												                  </div>
												                </div>
												              </div>
												              <!-- /.box-body -->
												            </form>
												  </div>
						                	</div>
						                </div>
						                </div>
										          
						              <!-- /.tab-pane -->
						              <div class="tab-pane" id="tab_2">  
 										<div class="box box-solid box-primary">
							                    <div class="box-header">
							                          <div class="btn-group pull-right">
							                                      <button type="button" class="btn btn-success" id="add_user" >
							                                      Add User                                       
							                                    </button>
							                          </div>
							                           <h3 class="box-title">Users</h3>
							                    </div>
							                      <div class="box-body">
							                          <div  class="table-responsive"> 
							                                
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
						              <!-- /.tab-pane -->
						              <div class="tab-pane" id="tab_3">
						                 <h3 class="page-header">Messsage Update</h3>   	 
													     <div class="row">
													     	
													     	<div class="col-sm-9 col-md-offset-1 main">
													     		<h4 align="center">Borrow Message</h4>
													     		<div>
													     			<textarea class="form-control" rows="6" readonly="true" id="bmdata"></textarea>
													     		</div>
													     		<div align="right">
													     			<button class="btn btn-primary" name="br_book" id="bmb">Edit Message</button>
													     		</div>
													     	</div>
													     	
													     	<div class="col-sm-9 col-md-offset-1 main">
													     		<h4 align="center">Warning Message</h4>
													     		<div >
													     			<textarea class="form-control" rows="6" readonly="true" id="wmdata"></textarea>
													     		</div>
													     		<div align="right">
													     			<button class="btn btn-primary" name="br_book" id="wmb">Edit Message</button>
													     		</div>
													     	</div>
													     	
													     	<div class="col-sm-9 col-md-offset-1 main">
													     		<h4 align="center">Overdue Message</h4>
													     		<div>
													     			<textarea class="form-control" rows="6" readonly="true"  id="omdata"></textarea>
													     		</div>
													     		<div align="right">
													     			<button class="btn btn-primary" name="br_book" id="omb">Edit Message</button>
													     		</div>
													     	</div>
													     </div>
						               
						              </div>
						              <!-- /.tab-pane -->
						            </div>
						            <!-- /.tab-content -->
						          </div>
						          <!-- nav-tabs-custom -->
						        </div>
					</section>

<!-- 
				<div class="modal fade" id="mod_info" role="dialog">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title" id="mod_title">Success</h4>
				      </div>
				      <div class="modal-body">
				        <p id="mod_data" align="center">Message Edited</p>
				      </div>
				      <div class="modal-footer">
				        
				      </div>
				    </div>
				</div>-->
    <?php 
include 'includes/footer.php';
?> 
					<div class="modal fade" id="messEd" role="dialog">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="MEtitle"></h4>
						      </div>
						      <form class="form-horizontal" method="Post" class="collapse">
						      	<div class="modal-body">
						      		<div class="form-group">
						      			<label class="control-label text-left col-sm-2">Header</label>
						      			<div class="col-sm-9">
						      				<textarea class="form-control" id="hddata" rows="3"></textarea>
						 				</div>
						 			</div>
						      		<div class="form-group">
						      			<label class="control-label text-left col-sm-2">Footer</label>
						      			<div class="col-sm-9">		
						      				<textarea class="form-control" id="ftdata" rows="3"></textarea>
						      			</div>
						 			</div>

						 		</div>
						        <div class="modal-footer">
						            <input type="hidden" name="action" id="action" value="addBook" />
						            <input type="hidden" name="doc_id" id="doc_id" />
						            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						            <button type="button" class="btn btn-primary" id="edbtn">Edit</button>
						            
						        </div>
						      </form>
						    </div> 
						</div>
						</div>

<div class="modal fade" tabindex="-1" role="dialog" id=mod_info>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mod_title">Update</h4>
      </div>
      <div class="modal-body">
        <p id="mod_data" align="center"></p>
      </div>
      <div class="modal-footer">
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="user" tabindex="-1" role="dialog">
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