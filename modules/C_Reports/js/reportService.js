$(document).ready(function(){
    $('#service_select').click(function(){
        var module = $('#dichvu').val();
        if(module != ''){
            open_popup(module,600,400,"",true,false,{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"service_id","name":"service"}}, "single",true);
        }
        return false;                              
    });
    $('#service_clear').click(function(){
        $('#service').val('');
        $('#service_id').val('');
        return false;                              
    });
    $('#dichvu').change(function(){
        $('#service').val('');
        $('#service_id').val('');    
    });
    if($('#service').val() != ''){
        $('#export').show();  
    }else{
        $('#export').hide();   
    }
});