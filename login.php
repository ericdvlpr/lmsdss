<?php 
include "includes/head.php";
include 'core/database.php';
$data = new Database;
$message = '';

if(isset($_POST['login'])){
	$field = array(
		'username' => $_POST['username'],
		'password' => md5($_POST['password'])
		);
	 // print_r($data->can_login("users", $field));
		if($data->can_login("users", $field)){
			$post_data = $data->can_login("users", $field);
			foreach($post_data as $post){
			echo $post;
			$_SESSION["username"] = $post["username"];
			$_SESSION["id"] = $post['user_id'];;
			$_SESSION["access"] = $post['access'];;
			header("location:index.php");
			}
		}else{
			$message = $data->error;
		}
}

?>
<div class="row ">
<form method="POST">
	<div class="col-md-4 col-md-offset-4 well login">
		<h1 class="page-header text-center">LOGIN</h1>
		<?php if(isset($message)){
						echo '<label class="text-danger">'.$message.'</label>';
					} ?>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" required="true"  />
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required="true"  />
		</div>
		<input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
	</div>
</form>
	

</div>
