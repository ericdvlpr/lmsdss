<?php include 'includes/head.php';?>  
    <div class="container">    
		<form class="form-horizontal">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Sign in</button>
			    </div>
			  </div>
		</form>
	</div>  
<?php 
include 'includes/footer.php';
?>
