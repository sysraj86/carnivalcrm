/**
* SUGARCRM VN
* http://sugarcrm.com.vn
*/
jQuery(document).ready(function() {
    CheckTableClone();  
    jQuery(".table_clone").each(function()
    {	
        jQuery(this).find(" tbody tr").each(function(i)
        {
            // Them
            jQuery(this).find(".btnAddRow").click(function(i) 	
            {

                var table=jQuery(this).parents("table").attr("id");
                //alert(table);
                var trID=jQuery('#'+table+' tbody>tr:last').attr("id");
                //alert(trID);
                trID=trID.substr(0,trID.length-1);	    
                //var trLastFirstLevel=               jQuery('#'+table+' tbody>tr:last').attr("id");
                var trLastDSFristLevel = jQuery('tr[id^='+"TR_"+table+']');
                //alert(trLastFirstLevel.length);
                var lastTR= trLastDSFristLevel[trLastDSFristLevel.length-1];
                var ttt=jQuery(lastTR).clone(true);
                ttt.insertAfter(lastTR);     
                // cap nhat lai ID cho cac Element
                CheckTableClone(); 
                on_off_Addrow();

                // trong qua trinh cap nhat lai: remove het tat ca style truoc do
                jQuery(this).closest("table").find(" tbody tr:last").find("select,input,span,textarea").each(function()
                {
                    jQuery(this).removeAttr("style");

                });

                jQuery(this).closest("table").find(" tbody tr:last").find("p.phidden").each(function()
                {
                    jQuery(this).removeAttr("style");

                });
                jQuery(lastTR).find('.phidden, .return_cus').hide();


                // Ham set value cua cac field thanh NULL                                                         
                jQuery(this).closest("table").find(" tbody tr:last").find(".dskhtrongphong option").remove();
                jQuery(this).closest("table").find(" tbody tr:last").find("input").each(function()
                {
                    jQuery(this).val();
                }); 


            });

            // Xoa dong
            jQuery(this).find(".btnDelRow").click(function(i){ 
                if(jQuery(this).closest("tr").is(':last-child')){  // nếu xóa dòng cuối cung
                    dskh = $(this).closest('tr').find('.dskh option').length;
                    dskhold = jQuery(this).closest("tr").prev().find('.dskh option').length;
                    if(dskh >0 && dskhold==0){
                       $(this).closest('tr').find('.dskh option').attr('selected',true);
                       dskhval = $(this).closest('tr').find('.dskh').val();
                       if(dskhval.length>0){
                            for(j=0 ;j<dskhval.length ; j++){
                                // add dskh cua dong bi xoa vao dskh chua xep phong cua phong truoc do
                                var text = $(this).closest('tr').find('.dskh option:[value='+dskhval[j]+']').text();
                                jQuery(this).closest("tr").prev().find('.dskh').append("<option value='" +dskhval[j]+ "'>" +text+"</option>")
                            }
                       }
                    }
                    jQuery(this).closest("tr").find('.dskhtrongphong option').attr('selected',true);
                    temp = jQuery(this).closest("tr").find('.dskhtrongphong').val();
                    if(temp !=null){
                        if(temp.length >0){
                            for(i=0;i<temp.length;i++){
                                // add dskh cua dong bi xoa vao dskh chua xep phong cua phong truoc do
                                var text = $(this).closest('tr').find('.dskhtrongphong option:[value='+temp[i]+']').text();
                                jQuery(this).closest("tr").prev().find('.dskh').append("<option value='" +temp[i]+ "'>" +text+"</option>")  
                            }
                        } 
                    }
                    // hien dskh chưa dc xep phong truoc dong bi xoa
                    jQuery(this).closest("tr").prev().find('.phidden, .return_cus').show();
                }
                else{
                    jQuery(this).closest("tr").find('.dskhtrongphong option').attr('selected',true);
                    temp = jQuery(this).closest("tr").find('.dskhtrongphong').val();
                    if(temp !=null){
                        if(temp.length >0){
                            for(i=0;i<temp.length;i++){
                                // add dskh cua dong bi xoa vao dskh chua xep phong cua phong truoc do
                                var text = $(this).closest('tr').find('.dskhtrongphong option:[value='+temp[i]+']').text();
                                jQuery(this).closest(".table_clone").find('tbody >tr:last').find('.dskh').append("<option value='" +temp[i]+ "'>" +text+"</option>")  
                            }
                        } 
                    }
                    jQuery(this).closest(".table_clone").find('tbody >tr:last').find('.phidden, .return_cus').show();
                }
                jQuery(this).closest("tr").remove();//.attr("id");
                CheckTableClone();
                on_off_Addrow();
            });
            // End xoa dong
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
        var tongdong = 0;
        jQuery(this).find(" tbody tr").each(function(i)
        {
            if(jQuery(this).closest("table").attr("class")=="table_clone")
                {
                tongdong++;
            }
        });
        jQuery(this).find(" tbody tr").each(function(i)
        {
            i++;
            var trID="TR_"+tableID;

            if(jQuery(this).closest("table").attr("class")=="table_clone")
                {
                // so luong tr cua table can clone
                count++;
                trID="TR_"+tableID+count;      

                jQuery(this).attr("id",trID);



                var chiso=count;

                jQuery(this).find("select,input,span,textarea,button").each(function()
                {
                    var eID=jQuery(this).attr("id");
                    var d;
                    if(count==tongdong){d = count-1;}else{d=count;}
                    var sl = soluongchuso(d);
                    var endChar=eID.substr(eID.length-sl,sl);
                    // neu ky tu cuoi cung la con so
                    if(!isNaN(endChar) && (endChar!=chiso))
                        {
                        //id da loai bo ky tu cuoi
                        eID_After=eID.substr(0,eID.length-sl)+chiso;
                        jQuery(this).attr('id',eID_After);
                    }

                    else if(isNaN(endChar))
                        {

                        eID_After=eID+chiso;
                        jQuery(this).attr('id',eID_After);
                    }
                });
                $(this).find('.dskhtrongphong').each(function(){
                    var name = $(this).closest('.table_clone').find('tbody >tr:first').find('.dskhtrongphong').attr('name');
                    var temp = name.substr(0,name.length-2)
                    var endChar = temp.substr(temp.length-1,1);
                    // neu ky tu cuoi cung la con so
                    if(!isNaN(endChar) && (endChar!=chiso))
                        {
                        //id da loai bo ky tu cuoi
                        eName_After = temp.substr(0,temp.length-1)+chiso+'[]';
                        jQuery(this).attr('name',eName_After);
                    }

                    else if(isNaN(endChar)){
                        eName_After = temp+chiso+'[]';
                        jQuery(this).attr('name',eName_After);
                    }
                });

            }
        });


        function soluongchuso(chuso){
            if(chuso<1){return 1;}
            var sobandau = chuso;
            var dem = 0;
            while(parseInt(sobandau) != 0){
                sobandau /= 10;
                dem ++;  
            }
            return dem; 
        }
        // kiem tra bat tat nut them va xoa
        if(count == 1){
            jQuery(this).find(".btnDelRow").attr("disabled",true);
        }
        else{
            jQuery(this).find(".btnDelRow").removeAttr("disabled");
        }
    });

}

function on_off_Addrow(){
    list_size = $('.table_clone').find('tbody >tr:last').find('.dskh option').size();
    if(list_size == 0){
        jQuery('.table_clone').find(".btnAddRow").attr("disabled",true); 
    }
    else{
        jQuery('.table_clone').find(".btnAddRow").attr("disabled",false);  
    }
}
