<?php 
include "includes/head.php";
include 'core/database.php';
?>
<div class="row ">
<form id="log_in" name="log_in">
	<div class="col-md-4 col-md-offset-4 well login">
		<h1 class="page-header text-center">LOGIN</h1>
		<div class="form-group">
			<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required="true"  />
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="true"  />
		</div>
		<input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
	</div>
</form>
	

</div>

<?php include "includes/footer.php"?>
