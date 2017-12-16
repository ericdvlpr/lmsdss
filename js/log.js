$(document).ready(function(){
                    function voice(text){
                        var ssy = window.speechSynthesis
                        var utt = new SpeechSynthesisUtterance();

               
                        utt.text = text
              
                        ssy.speak(utt);

                    }

                    
                    $('#log_in').on('submit', function(){
                        var user = $('#username').val();
                        var pass = 0
                        var action = 'Login';
                        
                        alert(user +', '+pass)
                        
                        var dat = new FormData()
                        dat.append('action', action);
                        dat.append('user', user);
                        dat.append('pass', pass);
              
                        $.ajax({
                          url:"core/action.php",
                          method:"POST",
                          data:dat,
                          contentType:false,  
                          processData:false,
                          success:function(data)
                          {
                              alert(data);
                              
                          }
                        });


                    });
                     
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
                        voice(d);
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


});