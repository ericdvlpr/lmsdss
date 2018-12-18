<?php
include "includes/head.php";
include 'core/database.php';
?>

<div class="login-box">
  <div class="login-logo">
  	<img src="images/icons/dwcl_seal_new.png" width="155" height="155" class="center-block img-responsive" />
  	<h3>LIBRARY MANAGEMENT SYSTEM</h3>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <div class="alertMsg"></div>
    	<form id="log_in" name="log_in">
					<div class="form-group has-feedback">
						<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required="true"  />
						  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="true"  />
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>

					</div>
					<input type="submit" name="login" class="btn btn-success btn-flat btn-block" value="Login" />
		</form>
    </div>

 </div>
<!-- <div class="container">
	<div class="row ">
		<form id="log_in" name="log_in">
			<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Please Sign In</h3>
			                    </div>
			                    <div class="panel-body">
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required="true"  />
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="true"  />
					</div>
					<input type="submit" name="login" class="btn btn-success  btn-block" value="Login" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div> -->
</body>
 <script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.inputmask.bundle.js"></script>
		 <script src="js/general.js"></script>
		 <script src="js/search.js"></script>
		 <script src="js/jquery-ui.js"></script>
<?php //include "includes/footer.php"?>
