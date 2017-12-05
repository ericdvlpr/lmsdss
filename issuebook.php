<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                         <h3 align="center">Issue Books!</h3> 
                              <div  class="table-responsive"> 
                              	  <div class="btn-group">
                                      <button type="button" class="btn btn-primary" id="issue_book" >
                                      Issue Book
                                    </button>
                                </div>
                               <table class="table table-bordered table-striped" id="bookissue">  
          					                <thead>  
          					                     <th width="12%">Book No</th>  
                                         <th width="12%">Book Title</th>    
          					                     <th width="12%">Student Name</th>    
                                         <th width="12%">Book Copies</th>  
                                         <th width="12%">Date Issued</th>  
          					                     <th width="12%">Return Date</th>  
          					                     <th width="12%">Status</th>  
          					                     <th width="12%">Command</th>  
          					                </thead> 
          					                <tbody id="bookissue_table">
          					                	
          					                </tbody> 
          					            </table>
                            </div>  
                      </div>  
                </div>
           </div>  

            <div class="modal fade" id="issued" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Issue Book</h4>
                  </div>
                      <form class="form-horizontal" id="issueform" method="Post" class="collapse">
                        <div class="modal-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Book No</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control"  name="book_no" id="search_book_no" placeholder="Book No">
                                <div id="bookNoList"></div>  
                            </div>
                          </div>
                          <div class="form-group">

                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Book Title</label>
                            <div class="col-sm-9">
                              
                               <input type="text" class="form-control"  name="book_name" id="search_title" required="true" placeholder="Book Title">
                               <div id="bookTitleList"></div> 
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Student Name</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control"  name="student_name" id="student_name" required="true" placeholder="Book Title">
                               <div id="studentList"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Qty</label>
                            <div class="col-sm-9">
                               <input type="number" class="form-control"  name="qty" id="qty" required="true" placeholder="Qty of Books">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Date issued</label>
                            <div class="col-sm-9">
                               <input type="date" class="form-control"  name="date_issued" id="date_issued" required="true" placeholder="Book Title">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label text-left">Return Date</label>
                            <div class="col-sm-9">
                               <input type="date" class="form-control"  name="date_returned" id="date_returned" required="true" placeholder="Book Title">
                            </div>
                          </div>
                        <div class="modal-footer">
                           <input type="text" name="action" id="action" value="addIssueBook" />
                            <input type="hidden" name="issue_id" id="issue_id" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
<?php 
include 'includes/footer.php';
?>

