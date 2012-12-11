$(function(){
    $this = $('#parent_type');
    changlayout($this);

    //$('.parent_name').click(function(){
//        if($('.parent_type').val()=='TravelGuides'){
//            open_popup('TravelGuides', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id", "name": "parent_name","address":"address_b","phone":"phone_b","date_issued":"date_issued_guide","birthday":"birthday","passport_no":"passport_no_guide"}}, "single", true);   
//        }
//        else{
//            open_popup($('#parent_type').val(), 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id", "name": "parent_name"}}, "single", true);   
//        }
//    });

    // tinh toan gia tri hop dong huong dan vien
    $('.giatrihopdonghdv').blur(function(){
        var a =  parseFloat($('#guide_bonus').val());
        var b = parseFloat($('#guide_num_of_date').val());

        var tt = a*b;
        if(!isNaN(tt)){
            $('#total_bonus').val(tt);
        }
        if(($('#guide_currency').val())== 'vnd'){
            $('#guide_inword').val(DocTienBangChu($('#total_bonus').val())+ ' đồng');
        }
        else if(($('#guide_currency').val()) == 'usd'){
            $('#guide_inword').val(DocTienBangChu($('#total_bonus').val())+ ' đô la');
        }
        else{
            $('#guide_inword').val(DocTienBangChu($('#total_bonus').val()));
        }
    });

    // doc tien khi thay doi tien te cua hop dong huong dan vien

    $('#guide_currency').change(function(){
        $('.currency').text($('option:selected',$(this)).text());  
        var str ='';
        if( $(this).val() == "usd"){
            str = DocTienBangChu($('#total_bonus').val())+" đô la";
            $('#guide_inword').val(str); 
        }
        else{
            str = DocTienBangChu($('#total_bonus').val())+"  đồng";
            $('#guide_inword').val(str);
        }
    });

    //$('.tour_name').click(function(){
//        if($('.parent_type').val()=='TravelGuides'){
            //open_popup('GroupPrograms', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"groupprogr4251rograms_ida", "name": "groupprogracontracts_name","start_date_group":"start_date_guide",}}, "single", true);   
//            open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"groupprogr4251rograms_ida","name":"groupprogracontracts_name","start_date_group":"start_date_guide", "end_date_group":"end_date_guide","countofcus":"num_of_cus_guide"}}, "single", true);
//        }
//        else{
//            open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"groupprogr4251rograms_ida","name":"groupprogracontracts_name","start_date_group":"start_date_contract", "end_date_group":"end_date_contract","countofcus":"num_of_cus_guide","numofdate":"num_of_date","numofnight":"num_of_night"}}, "single", true);
//        }
//    });       
    //$('.daidienbenbname').click(function(){
 //       if($('.parent_type').val() == 'FITs'){
//            open_popup('FITs',600,400,'',true,false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"name":"daidienbenb_name"}});
  //      }
//        else{
//            filterPopup('parent_type','parent_id','Contacts',{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"name":"daidienbenb_name"}});
            //open_popup('Contacts',600,400,'',true,false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"daidienbenb_name"}});
//        }
//    });

    $('#parent_type').change(function(){ 
        $this = $(this);
        changlayout($this);
//        parent_namechangeQS();
//        checkParentType($('#parent_type').val(), $('btn_parent_name'));
    });
    
    function changlayout(name){
        if($(name).val()=='TravelGuides'){
            $('#contacts_contracts_name').closest('td').hide();
            $('#contacts_contracts_name').closest('td').prev().hide();
            $('#position_b').closest('td').hide();
            $('#position_b').closest('td').prev().hide();
            $('#birthday').closest('td').show();
            $('#birthday').closest('td').prev().show();
            $('#passport_no_guide').closest('td').show();
            $('#passport_no_guide').closest('td').prev().show();
        }else{
            $('#contacts_contracts_name').closest('td').show();
            $('#contacts_contracts_name').closest('td').prev().show();
            $('#position_b').closest('td').show();
            $('#position_b').closest('td').prev().show();
            $('#birthday').closest('td').hide();
            $('#birthday').closest('td').prev().hide();
            $('#passport_no_guide').closest('td').hide();
            $('#passport_no_guide').closest('td').prev().hide();
        }
/*        else if($(name).val()== 'Transports'){
            $('.hopdongdichvu').hide();
            $('.travelguide').hide();
            $('.chung').show();
            $('.khac').hide();
            $('.hopdongthuexe').show();
            $('.hochieukhachle').hide();
        }
        else if($(name).val()== 'FITs'){
            $('.hochieukhachle').show();
            $('.hopdongdichvu').show();
            $('.travelguide').hide();
            $('.khac').show();
            $('.chung').show(); 
            $('.hopdongthuexe').hide();
        }
        else{
            $('.hopdongdichvu').show();
            $('.travelguide').hide();
            $('.khac').show();
            $('.chung').show(); 
            $('.hopdongthuexe').hide();
            $('.hochieukhachle').hide();
        } */
    }

    $('.tinhtoan').blur(function(){
       tinhtoan(this);
    }) ;
    
    function tinhtoan(name){
        var id = name.id.substring(name.id.length-1,name.id.length); 
        var sl =  parseFloat(unformatNumber($('#tong_sl_khach'+id).val(),num_grp_sep, dec_sep));
        var giatour = parseFloat(unformatNumber($('#gia_tour'+id).val(),num_grp_sep, dec_sep));  
        var thue = parseFloat(unformatNumber($('#thue'+id).val(),num_grp_sep, dec_sep));  
        var thanhtien  = (sl*giatour)+thue*sl;
        if(!isNaN(thanhtien)){
            $('#thanhtien'+id).val(formatNumber(thanhtien,num_grp_sep, dec_sep)); 
        }
        calculateSum(this);
        $('#bangchu').val(DocTienBangChu($('#tongtien').val())); 
    }

    $('.percent').blur(function(){
        var tt = parseFloat($('#tongtien').val());
        var id = this.id.substring(this.id.length-1,this.id.length);
        var percent = parseFloat($('#phantram'+id).val());
        if(!isNaN(tt) && !isNaN(percent)){
            var thanhtien = (tt * percent)/100;
            $('#tienthanhtoan'+id).val(thanhtien.toString());
        }
        $('#in_word'+id).val(DocTienBangChu($('#tienthanhtoan'+id).val()));
    });

    $('.tientethanhtoan').change(function(){            
        var id = this.id.substring(this.id.length-1,this.id.length);
        var str = '' ;
        var currency = $('#tiente_thanhtoan'+id).val();
        if(currency == 'vnd'){
            str = DocTienBangChu ($('#tienthanhtoan'+id).val())+ ' đồng';
            $('#in_word'+id).val(str);
        }
        else if(currency == 'usd'){
            str = str = DocTienBangChu ($('#tienthanhtoan'+id).val())+ ' đô la';
            $('#in_word'+id).val(str);
        }
        else {
            str = DocTienBangChu ($('#tienthanhtoan'+id).val());
            $('#in_word'+id).val(str);
        }
    });
    
    /////////////////////
    // Tu dong tinh gia tour khi load dich vu
    
    $('.type_service').change(function(){
        type = $(this).val();
        if(type == 'khac'){
            $(this).next().show();
        }else{
            $(this).next().val('');
            $(this).next().hide();
        }
        CapNhapGiaTour(this,type);
    });
    function CapNhapGiaTour(name,type){
       var id = name.id.substring(name.id.length-1,name.id.length); 
       if(type == 'nguoilon'){
           $('#gia_tour'+id).val($('#gia_nguoi_lon').val())
           tinhtoan(name);
       }else if(type == 'treem1'){
           $('#gia_tour'+id).val($('#gia_tre_em').val())
           tinhtoan(name);
       }else if(type == 'treem2'){
           $('#gia_tour'+id).val($('#gia_tre_em2').val())
           tinhtoan(name);
       }
    }

});

function calculateSum(name){
    // var count = $(name).closest("table").find(" tbody tr:last").find('.thanhtien').attr('id');
    var count = $(name).closest("table").find(" tbody tr").length;
    //count = count.substring(count.length-1,count.length);
    //alert(count);
    var sum = 0;
    for (i = 1 ; i <= count ; i++ ){
        if($('#deleted'+i).val()!= 1){
            var tt = parseFloat($('#thanhtien'+i).val());
            if(!isNaN(tt)){
                sum += tt;
            }
        }     
    } 
    $('#tongtien').val(sum.toString());
}

//function parent_namechangeQS() {
//    new_module = document.forms["EditView"].elements["parent_type"].value;
//    if (typeof(disabledModules[new_module]) != 'undefined') {
//        sqs_objects["EditView_parent_name"]["disable"] = true;
//        document.forms["EditView"].elements["parent_name"].readOnly = true;
//    } else {
//        sqs_objects["EditView_parent_name"]["disable"] = false;
//        document.forms["EditView"].elements["parent_name"].readOnly = false;
//    }
//    sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
//    if (typeof QSProcessedFieldsArray != 'undefined') {
//        QSProcessedFieldsArray["EditView_parent_name"] = false;
//    }
//    enableQS(false);
//}

 set_return = function(popup_reply_data){
    // Doan code mac dinh cua sugar
    from_popup_return=true;var form_name=popup_reply_data.form_name;var name_to_value_array=popup_reply_data.name_to_value_array;for(var the_key in name_to_value_array)
    {if(the_key=='toJSON')
    {}
    else
    {var displayValue=name_to_value_array[the_key].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');;if(window.document.forms[form_name]&&window.document.forms[form_name].elements[the_key])
    {window.document.forms[form_name].elements[the_key].value=displayValue;SUGAR.util.callOnChangeListers(window.document.forms[form_name].elements[the_key]);}}}
    // End doan code mac dinh cua sugar

    var id = $('#groupprogr4251rograms_ida').val();
    $.ajax({
           url : "index.php?module=Contracts&entryPoint=LayGiaTourNguoiLon",
           type : "POST",
           async : false,
           // Du lieu chuyen vao de xu ly
           data : {id : id},
           success : function(data){
               if(data != ""){
                   data = $.parseJSON(data);
                   $('#gia_nguoi_lon') .val(data);
                   var giatreem = (30/100)*data;
                   var giatreem2 = (75/100)*data;
                   $('#gia_tre_em') .val(giatreem);
                   $('#gia_tre_em2') .val(giatreem2);
                   alert('thanh cong');
               }
           }
       });
 }
