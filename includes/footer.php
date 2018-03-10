 		</div> 
			      <footer class="main-footer">
				    <div class="pull-right hidden-xs">
				      <b>Version</b> 2.4.0
				    </div>
				    <strong>Copyright &copy; <?php echo date('Y'); ?> JD Software</strong> All rights
				    reserved.
				  </footer>
	</div>
</body>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/bootstrap-select.min.js"></script> 
<script src="js/lightbox.js"></script>
<!-- 		  <script src="js/jquery.dataTables.min.js"></script>    -->
		 <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
		 <script src="js/general.js"></script>
		 
<script type="text/javascript">
	function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;

}
</script>
 </html>