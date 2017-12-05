var active = 0;
var tbl = false;
var dat;
var dat2;
var tbl_diag = false;  
$(document).ready(function(){

		
		// $('#collapseExample').BootSideMenu({
  //           side: "left"
		// });
        
        function select_book(id){
              var action = "Book_select";
              
              var dat3 = new FormData()
              dat3.append('action', action);
              dat3.append('id',id);
              

              $.ajax({
                url:"core/action.php",
                method:"POST",
                data:dat3,
                contentType:false,  
                processData:false,
                success:function(data)
                {
                  //alert(data)
                  var plt2 = data.split('|')
                  $('#modal_data').html(plt2[0]);
                  voice_pre(plt2[1],0,null);

                }  
                          
              });
        }


        function voice_pre(text,tb,td){
              var ssy = window.speechSynthesis
              var utt = new SpeechSynthesisUtterance();

              utt.text = text
              
              ssy.speak(utt);

              utt.onend = function(e){
                if(tb){
                  $('#search_table').html(td);
                  voice_pre("Please use up and down buttons to navigate.",0,null);
                }
              }

        }
		function reCalculate(e){
    		var rows = $('#sc_table tr').length;
    		
    		if (e.keyCode == 38) { // move up
        		active = (active>=1)?active-1:active;
        		
         		
    		}
    
    		if (e.keyCode == 40) { // move down
        		
        		active = (active<=rows-2)?active+1:active;
        		
    		}
    		//alert(e.keyCode)
    		//alert(active)
		}
		function rePosition(){
    		if(active>0){
    			$('.active').removeClass('active');
    			$('#sc_table tr').eq(active).addClass('active');
    			var tbl_dat = $('#sc_table').DataTable()
    			dat = tbl_dat.row(active-1).data()
    			voice_pre(dat[1] + ' by ' + dat[2],0,null);
    			
    			$('#searchname').prop('disabled',true)

    			scrollInView();
    			
    		}else{
    			$('.active').removeClass('active');
    			
    			$('#searchname').prop('disabled',false)
    			
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

		$(document).on('click', function(e){
			if(tbl_diag){
				tbl_diag = false;
				$('#modal_select').dialog('close')
			}
		});
		$(document).on('keypress', function(e){
			if(tbl){
				if(((e.keyCode == 38) || (e.keyCode == 40)) && (!tbl_diag) ) {
					reCalculate(e);
    				rePosition();
    				return false;
    			}
    			if((e.keyCode == 13) && (active>0) &&(!tbl_diag)){
    				
    				$('#modal_select').dialog({height: 200});
    				tbl_diag = true
    				select_book(dat[0]);
    			}
    			if( (!(e.keyCode == 13)) && (!(e.keyCode == 38)) && (!(e.keyCode == 40)) && (tbl_diag) )  {
    				$('#modal_select').dialog('close')
    				tbl_diag = false
    			}		
    		}
		});


		$('tr').on('click',function(){
   			active = $(this).closest('table').find('tr').index(this);
   			alert(active)
   			rePosition();
		});
		$('#searchname').on('keypress', function(data){
            var d 
            var srch_name = $("#searchname").val();
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
                d = String.fromCharCode(data.keyCode || data.which);
            }
            
              if(d!=undefined){
                voice_pre(d,0,null);
              }
          });

          $('#srch_form').on('submit', function(event){
              event.preventDefault();
              
              var srch_name = $("#searchname").val(); 
              var text = "Searching related to. " + srch_name+ "..." 
              var action = "Search";
              
              if(srch_name!=''){
              voice_pre(text);
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
                  if(data==0){
                   voice_pre("SEARCH NOT FOUND",0,null);
                   alert('SEARCH NOT FOUND...'); 
                  }else{
                    var plt = data.split("|");
                    voice_pre('SEARCH FOUND. '+plt[0]+'Hits.',1,plt[1]);
                    tbl=true;
                    
                  }
                }  
                          
              });
              }else{
                voice_pre("PLEASE TYPE IN YOUR BOOK...",0,null);
                   alert('PLEASE TYPE IN YOUR BOOK...');
              }


          });



});	