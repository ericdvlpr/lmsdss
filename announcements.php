<?php include 'includes/header.php';?>  
              <div class="row">
                <?php include 'includes/sidemenu.php'; ?>
                   <section class="content">
                           <div class="col-md-12">
                               <div class="box box-solid box-primary">
                                      <div class="box-header">
                                      <div class="btn-group pull-right">
                                              <button type="button" class="btn btn-success" id="add_announcement" data-toggle="modal" data-target="#myModalannouncements">
                                             Post Announcements
                                            </button>
                                            </div>
                                        <h3 class="box-title">Announcements!</h3>
                                      </div>
                                      <!-- /.box-header -->
                                        <div class="box-body">
                                            
                                           <table class="table table-bordered  table-striped" id='announcement'>  
                                                  <thead>  
                                                      <tr>  
                                                           <th width="30%">Announcement Title</th>  
                                                           <th width="30%">Content</th>  
                                                           <th width="20%">Date Posted</th>  
                                                           <th width="20%">Status</th>  
                                                           <th width="20%">Command</th>  
                                                           
                                                      </tr> 
                                                  </thead> 
                                                  <tbody id="announcement_table"></tbody> 
                                          </table>  
                                        </div>
                                </div>
                           </div> 
                     </section>
                </div>
           <div class="modal fade" id="myModalannouncements" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Post Announcement </h4>
                </div>
                 <form class="form-horizontal" id="announcementform" method="Post" class="collapse">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Title</label>
                      <div class="col-sm-9">
                         <input type="text" class="form-control"  name="title" id="title" placeholder="Announcement Title" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Content</label>
                      <div class="col-sm-9">
                         <textarea class="form-control"  name="content" id="content" required="true" placeholder="Content"></textarea>
                      </div>
                    </div>
                    <div class="form-group">  
                          <label class="col-sm-3 control-label image text-left">Select Image</label>  
                           <div class="col-sm-9">
                              <input class="form-control" type="file" name="announcementImage" id="announcementImage" required />   
                           </div>  
                       </div>
                     <div class="form-group">
                           <div class="col-sm-3"></div>
                            <div class=" col-sm-9 img-thumbnail" id="announcement_image">  
                          </div>    
                     </div>
                    <?php if($_SESSION['access']==1){ ?>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="status" id="status" required>
                          <option value="">Please Select</option>
                          <option value="0">Pending</option>
                          <option value="1">Approve</option>
                        </select>
                      </div>
                    </div>
                    <?php } ?>
                    <input type="hidden" name="action" id="action" value="addAnnouncement" />
                    <input type="hidden" name="announcement_id" id="announcement_id" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
                  </div>
                </form>
              </div>
            </div>
          </div>
  <!-- <div class="modal fade" id="announcement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Post Announcement </h4>
            </div>
            <form class="form-horizontal" id="announcementform" method="Post" class="collapse">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Title</label>
                <div class="col-sm-9">
                   <input type="text" class="form-control"  name="title" id="title" placeholder="Announcement Title" />
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Content</label>
                <div class="col-sm-9">
                   <textarea class="form-control"  name="content" id="content" required="true" placeholder="Content"></textarea>
                </div>
              </div>
              <?php //if($_SESSION['access']==1){ ?>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label text-left">Status</label>
                <div class="col-sm-9">
                  <select class="form-control" name="status" id="status" required>
                    <option value="">Please Select</option>
                    <option value="0">Pending</option>
                    <option value="1">Approve</option>
                  </select>
                </div>
              </div>
              <?php //} ?>
              <input type="hidden" name="action" id="action" value="addAnnouncement" />
              <input type="hidden" name="announcement_id" id="announcement_id" />
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" id="button_action" value="Save"  />
            </div>
            </form>
      </div> -->
<?php 
include 'includes/footer.php';
?>
