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
                var trID=jQuery('#'+table+' tbody>tr:first').attr("id");
                //alert(trID);
                trID=trID.substr(0,trID.length-1);	    
                //var trLastFirstLevel=               jQuery('#'+table+' tbody>tr:last').attr("id");
                var trLastDSFristLevel = jQuery('tr[id^='+"TR_"+table+']');
                //alert(trLastFirstLevel.length);
                var lastTR= trLastDSFristLevel[trLastDSFristLevel.length-1];

                var ttt=jQuery(lastTR).clone(true);
                ttt.css("display","");
                ttt.find(".deleted").val("0");
                ttt.find(".id").val("");
                ttt.insertAfter(lastTR);     

                //jQuery('#'+table+' tbody>tr:last').clone(true).insertAfter('#'+table+' tbody>tr:last');    	

                // cap nhat lai ID cho cac Element
                CheckTableClone(); 
              
                // trong qua trinh cap nhat lai: remove het tat ca style truoc do
                var datetime = $('.datetime',ttt);
                jQuery(this).closest("table").find(" tbody tr:last").find("select,input,span,textarea").each(function()
                {
                    jQuery(this).removeAttr("style");

                });

                jQuery(this).closest("table").find(" tbody tr:last").find("p.phidden").each(function()
                {
                    jQuery(this).removeAttr("style");

                });
                
                // Ham set value cua cac field thanh NULL                                                         
                jQuery(this).closest("table").find(" tbody tr:last").find("input:hidden,input:text,span,textarea").each(function()
                {
                    
                    if(jQuery(this).attr("class") == 'tinhtoan' || jQuery(this).attr("class") == 'tinhtoan_tang' || jQuery(this).attr("class") == 'tinhtoan_giam'){
                       jQuery(this).val("0"); 
                    }else{
                       jQuery(this).val(""); 
                    }

                }); 
                jQuery(this).closest("table").find(" tbody tr:last").find("select").each(function()
                {
                    jQuery(this).val("0");
                });
               

            });

            // Xoa dong
            jQuery(this).find(".btnDelRow").click(function(i)
            {  
                ////////////// Xử lý ko cho xóa dòng cuối trong 1 bảng/////////
                // Đếm những dòng có deleted khác 1
        /*        var dem = 0;
                var count = 0;
                jQuery(this).closest('table').find(" tbody tr").each(function(i)
                {
                    if(jQuery(this).closest("table").attr("class")=="table_clone")
                    {
                        count++;
                    }
                });
                for(i = 1 ; i <= count ; i++){
                    if(jQuery(this).closest("table").find('#deleted'+i).val() != 1){
                        dem ++;
                    }
                }       */
                ////////////////End///////////////////////////////
                
                
                //Hàm set gia tri deleted bang 1, de danh dau xoa voi dong nay
                jQuery(this).closest("tr").find('#deleted' + jQuery(this).attr("id")).val('1');
                //Ham tinh tong va tinh bang chu voi module contract appendix
                try{
                    calculateSum(this);
                    $('#bangchu').val(DocTienBangChu($('#tongtien').val()));  
                }catch(err){}
                
                //Ham tinh lai diem khi delete voi module ContractLiquidate
                jQuery(this).closest("tr").find(":hidden,:text").each(function()
                {  
                    if(jQuery(this).attr("class") == 'tinhtoan' || jQuery(this).attr("class") == 'tinhtoan_tang' || jQuery(this).attr("class") == 'tinhtoan_giam'){
                       jQuery(this).val("0");
                    }
                });
                try{
                   calculateContractValue(this);
                   calculateIncre(this);
                   calculateDecre(this); 
                }catch(err){}
                
                
                // Hàm ẩn dòng
                //if(dem == 1){
//                    jQuery(this).closest("tr").find("select,:text,span,textarea").each(function()
//                    {
//                        jQuery(this).val('');
//                    });
//                }else{     
                    jQuery(this).closest("tr").css('display','none');                   
                //}
                CheckTableClone();
            }
            );
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

                jQuery(this).find("select,input,span,textarea,button,img").each(function()
                {   
                    var eID=jQuery(this).attr("id");
                    var d;
                    if(count==tongdong){d = count-1;}else{d=count;}
                    var sl = soluongchuso(d);
                    var dem = 0;
                    if($(this)[0].localName == "img" && $(this).attr("class") == "datetime"){
                        eID = $(this).closest("td").find("input").attr("id");
                        dem ++;
                    }
                    
                    var endChar=eID.substr(eID.length-sl,sl);
                    // neu ky tu cuoi cung la con so
                    if(dem != 0){ // neu la kieu datetime trong the img thi + them trigger 
                        eID_After=eID.substr(0,eID.length-sl)+chiso + "_trigger";
                        jQuery(this).attr('id',eID_After);     
                    }
                    if(!isNaN(endChar) && (endChar!=chiso)){
                        //id da loai bo ky tu cuoi
                        eID_After=eID.substr(0,eID.length-sl)+chiso;
                        jQuery(this).attr('id',eID_After);
                    }else if(isNaN(endChar)){
                        eID_After=eID+chiso;
                        jQuery(this).attr('id',eID_After);
                    }
                });
            }
        }
        );
        
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
    }
    );

  }
