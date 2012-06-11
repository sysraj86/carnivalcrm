/**
* SUGARCRM VN
* http://sugarcrm.com.vn
*/
jQuery(document).ready(function() {
    CheckTableClone();  
    jQuery(".table_clone").each(function()
    {	
        jQuery(this).find(" tbody >tr").each(function(i)
        {
            // Them
            jQuery(this).find(".btnAddRow").click(function(i){
                $('#thu_option').find('tbody > tr:last').clone(true).insertAfter($('#thu_option').find('tbody > tr:last'));
                $('#chi_option').find('tbody > tr:last').clone(true).insertAfter($('#chi_option').find('tbody > tr:last'));
                
                $('#thu_option').find('tbody > tr:last').find('input:text').val('0');
                $('#chi_option').find('tbody > tr:last').find('input:text').val('0');
                $('#thu_option').find('tbody > tr:last').find('.x').val('X');
                $('#chi_option').find('tbody > tr:last').find('.x').val('X');
                CheckTableClone(); 
            });

            // Xoa
            jQuery(this).find(".btnDelRow").click(function(i)
            {   
                id = jQuery(this).closest("tr").attr('id');
                id = id.substring(id.length -1,id.length);
                var rowCount = $('#thu_option').find('tbody >tr').length;
                    $('#TR_thu_option'+id).remove();
                jQuery(this).closest("tr").remove();
                tinhtongthuoption();
                tinhtongchioption();
                tinhtongchiphi();  
                reportsummary();
                CheckTableClone();
            }
            );
        }
        );

    });
});
function CheckTableClone(){	
    
  jQuery(".table_clone").each(function(){     
        // set Atribute for table
        //maxcount default 5
        var tableThu = $('#thu_option').attr('id');
        var tableChi = $('#chi_option').attr('id');
        var count=0;  
        count1 = 0;
        $('#thu_option').find(" tbody tr").each(function(i){   
               var trID="TR_"+tableThu+(i+1);
               if(jQuery(this).closest("table").attr("id")=="thu_option") {
                   count++; 
                    trID="TR_"+tableThu+count; 
                    jQuery(this).attr("id",trID); 
                    var chiso=count;

                    jQuery(this).find("select,input,img,span,textarea").each(function()
                    {
                        var eID=jQuery(this).attr("id");
                        var endChar=eID.substr(eID.length-1,1);
                        // neu ky tu cuoi cung la con so
                        if(!isNaN(endChar) && (endChar!=chiso)){
                            //id da loai bo ky tu cuoi
                            eID_After=eID.substr(0,eID.length-1)+chiso;
                            jQuery(this).attr('id',eID_After);
                        }
                        else if(isNaN(endChar))
                            {
                            eID_After=eID+chiso;
                            jQuery(this).attr('id',eID_After);
                        }
                    }); 
               } 
        }); 
        
        $('#chi_option').find(" tbody tr").each(function(i){   
               var trID="TR_"+tableChi+(i+1);
               if(jQuery(this).closest("table").attr("id")=="chi_option") {
                   count1++; 
                    trID="TR_"+tableChi+count1; 
                    jQuery(this).attr("id",trID); 
                    
                    var chiso1=count1;

                    jQuery(this).find("select,input,img,span,textarea").each(function()
                    {
                        var eID=jQuery(this).attr("id");
                        var endChar=eID.substr(eID.length-1,1);
                        // neu ky tu cuoi cung la con so
                        if(!isNaN(endChar) && (endChar!=chiso1)){
                            //id da loai bo ky tu cuoi
                            eID_After=eID.substr(0,eID.length-1)+chiso1;
                            jQuery(this).attr('id',eID_After);
                        }
                        else if(isNaN(endChar))
                            {
                            eID_After=eID+chiso1;
                            jQuery(this).attr('id',eID_After);
                        }
                    }); 
               }
        }); 
        
    });

}
