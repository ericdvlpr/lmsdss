var Timeout=null;
var mtmess = [];
var daycnt = 0
$(document).ready(function(){
        // $.datepicker.setDefaults({
        //         dateFormat: 'yy-mm-dd'
        //    });
        //    $(function(){
        //         $("#from_date").datepicker();
        //         $("#to_date").datepicker();
        //    });
       $("input").attr("autocomplete","off");
        $('.modal').on("hidden.bs.modal", function(){
          $('.form-horizontal')[0].reset();
         $("input").val("");
         $("select").val("");
         window.location.reload();
      });
          //Timepicker
   $('input#run_time').inputmask(
        "hh:mm:ss", {
        placeholder: "HH:MM:SS",
        insertMode: false,
        showMaskOnHover: false,
        hourFormat: 12
      }
      );
      //Load Table Data
              load_faculty_request_data();
              load_faculty_refer();
              load_borrow_faculty();
              load_audio_data();
              load_author_data();
              load_periodical_data();
              load_book_data();
               load_student_data();
               load_user_data();
               load_borrow_data();
               load_iss_sel_list();
               load_reseve_data();
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
                load_user_logs();
                load_announcement();
                load_message_info();
                load_books_total();
                load_student_total();
                load_borrowed_books_total();
                load_return_books_total();
                load_maintenace();
                load_user_profile();
                load_student_profile();
                load_faculty_profile();
      //Load Report
          $('#filter_books').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var status = $('#status').val();
                var action = "bookReport";

                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date,action:action},
                          success:function(data)
                          {

                               $('#book_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                               $('.books').attr('id','div1');
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
                               $('#reportOption').removeAttr("disabled");
                               $('.books').attr('id','div1');
                          }
                     });
                }
          });
          $('#filter_periodical').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var status = $('#status').val();
                var action = "periodicalReport";

                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date,action:action},
                          success:function(data)
                          {

                               $('#periodical_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                               $('.periodical').attr('id','div1');

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

                               $('#periodical_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                               $('.periodical').attr('id','div1');
                          }
                     });
                }
          });
          $('#filter_audio').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var status = $('#status').val();
                var action = "AudioReport";

                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date,action:action},
                          success:function(data)
                          {

                               $('#audio_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                                $('.audio').attr('id','div1');
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

                               $('#audio_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                                $('.audio').attr('id','div1');
                          }
                     });
                }
          });
          $('#filter_ref').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var status = $('#status').val();
                var action = "ReferrenceReport";

                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date,action:action},
                          success:function(data)
                          {

                               $('#referrence_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                                 $('.reference').attr('id','div1');
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

                               $('#referrence_report_table').html(data);
                               $('#reportOption').removeAttr("disabled");
                                 $('.reference').attr('id','div1');
                          }
                     });
                }
          });

          $('#filter_student').click(function(){
                // var department = $('#department').val();
                // var course = $('#course').val();
                // var year = $('#course-year').val();
                // var id = $('#stud_id').val();
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var action = "studentReport";

                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date,action:action},
                          success:function(data)
                          {
                               $('#student_report_table').html(data);
                               $('#reportOption').attr("disabled",false);
                                $('.student').attr('id','div1');
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
                               $('.student').attr('id','div1');
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
                            alert(data);
                               $('#issue_report_table').html(data);
                               $('#reportOption').attr("disabled",false);
                               $('.checkout').attr('id','div1');
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
                               $('.checkout').attr('id','div1');
                          }
                     });
                }

          });
          function load_borrow_faculty() {
                    var action = "Facultyborrow";

                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                           $('.bookBorrowed').html(data);

                         }
                    });
               }
         function load_faculty_refer() {
              var action = "Facultyrefer";

              $.ajax({
                   url:"core/action.php",
                   method:"POST",
                   data:{action:action},
                   success:function(data)
                   {
                     $('.bookReferred').html(data);

                   }
              });
         }
          function load_faculty_request_data()
               {
                    var action = "Faculty Request";
                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('#request_faculty_table').html(data);
                              $('#request_faculty').DataTable();
                         }
                    });
               }
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
        function load_books_total() {
                    var action = "Total Books";
                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('.bookCount').html(data);
                         }
                    });
        }
        function load_borrowed_books_total() {
                    var action = "Total Borrow Books";
                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('.bookborrowCount').html(data);
                         }
                    });
        }
        function load_return_books_total() {
                    var action = "Total Return Books";
                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('.bookreturnCount').html(data);
                         }
                    });
        }
        function load_student_total() {
                    var action = "Total Student";
                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('.studentCount').html(data);
                         }
                    });
        }
    //--------------
     //Load Functions
              function load_announcement()
               {
                    var action ="Bulliten";

                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('#announcements ').html(data);

                         }
                    });
               }
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
                              $('#announcement').DataTable({
                                "order": [[ 0, "desc" ]],
                                "columnDefs": [
                                    { "width": "10%", "targets": 3 }
                                  ]
                              });

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
               function load_periodical_data()
               {

                    var action = "Periodical";

                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('#periodical_table').html(data);
                              $('#periodical').DataTable();
                         }
                    });
               }
               function load_audio_data()
               {

                    var action = "Audio";

                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('#audio_visual_table').html(data);
                              $('#audio_visual').DataTable();
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
               //LOAD THIS PROFILE WHEN DETERMINED WHICH LOGIN
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
                              $('#users').DataTable();
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
                              $('#referrence').DataTable();
                         }
                    });
               }
               function load_reseve_data(){
                  var action = "Reserve Book";
                  $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action},
                         success:function(data)
                         {
                              $('#reserve_table').html(data);
                              $('#reserve_list').DataTable();
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
                              $('#bookissue').DataTable();
                         }
                    });
               }
               function load_iss_sel_list(){
                  if($('#studentName').val() !=""){
                    get_iss_list($('#studentName').val())
                  }
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
               function load_course_list(val) {
                    var action = "Course";

                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action,val:val},
                         success:function(data)
                         {
                              $('#course').html(data);
                         }
                    });
               }
               function load_year_list(val) {
                    var action = "Course Year";


                    $.ajax({
                         url:"core/action.php",
                         method:"POST",
                         data:{action:action,val:val},
                         success:function(data)
                         {
                              $('#course-year').html(data);
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
               function load_notification_panel() {
                    var action = "PanelNotification";

                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.panelnotif').html(data.notification);

                       }
                      });
                }

                function load_message_info() {
                    var action = "Message Info"

                    $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       success:function(data)
                       {
                          $dtsp = data.split('|')
                          $('#wmdata').val($dtsp[0])
                          $('#omdata').val($dtsp[1])
                          $('#bmdata').val($dtsp[2])
                       }
                      });
                }
                function load_maintenace(){
                  var action = "Maintenance";

                    $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       success:function(data)
                       {

                          $dstp = data.split('|');
                          $('#numDays').val($dstp[1]);
                          $('#penalty').val($dstp[2]);
                          $('#Quant').val($dstp[3]);

                       }
                      });
                }

                $(document).on('click', '.dropdown-toggle', function(){
                    $('.countRequest').html('');
                    $('.countFeedbck').html('');
                    load_request_notification('yes');
                    load_feedBack_notification('yes');
                 });

                 function load_user_logs() {
                    var action = "userLogs";

                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.usernotif').html(data);

                       }
                      });
                }
                function load_user_profile() {
                    var action = "Profile";

                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       success:function(data)
                       {

                        $('#profile').html(data);

                       }
                      });
                }
                function load_student_profile() {
                    var action = "Student Profile";

                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       success:function(data)
                       {
                         // alert(data);
                        $('#profile').html(data);

                       }
                      });
                }
                function load_faculty_profile() {
                    var action = "Faculty Profile";

                      $.ajax({
                       url:"core/action.php",
                       method:"POST",
                       data:{action:action},
                       success:function(data)
                       {
                        // alert(data);
                        $('#profile').html(data);

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
                      $("#myModalRequest").modal('show');
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{action:action},
                        success:function(data){

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
                        var type = $('#type').val();


                        if(type== 0 || type == 2 ){
                          $("#divPasscode").css({"display":"inline"});
                          $(".passcode").attr("id","passcode");

                           var action = "Generate";
                            $.ajax({
                            url:"core/action.php",
                            method:"POST",
                            data:{action:action},
                            success:function(data){
                              $("#passcode").val(data.trim());
                            }
                          });
                        }else if(type== 1){

                         $(".passcode").val('');
                          $(".passcode").attr("Placeholder","Generate Passcode");

                          $('#passcode').keypress(function(){
                              var code = $(this).val();
                                voice_pre(code,0,null);

                          });


                        }else{
                          $(".passcode").val('');
                        }

                });
//           FORM SUBMIT
               $('#bookform').on('submit', function(event){
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
                      var action = 'addStudent';
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
               $(document).on('change', '#announcementImage', function(){
                      var name = document.getElementById("announcementImage").files[0].name;
                      var form_data = new FormData();
                      var action = 'addAnnouncement';
                      var ext = name.split('.').pop().toLowerCase();
                      if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
                      {
                       alert("Invalid Image File");
                      }
                      var oFReader = new FileReader();
                      oFReader.readAsDataURL(document.getElementById("announcementImage").files[0]);
                      var f = document.getElementById("announcementImage").files[0];
                      var fsize = f.size||f.fileSize;
                      if(fsize > 2000000)
                      {
                       alert("Image File Size is very big");
                      }
                      else
                      {
                       form_data.append("file", document.getElementById('announcementImage').files[0]);

                       $.ajax({
                        url:"core/upload_announcement_img.php",
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
                         $('#announcement_image').html(data);
                        }
                       });
                      }
                });
               $(document).on('click', '#remove_img', function(){
                     if(confirm("Are you sure you want to remove this image?"))
                     {


                          var filename = $('#remove_img').data("path");
                          $.ajax({
                               url:"core/delete_announcementImg.php",
                               type:"POST",
                               data:{filename:filename},
                               success:function(data){
                                    if(data != '')
                                    {
                                         $('#announcement_image').html('');
                                         $('#announcementImage').val('');

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
               $('#referrenceForm').on('submit', function(event){
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
                                    $('#requestModal').modal('toggle');
                                   $('#referrenceForm')[0].reset();
                                    load_request_data();
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
                           $("#author").val(data.author);
                           $("#book_copies").val(data.book_copies);
                           $("#publisher").val(data.book_pub);
                           $("#isbn").val(data.isbn);
                           $("#cp_yr").val(data.copyright_year);
                           $("#date_rcv").val(data.date_receive);
                           $("#status").selectpicker('val',data.status);
                           $("#location").val(data.location);
                           $("#uploaded_image").html(data.img);
                           $("#file").removeAttr("required");
                            $('#action').val("Edit");
                        }
                      });
                    });
                $(document).on('click','.viewPeriodical', function(){
                      var periodID = $(this).attr("id");
                      $('#button_action').css("display","none");
                      $(".form-control").attr("readonly",true);
                      $("#file").css("display","none");;
                      $(".image").html('Image');
                      $(".modal-title").html('View Entry');
                      var action = "Fetch Periodical Data";
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{periodical_id:periodID,action:action},
                        dataType:"json",
                        success:function(data){

                           $("#book").modal('show');
                          $("#periodical_id").val(data.periodical_id);
                          $("#accession_no").val(data.accession_no);
                          $("#article_title").val(data.article_title);
                          $("#period_title").val(data.period_title);
                          $("#publisher").val(data.publisher);
                          $("#volumn_num").val(data.volumn_num);
                          $("#issue_num").val(data.issue_num);
                          $("#total_pages").val(data.total_pages);
                          $("#author").val(data.author);
                          $("#location").val(data.location);
                          $("#uploaded_image").html(data.uploaded_image);
                        }
                      });
                    });
               //UPDATE & DELETE
               $(document).on('click','.updatePeriodical', function(){

                      var periodID = $(this).attr("id");
                      $('#button_action').val("Save");
                      var action = "Fetch Periodical Data";
                      $(".modal-title").html('Update Entry');
                      $("#file").removeAttr("required");
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                         data:{periodical_id:periodID,action:action},
                        dataType:"json",
                        success:function(data){
                           $("#book").modal('show');
                           $("#periodical_id").val(data.periodical_id);
                          $("#accession_no").val(data.accession_no);
                          $("#article_title").val(data.article_title);
                          $("#period_title").val(data.period_title);
                          $("#publisher").val(data.publisher);
                          $("#volumn_num").val(data.volumn_num);
                          $("#issue_num").val(data.issue_num);
                          $("#total_pages").val(data.total_pages);
                          $("#author").val(data.author);
                          $("#location").val(data.location);
                          $("#uploaded_image").html(data.uploaded_image);
                          $('#action').val("Edit Periodical");
                        }
                      });
                    });
               $(document).on('click','.viewAudio', function(){
                      var avID = $(this).attr("id");
                      $('#button_action').css("display","none");
                      $(".form-control").attr("readonly",true);
                      $("#file").css("display","none");;
                      $(".image").html('Image');
                      $(".modal-title").html('View Entry');
                      var action = "Fetch Audio Data";
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                        data:{audio_id:avID,action:action},
                        dataType:"json",
                        success:function(data){
                          $("#book").modal('show');
                          $("#audio_id").val(data.av_id);
                          $("#accession_no").val(data.accession_no);
                          $("#category_title").val(data.category_title);
                          $("#publisher").val(data.publisher);
                          $("#run_time").val(data.run_time);
                          $("#author").val(data.author);
                          $("#copyright").val(data.copyright);
                          $("#location").val(data.location);
                          $("#uploaded_image").html(data.uploaded_image);

                        }
                      });
                    });
               //UPDATE & DELETE
               $(document).on('click','.updateAudio', function(){

                      var avID = $(this).attr("id");
                      $('#button_action').val("Save");
                      var action = "Fetch Audio Data";
                      $(".modal-title").html('Update Entry');
                      $("#file").removeAttr("required");
                      $.ajax({
                        url:"core/action.php",
                        method:"POST",
                         data:{audio_id:avID,action:action},
                        dataType:"json",
                        success:function(data){
                          $("#book").modal('show');
                          $("#audio_id").val(data.av_id);
                          $("#accession_no").val(data.accession_no);
                          $("#category_title").val(data.category_title);
                          $("#publisher").val(data.publisher);
                          $("#run_time").val(data.run_time);
                          $("#author").val(data.author);
                          $("#copyright").val(data.copyright);
                          $("#location").val(data.location);
                          $("#uploaded_image").html(data.uploaded_image);
                          $('#action').val("Edit Audio");
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
                            $("#myModalannouncements").modal('show');
                             $("#title").val(data.title);
                             $("#content").val(data.content);
                             $("#announcement_id").val(data.id);
                             // $("#announcementImage").val(data.image);
                             $("#announcement_image").html(data.image);
                             $("#status").val(data.status);
                             $('#action').val("Edit Announcement");
                          }
                        });
                    });
                    $(document).on('click','.updateFaculty', function(){
                        var facultyID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch Faculty Data";
                        load_department_list();
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{facultyID:facultyID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#facultyModal").modal('show');

                             $("#faculty_id").val(data.id);
                             $("#faculty_no").val(data.faculty_no);
                             $("#faculty_name").val(data.faculty_name);
                             $("#department").val(data.department);

                             $('#action').val("Edit Faculty");
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
                    $(document).on('click','.updateUser', function(){
                        var userID = $(this).attr("id");
                        $('#button_action').val("Save");
                        var action = "Fetch User Data";
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{userID:userID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#user").modal('show');
                             $("#user-name").val(data.username);
                             $("#author_name").val(data.author_name);
                             $("#access").val(data.access);
                             $("#active").val(data.active);
                             $("#library").val(data.department);
                             alert(data.department);
                             $('#action').val("Edit User");
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

                        var studentID = $(this).attr("id");
                        $('#button_action').val("Save");

                        var action = "Fetch Student Data";

                     $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{studentID:studentID,action:action},
                          dataType:"json",
                          success:function(data){
                            $("#student").modal('show');
                            load_course_list(data.dept);
                            load_year_list(data.course);
                             $("#student_no").val(data.student_id);
                             $("#student_id").val(data.id);
                             $("#student_name").val(data.student_name);
                             $("#address").val(data.address);
                             $("#contact").val(data.contact);
                             $("#sex").val(data.gender);
                             $("#department").val(data.dept);
                             $("#type").val(data.type);
                             // $("#studentImage").val(data.image);
                             $("#student_image").html(data.image);
                             $("#file").removeAttr("required");
                             if(data.type== 0 || data.type == 2){
                                  $(".passcode").attr("Placeholder","Generate New Password");
                                  var action = "Generate";
                                      $.ajax({
                                      url:"core/action.php",
                                      method:"POST",
                                      data:{action:action},
                                      success:function(data){
                                        $("#passcode").val(data.trim());
                                      }
                                    });
                                }else if(data.type== 1 || data.type==''){
                                  $(".passcode").attr("Placeholder","Generate New Password");
                                }
                             $('#action').val("Edit Student");

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
                             $("#statusGroup").css("display","none");
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
                             $("#statusGroup").css("display","");
                             $("#status").val(data.status);
                             $('#action').val("approveRequest");
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
                $(document).on('click','.deleteannouncement', function(){
                      var announce_id = $(this).attr("id");

                      var action = "Delete Announcement";
                      if(confirm("Are you sure you want to delete?") == true){

                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:{announce_id:announce_id,action:action},
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
//--------------------------------------------------------------------------------------------
//Issue Book
                  $('#memName').prop('disabled',true)
          function get_iss_list($id){
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
          }


          $('#studentName').change(function(){
                get_iss_list($('#studentName').val())
            });

            $(document).on('change', '.bookID', function(){

                var bk_no = $(this).closest('tr').find('input[name="bookID[]"]').val()
                var ans = $(this).closest('tr').index();
                var action = 'BookSL'

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
                               $dtsp = data.split('|')
                               $('#issue_table tr').eq(ans).find('input[name="bookTitle[]"]').val($dtsp[1])
                            }
                      });
            });
            checkdate()
            function checkdate(){
                      var action = 'Checkdates'
                      var dats = new FormData();
                          dats.append('action', action)
                            $.ajax({
                                url:"core/action.php",
                                method:"POST",
                                data:dats,
                                contentType:false,
                                processData:false,
                                success:function(data)
                                {
                                  daycnt = parseInt(data)
                                }
                            })
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
                              now.setDate(now.getDate()+daycnt);

                          var end_date=now.getFullYear() + "-" + month + "-" + now.getDate();
                          var html = '';

                          html += "<tr> <td width='19%''><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td> <td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required /></td> <td width='7%'><input type='number' min='1' value ='1' name='copies[]' class='form-control copies' required /></td> <td width='14%'><input type='date' name='date_issued[]' id='date_issued' value='"+today+"' class='form-control date_issued' required disabled  /></td> <td  width='14%'><input type='date' name='date_returned[]' id='date_returned' value='"+end_date+"' class='form-control date_returned' required  /></td> <td width='16%'><button type='button' name='remove' class='btn btn-danger btn-sm remove'><span class='glyphicon glyphicon-minus'></span></button> <input type='hidden' name='rs_id[]' id='rs_id' value='0'> </td> </tr>"

                          $('#issue_table').append(html);
            });
                    $(document).on('click', '.remove', function(){
                        var rsid = $(this).closest('tr').find('input[name="rs_id[]"]').val()
                        var ans = $(this).closest('tr').index();
                        var action = 'ReserveDel'
                        var bk_no = $('#issueID').val()

                        if(rsid=="0")
                          $(this).closest('tr').remove();
                        else{
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
                                    $('#issue_table tr').eq(ans).remove()
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

                          //*
                           $.ajax({
                            url:"core/action.php",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                             //alert(data)
                              if(data !='  0  '){

                               var d = data.split('|');
                               messageData(d[0],d[1],d[2]);


                              }
                            }
                           });
                           //*/

                  });

//------------------------------------------------------------------------------------------
//Reserve book
$('#memberName').change(function(){
                $id =  $('#memberName').val()
                $('#contactNum').val('')
                $('#memName').val('')
                $('#returnID').val('')
                $('#return_table tr').remove();

                $action = "ReturnInfo";

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
                      //*

                      if(data !='  0  '){
                      $dtsp = data.split('|')
                      $('#contactNum').val($dtsp[1])
                      $('#memName').val($dtsp[0])
                      $('#returnID').val($dtsp[2])
                      $('#return_table').html($dtsp[3])
                      }
                      //*/
                    }
                });
                }

            });
           $('#adds').click(function(){
              var html = '';
                if($('#returnID').val() != ""){
                  html += "<tr> <td width='19%'><input type='text' name='bookID[]' id='bookID' class='form-control bookID' required /></td><td width='26%'><input type='text' name='bookTitle[]' id='bookTitle' class='form-control bookTitle' readonly = 'true' required /></td><td width='7%'><input type='number' min='1' value ='1' name='copies[]' class='form-control copies' readonly = 'true' required /></td><td width='14%'><input type='text' name='date_issued[]' id='date_issued' value='' class='form-control date_issued' readonly = 'true' required disabled  /></td><td  width='14%'><input type='text' name='date_returned[]' id='date_returned' value='' class='form-control date_returned' readonly = 'true' required  /></td><td width='16%'><button type='button' name='removes' class='btn btn-danger btn-sm removes'><span class='glyphicon glyphicon-minus'></span></button></td></tr>"
                  $('#return_table').append(html);
                }
           });
           $(document).on('change', '.bookID', function(){

                var bk_no = $(this).closest('tr').find('input[name="bookID[]"]').val()
                var is_no = $('#returnID').val()
                var ans = $(this).closest('tr').index();
                var action = 'BookSL2'

                //*
                var dats = new FormData();
                    dats.append('bk_no', bk_no)
                    dats.append('is_no', is_no)
                    dats.append('action', action)
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
                                if(data !='  0  '){
                                $dtsp = data.split('|')
                                $('#return_table tr').eq(ans).find('input[name="bookTitle[]"]').val($dtsp[1])
                                $('#return_table tr').eq(ans).find('input[name="copies[]"]').val($dtsp[2])
                                $('#return_table tr').eq(ans).find('input[name="date_issued[]"]').val($dtsp[3])
                                $('#return_table tr').eq(ans).find('input[name="date_returned[]"]').val($dtsp[4])
                                }
                                //*/

                            }
                      });
                  //*/
            });
           $(document).on('click', '.removes', function(){
              //*
              var bk_no = $(this).closest('tr').find('input[name="bookID[]"]').val()
              var dtitle = $(this).closest('tr').find('input[name="bookTitle[]"]').val()
              var issNo = $('#returnID').val()
              var ans = $(this).closest('tr').index();
              var action='DeleteReverse'

              if((bk_no == "")||(dtitle == "")){

                $(this).closest('tr').remove();
              }else{
                //*
                var dats = new FormData();
                    dats.append('bk_no', bk_no)
                    dats.append('issNo', issNo)
                    dats.append('action', action)
                    $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:dats,
                          contentType:false,
                          processData:false,
                          success:function(data)
                            {
                                $('#return_table tr').eq(ans).remove()
                            }
                          })
                          //*/
              }
              //*/
           });
            $("#returnBook").on('submit', function(event){
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
                          //alert(form_data);
                          //*
                           $.ajax({
                            url:"core/action.php",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                              //alert(data)
                              if(data !='  0  '){
                                var d = data.split('|');
                                messageData(d[0],d[1],d[2]);

                              }
                            }
                           });
                           //*/

                  });

//------------------------------------------------------------------------------------------
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
                    // $('#username').on('focus', function(){
                    //     voice("Please enter your ID number Or Username then press tab.")
                    // });
                    // $('#password').on('focus', function(){
                    //     voice("Please enter your passcode then press enter.")
                    // });

                    $('#log_in').on('submit', function(event){

                        event.preventDefault();
                        var user = $("#username").val();
                        var pass = $("#password").val();
                        var action = 'Login';

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
                                var d = data.split(',');
                                if(d[0] == 0){
                                    $('.alertMsg').html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Login Failed!</strong></div>");
                                  }else{
                                    alert("Login Successful!");
                                    $(location).attr('href', 'login_parse.php?access='+d[0]+'&id='+d[1]);

                                  }

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
                    // $('#username').on('keypress', function(data){
                    //     var d
                    //     var srch_name = $("#username").val();
                    //     if(data.keyCode == 13){
                    //         //d= 'Enter'
                    //     }else if(data.keyCode==8){
                    //         if($('#username').val()!=''){
                    //             d= 'Backspace'
                    //         }
                    //     }else if(data.which==32){
                    //         //d="Space"
                    //     voice(srch_name);
                    //     }else if(data.which==45){
                    //         d="Dash"
                    //     }else if(data.which==91){
                    //         d="Left Bracket"
                    //     }else if(data.which==93){
                    //         d="Right Bracket"
                    //     }else if(data.which==58){
                    //         d="Colon"
                    //     }else if(data.which==59){
                    //         d="Semicolon"
                    //     }else if(data.which==39){
                    //         d="Apostropy"
                    //     }else if(data.which==34){
                    //         d="Double Apostropy"
                    //     }else if(data.which==44){
                    //         d="Coma"
                    //     }else if(data.which==63){
                    //         d="Question Mark"
                    //     }else if(data.which==60){
                    //         d="Less Than"
                    //     }else if(data.which==46){
                    //         d="Period"
                    //     }else {
                    //         d = String.fromCharCode(data.keyCode || data.which);
                    //     }
                    //     if(d!=undefined){
                    //     voice(d,"not");
                    //     }
                    // });
                    // $('#password').on('keypress', function(data){
                    //     var d
                    //     var srch_name = $("#password").val();
                    //     if(data.keyCode == 13){
                    //         //d= 'Enter'
                    //     }else if(data.keyCode==8){
                    //         if($('#password').val()!=''){
                    //             d= 'Backspace'
                    //         }
                    //     }else if(data.which==32){
                    //         //d="Space"
                    //     voice(srch_name);
                    //     }else if(data.which==45){
                    //         d="Dash"
                    //     }else if(data.which==91){
                    //         d="Left Bracket"
                    //     }else if(data.which==93){
                    //         d="Right Bracket"
                    //     }else if(data.which==58){
                    //         d="Colon"
                    //     }else if(data.which==59){
                    //         d="Semicolon"
                    //     }else if(data.which==39){
                    //         d="Apostropy"
                    //     }else if(data.which==34){
                    //         d="Double Apostropy"
                    //     }else if(data.which==44){
                    //         d="Coma"
                    //     }else if(data.which==63){
                    //         d="Question Mark"
                    //     }else if(data.which==60){
                    //         d="Less Than"
                    //     }else if(data.which==46){
                    //         d="Period"
                    //     }else {
                    //         d = String.fromCharCode(data.keyCode || data.which);
                    //     }
                    //     if(d!=undefined){
                    //     voice(d);
                    //     }
                    // });
//--------------------------------------------------------------------------------------
//Message Data
           function messageData(mess,cp_no,alerts){
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
                      $('#mod_data').html(alerts)
                      $('#mod_info').modal('show');

                  }
              });
          }
          $('#br_ok').on('click', function(){
            window.location = 'issuebook.php';
          })

          function MultimessageData(){
              //alert($mess)

              //*

              mess = mtmess[0][0]
              cp_no = mtmess[0][1]
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
                      mtmess.shift()
                      if(mtmess.length>0)
                        setTimeout(MultimessageData, 250)
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


                  }
              });
              //*/
          });
//------------------------------------------------------------------------------------
  timer_over_due()
  function timer_over_due(){
     var action = "Time Over"
     $.ajax({
        url:"core/action.php",
        method:"POST",
        data:{action:action},
        success:function(data)
          {
             // alert(data);
               //*
               if(data!='  0  '){

                  var d1 = data.split('][')

                  for(var td = 1;td<d1.length;td++){
                      var tem = d1[td];
                      mtmess[td-1] = tem.split('|');
                  }

                  setTimeout(MultimessageData,250);
               }
               //*/
          }
      });
  }
  $('#bmb, #bmdata').on('click', function(){
      var action = 'Message Update Select'
      var id = "NWBRBK002"

      var dats = new FormData();

        dats.append('action', action);
        dats.append('id', id);

        $.ajax({
            url:"core/action.php",
            method:"POST",
            data:dats,
            contentType:false,
            processData:false,
            success:function(data)
              {
                  //alert(data)
                  $dtsp = data.split('|')
                  $('#hddata').val($dtsp[1])
                  $('#ftdata').val($dtsp[2])
                  $('#doc_id').val($dtsp[3])
                  $('#MEtitle').html('Borrow Message Edit')
                  $('#messEd').modal('show');

              }
           });
  });
  $('#wmb, #wmdata').on('click', function(){
      var action = 'Message Update Select'
      var id = "BRBKWR001"

      var dats = new FormData();

        dats.append('action', action);
        dats.append('id', id);

        $.ajax({
            url:"core/action.php",
            method:"POST",
            data:dats,
            contentType:false,
            processData:false,
            success:function(data)
              {
                  //alert(data)
                  $dtsp = data.split('|')
                  $('#hddata').val($dtsp[1])
                  $('#ftdata').val($dtsp[2])
                  $('#doc_id').val($dtsp[3])
                  $('#MEtitle').html('Warning Message Edit')
                  $('#messEd').modal('show');

              }
           });
  });
  $('#omb, #omdata').on('click', function(){
      var action = 'Message Update Select'
      var id = "ODBRBK002"

      var dats = new FormData();

        dats.append('action', action);
        dats.append('id', id);

        $.ajax({
            url:"core/action.php",
            method:"POST",
            data:dats,
            contentType:false,
            processData:false,
            success:function(data)
              {
                  //alert(data)
                  $dtsp = data.split('|')
                  $('#hddata').val($dtsp[1])
                  $('#ftdata').val($dtsp[2])
                  $('#doc_id').val($dtsp[3])
                  $('#MEtitle').html('Over Due Message Edit')
                  $('#messEd').modal('show');

              }
           });
  });

  $('#edbtn').on('click',function(){
      $header = $('#hddata').val()
      $footer = $('#ftdata').val()
      $id = $('#doc_id').val()
      $action = "Message Editing"
      var dats = new FormData();

        dats.append('action', $action);
        dats.append('id', $id);
        dats.append('header',$header);
        dats.append('footer',$footer);

        $.ajax({
            url:"core/action.php",
            method:"POST",
            data:dats,
            contentType:false,
            processData:false,
            success:function(data)
              {

                if(data){
                    $('#messEd').modal('toggle');
                    $('#mod_data').html('Message Update Succesful');
                    $('#mod_info').modal('show');
                    load_message_info()
                    setTimeout(autoclose,2000);
              }
            }
        });
  });
  function autoclose(){
     $('#mod_info').modal('toggle');

  }
  $('#compt').on('click', function(){
      $days = $('#numDays').val()
      $pen = $('#penalty').val()
      $qua = $('#Quant').val()
      $action = "Maintenace_Edit";

      var dats = new FormData();

        dats.append('action', $action);
        dats.append('day', $days);
        dats.append('pen',$pen);
        dats.append('qua',$qua);

        $.ajax({
            url:"core/action.php",
            method:"POST",
            data:dats,
            contentType:false,
            processData:false,
            success:function(data)
              {
                if(data){
                  $('#mod_info').modal('show');
                  $('#mod_data').html('Maintenance Update Succesful');
                  load_maintenace();
                  setTimeout(autoclose,2000);
                }
            }
        });

  });
  $('.btn-materials').on('click',function(){
      var value = $(this).attr('id');
      if(value =='book'){
        $('#book_form').css('display','');
        $('#periodical_form').css('display','none');
        $('#audio_form').css('display','none');
      }else if(value =='periodical'){
        $('#periodical_form').css('display','');
         $('#book_form').css('display','none');
          $('#audio_form').css('display','none');
      }else if(value=='audio'){
        $('#audio_form').css('display','');
        $('#periodical_form').css('display','none');
         $('#book_form').css('display','none');
      }
  });
});
