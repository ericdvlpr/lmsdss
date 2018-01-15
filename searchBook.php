<?php include 'includes/header.php';?>       
    
    <div class="container-fluid">    
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
 		<table id="sc_table" class="table table-bordered table-striped">  
            <thead>
            	<tr>
              		<th width="30%"></th>
                    <th></th>  
            	</tr>
            </thead>
            <tbody id="search_table">

            </tbody>
         </table>
    </div>
	<div id="mod_info" class="modal">
        <div id="info_data" class="modal_content">
                                  
        </div>
    </div>

	<div id="modal_select" class="modal">
        <div id="modal_data" class="modal_content">
             <table>
             	<tr>
             		<td id='book_content'>
             		</td>
             	</tr>
             	<tr id="row1hid" align="center">
             		<td>
             			Would you like to reserve this book?<br />
             			<button id="Yes">(1)Yes</button> <button id="No">(2)No</button>
             		</td>
             	</tr>
             	<tr id="row2hid" align="center">
             		<td>No Longer Available</td>
             	</tr>
             </table>                
        </div>
    </div>
    </div>
  </div>  

<?php 
include 'includes/footer.php';
?>
