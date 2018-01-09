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
										    <label for="inputEmail3" class="col-xs-3">Issue No:</label>
										     <div class="col-sm-9">
										     		<input type="text" class="form-control" name="issueID" id="issueID" value="<?php echo $num = substr(str_shuffle("0123456789"), -8);?>">
										  		</div>
										  </div>
							    		<div class="form-group">
										    <label for="inputEmail3" class="col-xs-3">Student Name</label>
										     <div class="col-sm-9">
										      <select class="form-control selectpicker" name="studentName" id="studentName"  data-live-search="true" required>
						                       	<option value="">Please Select</option>
						                         <?php 
						                             $output='';
						                              $query="SELECT * FROM students";
						                              $result =mysqli_query($object->connect,$query);
						                               while ($row = mysqli_fetch_array($result)) {
						                                  $output .='<option value='.$row["student_id"].'> '.$row["student_name"]. '</option>';
						                                }
						                                echo $output;
						                               ?>
						                         
						                      </select>
										  		</div>
										  </div>
							    	</div>
							    	<div class="col-md-6">
									    <div class="form-group">
										    <label for="inputPassword3" class="col-sm-3 control-label">Contact Number</label>
										    <div class="col-sm-9">
										      <input type="number" class="form-control" name="contactNumber" id="contactNumber" placeholder="Contact Number">
										    </div>
										  </div>
							    	</div>
							    </div>
                          		
								  
								<table class="table table-striped" id="issue_table" >
										<tr>
											<td width="19%">Book #</td>
											<td width="26%">Book Title</td>
											<td width="7%">Qty</td>
											<td width="14%">Date Issued</td>
											<td width="14%">Date Returned</td>
											<td width="16%"><button type="button" name="add" class="btn btn-success btn-sm "  id="add"><span class="glyphicon glyphicon-plus"></span></button></td>
										</tr>
								</table>

				 	 		</div>
						</div>
						<input type="hidden" name="action" id="action" value="addIssueBook" />
                        <input type="hidden" name="res_id" id="res_id" />
                        <input type="submit" class="btn btn-primary" name="button_action" value="Save" />	
				</form>
           </div>
     </div>  
</div>  
<?php 
include 'includes/footer.php';
?>