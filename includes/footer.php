		<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
		 <script src="js/jquery.js"></script>  
		<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    -->
		  <script src="js/bootstrap.min.js"></script>   
<!-- 		  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>   -->
		  <script src="js/jquery.dataTables.min.js"></script>  
		 <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
		 <script src="js/chosen.jquery.js"></script>
		 
		 <?php if(isset($_SESSION['type'])) {?>
		 	<script src="js/search.js"></script>
		 <?php }else{ ?>
		 	<script src="js/general.js"></script>
		 <?php } ?>
		 <script src="js/jquery-ui.js"></script>
      </body>  
 </html>  
