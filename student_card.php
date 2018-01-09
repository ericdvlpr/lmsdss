<?php include 'includes/header.php';?>  
	<div class="container-fluid"> 
		<div class="row">
              
            <?php include 'includes/sidemenu.php'; ?>
     		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     			<div class="panel panel-default">
                 <div class="panel-heading"><h3>STUDENT INFO</h3></div>
                    <div class="panel-body">
                        <?php 
             				if(isset($_GET['studID'])){
             					$output='';

             					 $query = "SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course WHERE student_id='".$_GET['studID']."'";
                                    $result = $object->execute_query($query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                     $output .='
                            
                                <img src="'.$row['image'].'" class="img img-thumbnail" height="150" width="150"/>
                         
                            <h3><strong>ID: </strong>'.$row["student_id"].'</h3>
                            <h3><strong>Name: </strong>'.$row["student_name"].'</h3>
								<h3><strong>Gender</strong>: '.$row["gender"].' </h3>				
								<h3><strong>Address:</strong> '.$row["gender"].' </h3>				
								<h3><strong>Contact:</strong> '.$row["contact"].' </h3>				
								<h3><strong>Department:</strong> '.$row["department_name"].' </h3>	
								<h3><strong>Course:</strong> '.$row["course_name"].' </h3>	
							
					   		' ;
                                    }
                                    echo $output;
             				}
             			 ?>
                         <h3 class="page-header"><strong>Books Borrowed</strong></h3>
                         <table class="table table-striped">
                            <tr>
                                <td>Book No</td>
                                <td>Book Title</td>
                                <td>Status</td>
                            </tr>
                            <?php  ?>
                          </table>
				        </div>
                     </div>
                 </div>
		 	</div>
		</div>  
	</div>  
<?php 
include 'includes/footer.php';
?>
