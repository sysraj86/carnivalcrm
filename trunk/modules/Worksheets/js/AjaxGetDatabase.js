$(function(){ 
    $('#btnAction').click(function(){
        $.ajax({
            type : 'POST',
            url : 'index.php?module=Worksheets&entryPoint=AjaxGetDatabase',
            data: {
                tour_id : $('#tour_id').val()
            },
        });
    });
});