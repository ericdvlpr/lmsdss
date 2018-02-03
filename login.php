<?php 
include "includes/head.php";
include 'core/database.php';
?>
<div class="container">
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
</div>

<?php include "includes/footer.php"?>
