
    $(document).ready(function(){
       /* if($('.parent_type').val()=='TravelGuides'){
                $('.hopdongdichvu').hide();
                $('.hopdongthuexe').hide();
                $('.chung').hide();
                $('.khac').show(); 
                $('.travelguide').show();
            }
            else if($('.parent_type').val()== 'Transports'){
                $('.hopdongdichvu').hide();
                $('.travelguide').hide();
                $('.chung').show();
                $('.khac').hide();
                $('.hopdongthuexe').show();
            }
            else{
                $('.hopdongdichvu').show();
                $('.travelguide').hide();
                $('.khac').show();
                $('.chung').show(); 
                $('.hopdongthuexe').hide();
            }  */
        tinhTuongDuong();
        loadFormParentType();
        
        $('.contract').click(function(){
             open_popup('Contracts', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"contract", "number": "number_contract","date_of_contracts":"date_contract","parent_type":"parent_type"}}, "single", true);   
            
        });
        $('.tour').click(function(){
             open_popup('GroupPrograms', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"tour_id", "groupprogram_code": "tour"}}, "single", true);   
            
        });
        
        $('.daidienbena').click(function(){
             open_popup('Users', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{ "full_name": "daidienbena"}}, "single", true);   
            
        });
        
        $('.parent_name').click(function(){
            if($('.parent_type').val()=='TravelGuides'){
                open_popup('TravelGuides', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id", "name": "parent_name","address":"address_b","phone":"phone_b","date_issued":"date_issued_guide","birthday":"birthday","passport_no":"passport_no_guide"}}, "single", true);   
            }
            else{
                open_popup($('#parent_type').val(), 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id", "name": "parent_name"}}, "single", true);   
            }
        });

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

        $('.tour_name').click(function(){
            if($('.parent_type').val()=='TravelGuides'){
                //open_popup('GroupPrograms', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"groupprogr4251rograms_ida", "name": "groupprogracontracts_name","start_date_group":"start_date_guide",}}, "single", true);   
                open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"groupprogr4251rograms_ida","name":"groupprogracontracts_name","start_date_group":"start_date_guide", "end_date_group":"end_date_guide","countofcus":"num_of_cus_guide"}}, "single", true);
            }
            else{
                open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"groupprogr4251rograms_ida","name":"groupprogracontracts_name","start_date_group":"start_date_guide", "end_date_group":"end_date_contract","countofcus":"num_of_cus_guide","numofdate":"num_of_date","numofnight":"num_of_night"}}, "single", true);
            }
        });       
        $('.daidienbenbname').click(function(){
            if($('.parent_type').val() == 'FITs'){
                open_popup('FITs',600,400,'',true,false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"daidienbenb_name"}},"single", true);
            }
            else{
                open_popup('Contacts',600,400,'',true,false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"daidienbenb_name"}},"single", true);
            }
        });

        function loadFormParentType(){ 
            if($('#parent_type').val()=='TravelGuides'){
                $('.hopdongdichvu').hide();
                $('.travelguide').show();
            }
            else{
                $('.hopdongdichvu').show();
                $('.travelguide').hide();
            } 
            
          //  parent_namechangeQS();
            checkParentType($('#parent_type').val(), $('btn_parent_name'));       
        }
        
        $('#parent_type').change(function(){
            loadFormParentType();
            $('#parent_name').val("");
            $('#parent_id').val("");
        });
                                
        $('.tinhtoan').blur(function(){
            var id = this.id.substring(this.id.length-1,this.id.length); 
            var sl =  parseFloat($('#num_of_service'+id).val());
            var giatour = parseFloat($('#unit'+id).val());  
            var thue = parseFloat($('#thue'+id).val());  
            var thanhtien  = (sl*giatour)+thue;
            if(!isNaN(thanhtien)){
                $('#thanhtien'+id).val(thanhtien.toString()); 
            }
            calculateSum(this);
            $('#bangchu').val(DocTienBangChu($('#tongtien').val()));
            calculatePersent();
        }) ;
        $('#tigia').blur(function(){
            tinhTuongDuong();  
        });
        function tinhTuongDuong(){
            var tongtien = $('#tongtien').val();
            var tiGia = $('#tigia').val();
            $('#tongtien2').val((tongtien*tiGia).toString());
        }

        $('.percent').blur(function(){
            var id = this.id.substring(this.id.length-1,this.id.length);
            calculatePersent(id);
        });

        $('.tientethanhtoan').change(function(){
            var id = this.id.substring(this.id.length-1,this.id.length);
            calculatePersent(id);             
            //var id = this.id.substring(this.id.length-1,this.id.length);
//            var str = '' ;
//            var currency = $('#tiente_thanhtoan'+id).val();
//            if(currency == 'vnd'){
//                str = DocTienBangChu ($('#tienthanhtoan'+id).val())+ ' đồng';
//                $('#in_word'+id).val(str);
//            }
//            else if(currency == 'usd'){
//                str = str = DocTienBangChu ($('#tienthanhtoan'+id).val())+ ' đô la';
//                $('#in_word'+id).val(str);
//            }
//            else {
//                str = DocTienBangChu ($('#tienthanhtoan'+id).val());
//                $('#in_word'+id).val(str);
//            }
        });
         
        //jQuery(".tiente").change(function(){
//            if($('#tiente').val()=='usd' || $('#tiente').val() == ''){
//               jQuery(this).closest('input').css('display','none');
//               jQuery(this).closest('span').css('display','none'); 
//            }
//        });

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
        $('#tongtien_').val(sum.toString());
        var tiGia = $('#tigia').val();
        $('#tongtien2').val((sum*tiGia).toString());
    }
    
    function calculatePersent(id){
        var tt = parseFloat($('#tongtien').val());
        var percent = parseFloat($('#phantram'+id).val());
        if(!isNaN(tt) && !isNaN(percent)){
            var thanhtien = (tt * percent)/100;
            var loaiTien = $('#tiente_thanhtoan'+id).val();
            var tiGia = $('#tigia').val();
            if(loaiTien == 'vnd'){
                vnd = tiGia * thanhtien ;
                $('#tienthanhtoan'+id).val(vnd.toString());
                $('#in_word'+id).val(DocTienBangChu($('#tienthanhtoan'+id).val()) + ' đồng');
            }else if(loaiTien == 'usd'){
                usd = thanhtien;
                $('#tienthanhtoan'+id).val(usd.toString());
                $('#in_word'+id).val(DocTienBangChu($('#tienthanhtoan'+id).val()) + ' đô la');
            }else{
                $('#tienthanhtoan'+id).val(thanhtien.toString());
                $('#in_word'+id).val(DocTienBangChu($('#tienthanhtoan'+id).val()));
            }
        }
    }

    //function parent_namechangeQS() {
//        new_module = document.forms["EditView"].elements["parent_type"].value;
//        if (typeof(disabledModules[new_module]) != 'undefined') {
//            sqs_objects["EditView_parent_name"]["disable"] = true;
//            document.forms["EditView"].elements["parent_name"].readOnly = true;
//        } else {
//            sqs_objects["EditView_parent_name"]["disable"] = false;
//            document.forms["EditView"].elements["parent_name"].readOnly = false;
//        }
//        sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
//        if (typeof QSProcessedFieldsArray != 'undefined') {
//            QSProcessedFieldsArray["EditView_parent_name"] = false;
//        }
//        enableQS(false);
//    }
    Calendar.setup ({
    inputField : "start_date_guide",daFormat : "%d/%m/%Y",button : "guide_date_start_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
     });addToValidate('EditView', 'expiration', 'date', false,'expiration' ); 
    Calendar.setup ({ 
    inputField : "end_date_guide",daFormat : "%d/%m/%Y",button : "guide_date_end_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
     });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
    Calendar.setup ({
    inputField : "start_date_contract",daFormat : "%d/%m/%Y",button : "date_start_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
 });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
    Calendar.setup ({ 
    inputField : "end_date_contract",daFormat : "%d/%m/%Y",button : "date_end_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
 });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
    Calendar.setup ({ 
    inputField : "expiration_date",daFormat : "%d/%m/%Y",button : "expiration_date_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
     });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
    Calendar.setup ({ 
        inputField : "date",daFormat : "%d/%m/%Y",button : "date_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
 });addToValidate('EditView', 'expiration', 'date', false,'expiration' );