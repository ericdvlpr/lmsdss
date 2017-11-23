$(document).ready(function(){  
    $(".chosen-select").chosen({ width:"100%" });
    $('.modal').on("hidden.bs.modal", function(){
         $("input").val("");
         
      });
      //Load Table Data
              load_author_data() 
              load_book_data();
               load_student_data();
               load_user_data();
               load_borrow_data();
               load_category_data();
      //FORM ATTRIBUTES

            $('#action').val("Insert");  
     //Load Functions
          
               function load_user_data()  
               {  
                    var action = "Load All"; 

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
                function load_borrow_data()  
               {  
                    var action = "Borrow";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#borrowed_table').html(data);
                               $('#borrowed').DataTable();   
                         }  
                    });  
               }
                function load_category_data()  
               {  
                    var action = "Category";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#category_table').html(data);  
                         }  
                    });  
               }  
                function load_catalogue_data()  
               {  
                    var action = "Category";  
                    $.ajax({  
                         url:"core/action.php",  
                         method:"POST",  
                         data:{action:action},  
                         success:function(data)  
                         {  
                              $('#catalogue_table').html(data);  
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
               //Load unique number
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
                          $("#exampleModal").modal('show');
                          $('#book_no').val(data);
                          

                        }
                      });
                    });


               // FORM SUBMIT 
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
                          $(".chosenn").css("display","inline");
                           $("#book_no").val(data.book_no);                          
                           $("#book_name").val(data.book_title);                          
                           $("#category").val(data.category_id);                          
                           $("#author").val(data.author);                          
                           $("#book_copies").val(data.book_copies);                          
                           $("#publisher").val(data.book_pub);                          
                           $("#isbn").val(data.isbn);                          
                           $("#cp_yr").val(data.copyright_year);                          
                           $("#date_rcv").val(data.date_receive);                          
                           $("#status").val(data.status);                          
                          
                          $('#action').val("Edit");
                          
                          

                        }
                      });
                    });
                    $(document).on('click','.delete', function(){
                      var res_id = $(this).attr("id");

                      var action = "Delete";
                      if(confirm("Are you sure you want to delete?") == true){
                      
                        // $.ajax({
                        //   url:"core/action.php",
                        //   method:"POST",
                        //   data:{res_id:res_id,action:action},
                        //   success:function(data){
                            
                        //     alert(data);
                        //     window.location.reload();
                        //     }
                        // });
                      } else
                          {
                           return false;
                          }
                    })
});  