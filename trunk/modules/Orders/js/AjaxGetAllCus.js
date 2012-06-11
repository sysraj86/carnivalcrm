var tagLink= $('<link/>',{
    "type":"text/css",
    "rel":"stylesheet",
    //"href":"modules/Accounts/css/style.css"
    "href":"modules/Orders/css/ui-lightness/jquery-ui-1.8.13.custom.css"
});

var  tagUI = $('<link/>',{
    'type' : 'text/css',
    'rel'  : 'stylesheet',
    'href' : 'modules/Orders/css/autocomplete.css'

});
$('head').append(tagUI);
$("head").append(tagLink);
$(document).ready(function(){
    addToValidate('EditView', 'email', 'email', false ,SUGAR.language.get('Orders','LBL_EMAIL') ); 
    $('#sodienthoai ,#company_phone, #songuoilon, #songaydi').ForceNumericOnly();
    
    jQuery('#name').parent().append("<br/> <br/> <div id='availability_status'></div>");
    
    $('#name').live('keypress',function(){
        $('#cus_old_id').val('');
    });

    $("#name").live("change",function(){
        getListCus();
     });

    $('#customer_type').change(function(){
        getListCus();
        hideShowListCus();
         $('#availability_status').removeClass('availability_status');
    });
    
    $('.getcusold').live('click',function(){
        $('#name').val($(this).attr('name'));
        $('#sodienthoai').val($(this).attr('phone')); 
        $('#email').val($(this).attr('email')); 
        $('#diachi').val($(this).attr('address'));
        $('#cus_old_id').val($(this).attr('id'));
    });

});

function hideShowListCus(){
    if($('#customer_type').val() == 'khachhangmoi'){
        $('#cus_old_id').val('');
        $('#availability_status').text('');
    }
    else{
         $('#availability_status').show();
    }
}

function getListCus(){
    cus_type = $('#customer_type').val();
    cus_name = $('#name').val();

    if(cus_type == 'khachhangcu' && cus_name !='') {
        $("#availability_status").html('<img src="themes/default/images/loadingyahoo.gif" align="absmiddle">&nbsp;Checking availability...');
        $.ajax({
            type : 'POST',
            url : 'index.php?module=Orders&entryPoint=ordergetlistcus',
            data : 'val='+cus_name,

            success:function(data){
                $("#availability_status").ajaxComplete(function(event, request){ 

                    if(data == '0'){ 
                        $("#availability_status").html('<img src="themes/default/images/available.png" align="absmiddle"> <font color="Green"> Khách hàng này chưa có trong hệ thống </font>  ');
                    }  
                    else {
                        result = data;//
                        $("#availability_status").html(result);
                        $("#availability_status").addClass('availability_status');
                        $(".getcusold").addClass('aLink');
                    }

                }); 
            }
        });
    }
}