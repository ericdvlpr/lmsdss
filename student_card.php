<?php include 'includes/header.php';?>  
	<div class="container-fluid"> 
		<div class="row">
              
            <?php include 'includes/sidemenu.php'; ?>
     		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     			<?php 
     				if(isset($_GET['studID'])){
     					$output='';

     					 $query = "SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course WHERE student_id='".$_GET['studID']."'";
                            $result = $object->execute_query($query);
                            while($row = mysqli_fetch_array($result))
                            {
                             $output .='<div class="panel panel-default">
                             				<div class="panel-heading">'.$row["student_name"].'</div>
                         					  <div class="panel-body">
                         					   		<div class="row">
														<div class="col-xs-6">
															<p><strong>Gender</strong>: '.$row["gender"].' </p>				
															<p><strong>Address:</strong> '.$row["gender"].' </p>				
															<p><strong>Contact:</strong> '.$row["contact"].' </p>				
																		
														</div>
														<div class="col-xs-6">
															<p><strong>Department:</strong> '.$row["department_name"].' </p>	
															<p><strong>Course:</strong> '.$row["course_name"].' </p>	
														</div>
                         					   		</div>
                         					  </div>
                             			</div>' ;
                            }
                            echo $output;
     				}
     			 ?>
					
		 	</div>
		</div>  
	</div>  
<?php 
include 'includes/footer.php';
?>
