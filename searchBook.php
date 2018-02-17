<?php include 'includes/header.php';?>         
<<<<<<< HEAD
		 
        <?php include 'includes/sidemenu.php'; ?>
<div class="content-wrapper">
        <div class="container">
        <form name="srch_form" id="srch_form">
			<div class="page-header"><h1 class="text-center">DWCL LIBRARY</h1></br>
			<input type="hidden" name="std_name" id="std_name" value=<?php echo $_SESSION['id']; ?>>
			<input type="hidden" name="std_name2" id="std_name2" value=<?php echo $_SESSION['name']; ?>> 
			<input type="hidden" name="std_type" id="std_type" value=<?php echo $_SESSION['type']; ?>>
			
			 <div class="form-group">
				<div class="col-sm-10">
					<input type="text" class="form-control" id="searchname" placeholder="Search Book" autocomplete="off">
				</div>
			 </div>
			 <button type="submit" class="btn btn-default">Search</button> 
		</form> 
        </div>

	<br />
    <div>
 		<table id="sc_table" class="table table-bordered table-striped">  
            <thead>
            	<tr>
              		<th width="30%"></th>
                    <th></th>  
            	</tr>
=======
<?php include 'includes/sidemenu.php'; ?>
<div class="container">
   <form name="srch_form" id="srch_form">
      <div class="page-header"><h1 class="text-center">DWCL LIBRARY</h1></br>
      <input type="hidden" name="std_name" id="std_name" value=<?php echo $_SESSION['id']; ?>>
      <input type="hidden" name="std_name2" id="std_name2" value=<?php echo $_SESSION['name']; ?>> 
      <input type="hidden" name="std_type" id="std_type" value=<?php echo $_SESSION['type']; ?>>
      
       <div class="form-group">
        <div class="col-sm-10">
          <input type="text" class="form-control" id="searchname" placeholder="Search Book" autocomplete="off">
        </div>
       </div>
       <button type="submit" class="btn btn-default">Search</button> 
    </form> 
        </div>

  <br />
    <div>
    <table id="sc_table" class="table table-bordered">  
            <thead>
              <tr>
                  <th width="30%"></th>
                    <th></th>  
              </tr>
>>>>>>> origin/Francis
            </thead>
            <tbody id="search_table">

            </tbody>
         </table>
    </div>
<<<<<<< HEAD
  
=======
  </div>
>>>>>>> origin/Francis
  <div class="modal fade" tabindex="-1" role="dialog" id=mod_info>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mod_title"></h4>
      </div>
      <div class="modal-body">
        <p id="mod_data" align="center"></p>
      </div>
      <div class="modal-footer">
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
<<<<<<< HEAD
</div><!-- /.modal -->

<div class="modal fade modal-fullscreen force-fullscreen" tabindex="-1" role="dialog" id=modal_select>
  <div class="modal-dialog" role="document">
=======
</div><!-- /.modal -->   


<div class="modal fade" tabindex="-1" role="dialog" id=modal_select>
  <div class="modal-dialog modal-lg" role="document">
>>>>>>> origin/Francis
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        <h4 class="modal-title" id="book_title"></h4>
      </div>
      <div class="modal-body">
        <table>
            <tr>
                <td id='book_content'>
                
                </td>
            </tr>
        </table> 
      </div>
      <div class="modal-footer">
         <table align="center">
             <tr id="row1hid" align="center">
                <td>
                        Would you like to reserve this book?<br />
                        <button id="Yes" class="btn btn-success">(1)Yes</button> <button id="No" class="btn btn-danger">(2)No</button>
                </td>
            </tr>
                <tr id="row2hid" align="center">
                    <td>
                        <h4 class="modal-title" id="rowdata"></h4>
                    </td>
                </tr>
         </table>  
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php 
include 'includes/sfooter.php';
?>
