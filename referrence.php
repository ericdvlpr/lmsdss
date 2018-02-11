<?php include 'includes/header.php';?>  
                    <?php include 'includes/sidemenu.php'; ?>
 <div class="content-wrapper">
          				<h3 class="page-header">Book Referrence</h3>

			          <div class="row placeholders">
			            	<table class="table table-bordered table-striped" id="referrence">  
	      					                <thead>  
	      					                     <th width="10%">Request No</th>  
	      					                     <th width="20%">Book Title</th>  
	      					                     <th width="15%">Book Author</th>  
	      					                     <th width="10%">Copies</th>  
	      					                     <th width="12%">Requested By:</th>  
	      					                     <th width="12%">Date Requested:</th>  
	      					                     <th width="10%">Status</th>  
	      					                     <th width="18%">Command</th>  
	      					                </thead> 
	      					                <tbody id="request_table">
	      					                	
	      					                </tbody> 
	      					            </table>
			          </div>     
           </div>
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Book Referrence</h4>
      </div>
      <form class="form-horizontal" id="referrenceForm"  method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 text-left control-label">Book Title</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="book_title"  id="book_title" placeholder="Book Title">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Book Author</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="author" id="author" placeholder="Book Author">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Copies</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="copies" id="copies" placeholder="Copies">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Requested By:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="request_by" id="request_by" placeholder="Requested By">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Date Requested:</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="date_request" id="date_request" placeholder="Date Requested">
            </div>
          </div>
          <div class="form-group" id="statusGroup">
            <label for="inputPassword3" class="col-sm-3 control-label" >Status:</label>
            <div class="col-sm-9">
              <select class="form-control" name="status" id="status" required="true">
                <option value="">Please Select</option>
                <option value="0">Pending</option>
                <option value="1">Approve</option>
              </select>
            </div>
          </div>
      </div>
       <input type="hidden" name="action" id="action" value='approveRequest' />
      <input type="hidden" name="request_id" id="request_id" />
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>  
<?php 
include 'includes/footer.php';
?>
