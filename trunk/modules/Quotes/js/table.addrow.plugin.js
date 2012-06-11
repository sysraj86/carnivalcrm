function addNewRow(btnButton, table_class){
    if($(btnButton).closest('table').attr('class')==table_class) {
            var lastRow = $(btnButton).closest('table').find('tbody > tr:last');
            var ttt = $(btnButton).closest('table').find('tbody > tr:last').clone(true);
            ttt.insertAfter(lastRow);
            replaceID(table_class); 
            $(btnButton).closest("table").find(" tbody tr:last").find("input:text,input:hidden,textarea").each(function()
            {
                $(this).val("");

            });
            $(btnButton).closest("table").find(" tbody tr:last").find("select").each(function()
            {
                $(this).val('');

            });

        }
}

function replaceID(table_class){
    jQuery('.'+table_class).each(function()
    {    
        var count = 0;
        jQuery(this).find(" tbody tr").each(function(i)
        {
            count++;
            if(jQuery(this).closest("table").attr("class")==table_class)
                {
                var chiso=count;
                jQuery(this).find("select,input,span,textarea,button").each(function()
                {
                    var eID = $(this).attr('id');
                    digit = eID.match(/\d+$/);
                    if(digit !=null && !isNaN(digit)){
                        eID_After = eID.replace(digit,chiso); 
                    }
                    else{
                        eID_After = eID+chiso;
                    } 
                    jQuery(this).attr('id',eID_After);  
                });
            }
            //currencyFields.push('payment_value'+count);
        });
    });
}

function disabledBtnDel(div_class,table_class){
   length = jQuery('#'+div_class).find('.'+table_class).find('tbody tr').length;
   if(length == 1){
        $('#'+div_class).find('.'+table_class).find('.btnDeleteRow').attr('disabled',true);
   }
   else{
       $('#'+div_class).find('.'+table_class).find('.btnDeleteRow').attr('disabled',false);
   }
    
}