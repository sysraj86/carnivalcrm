jQuery(document).ready(function(){   
        jQuery('#name').parent().append("<br/><span id='availability_status'></span><br/><span id='error_message'></span>");  
        jQuery('#name').blur(function(){      
            
            var name    = jQuery("#name").val(); 
            checkDublicate(name);
            
        });
});

function checkDublicate(name){
    if(name.length > 3)//if the lenght greater than 3 characters
            {
                jQuery('#error_message').text('');
                $("#availability_status").html('<img src="themes/default/images/loadingyahoo.gif" align="absmiddle">&nbsp;Checking availability...');
                jQuery.ajax({  //Make the Ajax Request
                    type: "POST",  
                    url: "index.php?module=Accounts&entryPoint=AjaxCheckDuplicateAccount",
                    data: "name="+name,  //data
                    success: function(server_response){  

                        jQuery("#availability_status").ajaxComplete(function(event, request){ 

                            if(server_response == '0')
                            { 
                                 jQuery("#availability_status").html('<img src="themes/default/images/available.png" align="absmiddle"> <font color="Green"> Available </font>  ');

                            }  

                            else {
                                result = server_response;//
                                jQuery("#availability_status").html(result);
                            }

                        });
                    } 

                }); 

            }
            else
            {

                jQuery('#error_message').html('<font color="#cc0000">Full Name too short</font>');
                return;

            }

            return false;
}
    