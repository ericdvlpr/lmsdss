<?php include 'includes/header.php';?>            
  <?php include 'includes/sidemenu.php'; ?>                   

                	 <section class="content-header">
					      <h1>
					        Dashboard
					      </h1>
					      <ol class="breadcrumb">
					        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					        <li class="active">Dashboard</li>
					      </ol>
					    </section>
					        <section class="content">
						        <div class="col-md-3 col-sm-6 col-xs-12">
						          <div class="info-box">
						            <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text"><h4>Books</h4></span>
						              <span class="info-box-number"><?php echo $object->count_books(); ?><small>%</small></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-md-3 col-sm-6 col-xs-12">
						          <div class="info-box">
						            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">Likes</span>
						              <span class="info-box-number">41,410</span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->

						        <!-- fix for small devices only -->
						        <div class="clearfix visible-sm-block"></div>

						        <div class="col-md-3 col-sm-6 col-xs-12">
						          <div class="info-box">
						            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">Sales</span>
						              <span class="info-box-number">760</span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-md-3 col-sm-6 col-xs-12">
						          <div class="info-box">
						            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">New Members</span>
						              <span class="info-box-number">2,000</span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="row">
							          <div class="col-md-6">
							            <div class="box box-solid box-default">
							              <div class="box-header">
							                <h3 class="box-title">Announcements</h3>
							                <div class="box-tools pull-right">
							                </div><!-- /.box-tools -->
							              </div><!-- /.box-header -->
							              <div class="box-body">
							               	<div class="table-responsive">
							               		<table class="table table-bordered table-striped">
							               			<thead>
							               				<tr>
							               					<td>Title</td>
							               					<td>Content</td>
							               					<td>Date Posted</td>
							               					<td>Status</td>
							               				</tr>
							               			</thead>
							               			<tbody id="announcement_index_table"></tbody>
							               		</table>
							               	</div>
							               	
							              </div><!-- /.box-body -->
							            </div><!-- /.box -->
							          </div>
							          <div class="col-md-6">
							            <div class="box box-solid box-primary">
							              <div class="box-header">
							                <h3 class="box-title">Books</h3>
							              </div><!-- /.box-header -->
							              <div class="box-body">
								                <div class="table-responsive">
								               		<table class="table table-bordered table-striped">
								               			<thead>
								               				<tr>
								               					<td>No</td>
								               					<td>Title</td>
								               					<td>Author</td>
								               					<td>Copies</td>
								               					<td>Status</td>
								               				</tr>
								               			</thead>
								               			<tbody id="book_index_table"></tbody>
								               		</table>
								               	</div>
							              </div><!-- /.box-body -->
							            </div><!-- /.box -->
							          </div>
							          
							          <div class="clearfix"></div>
							          <div class="col-md-6">
							            <div class="box box-solid box-info">
							              <div class="box-header">
							                <h3 class="box-title">Borrowed Books</h3>
							              </div><!-- /.box-header -->
							              <div class="box-body">
							                	<div class="table-responsive">
								               		<table class="table table-bordered table-striped">
								               			<thead>
								               				<tr>
								               					<td>No</td>
								               					<td>Title</td>
								               					<td>Student Name</td>
								               					<td>Copies</td>
								               					<td>Date Issued</td>
								               					<td>Return Date</td>
								               					<td>Status</td>
								               				</tr>
								               			</thead>
								               			<tbody id="bookissue_index_table"></tbody>
								               		</table>
								               	</div>
							              </div><!-- /.box-body -->
							            </div><!-- /.box -->
							          </div>
							          <div class="col-md-3">
							            <div class="box box-solid box-success">
							              <div class="box-header">
							                <h3 class="box-title">Notification Panel</h3>
							              </div><!-- /.box-header -->
							              <div class="box-body">
							               	<div class="list-group panelnotif"></div>
							              </div><!-- /.box-body -->
							            </div><!-- /.box -->
							          </div>
							          <div class="col-md-3">
							            <div class="box box-solid box-success">
							              <div class="box-header">
							                <h3 class="box-title">User Logs</h3>
							              </div><!-- /.box-header -->
							              <div class="box-body">
							               <div class="list-group usernotif"></div>
							              </div><!-- /.box-body -->
							            </div><!-- /.box -->
							          </div>
							        </div><!-- /.row -->
						  </section>			   
<?php 
include 'includes/footer.php';
?>