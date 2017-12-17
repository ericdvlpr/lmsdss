<?php include 'includes/head.php';
session_start();
if(!isset($_SESSION['id'])){
	header("location: login.php");
}
?>  
    <div class="container">    
		<form name="srch_form" id="srch_form">
			<div class="page-header"><h1 class="text-center">DWCL LIBRARY</h1></br>
			<input type="hidden" name="std_name" id="std_name" value=<?php echo $_SESSION['id']; ?>>
			<input type="hidden" name="std_name2" id="std_name2" value=<?php echo $_SESSION['name']; ?>> 
			</div>
			  <div class="form-group">
				  <div class="col-sm-10">
				  		<input type="text" class="form-control" id="searchname" placeholder="Search Book" autocomplete="off">
				  </div>
			  </div>
			 	<button type="submit" class="btn btn-default">Search</button> 
		</form>
	</div> 
	<br />
    <div id="search_table" name="search_table">
 
    </div>
	<div id="modal_select" name="modal_select" class="modal">
        <div id="modal_data" name="modal_data" class="modal_content">
                                  
        </div>
    </div> 
<?php 
include 'includes/footer.php';
?>
