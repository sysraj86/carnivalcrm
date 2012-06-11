$(function(){
    $('.checkedbox').click(function(){
        if($(this).is(':checked')){
            val = $(this).val();
            id = $('#worksheet_tour_id').val();
            if(id == ''){
                $(this).closest('tr').find('#waitting').html('<font color="red">Bạn chưa chọn tour</font>');
                return;
            }
            $(this).closest('tr').find('#waitting').html('<img src="themes/default/images/img_loading.gif" align="absmiddle">&nbsp;Loadding data...');
            listcongtacphi = $(this).closest('tr').find('.listcongtacphi');
            $.ajax({
                type: 'POST',
                async:false,
                url : 'index.php?module=Worksheets&entryPoint=GetCostGuide',
                data :{
                    area : val,
                    id : id,
                },
                success:function(data){
                     // kiểm tra kết quả trả về có dữ liệu hay không?
                    if(data != null){ // nếu có
                        var items = [];
                        data = $.parseJSON(data);
                        //console.log(data);
                        $.each(data, function(key, val) { //set toan bo data
                            // console.log(val);
                            //push location in
                            items.push("<option value='" + val.value + "'>" + val.label + "</option>");
                        });
                        if (items.length>0){
                           listcongtacphi.html(items.join(' '));
                        }else{
                            listcongtacphi.html("<option value=''>None</option>");
                            alert('not found');                        
                        }
                    }
                }
            });
           $(this).closest('tr').find('#waitting').html('');
        }
    });
});