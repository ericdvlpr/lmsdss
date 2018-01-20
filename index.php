<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          				<h1 class="page-header">Dashboard</h1>

			          <div class="row placeholders">
			            <div class="col-lg-3 col-md-6">
		                    <div class="panel panel-primary">
		                        <div class="panel-heading">
		                            <div class="row">
		                                <div class="col-xs-3">
		                                    <i class="fa fa-book fa-5x"></i>
		                                </div>
		                                <div class="col-xs-9 text-right">
		                                    <h2>26</h2>
		                                    <h3>Books</h3>
		                                </div>
		                            </div>
		                        </div>
		                        <a href="books.php">
		                            <div class="panel-footer">
		                                <span class="pull-left">View Details</span>
		                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                                <div class="clearfix"></div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-6">
		                    <div class="panel panel-primary">
		                        <div class="panel-heading">
		                            <div class="row">
		                                <div class="col-xs-3">
		                                    <i class="fa fa-comments fa-5x"></i>
		                                </div>
		                                <div class="col-xs-9 text-right">
		                                    <h2>26</h2>
		                                    <h3>Students</h3>
		                                </div>
		                            </div>
		                        </div>
		                        <a href="#">
		                            <div class="panel-footer">
		                                <span class="pull-left">View Details</span>
		                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                                <div class="clearfix"></div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-6">
		                    <div class="panel panel-primary">
		                        <div class="panel-heading">
		                            <div class="row">
		                                <div class="col-xs-3">
		                                    <i class="fa fa-comments fa-5x"></i>
		                                </div>
		                                <div class="col-xs-9 text-right">
		                                    <h2>26</h2>
		                                    <h3>Book Requests</h3>
		                                </div>
		                            </div>
		                        </div>
		                        <a href="#">
		                            <div class="panel-footer">
		                                <span class="pull-left">View Details</span>
		                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                                <div class="clearfix"></div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-6">
		                    <div class="panel panel-primary">
		                        <div class="panel-heading">
		                            <div class="row">
		                                <div class="col-xs-3">
		                                    <i class="fa fa-comments fa-5x"></i>
		                                </div>
		                                <div class="col-xs-9 text-right">
		                                    <h2>26</h2>
		                                    <h3>Books Borrowed</h3>
		                                </div>
		                            </div>
		                        </div>
		                        <a href="#">
		                            <div class="panel-footer">
		                                <span class="pull-left">View Details</span>
		                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                                <div class="clearfix"></div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
			          </div>
			          <div class="row placeholders">
					        <div class="col-lg-8">
				                    	 <div class="panel panel-default">
						                        <div class="panel-heading">
						                          Announcement
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body">
						                            <div class="table-responsive">
						                                <table class="table table-bordered table-striped">
				                                    <thead >
				                                        <tr >
				                                           <th> Title</th>  
            					                     		<th>Content</th>  
			                                           		<th>Date Posted</th>  
			                                           		<th>Status</th>  
				                                        </tr>
				                                    </thead>
						                            <tbody id="announcement_index_table"></tbody> 
				                                </table>
				                            </div>
				                            <!-- /.table-responsive -->
				                        </div>
				                        <!-- /.panel-body -->
				                    </div>
				                    <!-- /.panel-default -->
				              		<div class="panel panel-default">
						                        <div class="panel-heading">
						                          Books
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body">
						                            <div class="table-responsive">
						                                <table class="table table-bordered table-striped">
				                                    <thead>
				                                        <tr>
				                                           	<th >Book No</th>  
			          					                     <th >Book Title</th>  
			          					                     <th >Book Author</th>   
			          					                     <th >Book Copies</th>  
			          					                     <th >Status</th>  
				                                        </tr>
				                                    </thead>
						                            <tbody id="book_index_table"></tbody> 
				                                </table>
				                            </div>
				                            <!-- /.table-responsive -->
				                        </div>
				                        <!-- /.panel-body -->
				                    </div>
				                    <!-- /.panel-default -->
				                    <div class="panel panel-default">
						                        <div class="panel-heading">
						                          Issued Books
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body">
						                            <div class="table-responsive">
						                                <table class="table table-bordered table-striped">
				                                    <thead>
				                                        <tr>
				                                         <th>Book No</th>  
                                         				<th>Book Title</th>    
          					                    		<th>Student Name</th>    
                                         				<th>Book Copies</th>  
                                         				<th>Date Issued</th>  
          					                     		<th>Return Date</th>  
          					                     		<th>Status</th>    
				                                        </tr>
				                                    </thead>
						                            <tbody id="bookissue_index_table"></tbody> 
				                                </table>
				                            </div>
				                            <!-- /.table-responsive -->
				                        </div>
				                        <!-- /.panel-body -->
				                    </div>
				                    <!-- /.panel-default -->
				                    <div class="panel panel-default">
						                        <div class="panel-heading">
						                          Faculty
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body">
						                            <div class="table-responsive">
						                                <table class="table table-bordered table-striped">
				                                    <thead>
				                                        <tr > 
                                                     <th >Faculty Name</th>  
                                                     <th >Department</th>  
				                                        </tr>
				                                    </thead>
						                            <tbody id="faculty_index_table"></tbody> 
				                                </table>
				                            </div>
				                            <!-- /.table-responsive -->
				                        </div>
				                        <!-- /.panel-body -->
				                    </div>
				                    <!-- /.panel-default -->
				             	<div class="panel panel-default">
						                        <div class="panel-heading">
						                          Students
						                        </div>
						                        <!-- /.panel-heading -->
						                        <div class="panel-body">
						                            <div class="table-responsive">
						                                <table class="table table-bordered table-striped">
				                                    <thead>
				                                        <tr>
				                                          <th >Student #</th>
		                                                 <th >Student Name</th>  
		                                                 <th >Department</th>  
		                                                 <th >Course</th>  
				                                        </tr>
				                                    </thead>
						                            <tbody id="student_index_table"></tbody> 
				                                </table>
				                            </div>
				                            <!-- /.table-responsive -->
				                        </div>
				                        <!-- /.panel-body -->
				                    </div>
				                    <!-- /.panel-default -->
				         </div>
				         <!-- /.col-lg-8 -->
	                  	<div class="col-lg-4">
		                    <div class="panel panel-default">
		                        <div class="panel-heading">
		                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
		                        </div>
		                        <!-- /.panel-heading -->
		                        <div class="panel-body">
		                            <div class="list-group ">

		                                <div class="list-group panelnotif ">
		                                	
		                                </div>
		                            </div>
		                        </div>
		                        <!-- /.panel-body -->
		                    </div>
		                    <!-- /.panel -->
		                    <div class="panel panel-default">
		                        <div class="panel-heading">
		                            <i class="fa fa-bell fa-fw"></i> Users Panel
		                        </div>
		                        <!-- /.panel-heading -->
		                        <div class="panel-body">
		                            <div class="list-group ">

		                               
		                            </div>
		                        </div>
		                        <!-- /.panel-body -->
		                    </div>
		                    <!-- /.panel -->
			    		</div>
           </div>
     </div>  
</div>  
<?php 
include 'includes/footer.php';
?>