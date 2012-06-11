$(function(){
    $('.get_hotel_cus').click(function(){
        if($(this).is(':checked')){
            id = $('.made_tour_id').val();
            type = $('#department').val();
            
            if(type == ''){
               $('.waitting').html('<font color="red">Please select department</font>');
               $(this).attr('checked',false);  
               $('#department').focus();
                return; 
            }
            
            if(id == ''){
                $('.waitting').html('<font color="red">Please select made tour</font>');
                $('.made_tour_id').focus();
                $(this).attr('checked',false);
                return;
            }
            
            $('.waitting').html('<img src="themes/default/images/img_loading.gif" align="absmiddle">&nbsp;Loadding data...');
            $.ajax({
                type: 'POST',
                async:false,
                url : 'index.php?module=Roomlists&entryPoint=GetHotelAndCustomer',
                data :{
                    id : id, type:type
                },
                success:function(data){
                    // kiểm tra kết quả trả về có dữ liệu hay không?
                    if(data != null){ // nếu có

                        var ht = [];
                        data = $.parseJSON(data);
                        customer = data.customer;
                        hotels = data.hotels;
                        if(customer != null){ // nếu có khách đi tour
                            var cus = [];
                            customer =  $.parseJSON(customer); 
                            $.each(customer, function(key, val) { //set toan bo data
                                //push customer in list
                                cus.push("<option value='" + val.value + "'>" + val.label + "</option>");
                            });
                            if(cus.length>0) {
                                $('.table_clone').find('tbody >tr:first').find('.dskh').html(cus.join(' '));
                            }
                            else{
                                $('.table_clone').find('tbody >tr:first').find('.dskh').html("<option value=''>None</option>");
                                alert('not found');                        
                            }
                        }                                                                                    
                        else{
                            alert('not found');                        
                        }
                        if(hotels != null){
                            hotels = $.parseJSON(hotels);
                            $.each(hotels, function(key, val) { //set toan bo data
                                //push hotels in list
                                ht.push("<option value='" + val.id + "'>" + val.name + "</option>");
                            });
                            if (ht.length>0){
                                $('.dsks').html(ht.join(' '));
                            }else{
                                $('.dsks').html("<option value=''>None</option>");
                                alert('not found');                        
                            }  
                        }
                        else{
                            alert('not found');                        
                        }
                    }
                }
            });
            $('.waitting').html('');
            on_off_Addrow();
        }

    })
});