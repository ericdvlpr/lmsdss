<?php include 'includes/header.php';?>  
 <?php include 'includes/sidemenu.php';
if($_SESSION['access']!=4){
  header("location:login.php");

}

  ?>
<section class="content">
                       
          			<h1 class="page-header">Dashboard</h1>
			          <div class="row placeholders">
			          	<div class="col-md-6">
		                    <div class="box box-default">
		                        <div class="box-heading with-border">
		                          <h3 class="box-title">  <i class="fa fa-bell fa-fw"></i> Book Reserved</h3>
		                        </div>
		                        <!-- /.panel-heading -->
		                        <div class="box-body">
		                            <div class="list-group ">

		                                <div class="list-group bookBorrowed ">
		                                	
		                                </div>
		                            </div>
		                        </div>
		                        <!-- /.panel-body -->
		                    </div>
		                </div>
		                <div class="col-md-6">
		                    <div class="box box-default">
		                        <div class="box-heading with-border">
		                           <h3 class="box-title">  <i class="fa fa-bell fa-fw"></i> Book Referred </h3>
		                        </div>
		                        <!-- /.panel-heading -->
		                        <div class="box-body">
		                            <div class="list-group ">

		                                <div class="list-group bookReferred ">
		                                	
		                                </div>
		                            </div>
		                        </div>
		                        <!-- /.panel-body -->
		                    </div>
		                </div>
			          </div>
</section>

<?php 
include 'includes/footer.php';
?>
