<?php include 'includes/header.php';?> 

<script language="JavaScript">
    Webcam.set({
      width: 200,
      height: 460,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
  </script> 
   <script src="js/webcam.js"></script>
	<div class="container-fluid"> 
		<div class="row">
              
            <?php include 'includes/sidemenu.php'; ?>
     		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     			<div class="row">
                <div class="class="col-xs-6"">
                    <h1 class="page-header">Add Student</h1>
                      
                      <div id="my_camera" style="width:320px; height:240px;" ></div>
                      
                     
                        
                        <form>
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                      </form>

                </div>
                  <div class="col-xs-6 col-md-4">
                   <div id="my_result"></div>
                   <input type="text" name="img" id="img" />
                  </div>
                 
            </div>
            
		 	</div>
		</div>  
	</div> 

<?php 
include 'includes/footer.php';
?>
<script language="JavaScript">
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
      Webcam.snap( function(data_uri) {
        alert(data_uri);
        document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
        document.getElementById('img').innerHTML = data_uri;

            Webcam.upload(data_uri, 'saveimage.php', function(code, text) {
              
            // document.getElementById('results').innerHTML = 
            // '<h2>Here is your image:</h2>' + 
            // '<img src="'+text+'"/>';
           
            } )
      } );

    }
  // function take_snapshot() {
  //     // take snapshot and get image data
  //     Webcam.snap( function(data_uri) {
  //       // display results in page
        
  //       document.getElementById('results').innerHTML = 
  //         '<h2>Processing:</h2>';
          
  //       Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
  //         document.getElementById('results').innerHTML = 
  //         '<h2>Here is your image:</h2>' + 
  //         '<img src="'+text+'"/>';
  //       } );  
  //     } );
  //   }
</script>