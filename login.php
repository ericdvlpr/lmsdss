<?php 
include "includes/head.php";
include 'core/database.php';
/*
$data = new Database;
$message = '';

if(isset($_POST['login'])){
	if($data->can_login($_POST['username'], $_POST['password'])){
		session_start();
		$post_data = $data->can_login($_POST['username'], $_POST['password']);
		$_SESSION['id'] = $post_data[0];
		$_SESSION['name'] = $post_data[1];
		$_SESSION['type'] = $post_data[3];
		header("location:" .$post_data[2].".php");
		}
}
*/
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
