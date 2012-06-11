jQuery(document).ready(function()
    {   
       
        jQuery('#province_city').change(function() 

        {      
           var value = jQuery(this).val();
			//alert(value);
            
            value = value.split("_");//84_08_Hochiminh
            
            jQuery("#mavung").val(value[0] + "-" + value[1]);
            
            return false;
        });
    });
    
