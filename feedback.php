<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          			  <h1 class="page-header">Leave Us a FeedBack</h1>
			          <div class="row placeholders" id="form-placeholders">
			          	

			          		<form class="form-horizontal" id="feedback" method="POST">
								  <div class="form-group">
								    <div class="col-sm-5">
								      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-5">
								      <textarea class="form-control"  name="body" id="body" cols="20" rows="20" placeholder="Leave a Comment here"></textarea>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-5">
								      <button type="submit"  class="btn btn-default">Submit</button>
								    </div>
								  </div>
								    <input type="hidden" name="action" id="action" value="addFeedBack" />
								    <input type="hidden" name="student_id" id="student_id" value="<?php echo $_SESSION['id']; ?>" />
							</form>
			          </div>  
           </div>
     </div>  
</div>  
<?php 
include 'includes/footer.php';
?>
