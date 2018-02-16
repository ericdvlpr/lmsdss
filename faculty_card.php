<?php include 'includes/header.php';?>  
            <?php include 'includes/sidemenu.php'; ?>
               <section class="content">
                <div class="box box-primary box-solid">
                 <div class="box-header with-border"><h4 class="box-title"><i class="fa fa-info"></i> Faculty Info</h4></div>
                    <div class="box-body">
                        <div class="row">
                            <?php 
                                if(isset($_GET['facID'])){
                                    $output='';

                                     $query = "SELECT * FROM faculty f LEFT JOIN departments d ON d.dept_id = f.dept  WHERE faculty_no='".$_GET['facID']."'";
                                        $result = $object->execute_query($query);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                         $output .='<div class="col-xs-6">
                                                    <h3><strong>Name</strong>: '.$row["faculty_name"].' </h3>                            
                                                    <h3><strong>Contact:</strong> '.$row["contacs"].' </h3>               
                                                    <h3><strong>Department:</strong> '.$row["department_name"].' </p>    
                                                </div>' ;
                                        }
                                        echo $output;
                                }
                             ?>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-xs-6">
                                <h3 class="page-header"><strong>Books Request</strong></h3>
                                 <table class="table table-striped">
                                    <tr>
                                        <td>Request No</td>
                                        <td>Book Title</td>
                                        <td>Status</td>
                                    </tr>
                                    <?php 
                                        if(isset($_GET['facID'])){
                                             $outputBooks='';
                                            $result1 = $object->execute_query("SELECT * FROM book_request br JOIN faculty f ON br.faculty_id=f.faculty_no WHERE faculty_id ='".$_GET['facID']."' ");
                                            while($row1 = mysqli_fetch_array($result1))
                                            {
                                            echo $outputBooks ='<tr>       
                                                 <td>'.$row1['request_no'].'</td>  
                                                 <td>'.$row1['book_title'].'</td>
                                                 <td>'.$row1['status'].'</td>
                                                 </tr> ' ;
                                            }
                                            
                                        }
                                     ?>
                                  </table>
                            </div>
                            
                        </div>
                    </div>
                
                </div>	
            </section>	
<?php 
include 'includes/footer.php';
?>
