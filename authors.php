<?php include 'includes/header.php';?>  

        <?php include 'includes/sidemenu.php'; ?>
         <section class="content">
             <div class="col-md-12">
                 <div class="box box-solid box-primary">
                      <div class="box-header">
                      <div class="btn-group pull-right">
                                      <button type="button" class="btn btn-success" id="add_author" data-toggle="modal" data-target="#author">
                                      Add Author
                                    </button>
                                </div>
                             <h3 class="box-title">Authors</h3>
                      </div>
                      <div class="box-body">
                        <div  class="table-responsive">
                               
                                   <table class="table table-bordered table-striped" id='authors'>  
                                        <thead>
                                              <tr>  
                                                     <th width="10%">Author #</th>  
                                                     <th width="35%">Name</th>  
                                                     <th width="20%">Command</th>  
                                               
                                              </tr>     
                                        </thead>  
                                           
                                          <tbody id="author_table"></tbody> 
                                  </table>  
                           </div> 
                      </div>
                </div>
            </div>
        </section>  
  <div class="modal fade" id="author" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Author</h4>
              </div>
              <form class="form-horizontal" id="authorform" method="Post" class="collapse">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Author No</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="author_no" id="author_no" placeholder="Author No" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Author Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="author_name" id="author_name" required="true" placeholder="Author Name">
                  </div>
                </div>

                <input type="hidden" name="action" id="action" value="addAuthor" />
                <input type="hidden" name="author" id="author_id" />
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
              </div>
              </form>
          </div>
    </div>
  </div>
<?php 
include 'includes/footer.php';
?>
