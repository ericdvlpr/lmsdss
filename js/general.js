$(document).ready(function(){
        $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           }); 
       $("input").attr("autocomplete","off");
        $('.modal').on("hidden.bs.modal", function(){
         $("input").val("");
         $("select").val("");
      });
      //Load Table Data
              load_author_data() 
              load_book_data();
               load_student_data();
               load_user_data();
               load_borrow_data();
               load_catalogoue_data();
               // load_Issued_data();
               load_faculty_data();
               load_request_data();
                load_request_notification();
                load_feedBack_notification();
                load_notification_panel();
                load_announcement_data();
                load_announcement_index();
                load_book_index();
                load_student_index();
                load_faculty_index();
                load_user_index();
                load_borrow_index();
      //Load Report
          $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                var status = $('#status').val();  
                var action = "bookReport";  

                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date,action:action,status:status},  
                          success:function(data)  
                          {  
    
                               $('#book_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }  
                else  
                {  
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{action:action},  
                          success:function(data)  
                          {  
    
                               $('#book_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });    
                }  
          });  
          $('#filter_student').click(function(){  
                var department = $('#department').val();  
                var course = $('#course').val();  
                var year = $('#course-year').val();  
                var id = $('#stud_id').val();  
                var action = "studentReport"; 
                
                if(department != '' || course != '' || year != '' || id != '')  
                {  
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{id:id,department:department, course:course,action:action,year:year},  
                          success:function(data)  
                          {  
                               $('#student_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }else{
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{action:action},  
                          success:function(data)  
                          {  
                               $('#student_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }  
                
          }); 
          $('#filter_request').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                var action = "BookRequestReport"; 
                
                if(from_date != '' || to_date != '' )  
                {  
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{from_date:from_date,to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#request_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }else{
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{action:action},  
                          success:function(data)  
                          {  
                               $('#request_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }  
                
          });
          $('#filter_issued').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                var action = "BookIssueReport"; 
              
                if(from_date != '' || to_date != '' )  
                {  
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{from_date:from_date,to_date:to_date,action:action},  
                          success:function(data)  
                          {  
                               $('#issue_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }else{
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:{action:action},  
                          success:function(data)  
                          {  
                               $('#issue_report_table').html(data);  
                               $('#reportOption').attr("disabled",false);  
                          }  
                     });  
                }  
                
          });
    //INDEX FUNCTION
       function load_announcement_index() {  
                    var action = "announcementIndex"; 

                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#announcement_index_table').html(data); 
                            
                         }  
                    });  
               }
          function load_book_index() {  
                 
                    var action = "bookIndex";

                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#book_index_table').html(data);
                         }  
                    });  
          }
          function load_student_index() {  
                    var action = "studentIndex";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#student_index_table').html(data); 
                         }  
                    });  
          }
        function load_faculty_index()  {  
                    var action = "facultyindex";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#faculty_index_table').html(data);
                         }  
                    });  
        }
        function load_user_index() {  
                    var action = "userIndex";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#user_index_table').html(data);  
                         }  
                    });  
        }
       function load_borrow_index() {  
                    var action = "bookIssuedIndex";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#bookissue_index_table').html(data);  
                         }  
                    });  
        }
    //--------------
     //Load Functions
                function load_announcement_data()  
               {  
                    var action = "Announcements"; 

                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#announcement_table').html(data); 
                            
                         }  
                    });  
               }  
                function load_book_data()  
               {  
                 
                    var action = "Book";

                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#book_table').html(data);
                              $('#books').DataTable(); 
                         }  
                    });  
               }  
                function load_author_data()  
               {  
                    var action = "Author";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#author_table').html(data); 
                              $('#authors').DataTable();  
                         }  
                    });  
               } 
                function load_catalogoue_data()  
               {  
                    var action = "Catalogoue";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#catalogue_table').html(data); 
                              $('#catalogue').DataTable();    
                         }  
                    });  
               }   
                function load_student_data()  
               {  
                    var action = "Students";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#student_table').html(data);
                              $('#students').DataTable();   
                         }  
                    });  
               }  
               function load_faculty_data()  {  
                    var action = "Faculty";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#faculty_table').html(data);
                              $('#faculty').DataTable();   
                         }  
                    });  
               }

                 function load_user_data()  
               {  
                    var action = "Users";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#user_table').html(data);  
                         }  
                    });  
               }
                function load_request_data()  
               {  
                    var action = "Book Request";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#request_table').html(data); 
                              $('#request').DataTable();    
                         }  
                    });  
               }
               function load_borrow_data()  
               {  
                    var action = "Issue Book";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#bookissue_table').html(data); 
                              // $('#request').DataTable();    
                         }  
                    });  
               } 
                 function load_department_list() {  
                    var action = "Department";  

                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#department').html(data);  
                         }  
                    });  
               }
               //Request Notification
               function load_request_notification(view = '') {
                    var action = "RequestNotification";
                    
                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{view:view,action:action},
                       dataType:"json",
                       success:function(data)
                       {
                       
                        $('.requestnotif').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                         $('.countRequest').html(data.unseen_notification);
                        }
                       }
                      });
                } 
                //FeedBack Notification
               function load_feedBack_notification(view = '') {
                    var action = "FeedBackNotification";
                    
                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{view:view,action:action},
                       dataType:"json",
                       success:function(data)
                       {
                       
                        $('.feedbacknotif').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                         $('.countFeedbck').html(data.unseen_notification);
                        }
                       }
                      });
                } 
                //Notification Panel
               function load_notification_panel(view = '') {
                    var action = "PanelNotification";
                    
                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{view:view,action:action},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.panelnotif').html(data.notification);
                       
                       }
                      });
                }  
              

              
          //Search Function     
          $('#search_author').keyup(function(){
                    var search = $(this).val();
                    var type = "author";
                    var action = 'Search';
                   
                    if(search != '')
                    {
                      $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{search:search,type:type,action:action},
                           success:function(data)
                           {
                            // $('#datalist1').html(data);
                            $('#authorList').html(data); 
                            $('#authorList').fadeIn();
                           }
                        });
                    }
                    $(document).on('click', '.author li', function(){  
                                   $('#search_author').val($(this).text());  
                                   $('#authorList').fadeOut(); 
                                  
                    });
            });
            $('#search_publisher').keyup(function(){
                                var search = $(this).val();
                                var type = "publisher";
                                var action = 'Search';
                                
                                if(search != '')
                                {
                                  $.ajax({
                                     url:"core/action.php",
                                     method:"POST",
                                     data:{search:search,type:type,action:action},
                                       success:function(data)
                                       {
                                        
                                         $('#publisherList').html(data); 
                                          $('#publisherList').fadeIn();
                                       }
                                    });
                                }
                                 $(document).on('click', '.publisher li', function(){  
                                   $('#search_publisher').val($(this).text());  
                                   $('#publisherList').fadeOut();  
                                  });
            });
            $('#search_book_no').keyup(function(){
                                var search = $(this).val();
                                var type = "bookNo";
                                var action = 'Search';
                               
                                if(search != '')
                                {
                                  $.ajax({
                                     url:"core/action.php",
                                     method:"POST",
                                     data:{search:search,type:type,action:action},
                                       success:function(data)
                                       {
                                        
                                         $('#bookNoList').html(data); 
                                          $('#bookNoList').fadeIn();
                                       }
                                    });
                                }
                                 $(document).on('click', '.bookNo li', function(){  
                                      $('#search_book_no').val($(this).text()); 
                                       
                                       $('#bookNoList').fadeOut(); 
                                      var search = $('#search_book_no').val();
                                       var action = 'Fetch Data';
                                       
                                        $.ajax({
                                             url:"core/action.php",
                                             method:"POST",
                                             data:{bookID:search,action:action},
                                               success:function(data)
                                               {
                                                 $('#search_title').val(data.book_title);
                                                
                                               }
                                            }); 
                                  });
            });
//                //Load unique number
              $('#add_book').click(function(){
                    $('#button_action').val("Add Book"); 
                    $('#book').modal('show', function() {
                       $('#book_no').focus();
                    });
               });
             $('#add_author').click(function(){
                    $('#action').val("addAuthor"); 
                    $('#button_action').val("Saves");
                      var action = "author num";

                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action},
                        success:function(data){
                          $("#exampleModal").modal('show');
                          $('#author_no').val(data);
                          

                        }
                      });
                    });
               $('#add_catalogue').click(function(){
                    $('#action').val("addCatalogue"); 
                    $('#button_action').val("Saves");
                      var action = "author num";

                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action},
                        success:function(data){
                          $("#catalogue").modal('show');
                          $('#catalogue_no').val(data);
                          

                        }
                      });
                    });
               $('#issue_book').click(function(){
                    $('#action').val("addIssueBook"); 
                    $('#button_action').val("Saves");
                      $("#issued").modal('show');
                          function load_book(){
                            var action = 'Load Books';
                            // $.ajax({
                              //   url:"core/action.php",
                              //   method:"POST",
                              //   data:{action:action},
                              //   success:function(data){
                                  
                              //   }
                              // });
                          }
                      
                    });
               $('#add_user').click(function(){
                    $('#action').val("addUser"); 
                    $('#button_action').val("Saves");
                      $("#user").modal('show');
                      // $.ajax({
                      //   url:"core/action.php",
                      //   method:"POST",
                      //   data:{action:action},
                      //   success:function(data){
                          
                      //   }
                      // });
                    });
               $('#add_student').click(function(){
                      load_department_list(); 
                      $("#student").modal('show');
                    });
               $('#add_faculty').click(function(){

                      load_department_list(); 
                       $("#facultyModal").modal('show');
                    $('#button_action').val("Saves");
                    
                    });
               $('#request_book').click(function(){
                      
                    $('#button_action').val("Request");
                     var action = "Request";

                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action},
                        success:function(data){
                          $("#myModalRequest").modal('show');
                          $('#request_no').val(data);
                          

                        }
                      });
                    });
               //Dynamic Select
               $('#department').change(function(){
                      var action = "Course";
                      var val = $('#department').val(); 
                     
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action,val:val},
                        success:function(data){
                          $("#course").html(data);
                         
                          $("#course-year").removeAttr("disabled","disabled");
                        }
                      });
                });
               $('#course').change(function(){
                      var action = "Course Year";
                      var val = $('#course').val(); 
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action,val:val},
                        success:function(data){
                          $("#course-year").html(data);
                          
                        }
                      });
                });
               
                $("#generate").click(function(){
                         var action = "Generate";
                          $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{action:action},
                          success:function(data){
                            $("#passcode").val(data);
                          }
                        });
                });
                $("#type").change(function(){
                         var action = "Type";
                        var type = $('#type').val();

                        if(type== 0){
                          $("#divPasscode").css({"display":"inline"});
                           $("#divPwd").css({"display":"none"});
                          $("#searchname").attr("disabled",true);
                        }else if(type== 1){
                          $("#divPasscode").css({"display":"none"});
                          $("#divPwd").css({"display":"inline"});
                          $("#searchname").attr("disabled",false);
                        }else if(type== 2){
                           $("#divPasscode").css({"display":"inline"});
                            $("#divPwd").css({"display":"none"});
                            $("#searchname").attr("disabled",true);
                        }
                          $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{action:action},
                          success:function(data){
                            $("#passcode").val(data);
                          }
                        });
                });
//           FORM SUBMIT 
               $('#bookform').on('submit', function(event){  
                    event.preventDefault();  
                    // var action=$('#action').val();
                    // var bookNo = $('#book_no').val();  
                    // var category = $('#category').val();  
                    // var bookTitle = $('#book_name').val();  
                    // var author = $('#author').val();     
                    // var publisher = $('#publisher').val();     
                    // var bookCopies = $('#book_copies').val();     
                    // var cp_yr = $('#cp_yr').val();     
                    // var date_added = $('#date_added').val();     
                    // var status = $('#status').val();     
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);
                                    
                                   window.location.reload();
                                   $('#book_form')[0].reset(); 
                              }  
                         })       
               });
               $(document).on('change', '#file', function(){
                      var name = document.getElementById("file").files[0].name;
                      var form_data = new FormData();
                      var action = 'addBook';
                      var ext = name.split('.').pop().toLowerCase();
                      if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                      {
                       alert("Invalid Image File");
                      }
                      var oFReader = new FileReader();
                      oFReader.readAsDataURL(document.getElementById("file").files[0]);
                      var f = document.getElementById("file").files[0];
                      var fsize = f.size||f.fileSize;
                      if(fsize > 2000000)
                      {
                       alert("Image File Size is very big");
                      }
                      else
                      {
                       form_data.append("file", document.getElementById('file').files[0]);
                       
                       $.ajax({
                        url:"core/upload.php",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend:function(){
                         $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        },   
                        success:function(data)
                        {
                         $('#uploaded_image').html(data);
                        }
                       });
                      }
                });
               $(document).on('click', '#remove_button', function(){  
                     if(confirm("Are you sure you want to remove this image?"))  
                     {  

                          
                          var filename = $('#remove_button').data("path");  
                          $.ajax({  
                               url:"core/delete.php",  
                               type:"POST",  
                               data:{filename:filename},  
                               success:function(data){  
                                    if(data != '')  
                                    {  
                                         $('#uploaded_image').html('');
                                         $('#file').val('');
                                         
                                    }  
                               }  
                          });  
                     }  
                     else  
                     {  
                          return false;  
                     }  
                });
               $(document).on('change', '#studentImage', function(){
                      var name = document.getElementById("studentImage").files[0].name;
                      var form_data = new FormData();
                      var action = 'addBook';
                      var ext = name.split('.').pop().toLowerCase();
                      if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                      {
                       alert("Invalid Image File");
                      }
                      var oFReader = new FileReader();
                      oFReader.readAsDataURL(document.getElementById("studentImage").files[0]);
                      var f = document.getElementById("studentImage").files[0];
                      var fsize = f.size||f.fileSize;
                      if(fsize > 2000000)
                      {
                       alert("Image File Size is very big");
                      }
                      else
                      {
                       form_data.append("file", document.getElementById('studentImage').files[0]);
                       
                       $.ajax({
                        url:"core/upload_student_img.php",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend:function(){
                         $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        },   
                        success:function(data)
                        {
                         $('#student_image').html(data);
                        }
                       });
                      }
                });
               $(document).on('click', '#remove_img', function(){  
                     if(confirm("Are you sure you want to remove this image?"))  
                     {  

                          
                          var filename = $('#remove_img').data("path");  
                          $.ajax({  
                               url:"core/delete_studentImg.php",  
                               type:"POST",  
                               data:{filename:filename},  
                               success:function(data){  
                                    if(data != '')  
                                    {  
                                         $('#student_image').html('');
                                         $('#studentImage').val('');
                                         
                                    }  
                               }  
                          });  
                     }  
                     else  
                     {  
                          return false;  
                     }  
                });
               $('#announcementform').on('submit', function(event){  
                    event.preventDefault();      
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#announcement").modal('toggle');
                                   window.location.reload();
                                   $('#announcementform')[0].reset(); 
                              }  
                         })  
               });
               $('#authorform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                    var authorNo = $('#author_no').val();     
                    var authorNo = $('#author_name').val();     
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#author").modal('toggle');
                                   window.location.reload();
                                   $('#authorform')[0].reset(); 
                              }  
                         })  
               });
               $('#catalogueform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                        
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#catalogue").modal('toggle');
                                   window.location.reload();
                                   $('#catalogueform')[0].reset(); 
                              }  
                         })  
               });
               $('#studentform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                    
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                    alert(data); 
                                    $('#student').modal('toggle');
                                   $('#studentform')[0].reset();
                                    load_student_data();
                              }  
                         })  
               });
                $('#submit_form').on('submit', function(e){  
                     e.preventDefault();  
                     $.ajax({  
                          url:"upload.php",  
                          method:"POST",  
                          data:new FormData(this),  
                          contentType:false,  
                          //cache:false,  
                          processData:false,  
                          success:function(data)  
                          {  
                                                        }  
                     })  
                }); 
               $('#issueform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                       
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#issue").modal('toggle');
                                    window.location.reload();
                                   $('#issueform')[0].reset(); 
                              }  
                         })  
               });
               $('#userform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                        
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#users").modal('toggle');
                                   window.location.reload();
                                   $('#userform')[0].reset(); 
                              }  
                         })  
               });
               $('#requestform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                        
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#myModalRequest").modal('toggle');
                                   window.location.reload();
                                   $('#requestform')[0].reset(); 
                              }  
                         })  
               });
               $('#facultyform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                        
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#facultyModal").modal('toggle');
                                   window.location.reload();
                                   $('#facultyform')[0].reset(); 
                              }  
                         })  
               });
               $('#feedback').on('submit', function(event){  
                    event.preventDefault();     
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                
                                   window.location.reload();
                                   $('#form-placeholders').css("display","none"); 
                                    $('#feedback')[0].reset();  
                              }  
                         })  
               });
               //view
               $(document).on('click','.view', function(){
                      var bookID = $(this).attr("id");
                      $('#button_action').css("display","none");
                      $(".form-control").attr("readonly",true);
                      $("#file").css("display","none");;
                      $(".image").html('Image');
                      var action = "Fetch Book Data";
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{bookID:bookID,action:action},
                        dataType:"json",
                        success:function(data){

                           $("#book").modal('show');
                           $("#book_no").val(data.book_no);                          
                           $("#book_id").val(data.book_id);                          
                           $("#book_name").val(data.book_title);                          
                           $("#category").selectpicker('val',data.category_id);                          
                           $("#category").selectpicker().attr("disabled",true);                          
                           $("#author").val(data.author);                          
                           $("#book_copies").val(data.book_copies);                          
                           $("#publisher").val(data.book_pub);                          
                           $("#isbn").val(data.isbn);                          
                           $("#cp_yr").val(data.copyright_year);                          
                           $("#date_rcv").val(data.date_receive);                          
                           $("#status").selectpicker('val',data.status);                          
                           $("#status").selectpicker().attr("disabled",true);                          
                           $("#uploaded_image").html(data.img);                          
                           $("#location").val(data.location);                          
                            $('#action').val("Edit");
                        }
                      });
                    });
               //UPDATE & DELETE
               $(document).on('click','.update', function(){

                      var bookID = $(this).attr("id");
                      $('#button_action').val("Save");
                      // $(".chosen").css("display","none");
                      var action = "Fetch Book Data";
                      // alert(action);
                      // alert(bookID);
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{bookID:bookID,action:action},
                        dataType:"json",
                        success:function(data){
                           $("#book").modal('show');
                           $("#book_no").val(data.book_no);                          
                           $("#book_id").val(data.book_id);                          
                           $("#book_name").val(data.book_title);                          
                           $("#category").selectpicker('val',data.category_id);                           
                           $("#author").val(data.author);                             
                           $("#book_copies").val(data.book_copies);                          
                           $("#publisher").val(data.book_pub);                          
                           $("#isbn").val(data.isbn);                          
                           $("#cp_yr").val(data.copyright_year);                          
                           $("#date_rcv").val(data.date_receive);                          
                           $("#status").selectpicker('val',data.status); 
                           $("#location").val(data.location);
                           $("#uploaded_image").html(data.img);                           
                            $('#action').val("Edit");
                        }
                      });
                    });
                $(document).on('click','.updateannouncement', function(){
                        var announcementID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Announcement Data";
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{announcementID:announcementID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#announcement").modal('show');
                             $("#title").val(data.title);                          
                             $("#content").val(data.content);                                               
                             $("#announcement_id").val(data.id);                                               
                             $("#status").val(data.status);                                               
                             $('#action').val("Edit Announcement");
                          }
                        });
                    });
                    $(document).on('click','.updateauthor', function(){
                        var authorID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Author Data";
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{authorID:authorID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#author").modal('show');
                             $("#author_no").val(data.author_no);                          
                             $("#author_name").val(data.author_name);                                               
                             $("#author_id").val(data.id);                                               
                             $('#action').val("Edit Author");
                          }
                        });
                    });
                    $(document).on('click','.updaterequest', function(){
                        var requestID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Request Data";
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{requestID:requestID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#myModalRequest").modal('show');
                             $("#request_id").val(data.request_id);                          
                             $("#request_no").val(data.request_no);                          
                             $("#book_title").val(data.book_title);                                               
                             $("#author").val(data.author);                                               
                             $("#copies").val(data.copies);                                               
                             $('#action').val("Edit Request");
                          }
                        });
                    });
                    $(document).on('click','.updatecatalogue', function(){
                        
                        var catalogueID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Catalogue Data";
                        
                       
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{catalogueID:catalogueID,action:action},
                          dataType:"json",
                          success:function(data){

                            $("#catalogue").modal('show');
                             $("#catalogue_no").val(data.catalogue_no);                          
                             $("#catalogue_name").val(data.catalogue_name);                                               
                             $("#catalogue_id").val(data.catalogue_id);                                               
                             $('#action').val("Edit Catalogue");
                            
                            

                          }
                        });
                    });

                    $(document).on('click','.updatestudent', function(){
                        $("#student").modal('show');
                        var studentID = $(this).attr("id");
                        $('#button_action').val("Save");
                        
                        var action = "Fetch Student Data";
                       
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{studentID:studentID,action:action},
                          dataType:"json",
                          success:function(data){
                            
                             $("#student_no").val(data.student_id);                                            
                             $("#student_name").val(data.student_name);                                               
                             $("#address").val(data.address);                                               
                             $("#contact").val(data.contact);                                               
                             $("#sex").val(data.gender);                                               
                             $("#department").val(data.dept);                                               
                             $("#course").val(data.course);                                               
                             $("#course-year").val(data.course);                                               
                             $("#passcode").val(data.passcode);                                               
                             $("#type").val(data.type); 
                             if(data.type== 0){
                                  $("#divPasscode").css({"display":"inline"});
                                   $("#divPwd").css({"display":"none"});
                                  $("#searchname").attr("disabled",true);
                                }else if(data.type== 1){
                                  $("#divPasscode").css({"display":"none"});
                                  $("#divPwd").css({"display":"inline"});
                                  $("#searchname").attr("disabled",false);
                                }else if(data.type== 2){
                                   $("#divPasscode").css({"display":"inline"});
                                    $("#divPwd").css({"display":"none"});
                                    $("#searchname").attr("disabled",true);
                                }                                              
                             $('#action').val("Edit Student");
                             var action = "Course";
                            var val = $('#department').val(); 
                           
                                $.ajax({
                                  url:"core/action.php",
                                  method:"POST",
                                  data:{action:action,val:val},
                                  success:function(data){
                                     $("#course").val(data.course);    
                                    $("#course-year").removeAttr("disabled","disabled");
                                  }
                                });
                          }
                        });
                    });
                    // $(document).on('click','.updatecatalogue', function(){
                        
                    //     var catalogueID = $(this).attr("id");
                    //     $('#button_action').val("Save");
                    //     var action = "Fetch Catalogue Data";
                        
                       
                    //     $.ajax({
                    //       url:"core/action.php",
                    //       method:"POST",
                    //       data:{catalogueID:catalogueID,action:action},
                    //       dataType:"json",
                    //       success:function(data){

                    //         $("#catalogue").modal('show');
                    //          $("#catalogue_no").val(data.catalogue_no);                          
                    //          $("#catalogue_name").val(data.catalogue_name);                                               
                    //          $("#catalogue_id").val(data.catalogue_id);                                               
                    //          $('#action').val("Edit Catalogue");
                            
                            

                    //       }
                    //     });
                    // });
                    $(document).on('click','.viewRequest', function(){
                        var requestID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Request Data";
                        
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{requestID:requestID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#requestModal").modal('show');
                             $("#request_id").val(data.request_id);                          
                             $("#request_no").val(data.request_no);                          
                             $("#request_by").val(data.request_by);                          
                             $("#date_request").val(data.date_requested);                          
                             $("#book_title").val(data.book_title);                                               
                             $("#author").val(data.author);                                               
                             $("#copies").val(data.copies);                                               
                             $("#status").val(data.copies);                                               
                             $('#action').val("Edit Request");
                             $("#request_id").attr("readonly","true");                          
                             $("#request_no").attr("readonly","true");                          
                             $("#request_by").attr("readonly","true");                          
                             $("#date_request").attr("readonly","true");                          
                             $("#book_title").attr("readonly","true");                                               
                             $("#author").attr("readonly","true");                                               
                             $("#copies").attr("readonly","true");                                               
                             $("#status").attr("readonly","true");
                             $("#submit").css("display","none");
                          }
                        });
                    });
                    $(document).on('click','.approveRequest', function(){
                        var requestID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Request Data";
                        
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{requestID:requestID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#requestModal").modal('show');
                             $("#request_id").val(data.request_id);                          
                             $("#request_no").val(data.request_no);                          
                             $("#request_by").val(data.request_by);                          
                             $("#date_request").val(data.date_requested);                          
                             $("#book_title").val(data.book_title);                                               
                             $("#author").val(data.author);                                               
                             $("#copies").val(data.copies);                                               
                             $("#status").val(data.status);                                               
                             $('#action').val("Edit Request");
                             $("#request_id").attr("readonly","true");                          
                             $("#request_no").attr("readonly","true");                          
                             $("#request_by").attr("readonly","true");                          
                             $("#date_request").attr("readonly","true");                          
                             $("#book_title").attr("readonly","true");                                               
                             $("#author").attr("readonly","true");                                               
                             $("#copies").attr("readonly","true");                                               
                             
                            
                          }
                        });
                    });
               // Delete
                    $(document).on('click','.delete', function(){
                      var book_id = $(this).attr("id");

                      var action = "Delete Book";
                      if(confirm("Are you sure you want to delete?") == true){
                      
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{book_id:book_id,action:action},
                          success:function(data){
                            
                            alert(data);
                            window.location.reload();
                            }
                        });
                      } else
                          {
                           return false;
                          }
                    });
                    $(document).on('click','.deleteauthor', function(){
                      var author_id = $(this).attr("id");

                      var action = "Delete Author";
                      if(confirm("Are you sure you want to delete?") == true){
                      
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{author_id:author_id,action:action},
                          success:function(data){
                            
                            alert(data);
                            window.location.reload();
                            }
                        });
                      } else
                          {
                           return false;
                          }
                    });
                    $(document).on('click','.deletecatalogue', function(){
                      var catalogue_id = $(this).attr("id");

                      var action = "Delete Catalogue";
                      if(confirm("Are you sure you want to delete?") == true){
                      
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{catalogue_id:catalogue_id,action:action},
                          success:function(data){
                            
                            alert(data);
                            window.location.reload();
                            }
                        });
                      } else
                          {
                           return false;
                          }
                    });
               function load_book_id(){
               
                   var action = 'BookNo';
                   
                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                           success:function(data)
                           {
                             $('#bookID').html(data);
                            
                           }
                        }); 
                  }
                  $(document).on('change','#studentName',function(){
                     var studentID = $(this).val();
                     var action = "Fetch Student Data";
                      
                          $.ajax({
                              url:"core/action.php",
                              method:"POST",
                              data:{studentID:studentID,action:action},
                              dataType:"json",
                              success:function(data){                                                                                 
                                 $("#contactNumber").val(data.contact); 
                              }
                         }); 
                  }); 
                  
                    $(document).on('click', '#add', function(){
                      var now = new Date();
                          var month = (now.getMonth() + 1);               
                          var day = now.getDate();
                          if(month < 10) 
                              month = "0" + month;
                          if(day < 10) 
                              day = "0" + day;
                          var today = now.getFullYear() + '-' + month + '-' + day;
                              now.setDate(now.getDate()+6);
                            var end_date=now.getFullYear() + "-" + month + "-" + "0" + now.getDate();
                           
                          $('#date_issued').val(today);
                          $('#date_returned').val(end_date);
                      // $(document).on('change','#bookID',function(){
                      //       var bookID = $(this).val();
                      //         var action = 'Fetch Data';
                              
                      //       $.ajax({
                      //          url:"core/action.php",
                      //          method:"POST",
                      //          data:{bookID:bookID,action:action},
                      //          dataType:"json",
                      //          success:function(data)
                      //          {

                      //            $('#bookName').val(data.book_title);
                                
                      //          }
                      //       }); 
                      //   });
                         
                          
                          var html = '';

                          html += "<tr>";
                          html += "<td width='19%''><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td>";
                          html += "<td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' required /></td>";
                          html += "<td width='7%'><input type='number' min='1' name='copies[]' class='form-control copies' required /></td>";
                          html += "<td width='14%'><input type='date' name='date_issued[]' id='date_issued' value='"+today+"' class='form-control date_issued' required  /></td>";
                          html += "<td  width='14%'><input type='date' name='date_returned[]' id='date_returned' value='"+end_date+"' class='form-control date_returned' required  /></td>";
                          html += '<td width="16%"><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                          $('#issue_table').append(html);
                     });
                    $(document).on('click', '.remove', function(){
                        $(this).closest('tr').remove();
                     });

                      $('#issuedBook').on('submit', function(event){
                          event.preventDefault();
                          var error = '';

                          $('.bookID').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child's Name at "+count+" Row</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                          
                          $('.bookTitle').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child's Age</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                          $('.copies').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child Gender</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                         $('.date_issued').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child Gender</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                         $('.date_returned').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child Gender</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                          var form_data = $(this).serialize();
                         
                           $.ajax({
                            url:"core/action.php",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                              alert(data);
                              window.location.href='issuebook.php';
                            }
                           });
                  });

  
          $('#contactNumber').prop('disabled',true)
          $('#memName').prop('disabled',true)

          $('#studentName').change(function(){
                $id =  $('#studentName').val()
                $('#contactNumber').val('')
                $('#memName').val('')
                $('#issueID').val('')
                $('#issue_table tr').remove();
                      
                $action = "IssueList";
                
                if($id != ""){
                var dats = new FormData();
                dats.append('id', $id);
                dats.append('action', $action);

                $.ajax({
                  url:"core/action.php",
                  method:"POST",
                  data:dats,
                  contentType:false,  
                  processData:false,
                  success:function(data)
                    {
                      //alert(data)
                      //*
                      $dtsp = data.split('|')
                      $('#issue_table tr').remove();
                      $('#issue_table').html($dtsp[0])
                      $('#contactNumber').val($dtsp[2])
                      $('#memName').val($dtsp[1])
                      $('#issueID').val($dtsp[3])
                      //*/
                    }
                });
                }
                              
            });

            $(document).on('change', '.bookID', function(){

                var bk_no = $(this).closest('tr').find('input[name="bookID[]"]').val()
                var ans=locBOOK(bk_no);
                alert(ans)
                $(this).closest('tr').find('input[name="bookTitle[]"]').val(bk_no)
                     
            });
            function locBOOK(bk_no){
                var action = 'BookSL'
                var ans = ''
                var dats = new FormData();
                    dats.append('bk_no', bk_no)
                    dats.append('action', action)
                      $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:dats,
                          contentType:false,  
                          processData:false,
                          success:function(data)
                            {
                                ans = data
                            }
                      });
                      alert(ans)
                      return ans;


            }


            $('#add').click(function(){
                          var now = new Date();
                          var month = (now.getMonth() + 1);               
                          var day = now.getDate();
                          if(month < 10) 
                              month = "0" + month;
                          if(day < 10) 
                              day = "0" + day;

                          var today = now.getFullYear() + '-' + month + '-' + day;
                              now.setDate(now.getDate()+6);
                          
                          var end_date=now.getFullYear() + "-" + month + "-" + now.getDate();
                          var html = '';

                          html += "<tr> <td width='19%''><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td> <td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' required /></td> <td width='7%'><input type='number' min='1' value ='1' name='copies[]' class='form-control copies' required /></td> <td width='14%'><input type='date' name='date_issued[]' id='date_issued' value='"+today+"' class='form-control date_issued' required  /></td> <td  width='14%'><input type='date' name='date_returned[]' id='date_returned' value='"+end_date+"' class='form-control date_returned' required  /></td> <td width='16%'><button type='button' name='remove' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-minus'></span></button> <input type='hidden' name='rs_id[]' id='rs_id' value='0'> </td> </tr>"
                          
                          $('#issue_table').append(html);
            });  
                    $(document).on('click', '.remove', function(){
                        var rsid = $(this).closest('tr').find('input[name="rs_id[]"]').val()
                        var action = 'ReserveDel'
                        var bk_no = $('#issueID').val()
                        
                        if(rsid=="0")
                          $(this).closest('tr').remove();
                        else{
                          $(this).closest('tr').remove();
                          var dats = new FormData();
                          dats.append('id', rsid)
                          dats.append('bk', bk_no)
                          dats.append('action', action)
                           $.ajax({
                                url:"core/action.php",
                                method:"POST",
                                data:dats,
                                contentType:false,  
                                processData:false,
                                success:function(data)
                                {
                                    
                                }
                            });
                        }
                        
                     });


                      $("#issuedBook").on('submit', function(event){
                         event.preventDefault();
                          var error = '';

                          $('.bookID').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child's Name at "+count+" Row</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                          
                          $('.bookTitle').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child's Age</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                          $('.copies').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child Gender</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                         $('.date_issued').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child Gender</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                         $('.date_returned').each(function(){
                           var count = 1;
                           if($(this).val() == '')
                           {
                            error += "<p>Enter Child Gender</p>";
                            return false;
                           }
                           count = count + 1;
                          });
                          var form_data = $(this).serialize();
                          alert(form_data);
                          /*
                           $.ajax({
                            url:"core/action.php",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                              alert(data);
                              window.location.href='issuebook.php';
                            }
                           });
                           //*/
                           
                  });

//Log-in function
//------------------------------------------------------------------------------------------
//Tap-in function
                    $('#tp_id').focus();
                    $('#tp_id').on('change', function(){
                      var user = $("#tp_id").val();
                      var action = 'Tapin'

                      var dats = new FormData();
                      dats.append('action', action);
                      dats.append('user',user);
                      
                      $.ajax({
                              url:"core/action.php",
                              method:"POST",
                              data:dats,
                              contentType:false,  
                              processData:false,
                              success:function(data)
                              {
                                  $('#output').html(data)
                                  $('#tp_id').val('')
                      
                              }
                      })
                    });
//Log-in------------------------------------------------------------------------------------
                    $('#username').focus()
                    $('#username').on('focus', function(){
                        voice("Please enter your student ID number then press tab.")
                    });
                    $('#password').on('focus', function(){
                        voice("Please enter your passcode Number then press enter.")
                    });

                    $('#log_in').on('submit', function(event){
                        
                        event.preventDefault();
                        var user = $("#username").val();
                        var pass = $("#password").val();
                        var action = 'Login'

                        var dat = new FormData();
                        dat.append('action', action);
                        dat.append('user',user);
                        dat.append('pass',pass);
              

                        $.ajax({
                              url:"core/action.php",
                              method:"POST",
                              data:dat,
                              contentType:false,  
                              processData:false,
                              success:function(data)
                              {
                                //alert(data);
                                var d = data.split(',');
                                  //*
                                  if(d[0] == 0 || d[0] == 2 || d[0] == 3 || d[0] == 4){
                                    voice("Log in verified. Access Approve","log",'login_parse.php?id='+d[1]+'&type='+d[0])
                                  }else if(d[0] == 5){
                                    voice("Log in verified. Access Denied, Your ID is no longer active. Please proceed to your librerian on duty for futher info.")
                                  }else{
                                    voice("Log in verified. Access Denied, Wrong passcode or ID.")
                                  }
                                  
                                  //*/  
                              }
                        });

                    });

                    function voice(text,proc,data){
                        var ssy = window.speechSynthesis
                        var utt = new SpeechSynthesisUtterance();

                        if(ssy.speaking){
                            ssy.cancel()
                            if (Timeout !== null)
                            clearTimeout(Timeout);

                            Timeout = setTimeout(function(){ voice(text,proc,data); }, 250);
                        }else{
                            utt.text = text
                            ssy.speak(utt);
                        }
                        utt.onend = function(e){
                            if(proc=="log"){
                              $(location).attr('href', data);
                              return false;
                            }
                        }

                    }
                    $('#username').on('keypress', function(data){
                        var d 
                        var srch_name = $("#username").val();
                        if(data.keyCode == 13){
                            //d= 'Enter'
                        }else if(data.keyCode==8){
                            if($('#username').val()!=''){
                                d= 'Backspace'
                            }
                        }else if(data.which==32){
                            //d="Space"
                        voice(srch_name);
                        }else if(data.which==45){
                            d="Dash"
                        }else if(data.which==91){
                            d="Left Bracket"
                        }else if(data.which==93){
                            d="Right Bracket"
                        }else if(data.which==58){
                            d="Colon"
                        }else if(data.which==59){
                            d="Semicolon"
                        }else if(data.which==39){
                            d="Apostropy"
                        }else if(data.which==34){
                            d="Double Apostropy"
                        }else if(data.which==44){
                            d="Coma"
                        }else if(data.which==63){
                            d="Question Mark"
                        }else if(data.which==60){
                            d="Less Than"
                        }else if(data.which==46){
                            d="Period"
                        }else {
                            d = String.fromCharCode(data.keyCode || data.which);
                        }
                        if(d!=undefined){
                        voice(d,"not");
                        }                        
                    });
                    $('#password').on('keypress', function(data){
                        var d 
                        var srch_name = $("#password").val();
                        if(data.keyCode == 13){
                            //d= 'Enter'
                        }else if(data.keyCode==8){
                            if($('#password').val()!=''){
                                d= 'Backspace'
                            }
                        }else if(data.which==32){
                            //d="Space"
                        voice(srch_name);
                        }else if(data.which==45){
                            d="Dash"
                        }else if(data.which==91){
                            d="Left Bracket"
                        }else if(data.which==93){
                            d="Right Bracket"
                        }else if(data.which==58){
                            d="Colon"
                        }else if(data.which==59){
                            d="Semicolon"
                        }else if(data.which==39){
                            d="Apostropy"
                        }else if(data.which==34){
                            d="Double Apostropy"
                        }else if(data.which==44){
                            d="Coma"
                        }else if(data.which==63){
                            d="Question Mark"
                        }else if(data.which==60){
                            d="Less Than"
                        }else if(data.which==46){
                            d="Period"
                        }else {
                            d = String.fromCharCode(data.keyCode || data.which);
                        }
                        if(d!=undefined){
                        voice(d);
                        }                        
                    });
//--------------------------------------------------------------------------------------
//Message Data
          function messageData(mess,cp_no){
              //alert($mess)
              //*
              var dats = new FormData();
             
              dats.append('nos', cp_no);
              dats.append('mess', mess);

              $.ajax({
                url:"core/sms.php",
                method:"POST",
                data:dats,
                contentType:false,  
                processData:false,
                success:function(data)
                  {
                      alert(data)
                    
                  }
              });
          }

          $("#data").on('submit', function(e){
              e.preventDefault();
              $no = $("#cp_no").val()
              $mess = $("#message").val()
              

              //alert($mess)
              //*
              var dats = new FormData();
             
              dats.append('nos', $no);
              dats.append('mess', $mess);

              $.ajax({
                url:"core/sms.php",
                method:"POST",
                data:dats,
                contentType:false,  
                processData:false,
                success:function(data)
                  {
                    
                      alert(data)
                   
                  }
              });
              //*/
          });


          ("#data").on('submit', function(e){
              e.preventDefault();
              $no = $("#cp_no").val()
              $mess = $("#message").val()
              

              //alert($mess)
              //*
              var dats = new FormData();
             
              dats.append('nos', $no);
              dats.append('mess', $mess);

              $.ajax({
                url:"core/sms.php",
                method:"POST",
                data:dats,
                contentType:false,  
                processData:false,
                success:function(data)
                  {
                    alert(data)
                    /*
                    if(data == ""){
                      alert("Server Not Found")
                    }else if(data==0){
                      alert('Message Sent')
                    }else{
                      alert(data)
                    }
                    */

                  }
              });
              //*/
          });
});  