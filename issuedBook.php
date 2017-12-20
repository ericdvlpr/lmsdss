<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
		 <div class="row">
           <?php include 'includes/sidemenu.php'; ?>
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      		  	<h1 class="page-header">Issued Book</h1>
					<form class="form-inline"  method="Post" class="collapse">
                        <div class="panel panel-default">
						  <div class="panel-heading">Panel heading without title</div>
						  	<div class="panel-body">
							    <div class="form-group">
		                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Student Name</label>
			                            <div class="col-sm-9" align="left">
			                               <select class="form-control selectpicker"  multiple data-live-search="true">
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
								<table class="table table-striped" id="item_table" >
										<tr>
											<td width="19%">Book #</td>
											<td width="19%">Book Title</td>
											<td width="14%">Qty</td>
											<td width="14%">Date Issued</td>
											<td width="14%">Date Returned</td>
											<td width="16%"><button type="button" name="add" class="btn btn-success btn-sm " id="add"><span class="glyphicon glyphicon-plus"></span></button></td>
										</tr>
								</table>

				 	 		</div>
						</div>	
				</form>
           </div>
     </div>  
</div>  
<?php 
include 'includes/footer.php';
?>
