$(function(){          
    $('#type').change(function(){
        $.ajax({
            type : 'POST',
            url : 'index.php?module=Tours&entryPoint=AjaxDestination',
            //dataType : 'json',
            data: {
                type : $('#type').val()
            },
        });
    });
});