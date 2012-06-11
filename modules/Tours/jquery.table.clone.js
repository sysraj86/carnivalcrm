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
                //alert("Dada");
                var table=jQuery(this).parents("table").attr("id");
                //alert(table);
                var trID=jQuery('#'+table+' >tbody>tr:last').attr("id");
                //alert(trID);
                trID=trID.substr(0,trID.length-1);
                
                /*var trLastDSFristLevel= jQuery('tr[id^='+"TR_"+table+']');*/
                var trLastDSFristLevel= jQuery('#'+table+' >tbody>tr');
                
                
                //alert(trLastDSFristLevel.length);
                var lastTR= trLastDSFristLevel[trLastDSFristLevel.length-1];
                //alert(lastTR) ;
                var ttt=jQuery(lastTR).clone(true);
                ttt.css("display","");
                ttt.find(".deleted").val("0");
                ttt.find(".id").val("");
               // ttt.find(":hidden").val("");//added more 11/11
                ttt.insertAfter(lastTR);	

                // cap nhat lai ID cho cac Element
                CheckTableClone(); 
                //alert(jQuery(this).closest("table").find("tbody tr:last").attr('id'));
                // trong qua trinh cap nhat lai: remove het tat ca style truoc do

                jQuery(this).closest("table").find(">tbody >tr:last").find(":text").each(function()
                {
                    jQuery(this).removeAttr("style");

                });
                 /*jQuery(this).closest("table").find(">tbody >tr:last").find(":text,:hidden,textarea").each(function(){
                    jQuery(this).val("");
                });*/
                jQuery(this).closest("table").find(">tbody >tr:last").find(':checkbox').each(function(){
                    jQuery(this).attr("checked",false);    
                })
                
                
                
               jQuery('.table_clone').find("tbody tr:last").find(":hidden").each(function(){
                    jQuery(this).val("");

                }); 
                 
                var datetime=jQuery(".datetime",ttt);  
                        
                if(datetime.length>0){
                    datetime.datepicker("destroy");
                    datetime.datepicker({showOn: 'button', buttonImage: 'themes/default/images/jscalendar.gif', buttonImageOnly: true,dateFormat: 'dd/mm/yy',yearRange:'-50,+20'});
                }                
            });

            // Xoa
            jQuery(this).find(".btnDelRow").click(function(i)
            {   
//               jQuery("#deleted" +jQuery(this).attr("id")).val('1');  
               jQuery(this).closest("tr").find('#deleted' + jQuery(this).attr("id")).val('1');
               jQuery(this).closest("tr").css("display","none");//.attr("id");
               CheckTableClone();
            }
            );
        }
        );

    });
});
function CheckTableClone()
{	
    jQuery(".table_clone").each(function()
    {	
        // set Atribute for table

        //maxcount default 5
        if(jQuery(this).attr("maxcount")==null)
            {
            jQuery(this).attr("maxcount",50);
        }
        // get Table ID
        var tableID=jQuery(this).attr("id");
        //alert(tableID);
        //tableID=tableID.substr(0,tableID.length-1);
        // lam sao de cap nhat cac TR la con truc tiep cua Table do thoi
        // cap nhat id cho cac TR
        var count=0;
        jQuery('.table_clone').find(" tbody tr").each(function(i)
        {
           // alert(jQuery('.table_clone').find("tbody tr:last").attr('id'));
            //alert(jQuery('.table_clone').find("tbody").attr('id'));
            // alert(i);
            var trID="TR_"+tableID+(i+1);
           // alert (trID);
            //closest
            // alert(trID);
            //jQuery(this).closest("table").find(" tbody tr:last").find("input:text,textarea").each(function()
            if(jQuery(this).closest("table").attr("class")=="table_clone")
                {
                // so luong tr cua table can clone
                count++;
                //trID="tourprogram_line"+count;      
                trID="TR_"+tableID+count;      
                //alert  (trID) ;
                jQuery(this).attr("id",trID);
                var chiso=count;

                jQuery(this).find("select,input,img,span,textarea").each(function()
                {
                    var eID=jQuery(this).attr("id");
                    var endChar=eID.substr(eID.length-1,1);
                    // neu ky tu cuoi cung la con so
                    if(!isNaN(endChar) && (endChar!=chiso))
                        {
                        //id da loai bo ky tu cuoi
                        eID_After=eID.substr(0,eID.length-1)+chiso;
                        jQuery(this).attr('id',eID_After);
                    }

                    else if(isNaN(endChar))
                        {

                        eID_After=eID+chiso;
                        jQuery(this).attr('id',eID_After);
                    }
                }
                );

            }
        });       
        
    });


}
