<?php include 'includes/header.php';?>  
 <?php include 'includes/sidemenu.php'; ?>
 <?php //FINISH UP REPORTS (BOOK, AUDIO, PERIOD, REFERRENCE) ?>
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
				              <li class="active"><a href="#tab_1" id='tabBook' data-toggle="tab">Books</a></li>
				              <li><a href="#tab_2" id='tabPeriodical' data-toggle="tab">Periodical</a></li>
				              <li><a href="#tab_3" id='tabAudio' data-toggle="tab">Audio Visual</a></li>
				              <li><a href="#tab_4" id='tabBookRef' data-toggle="tab">Book Referrence</a></li>
				              <li><a href="#tab_5" id='tabStudent' data-toggle="tab">Student</a></li>
				              <li><a href="#tab_6" id='tabMaterial' data-toggle="tab">Material Check In/Out</a></li>
				            </ul>
				            	<div class="tab-content">
				            		 <div class="btn-group pull-right">
				            		<br />
									  <button disabled  type="button" id="reportOption" class=" btn btn-md btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i> Options<span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="#" id='print' onclick="printContent('div1')">Print</a></li>
									   <!--  <li><a href="#">Export</a></li> -->
									  </ul>
									</div> 
				              <div class="tab-pane active" id="tab_1">
	                					<div class="well row">
								               <div class="col-sm-2">  
								                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
								                </div>  
								                <div class="col-sm-2">  
								                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
								                </div> 
								                <div class="col-sm-2">  
								                      <input type="button" name="filter_books" id="filter_books" value="Filter" class="btn btn-info" />  
								                </div>
								                <div style="clear:both"></div>  
								           	</div>
								                <div class="books" > 
								                
								                     <table class="table table-bordered ">  
								                          <tr>  
							                                  <th width="10%">Accession No</th>  
					                                             <th width="20%">Title</th>  
					                                             <th width="15%">Author</th>   
					                                             <th width="10%">Copies</th>  
					                                             <th width="7%">Status</th>     
								                          </tr>  
								                    <tbody id="book_report_table"></tbody>
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
								                     <input type="button" name="filter_periodical" id="filter_periodical" value="Filter" class="btn btn-info" />  
								                </div>
								                <div style="clear:both"></div>  
								           	</div>
											                  
							                <br /> 
							              
							                <div class="periodical" > 
							                
							                     <table class="table table-bordered ">  
							                          <tr>  
						                                 <th width="10%">Accession No</th>  
			                                             <th width="20%">Title Article</th>  
			                                             <th width="20%">Title Periodical</th>  
			                                             <th width="15%">Publisher</th>   
			                                             <th width="10%">Volumn #</th>  
			                                             <th width="10%">Call #</th>   
							                          </tr>  
							                    <tbody id="periodical_report_table"></tbody>
							                     </table>
								              </div>
				              </div>
				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_3">
				               		<div class="well row">
								               <div class="col-sm-2">  
								                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
								                </div>  
								                <div class="col-sm-2">  
								                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
								                </div> 
								                <div class="col-sm-2">  
								                     <input type="button" name="filter_audio" id="filter_audio" value="Filter" class="btn btn-info" />  
								                </div>
								                <div style="clear:both"></div>  
								           	</div>
											                  
							                <br /> 
							                <div class="audio"  > 
							                
							                     <table class="table table-bordered ">  
							                          <tr>  
				                                  		 <th width="10%">Accession No</th>  
			                                             <th width="20%">Category Title</th>  
			                                             <th width="15%">Publisher</th>   
			                                             <th width="10%">Running Time</th>  
			                                             <th width="10%">Author</th>  
			                                             <th width="10%">Call #</th>       
							                          </tr>  
							                    <tbody id="audio_report_table"></tbody>
							                     </table>
								              </div>
				              </div>
				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_4">
				               		<div class="well row">
								               <div class="col-sm-2">  
								                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
								                </div>  
								                <div class="col-sm-2">  
								                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
								                </div> 
								                <div class="col-sm-2">  
								                     <input type="button" name="filter_ref" id="filter_ref" value="Filter" class="btn btn-info" />  
								                </div>
								                <div style="clear:both"></div>  
								           	</div>
											                  
							                <br /> 
							                <div class="reference"  > 
							                
							                     <table class="table table-bordered ">  
							                          <tr>  
						                               <th width="10%">Request No</th>  
						                               <th width="20%">Title</th>  
						                               <th width="15%">Author</th>  
						                               <th width="10%">Copies</th>  
						                               <th width="12%">Requested By</th>  
						                               <th width="12%">Date Requested</th>  
						                               <th width="10%">Status</th>      
							                          </tr>  
							                    <tbody id="referrence_report_table"></tbody>
							                     </table>
								              </div>
				              </div>
				              <div class="tab-pane" id="tab_5">
				               		<div class="well row">
								            <!-- <div class="col-sm-2">  
												 <input type="text" name="stud_id" id="stud_id" class="form-control" placeholder="Student ID" /> 
							                </div>  -->
			                				<!-- <div class="col-sm-2">  
										
							                     <select name="department" id="department" class="form-control">
							                     	<option value="">Department</option>
							                     	<?php 
				                                     // $output ='';
				                                     //  $query = "SELECT * FROM departments";
				                                     //  $result = $object->execute_query($query);
				                                     //  while($row = mysqli_fetch_array($result))
				                                     //  {
				                                     //   $output .= '<option value="'.$row["dept_id"].'">'.$row["department_name"].'</option>';
				                                     //  }
				                                     //  echo $output;
				                                 ?>
							                     </select>   
							                </div>   -->
							                <!-- <div class="col-sm-2">  
														
							                     <select name="course" id="course" class="form-control">
							                     	<option value="">Course</option>
							                     	
							                     </select>   
							                </div>
							                <div class="col-sm-2">  
														
							                     <select name="course-year" id="course-year" class="form-control">
							                     	<option value="">Year</option>
							                     	
							                     </select>   
							                </div>

 -->							            
 											<div class="col-sm-2">  
								                <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
							                </div>  
							                <div class="col-sm-2">  
								                 <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
							                </div>     
 											<div class="col-sm-2">  
							                     <input type="button" name="filter_student" id="filter_student" value="Filter" class="btn btn-info" />  
							                </div>  
							                <div style="clear:both"></div>    
								           	</div>
											                  
							                <br /> 
							                <div class="student"  > 
							                
							                     <table class="table table-bordered">  
								                          <tr>  
							                                 <th width="10%">Student #</th>  
					                                         <th width="25%">Student Name</th>  
					                                         <th width="25%">Department</th>  
					                                         <th width="10%">Course</th>    
					                                         <th width="10%">No of Books</th>    
								                          </tr>  
								                    <tbody id="student_report_table"></tbody>
								                     </table>
								              </div>
				              </div>
				              <div class="tab-pane" id="tab_6">
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
											                  
							                <br /> 
							                <div class="checkout"  > 
							                
							                     <table class="table table-bordered">  
							                          <tr>  
						                                 <th width="12%">Borrow No</th>     
				  					                     <th width="12%">Student Name</th>      
				                                         <th width="12%">Date Issued</th>  
				  					                     <th width="12%">Return Date</th>  
				  					                     <th width="12%">Status</th>     
							                          </tr>  
							                    <tbody id="issue_report_table"></tbody>
							                     </table>
								              </div>
				              </div>
				              <!-- /.tab-pane -->
				        </div>
				            <!-- /.tab-content -->
 				</div>
 		</section>
          			
<?php 
include 'includes/footer.php';
?>