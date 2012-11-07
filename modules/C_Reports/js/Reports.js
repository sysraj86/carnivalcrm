$(document).ready(function(){
    checked = $('#type').val();
    report_option = $('#report_option').val();
    $('.time_range[value="'+checked+'"]').attr('checked',true);
    $('.report_option[value="'+report_option+'"]').attr('checked',true);
    value = $('.report_option:checked').val();
    check_report_option(value);
    $('.report_option').click(function(){
        check_report_option($('.report_option:checked').val());
    });

    $('#frmForm').submit(function(){
        time_range = $('input:radio[name=time_range]:checked').val();
        if($('input:radio[name=report_option]').length >0){
            report_option = $('input:radio[name=report_option]:checked').val();
            if(!report_option){
                $('#warning').html('<font color="red">'+SUGAR.language.get('C_Reports','LBL_REPORT_OPTION_WARNING')+'</font>') ;
                return false;
            }
        }
        if(!time_range && !$('#start_end_yes').is(':checked')){
            $('#warning').html('<font color="red">'+SUGAR.language.get('C_Reports','LBL_REPORT_TIME_WARNING')+'</font>') ;
            return false;
        }

        if($('#start_end_yes').is(':checked')){
            start_date = $('#start_date').val();
            if(!start_date){
                $('#warning').html('<font color="red">'+SUGAR.language.get('C_Reports','LBL_REPORT_START_DATE_WARNING')+'</font>') ;
                return false;
            }
            end_date = $('#end_date').val();
            if(!end_date){
                $('#warning').html('<font color="red">'+SUGAR.language.get('C_Reports','LBL_REPORT_END_DATE_WARNING')+'</font>') ;
                return false;
            }
        }


    })
});

function clear_sel(name){
    var radioButtons = document.getElementsByName(name);
    for (var x = 0; x < radioButtons.length; x ++) {
        if (radioButtons[x].checked) {
            radioButtons[x].checked = false;
        }
    }
}
function check_report_option(value){
    if(value == 'person'){
        $('.lst_user').show();
        $('.lst_group').hide();
    }
    //if (value == 'group'){
//        $('.lst_user').hide();
//        $('.lst_group').show();
//    }
}