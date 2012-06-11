/***
* Ajax get list Hotel by area and standard 
* author Duc Hai
* date: 2011/12/12
*/

$(document).ready(function() {
    $('.loadingdatahotel').live("click", function(){
        $(this).closest('tr').find('#waitting').html('<img src="themes/default/images/img_loading.gif" align="absmiddle">&nbsp;Loadding data...');
        var destination = $(this).closest("tr").find(".destination").val();
        var standard = $(this).closest("tr").find(".standard").val();
        if(destination == null){
            alert("Bạn chưa chọn nơi đến");
            return;
        }
        if(standard == null){
            alert('Bạn chưa chọn tiêu chuẩn của khách sạn');
            return;
        }
        var hotels = $(this).closest("tr").find(".tenkhachsan");
        $.ajax({
            type: 'POST',
            async:false,
            url : 'index.php?module=Worksheets&entryPoint=HotelsByDestination',
            data :{
                destination : destination,
                standard : standard,
                tour_id : $('#worksheet_tour_id').val(),
            },
            success:function(data) {
                // kiểm tra kết quả trả về có dữ liệu hay không?
                if(data != null){ // nếu có
                    var items = [];
                    data = $.parseJSON(data);
                    //console.log(data);
                    $.each(data, function(key, val) { //set toan bo data
                        // console.log(val);
                        //push location in
                        items.push("<option value='" + val.id + "'>" + val.name + "</option>");
                    });
                    if (items.length>0){
                        hotels.html(items.join(' '));
                    }else{
                        hotels.html("<option value=''>None</option>");
                        alert('Hotel not found by destination and standard');                        
                    }
                }
                else{
                    alert('Hotel not found by destination and standard');
                }
            }

        });
         $(this).closest('tr').find('#waitting').html(''); 
    });
});