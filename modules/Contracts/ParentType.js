$(function(){ 
/*$.ajax({
            type : 'POST',
            url : 'index.php?module=Contracts&entryPoint=ParentType',
            data: {
                parent_type : $('.parent_type').val()
            },
        });*/
         
    $('.parent_type').change(function(){
        $.ajax({
            type : 'POST',
            url : 'index.php?module=Contracts&entryPoint=ParentType',
            data: {
                parent_type : $('.parent_type').val()
            },
        });
    });
});