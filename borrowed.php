<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    	<h3 align="center">Issue Book</h3><br />  
                              <div class="table-responsive"> 
                                   <div class="btn-group">
		                                      <button type="button" class="btn btn-primary" id="issue_book" data-toggle="modal" data-target="#issue">
		                                     Issue Book
		                                    </button>
                               		 </div>
                              	 <table class="table table-bordered table-striped" id="borrowed">  
						                <tr>  
						                     <th width="10%">#</th>  
						                     <th width="22%">Name</th>    
						                     <th width="22%">Book Name</th>    
						                     <th width="10%">Date Borrowed</th>    
						                     <th width="10%">Date Returned</th>    
						                     <th width="8%">Command</th>  
						                     
						                </tr> 
						                <tbody  id="borrowed_table"></tbody> 
								</table>
                              </div>  
                    </div>  
                </div>
           </div> 
   <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Issue Book</h4>
            </div>
            <form class="form-horizontal" id="bookform" method="Post" class="collapse">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Book No</label>
                <div class="col-sm-9">
                   <input type="text" class="form-control"  name="book_no" id="book_no" placeholder="Enter Book No" readonly="true">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Book Name</label>
                <div class="col-sm-9">
                   <input type="text" class="form-control"  name="book_name" id="book_name" required="true" placeholder="Book Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Student Name</label>
                <div class="col-sm-9">
                   <input type="text" class="form-control"  name="student_name" id="student_name" required="true" placeholder="Student Name">
                </div>
              </div>
           	<div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Date Borrowed</label>
                <div class="col-sm-9">
                   <input type="date" class="form-control"  name="date_borrowed" id="date_borrowed" required="true" />
                </div>
              </div>
              	<div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Date Returned</label>
                <div class="col-sm-9">
                   <input type="date" class="form-control"  name="date_returned" id="date_returned" required="true" />
                </div>
              </div>
              <input type="hidden" name="action" id="action" value="issueBook" />
              <input type="hidden" name="issued" id="issued_id" />
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
            </div>
            </form>
      </div> 
<?php 
include 'includes/footer.php';
?>
