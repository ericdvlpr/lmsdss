var active = 0;
var tbl = false;
var dat = [];
var dat2;
var tbl_diag = false;
var tbl_res = false;
var sec_sh = false;
var Timeout = null;
var bkn = 0
var rt = 1;
var vl =1;
var voi_ab=false
var tabD = false
var mod2 = false

$(document).ready(function(){

    /*
    $('#collapseExample').BootSideMenu({
            side: "left"
    });
      */
        welcome();
        
        function welcome(){
          $("#sc_table").hide();
          if($("#std_type").val() == "2"){
            voi_ab = true
            voice_pre("Welcome "+$("#std_name2").val()+" to LMS. To search, Just type in your title, or related to the title of the your book and press enter. To log out please press the escape button. To change volume or speede please press the shift button.")
            $('#searchname').focus();
          }else{
            $('#mod_info').modal('show');
            $('#mod_title').html('Welcome to LMS');
            $('#mod_data').html("Welcome "+$("#std_name2").val()+" to LMS. To search, Just type in your title, or related to the title of the your book and press enter. To log out please press the escape button or the upper right corner of this screen.")
            $('#searchname').prop('disabled',true)
             mod2 =true
             setTimeout(autoclose, 5000);
          }

          
        }  
        function reserve(id,student){
      
          var action = 'Book_Reserve' 
          var dat5 = new FormData()
          dat5.append('action', action)
          dat5.append('id', id)
          dat5.append('std', student)
          
          $.ajax({
                url:"core/action.php",
                method:"POST",
                data:dat5,
                contentType:false,  
                processData:false,
                success:function(data)
                {
                  //alert(data);
                  //*
                  if(data){
                    voice_pre("Your Book is now been reserved. Please proceed to the Librarian on duty to collect your book.",2,null);
                    $('#modal_select').modal('toggle')
                  } 
                  //*/
                }
          });

        }
        function select_book(id){
              var action = "Book_select";
              var memid = $('#std_name').val()
              var dat3 = new FormData()
              dat3.append('action', action);
              dat3.append('id',id);
              dat3.append('mem',memid);
              

              $.ajax({
                url:"core/action.php",
                method:"POST",
                data:dat3,
                contentType:false,  
                processData:false,
                success:function(data)
                {
                  //alert(data)
                  //*
                  var plt2 = data.split('|')
                  
                  $('#modal_select').modal('show')
                  
                  $('#book_title').html(plt2[3])
                  $('#book_content').html(plt2[0]);
                  
                  if(plt2[4] != 0){
                    
                    $('#row1hid').show()
                    $('#row2hid').hide()
                  }else{
                    $('#row2hid').show()
                    $('#row1hid').hide()
                    $('#rowdata').html(plt2[5])
                  }

                  tbl_res = plt2[2];
                  voice_pre(plt2[1],0,null);
                  $('#searchname').prop('disabled',true)
                  //*/
                }  
                          
              });
        }


        function voice_pre(text,tb,td){
              if(voi_ab){
              
              var ssy = window.speechSynthesis
              var utt = new SpeechSynthesisUtterance();

              if(ssy.speaking){
                  ssy.cancel()
                  if (Timeout !== null)
                      clearTimeout(Timeout);

                  Timeout = setTimeout(function(){ voice_pre(text,tb,td); }, 250);
              }else{
              utt.text = text
              utt.rate = rt
              utt.volume = vl;
              ssy.speak(utt);
                if(tb==2){
                  $('#mod_info').modal('show');
                  $('#mod_title').html('Reserved')
                  $('#mod_data').html(text);
                  
                }
              }

              utt.onend = function(e){
                if(tb==1){
                  $('#sc_table').show()
                  $('#search_table').html(td);
                  
                  if(!tabD){
                    $('#sc_table').dataTable({"pageLength": 1000, "lengthChange": false, "bFilter": false})
                    
                    tabD=true
                  }
                  voice_pre("Please use up and down buttons to navigate.",0,null);
                }else if(tb==2){
                  tbl_diag = false;
                  tbl_res = false;
                  $('#mod_info').modal('toggle');
                  $('#searchname').prop('disabled',false)
                  $('#searchname').blur();
              
                }else if(tb==3){
                 logout(); 
                }
              }
            }else{
              if(tb==1){
                  $('#sc_table').show()
                  $('#search_table').html(td);
                  if(!tabD){
                    $('#sc_table').dataTable({"pageLength": 1000, "lengthChange": false, "bFilter": false})
                    tabD=true
                  }
                }else if(tb==2){
                  $('#mod_info').modal('show');
                  $('#mod_title').html('Reserved')
                  $('#mod_data').html(text);
                  mod2 =true
                  $('#searchname').prop('disabled',true)
                  tbl_diag = false;
                  tbl_res = false;
                  setTimeout(autoclose, 2000); 
                }else if(tb==3){
                   setTimeout(logout, 3000)
                }
            }

        }

    function autoclose(){
      
      if(mod2){
        $('#mod_info').modal('toggle');
         $('#searchname').prop('disabled',false)
         $('#searchname').focus();
         mod2 = false
      }
    }
    function logout(){
         $('#mod_info').modal('toggle');
         $(location).attr('href','logout_parse.php');
         return false;
    }
    function reCalculate(e){
        var rows = $('#sc_table tr').length;
              
        if (e.keyCode == 38) { // move up
           active--;
        }
        if (e.keyCode == 40) { // move down
            active++    
        }
        if((active<=rows-1)&&(active>=0)){
          rePosition();
        }else if(active<0){
          active++
        }else if(active>rows-1){
          active--
        }
        //alert(e.keyCode)
        //alert(active)
    }
    function rePosition(){
        if(active>0){
          $('.active').removeClass('active');
          $('#sc_table tr').eq(active).addClass('active');

          var aut = ''
          var dat4 = dat[active-1][2].split(',')
          if(dat4.length>1){
            for(var i=0;i<dat4.length;i++){
              if(i == (dat4.length-1)){
                aut += ' and' + dat4[i];
              }else if(i == (dat4.length-2)){
                aut += dat4[i]; + ' '
              }else {
                aut += dat4[i] + ', ';
              }
            }
          }else{
            aut = dat[active-1][2]
          }


          voice_pre(dat[active-1][1] + ' by ' + aut,0,null);
          //*/

          //$('#searchname').prop('disabled',true)
          $('#searchname').blur();
          scrollInView();

        }else{
          $('.active').removeClass('active');
          
          //$('#searchname').prop('disabled',false)
          $('#searchname').focus();

          scrollInView();
        }
    }

    function scrollInView(){
        var target = $('#sc_table tr :eq('+active+')');
        if (target.length){
            var top = target.offset().top;
              $('html,body').stop().animate({scrollTop: top-100}, 400);
            
            return false;
        }
        
    }
   $(document).on('click', function(){
      if(mod2){
         $('#searchname').prop('disabled',false)
         $('#searchname').focus();
         mod2 = false
<<<<<<< HEAD
      }else if(tbl_diag){
=======
      }else if(tbl_diag || tbl_res){
>>>>>>> origin/Francis
        tbl_diag = false;
        tbl_res = false
        $('#searchname').prop('disabled',false)
        $('#searchname').blur();
      }
  })
   $('#No').on('click', function(){
      if(tbl_diag){
        tbl_diag = false;
        $('#modal_select').modal('toggle')
        $('#searchname').prop('disabled',false)
        $('#searchname').blur();
      }
    });
    $('#Yes').on('click', function(){
        reserve(dat[active-1][0], $('#std_name').val());
    })

    $('#sc_table tbody').on('click', 'tr', function(){
      if(tbl && (!tbl_diag) && (!sec_sh)){
        active = $(this).closest('table').find('tr').index(this);
        rePosition();
        tbl_diag = true
        select_book(dat[active-1][0]);
      }

    })
    
    $(document).on('keydown', function(e){
     
     if(voi_ab && !tbl_diag && !tbl_res){
        if(e.keyCode == 16){
          if(!sec_sh){
            voice_pre("Switching to maintenance mode. Press Left or Right button to change Speed. Press Up or Down button to change volume.",0,null)
            $('#searchname').prop('disabled',true)
            $('#searchname').blur();
            sec_sh = true
          }else{
             voice_pre("Switching back to search mode.",0,null)
             $('#searchname').prop('disabled',false)
             $('#searchname').focus();
             sec_sh = false
          }
        }
      }
    });

    $('#searchname').on('click', function(){
      active = 0
      $('.active').removeClass('active');
    })
    $(document).on('keypress', function(e){
      //alert(e.keyCode)
    if(!mod2){
      if(e.keyCode == 27){
        if((!sec_sh)&&(!tbl_diag)&&(!tbl_res)){
          
          $('#mod_info').modal('show')
          $('#mod_title').html("Logging out");
          $('#mod_data').html("Logging out. Thank you please come again.");
         
          voice_pre("Logging out. Thank you please come again.",3,null)
        }else if(tbl_diag || tbl_res){
          tbl_diag = false;
          tbl_res = false
          $('#searchname').prop('disabled',false)
          $('#searchname').blur();
          
        }
      }
      if(sec_sh){
        if(e.keyCode==39){
            rt++;
<<<<<<< HEAD
            alert("++")
=======
            
>>>>>>> origin/Francis
            voice_pre("Increasing speed.",0,null)
        }else if(e.keyCode==37){
          if(rt>1){
            rt--;
            voice_pre("Decreasing speed.",0,null)
          }
        }else if(e.keyCode == 38){
            vl++;
            voice_pre("Increasing volume.",0,null)
        }else if(e.keyCode == 40){
            if(vl>1){
            vl--;
            voice_pre("Deccreasing volume.",0,null)
          }
        }
      }

      if(tbl && (!tbl_diag) && (!sec_sh)){
        if(((e.keyCode == 38) || (e.keyCode == 40)) && (!tbl_diag) ) {
            reCalculate(e);
            return false;
          }
          if((e.keyCode == 13) && (active>0) &&(!tbl_diag)){
            
            tbl_diag = true
            select_book(dat[active-1][0]);
          }   
        }else if((tbl_diag)&&(tbl_res)) {
          if(e.which == 50){ //reserve NO
            tbl_diag = false;
            tbl_res = false
            $('#searchname').prop('disabled',false)
            $('#searchname').blur();
            $('#modal_select').modal('toggle')  
          }
          if(e.which == 49){
            reserve(dat[active-1][0], $('#std_name').val());// Reserve Yes
          }
        }else if((tbl_diag) && (!tbl_res) && (!sec_sh)){
          if(e.keyCode == 13){
            tbl_diag = false;
            tbl_res = false
            //$('#modal_select').modal('close')
          }
        }

    }else{
         $('#searchname').prop('disabled',false)
         $('#mod_info').modal('toggle');
         $('#searchname').focus();
         mod2 = false
    }
    });


    
   
    $('#searchname').on('keypress', function(data){
            var d 
            var srch_name = $("#searchname").val();
            if(!sec_sh){
            if(data.keyCode == 13){
                //d= 'Enter'
            }else if(data.keyCode==8){
                if($('#searchname').val()!=''){
                d= 'Backspace'
                }
            }else if(data.which==32){
                //d="Space"
                voice_pre(srch_name,0,null);
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
                d = String.fromCharCode(data.which);
            }
            
              if(d!=undefined){
                voice_pre(d,0,null);
              }
            }
          });


          $('#srch_form').on('submit', function(event){
              event.preventDefault();
              
              if(!sec_sh){
              var srch_name = $("#searchname").val(); 
              var text = "Searching related to. "+srch_name+ "." 
              var action = "Search2";
              
              if(srch_name!=''){
              
              var tp ='';
              var dat2 = new FormData()
              dat2.append('action', action);
              dat2.append('srch_name',srch_name)
              

              $.ajax({
                url:"core/action.php",
                method:"POST",
                data:dat2,
                contentType:false,  
                processData:false,
                success:function(data)
                {
                  //alert(data)
                  //*
                  if(data==0){
                   if(voi_ab){
                      voice_pre(text+" Search not found related to "+srch_name,0,null);
                   }else{

<<<<<<< HEAD
                      alert("Search not found related to "+srch_name)

=======
                       $('#mod_info').modal('show');
                       $('#mod_title').html('Search Not Found');
                       $('#mod_data').html("Search Not Found Related to "+srch_name)
                       $('#searchname').prop('disabled',true)
                       mod2 =true
                       setTimeout(autoclose, 5000); 
>>>>>>> origin/Francis
                   }
                  }else{
                    var plt = data.split("|");
                    var temp1 =plt[2].split("/"); 
                    for(i=0;i<temp1.length;i++){
                      dat[i]= temp1[i].split('*');

                      tp += dat[i][0] +',';
                    }

                    voice_pre(text+' SEARCH FOUND. '+plt[0]+' Hits.',1,plt[1]);
                    bkn = plt[0]
                    tbl=true;
                  
                  }
                  
                  //*/ 
                }  
                         
              });
              }else{
                voice_pre("PLEASE TYPE IN YOUR BOOK...",0,null);
              }

            }
          });
          
}); 