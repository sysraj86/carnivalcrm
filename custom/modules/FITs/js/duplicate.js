jQuery(document).ready(function()
    {   
        jQuery('#last_name').parent().append("<br/><span id='availability_status'></span><br/><span id='error_message'></span>");  
        jQuery('#first_name, #last_name, #birthday, #phone_mobile, #identy_card').blur(function() 

        {      
            
            var last_name  = jQuery("#last_name").val();
             
            if(last_name.length > 3)//if the lenght greater than 3 characters
            {
/*                if(record == "" ){*/           $('#error_message').text('');
                    $("#availability_status").html('<img src="themes/default/images/loadingyahoo.gif" align="absmiddle">&nbsp;Checking availability...');
                    jQuery.ajax({  //Make the Ajax Request
                        type: "POST",  
    /*                    url: "index.php?module=FITs&entryPoint=FITsCheckDuplicate",*/
                        url: "index.php?module=FITs&entryPoint=AjaxCheckDuplicateCustomer",
                        data: {
                            first_name:jQuery("#first_name").val(),
                            last_name:jQuery("#last_name").val(),
                            birthday:jQuery("#birthday").val(),
                            phone_mobile:jQuery("#phone_mobile").val(),
                            identy_card:jQuery("#identy_card").val()
                            
                        },  //data
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
                //}//end if record 

            }
            else
            {

                jQuery('#error_message').html('<font color="#cc0000">Full Name too short</font>');
                return;

            }



            return false;
        });
        
       

    });
    