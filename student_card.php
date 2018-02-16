<?php include 'includes/header.php';?>  
<?php include 'includes/sidemenu.php'; ?>
<section class="content">
		<div class="box box-success box-solid">
     <div class="box-header with-border"><h4 class="box-title"><i class="fa fa-info"></i> Student Info</h4></div>
        <div class="box-body">
            <div class="row">
            <?php 
 				if(isset($_GET['studID'])){
 					$output='';

 					 $query = "SELECT * FROM students s LEFT JOIN departments d ON d.dept_id = s.dept LEFT JOIN courses c ON c.course_id =s.course WHERE student_id='".$_GET['studID']."'";
                        $result = $object->execute_query($query);
                        while($row = mysqli_fetch_array($result))
                        {
                         $output .='
                <div class="col-xs-6 ">
                    <img src="'.$row['image'].'" class="img img-thumbnail center-block" height="250" width="250"/>
                    <h3 class="text-center"><strong>ID: </strong>'.$row["student_id"].'</h3>
                </div>
                <div class="col-xs-6 ">
                
                <h3><strong>Name: </strong>'.$row["student_name"].'</h3>
					<h3><strong>Gender</strong>: '.$row["gender"].' </h3>				
					<h3><strong>Address:</strong> '.$row["gender"].' </h3>				
					<h3><strong>Contact:</strong> '.$row["contact"].' </h3>				
					<h3><strong>Department:</strong> '.$row["department_name"].' </h3>	
					<h3><strong>Course:</strong> '.$row["course_name"].' </h3>	
				</div>
		   		' ;
                        }
                        echo $output;
 				}
 			 ?>
                 
             </div>
             <h3 class="page-header"><strong>Books Borrowed</strong></h3>
             <table class="table table-bordered">
                <tr>
                    <td>Book No</td>
                    <td>Book Title</td>
                    <td>Status</td>
                </tr>
                <?php 
                    if(isset($_GET['studID'])){
                         $outputBooks='';
                        $result1 = $object->execute_query("SELECT * FROM borrow_book bb JOIN borrow_details bd USING (borrow_no) JOIN book b USING (book_no) WHERE member_id ='".$_GET['studID']."' ");
                        while($row1 = mysqli_fetch_array($result1))
                        {
                        echo $outputBooks ='<tr>       
                             <td>'.$row1['borrow_no'].'</td>  
                             <td>'.$row1['book_title'].'</td>
                             <td>'.$row1['activity'].'</td>
                             </tr> ' ;
                        }
                        
                    }
                 ?>
              </table>
	        </div>
         </div>
</section>
<?php 
include 'includes/footer.php';
?>
