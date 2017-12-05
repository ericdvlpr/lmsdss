$(document).ready(function(){
      $(".chosen-select").chosen({ width:"100%" });
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
               // load_borrow_data();
               load_catalogoue_data();
               load_Issued_data();
               
      //FORM ATTRIBUTES

            $('#action').val("Insert"); 
     
     //Load Functions
          
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
                              $('#users').DataTable();  
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
                function load_Issued_data()  
               {  
                    var action = "Issued";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#bookissue_table').html(data);
                               $('#bookissue').DataTable();   
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

               //   function load_department_list()  
               // {  
               //      var action = "Department";  
               //      $.ajax({  
               //           url:"core/action.php",  
               //           method:"POST",  
               //           data:{action:action},  
               //           success:function(data)  
               //           {  
               //                $('#department').html(data);  
               //           }  
               //      });  
               // }
               function load_course(){
                   var action = "Course";
                            var val = $('#department').val(); 
                            alert(val);
                            // $.ajax({
                            //   url:"core/action.php",
                            //   method:"POST",
                            //   data:{action:action,val:val},
                            //   success:function(data){
                            //     $("#course").html(data);
                            //     $("#course-year").removeAttr("disabled","disabled");
                            //   }
                            // });
               }
               // function load_book_issue(){
               //     var search = $('#search_book_no').val();
               //     var action = 'Fetch Book Data';
                   
               //      $.ajax({
               //           url:"core/action.php",
               //           method:"POST",
               //           data:{bookID:search,action:action},
               //             success:function(data)
               //             {
               //               $('#search_title').val(data.book_title);
                            
               //             }
               //          }); 
               // }  
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
                                        // $('#datalist2').html(data);
                                        // // alert(data);
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
                                        // $('#datalist2').html(data);
                                        // // alert(data);
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
                    $('#action').val("addBook"); 
                    $('#button_action').val("Saves");
                      var action = "vin";
                      var vin = 1;
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action,cvin:vin},
                        success:function(data){
                          $("#author").modal('show');
                          $('#book_no').val(data);
                          

                        }
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
                      // $.ajax({
                      //   url:"core/action.php",
                      //   method:"POST",
                      //   data:{action:action},
                      //   success:function(data){
                          
                      //   }
                      // });
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
                      // load_department_list() 
                      $("#students").modal('show');
                    // $('#button_action').val("Saves");
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
                    $("#generate").click(function(){
                         var action = "Generate";
                          $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{action:action},
                          success:function(data){
                            // alert(data);
                            $("#passcode").val(data);
                          }
                        });
                    });
                });
//                // FORM SUBMIT 
               $('#bookform').on('submit', function(event){  
                    event.preventDefault();  
                    var action=$('#action').val();
                    var bookNo = $('#book_no').val();  
                    var category = $('#category').val();  
                    var bookTitle = $('#book_name').val();  
                    var author = $('#author').val();     
                    var publisher = $('#publisher').val();     
                    var bookCopies = $('#book_copies').val();     
                    var cp_yr = $('#cp_yr').val();     
                    var date_added = $('#date_added').val();     
                    var status = $('#status').val();     
                    $.ajax({  
                              url:"core/action.php",  
                              method:"POST",  
                              data:new FormData(this),  
                              contentType:false,  
                              processData:false,  
                              success:function(data)  
                              {  
                                   alert(data);  
                                   $("#book").modal('toggle');
                                   window.location.reload();
                                   $('#book_form')[0].reset(); 
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
                                   $("#students").modal('toggle');
                                   window.location.reload();
                                   $('#studentform')[0].reset(); 
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
               //UPDATE & DELETE
               $(document).on('click','.update', function(){
                      var bookID = $(this).attr("id");
                      $('#button_action').val("Save");
                      $(".chosen").css("display","none");
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
                           $("#category").val(data.category_id);                          
                           $("#search_author").val(data.author);                          
                           $("#book_copies").val(data.book_copies);                          
                           $("#search_publisher").val(data.book_pub);                          
                           $("#isbn").val(data.isbn);                          
                           $("#cp_yr").val(data.copyright_year);                          
                           $("#date_rcv").val(data.date_receive);                          
                           $("#status").val(data.status);                          
                            $('#action').val("Edit");
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
                        
                        var studentID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Student Data";
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{studentID:studentID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#students").modal('show');
                             $("#student_no").val(data.student_id);                          
                                                  
                             $("#student_name").val(data.student_name);                                               
                             $("#address").val(data.address);                                               
                             $("#contact").val(data.contact);                                               
                             $("#sex").val(data.gender);                                               
                             $("#department").val(data.dept);                                               
                             $("#course").val(data.course);                                               
                             $("#course-year").val(data.course);                                               
                             $("#passcode").val(data.passcode);                                               
                             $("#pwd").val(data.pwd);                                               
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
                   

});  