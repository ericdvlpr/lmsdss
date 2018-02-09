<?php include 'includes/header.php';?>  
    <?php include 'includes/sidemenu.php'; ?>
							<section class="content-header">
						  		<h1>
						        Setup
						      </h1>
						      <ol class="breadcrumb">
						        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
							              		<button type="submit" class="btn btn-default">Cancel</button>
											    <button type="submit" class="btn btn-info pull-right">Sign in</button>
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
												                    <input type="number" class="form-control" name="numDays" id="numDays" placeholder="No. of Day/Days">
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
												                    <input type="number" class="form-control" name="penalty" id="penalty" placeholder="Amount">
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
												                    <input type="number" class="form-control" name="numDays" id="numDays" placeholder="Qty">
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
						                The European languages are members of the same family. Their separate existence is a myth.
						                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
						                in their grammar, their pronunciation and their most common words. Everyone realizes why a
						                new common language would be desirable: one could refuse to pay expensive translators. To
						                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
						                words. If several languages coalesce, the grammar of the resulting language is more simple
						                and regular than that of the individual languages.
						              </div>
						              <!-- /.tab-pane -->
						              <div class="tab-pane" id="tab_3">
						                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
						                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
						                It has survived not only five centuries, but also the leap into electronic typesetting,
						                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
						                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
						                like Aldus PageMaker including versions of Lorem Ipsum.
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
