 $(document).ready(function(){  
  //FORM ATTRIBUTES
$('#collapseExample').BootSideMenu({
            side: "left"
    });

          load_author_data() 
          load_book_data();
           load_student_data();
           load_user_data();
           load_borrow_data();
           load_category_data();


           $('#action').val("Insert");  
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



           // FORM SUBMIT 
           $('#user_form').on('submit', function(event){  
                event.preventDefault();  
                var firstName = $('#first_name').val();  
                var lastName = $('#last_name').val();  
                var extension = $('#user_image').val().split('.').pop().toLowerCase();  
                if(extension != '')  
                {  
                     if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                     {  
                          alert("Invalid Image File");  
                          $('#user_image').val('');  
                          return false;  
                     }  
                }  
                if(firstName != '' && lastName != '')  
                {  
                     $.ajax({  
                          url:"core/action.php",  
                          method:"POST",  
                          data:new FormData(this),  
                          contentType:false,  
                          processData:false,  
                          success:function(data)  
                          {  
                               alert(data);  
                               $('#user_form')[0].reset();  
                               load_data();  
                          }  
                     })  
                }  
                else  
                {  
                     alert("Both Fields are Required");  
                }  
           });  
      });  