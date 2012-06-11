function validateDateValid(start_date,end_date){
     var s_d =Date.parse($(start_date).val());
     var e_d =Date.parse($(end_date).val());
     if(new Date(e_d -s_d )<0){
         alert('Bạn phải nhập đến ngày lớn hơn từ ngày') ;
         $(end_date).focus();
         return false;
     }
     return true;
}

function checkDate(){
    if($('#start_date').val()==''){
        alert('Bạn chưa nhập từ ngày');
        $('#start_date').focus();
        return false;
    }
    if($('#end_date').val()==''){
        alert('Bạn chưa nhập đến ngày');
        $('#end_date').focus();
        return false;
    }
    if(validateDateValid('#start_date','#end_date')== false){
        return false;
    }
    return true;
}