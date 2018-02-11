<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 

                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          				<h1 class="page-header">Reports</h1>

			          <div class="row placeholders">
			           	<?php if($_GET['type']=='book'){ ?>
			           	
			           	<div class="well row">
			           		<div class="col-sm-2">  
			                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
			                </div>  
			                <div class="col-sm-2">  
			                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
			                </div>

			                <div class="col-sm-2">  
										
			                     <select name="status" id="status" class="form-control" >
			                     	<option value="">Book Status</option>
			                     	<?php 
						             
						             $output='';
						              $query="SELECT * FROM status";
						              $result =mysqli_query($object->connect,$query);
						               while ($row = mysqli_fetch_array($result)) {
						                  $output .='<option value='.$row["id"].'> '.$row["status_name"].'</option>';
						                }
						                echo $output;
						               ?>
			                     </select>   
			                </div>  
			                <div class="col-sm-5">  
			                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
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
		                                 <th width="10%">Book No</th>  
      					                 <th width="20%">Book Title</th>  
      					                 <th width="15%">Book Author</th>   
      					                 <th width="10%">Book Copies</th>  
      					                 <th width="7%">Status</th>    
			                          </tr>  
			                    <tbody id="book_report_table"></tbody>
			                     </table>  
			                
			           	<?php }else if($_GET['type']=='students'){
			           ?>
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

			           <?php
			           	}else if($_GET['type']=='requests'){?>
							<div class="well row">
			               <div class="col-sm-2">  
			                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />  
			                </div>  
			                <div class="col-sm-2">  
			                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />  
			                </div> 
			                <div class="col-sm-2">  
			                     <input type="button" name="filter_request" id="filter_request" value="Filter" class="btn btn-info" />  
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
		                                 <th width="10%">Request No</th>  
  					                     <th width="20%">Book Title</th>  
  					                     <th width="15%">Book Author</th>  
  					                     <th width="10%">Copies</th>  
  					                     <th width="12%">Requested By:</th>  
  					                     <th width="15%">Date Requested:</th>     
			                          </tr>  
			                    <tbody id="request_report_table"></tbody>
			                     </table>
			           	<?php
			           	}else if($_GET['type']=='borrowed'){?>
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
			           	<?php } ?>
			           </div><!-- END printing area-->
			        </div> <!-- END RoW-->
     	</div>  <!-- END COL-LG-9 -->
	</div>  <!-- END RoW-->
</div>  <!-- END Container-->
<?php 
include 'includes/footer.php';
?>