<?php include 'includes/header.php';?>            
  <?php include 'includes/sidemenu.php'; ?>                   
        <div class="content-wrapper">
            <h3 class="page-header">Messsage Update</h3>   	 
			     <div>
			     	
			     	<div class="col-sm-9 col-md-offset-1 main">
			     		<h4 align="center">Borrow Message</h4>
			     		<div>
			     			<textarea class="form-control" rows="6" readonly="true" id="bmdata"></textarea>
			     		</div>
			     		<div align="right">
			     			<button class="btn btn-primary" name="br_book" id="bmb">Edit Message</button>
			     		</div>
			     	</div>
			     	
			     	<div class="col-sm-9 col-md-offset-1 main">
			     		<h4 align="center">Warning Message</h4>
			     		<div >
			     			<textarea class="form-control" rows="6" readonly="true" id="wmdata"></textarea>
			     		</div>
			     		<div align="right">
			     			<button class="btn btn-primary" name="br_book" id="wmb">Edit Message</button>
			     		</div>
			     	</div>
			     	
			     	<div class="col-sm-9 col-md-offset-1 main">
			     		<h4 align="center">Overdue Message</h4>
			     		<div>
			     			<textarea class="form-control" rows="6" readonly="true"  id="omdata"></textarea>
			     		</div>
			     		<div align="right">
			     			<button class="btn btn-primary" name="br_book" id="omb">Edit Message</button>
			     		</div>
			     	</div>
			     </div>

		</div>


<div class="modal fade" id="messEd" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="MEtitle"></h4>
      </div>
      <form class="form-horizontal" method="Post" class="collapse">
      	<div class="modal-body">
      		<div class="form-group">
      			<label class="control-label text-left col-sm-2">Header</label>
      			<div class="col-sm-9">
      				<textarea class="form-control" id="hddata" rows="3"></textarea>
 				</div>
 			</div>
      		<div class="form-group">
      			<label class="control-label text-left col-sm-2">Footer</label>
      			<div class="col-sm-9">		
      				<textarea class="form-control" id="ftdata" rows="3"></textarea>
      			</div>
 			</div>

 		</div>
        <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="addBook" />
            <input type="hidden" name="doc_id" id="doc_id" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="edbtn">Edit</button>
            
        </div>
      </form>
    </div> 
</div>

<!-- <div class="modal fade" id="mod_info" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mod_title">Success</h4>
      </div>
      <div class="modal-body">
        <p id="mod_data" align="center">Message Edited</p>
      </div>
      <div class="modal-footer">
        
      </div>
    </div><!-- /.modal-content -->
 <!--</div> /.modal-dialog
</div> -->

<?php 
include 'includes/footer.php';
?>