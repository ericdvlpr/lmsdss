<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
		 <div class="row">
           <?php include 'includes/sidemenu.php'; ?>
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      		  	
					<form class="form-horizontal" id="issuedBook" method="POST">
                        <div class="panel panel-default">
						  <div class="panel-heading"><h1>Issued Book</h1></div>
						  	<div class="panel-body">
							    <div class="row">
							    	<div class="col-md-6">
							    		<div class="form-group">
										    	<label for="inputEmail3" class="col-xs-3">Student/Faculty Id:</label>
										     	<div class="col-sm-9">
										      		<input type="text" id="studentName" name="studentName" class="form-control" placeholder="Student/Faculty ID Number">
										  		</div>
										 </div>
							    		<div class="form-group">
										    <label for="inputEmail3" class="col-xs-3">Issue No:</label>
										     <div class="col-sm-9">
										     		<input type="text" class="form-control" name="issueID" id="issueID" placeholder="Issue No" readonly="true">
										  		</div>
										  </div>
							    		  
							    	</div>
							    	<div class="col-md-6">
									    <div class="form-group">
										    <label for="inputEmail3" class="col-xs-4">Contact Number:</label>
										    <div class="col-sm-8">
										      <input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="Contact Number" readonly="true">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="inputEmail3" class="col-xs-4">Borrower's Name:</label>
										     <div class="col-sm-8">
										     	<input type="text" id="memName" name="memName" class="form-control" placeholder="Member's Name" readonly="true">
										  	 </div>
										  </div>
							    	</div>
							    </div>
                          		
								  
								<table class="table table-striped">
										<thead>
											<td width="19%">Book #</td>
											<td width="26%">Book Title</td>
											<td width="7%">Qty</td>
											<td width="14%">Date Issued</td>
											<td width="14%">Date Returned</td>
											<td width="16%"><button type="button" name="add" class="btn btn-success btn-sm "  id="add"><span class="glyphicon glyphicon-plus"></span></button></td>
										</thead>
										<tbody id="issue_table">
										
										</tbody>
								</table>

				 	 		</div>
						</div>
						<input type="hidden" name="action" id="action" value="addIssueBook" />
                        <input type="hidden" name="res_id" id="res_id" />
                        <button class="btn btn-primary" name="br_book" id="br_book">Borrow</button>	
				</form>
           </div>
     </div>  
</div>  
<?php 
include 'includes/footer.php';
?>