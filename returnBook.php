<?php include 'includes/header.php';?>  
           <?php include 'includes/sidemenu.php'; ?>
      		  <section class="content">
					<form class="form-horizontal" id="returnBook" method="POST">
                        <div class="box box-solid box-default">
						  <div class="box-header with-border">
          							<h3 class="box-title">Return Book</h3>
						  	  </div>
						  	<div class="box-body">
							    <div class="row">
							    	<div class="col-md-6">
							    		<div class="form-group">
										    	<label for="inputEmail3" class="col-xs-3">Student/Faculty Id:</label>
										     	<div class="col-sm-9">
										      		<input type="text" id="memberName" name="memberName" class="form-control" placeholder="Student/Faculty ID Number">
										  		</div>
										 </div>
							    		<div class="form-group">
										    <label for="inputEmail3" class="col-xs-3">Issue No:</label>
										     <div class="col-sm-9">
										     		<input type="text" class="form-control" name="returnID" id="returnID" placeholder="Issue No" readonly="true">
										  		</div>
										  </div>
							    		  
							    	</div>
							    	<div class="col-md-6">
									    <div class="form-group">
										    <label for="inputEmail3" class="col-xs-3">Contact Number:</label>
										    <div class="col-sm-9">
										      <input type="text" class="form-control" name="contactNum" id="contactNum" placeholder="Contact Number" readonly="true">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="inputEmail3" class="col-xs-3">Member Name:</label>
										     <div class="col-sm-9">
										     	<input type="text" id="memName" name="memName" class="form-control" placeholder="Member's Name" readonly="true">
										  	 </div>
										  </div>
							    	</div>
							    </div>
                          		
								  
								<table class="table table-striped">
										<thead>
											<td width="19%" align="center">Book #</td>
											<td width="26%" align="center">Book Title</td>
											<td width="7%"  align="center">Qty</td>
											<td width="14%" align="center">Date Issued</td>
											<td width="14%" align="center">Date Returned</td>
											<td width="16%"><button type="button" name="adds" class="btn btn-success btn-sm "  id="adds"><span class="glyphicon glyphicon-plus"></span></button></td>
										</thead>
										<tbody id="return_table">
											
										</tbody>
								</table>

				 	 		</div>
						</div>
						<input type="hidden" name="action" id="action" value="returnBook" />
                        <input type="hidden" name="res_id" id="res_id" />
                        <button class="btn btn-primary" name="br_book" id="br_book">Return</button>	
				</form>
			</section>
<?php 
include 'includes/footer.php';
?>
<div class="modal fade " tabindex="-1" role="dialog" id=mod_info>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mod_title" align="center">Return Book</h4>
      </div>
      <div class="modal-body">
        <p id="mod_data"></p>
      </div>
      <div class="modal-footer">
        <p align="center"> <button class="btn btn-primary" id="br_ok">OK</button></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
