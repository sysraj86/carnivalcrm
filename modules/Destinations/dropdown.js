jQuery(document).ready(function()
    {   
       
        jQuery('#city_province').change(function() 

        {      
           var value = jQuery(this).val();
            //alert(value);
            
            value = value.split("_");//84_08_Hochiminh
            
            jQuery("#area_code").val(value[0] + "-" + value[1]);
            
            return false;
        });
    });
    