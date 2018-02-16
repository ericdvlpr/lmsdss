<?php include 'includes/header.php';?>  
 <?php include 'includes/sidemenu.php'; ?>
 <section class="content-header">
						  		<h1>
						        Reports
						      </h1>
						      <ol class="breadcrumb">
						        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						        <li class="active">Setup</li>
						      </ol>
						     </section>
 		<section class="content">
          			<div class="nav-tabs-custom">
				            <ul class="nav nav-tabs">
				              <li class="active"><a href="#tab_1" data-toggle="tab">Books Borrowed</a></li>
				              <li><a href="#tab_2" data-toggle="tab">Books Returned</a></li>
				              <li><a href="#tab_3" data-toggle="tab">Students/Faculty</a></li>
				            </ul>
				            <div class="tab-content">
				              <div class="tab-pane active" id="tab_1">
	                					<div class="well row">
								               <div class="col-sm-2">  
								                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
								                </div>  
								                <div class="col-sm-2">  
								                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
								                </div> 
								                <div class="col-sm-2">  
								                     <input type="button" name="filter_issued" id="filter_issued" value="Filter" class="btn btn-info" />  
								                </div>
								                <div style="clear:both"></div>  
								           	</div>
											                  
								                <br /> <div class="btn-group pull-right">
													  <button disabled="true" type="button" id="reportOption" class=" btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu">
													    <li><a href="#" id='print' onclick="printContent('div1')">Print</a></li>
													    <li><a href="#">Export</a></li>
													  </ul>
													</div> 
								                <div id="div1" > 
								                
								                     <table class="table table-bordered">  
								                          <tr>  
							                                 <th width="12%">Book No</th>  
					                                         <th width="12%">Book Title</th>    
					  					                     <th width="12%">Student Name</th>    
					                                         <th width="12%">Book Copies</th>  
					                                         <th width="12%">Date Issued</th>  
					  					                     <th width="12%">Return Date</th>  
					  					                     <th width="12%">Status</th>     
								                          </tr>  
								                    <tbody id="issue_report_table"></tbody>
								                     </table>
									              </div>
				              </div>
				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_2">
				               			<div class="well row">
								               <div class="col-sm-2">  
								                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
								                </div>  
								                <div class="col-sm-2">  
								                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
								                </div> 
								                <div class="col-sm-2">  
								                     <input type="button" name="filter_issued" id="filter_issued" value="Filter" class="btn btn-info" />  
								                </div>
								                <div style="clear:both"></div>  
								           	</div>
											                  
							                <br /> <div class="btn-group pull-right">
												  <button disabled="true" type="button" id="reportOption" class=" btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu">
												    <li><a href="#" id='print' onclick="printContent('div1')">Print</a></li>
												    <li><a href="#">Export</a></li>
												  </ul>
												</div> 
							                <div id="div1" > 
							                
							                     <table class="table table-bordered">  
							                          <tr>  
						                                 <th width="12%">Book No</th>  
				                                         <th width="12%">Book Title</th>    
				  					                     <th width="12%">Student Name</th>    
				                                         <th width="12%">Book Copies</th>  
				                                         <th width="12%">Date Issued</th>  
				  					                     <th width="12%">Return Date</th>  
				  					                     <th width="12%">Status</th>     
							                          </tr>  
							                    <tbody id="issue_report_table"></tbody>
							                     </table>
								              </div>
				              </div>
				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_3">
				               		<div class="well row">
										<div class="col-sm-2">  
											 <input type="text" name="stud_id" id="stud_id" class="form-control" placeholder="Student ID" /> 
						                </div> 
						                <div class="col-sm-2">  
							                     <select name="department" id="department" class="form-control">
							                     	<option value="">Department</option>
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
							                <div class="col-sm-2">  
														
							                     <select name="course" id="course" class="form-control">
							                     	<option value="">Course</option>
							                     	
							                     </select>   
							                </div>
							                <div class="col-sm-2">  
														
							                     <select name="course-year" id="course-year" class="form-control">
							                     	<option value="">Year</option>
							                     	
							                     </select>   
							                </div>
							                <div class="col-sm-2">  
							                     <input type="button" name="filter_student" id="filter_student" value="Filter" class="btn btn-info" />  
							                </div>  
							                <div style="clear:both"></div>  
							           	</div>
										                  
							                <br /> <div class="btn-group pull-right">
												  <button disabled="true" type="button" id="reportOption" class=" btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu">
												    <li><a href="#" id='print' onclick="printContent('div1')">Print</a></li>
												    <li><a href="#">Export</a></li>
												  </ul>
												</div> 
							                <div id="div1" > 
							                
							                     <table class="table table-bordered">  
							                          <tr>  
						                                 <th width="10%">Student #</th>  
				                                         <th width="25%">Student Name</th>  
				                                         <th width="25%">Department</th>  
				                                         <th width="10%">Course</th>    
							                          </tr>  
							                    <tbody id="student_report_table"></tbody>
							                     </table>
							              </div>	
				              </div>
				              <!-- /.tab-pane -->
				            </div>
				            <!-- /.tab-content -->
				          </div>
				          <!-- nav-tabs-custom -->
				        </div>
		</section>
<?php 
include 'includes/footer.php';
?>