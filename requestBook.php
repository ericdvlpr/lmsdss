<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
			                	<?php include 'includes/sidemenu.php'; ?>
			                  <h2 class="page-header">Request for Book</h2> 
			                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			                         <h3 align="center">Book Requests</h3><br />  
			                              <div  class="table-responsive">
			                              	<!-- Button trigger modal -->
<button type="button" id="request_book"class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalRequest">
Request Book
</button>
			                                </div>
			                                   <table class="table table-bordered table-striped" id='request'>  
            					                <tr>  
            					                     <th width="13%">Request #</th>  
            					                     <th width="22%">Book Title</th>  
            					                     <th width="16%">Author</th>  
            					                     <th width="13%">Copies</th>  
            					                     <th width="16%">Date Requested</th>  
            					                     <th width="16%">Status</th>  
            					                     <th width="16%">Command</th>  
            					                     
            					                </tr> 
            					                <tbody id="request_table"></tbody> 
							                  </table>  
			                           </div>  
			                    </div>  
			                </div>
			           </div> 
			           Modal
<div class="modal fade" id="myModalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" id="requestform" method="Post" class="collapse">
			            <div class="modal-body">
			              <div class="form-group">
			                <label for="inputPassword3" class="col-sm-3 control-label text-left">Request No</label>
			                <div class="col-sm-9">
			                   <input type="text" class="form-control"  name="request_no" id="request_no" placeholder="Request No" readonly="true">
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputPassword3" class="col-sm-3 control-label text-left">Book Title</label>
			                <div class="col-sm-9">
			                   <input type="text" class="form-control"  name="book_title" id="book_title" required="true" placeholder="Book Title">
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputPassword3" class="col-sm-3 control-label text-left">Author</label>
			                <div class="col-sm-9">
			                   <input type="text" class="form-control"  name="author" id="author" required="true" placeholder="Author">
			                </div>
			              </div>  
						<div class="form-group">
			                <label for="inputPassword3" class="col-sm-3 control-label text-left">Copies</label>
			                <div class="col-sm-9">
			                   <input type="number" class="form-control"  name="copies" id="copies" required="true" placeholder="Copies">
			                </div>
			            </div>

			              <input type="hidden" name="action" id="action" value="addRequest" />
			              <input type="hidden" name="request_id" id="request_id" />
			              
			            </div>
			            <div class="modal-footer">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			              <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
			            </div>
		</form>
    </div>
  </div>
</div>
			 <!--  <div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			              <h4 class="modal-title" id="myModalLabel">Request Book</h4>
			            </div>
			            
			      </div>
           </div>
     </div>  

<?php 
include 'includes/footer.php';
?>
