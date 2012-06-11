/********************/
/*
Copyright PhuocTin IT
Author: Phung Duong
email: daibbcvl@yahoo.com
*/
/*************************/

jQuery(document).ready(function() {
  CheckTableClone();  
  jQuery(".table_clone").each(function()
	{	
		jQuery(this).find(" tbody tr").each(function(i)
			{
				// Them
				jQuery(this).find(".btnAddRow").click(function(i) 	
					{
						//alert("Dada");
						var table=jQuery(this).parents("table").attr("id");
						//alert(table);
						var trID=jQuery('#'+table+' tbody>tr:last').attr("id");
						//alert(trID);
						trID=trID.substr(0,trID.length-1);	    
                        //var trLastFirstLevel=               jQuery('#'+table+' tbody>tr:last').attr("id");
                        var trLastDSFristLevel=               jQuery('tr[id^='+"TR_"+table+']');
                        //alert(trLastFirstLevel.length);
                        var lastTR= trLastDSFristLevel[trLastDSFristLevel.length-1];
                        
                        var ttt=jQuery(lastTR).clone(true);
                        ttt.insertAfter(lastTR);     
                              
                     


						//jQuery('#'+table+' tbody>tr:last').clone(true).insertAfter('#'+table+' tbody>tr:last');    	
						
                        // cap nhat lai ID cho cac Element
                        CheckTableClone(); 
                        
                        
                        var hscq_ngaycap=jQuery(".JDate",ttt);  
                        
                        if(hscq_ngaycap.length>0)
                        {
                            hscq_ngaycap.datepicker("destroy");
                            hscq_ngaycap.datepicker({showOn: 'button', buttonImage: 'themes/default/images/jscalendar.gif', buttonImageOnly: true,dateFormat: 'dd/mm/yy',yearRange:'-50,+20'});
                         
                        }
                       
						// trong qua trinh cap nhat lai: remove het tat ca style truoc do
						
                        jQuery(this).closest("table").find(" tbody tr:last").find("select,input,span,textarea").each(function()
						{
							jQuery(this).removeAttr("style");
							
						});
                        
                        jQuery(this).closest("table").find(" tbody tr:last").find("p.phidden").each(function()
                        {
                            jQuery(this).removeAttr("style");
                            
                        });
                        
                        
                        
						jQuery(this).closest("table").find(" tbody tr:last").find("input:text,textarea").each(function()
						{
							jQuery(this).val("");
							
						});
						jQuery(this).closest("table").find(" tbody tr:last").find("select").each(function()
						{
							jQuery(this).val("0");
							
						});
						
					}
				);
				
				// Xoa
				jQuery(this).find(".btnDelRow").click(function(i)
					{
						
						/*
						while(!jQuery(this).parents().is("tr"))
						{
							
							
						}
						*/
						//var pTR=$(this).closest('tr').;

						
						jQuery(this).closest("tr").remove();//.attr("id");
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
		jQuery(this).find(" tbody tr").each(function(i)
			{
               // alert(i);
				var trID="TR_"+tableID+(i+1);
                
                //closest
               // alert(trID);
               //jQuery(this).closest("table").find(" tbody tr:last").find("input:text,textarea").each(function()
               if(jQuery(this).closest("table").attr("class")=="table_clone")
               {
                   // so luong tr cua table can clone
                    count++;
                    trID="TR_"+tableID+count;      
                   
                   jQuery(this).attr("id",trID);
                   
                   
                   
                   var chiso=count;
               
                       jQuery(this).find("select,input,span,textarea").each(function()
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
				
				
				// cap nhat id cho cac element con lai la con cua tr
				
				
					
			}
		);
        
        
        
     //   var Trcount=jQuery(this).find(" tbody tr");
        
        // kiem tra bat tat nut them va xoa
        if(count==1)
        {
            //alert("ADADA");
            jQuery(this).find(".btnDelRow").attr("disabled",true);
            
        }
        else
        {
            //alert("Dasda");
            jQuery(this).find(".btnDelRow").removeAttr("disabled");
        }
        if(count==jQuery(this).attr("maxcount"))
        {
            jQuery(this).find(".btnAddRow").attr("disabled",true);
        }
        else
        {
            jQuery(this).find(".btnAddRow").removeAttr("disabled");
        }        
        
        
        
		

		
	}
	);
	
	
}