<?php include 'includes/header.php';?>  

    <div class="container-fluid"> 
                <div class="row">
                  
                    <?php include 'includes/sidemenu.php'; ?>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                         <h3 align="center">Catalogs!</h3><br />  
                              <div  class="table-responsive"> 
                                <div class="btn-group">
                                          <button type="button" class="btn btn-primary" id="add_catalogue" >
                                          Add Catalogue                                       
                                        </button>
                                   </div>
                                  <table class="table table-bordered table-striped" id="catalogue">  
              						                <tr>  
              						                     <th width="10%">Catalogue #</th>  
              						                     <th width="35%">Catalogue Name</th>   
              						                     <th width="20%">Command</th>  
              						                </tr> 
              						                <tbody id="catalogue_table"></tbody> 
								                  </table> 
                              </div>  
                      </div>  
                </div>
           </div>  
 <div class="modal fade" id="catalogue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Catalogue</h4>
              </div>
              <form class="form-horizontal" id="catalogueform" method="Post" class="collapse">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Catalogue No</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="catalogue_no" id="catalogue_no" placeholder="Catalogue No" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label text-left">Catalogue Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control"  name="catalogue_name" id="catalogue_name" required="true" placeholder="Catalogue Name">
                  </div>
                </div>
                <input type="hidden" name="action" id="action" value="addCatalogue" />
                <input type="hidden" name="catalogue_id" id="catalogue_id" />
                
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
