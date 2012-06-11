var tagLink= $('<link/>',{
    "type":"text/css",
    "rel":"stylesheet",
    //"href":"modules/Accounts/css/style.css"
    "href":"modules/Accounts/css/ui-lightness/jquery-ui-1.8.13.custom.css"
});

var  tagUI = $('<link/>',{
    'type' : 'text/css',
    'rel'  : 'stylesheet',
    'href' : 'modules/Accounts/css/autocomplete.css'
    
});

$('head').append(tagUI);

$("head").append(tagLink);
$(function(){
     //$( "#date" ).datepicker();
    /*$("#name").keyup(function(){
          $("#name").autocomplete('autocomplete.php',{
                width:300,
                autofill:true,
          });
    }  );*/
    $("#name").autocomplete({
        source:function(req,add){
            $.getJSON('autocomplete.php?callback=?&val='+$('#name').val(),req,function(data){
                 var suggestions=[]; 
                 $.each(data,function(i,val){
                    suggestions.push(val.name);
                     
                 });
                 //console.log(suggestions);
                 
                 add(suggestions);
            });  
        },
        select: function(event, ui){
            temp = ui.item.value;
            checkDublicate(temp); 
        },
        width:50,
        max: 10,
        height:10,
        scroll: true,
        autoFill:true,
        height:300,
        
    }); 
   $('#name').blur(function(){
       $('#name').val($(this).val().toUpperCase());
       
    });
    
    /*$('#name').result(function(event, data, formatted) {
     alert('Someone picked a suggestion from the drop-down');
});  */ 

    /*$('.ui-corner-all').click(function(){
        alert($('#name').val().length);
        var name    = jQuery("#name").val();
        //$('#name').val($(this).val().toUpperCase());  
        if((name.length )<3){ 
            $('#name').parent().append('<br/><font color="#cc0000">Full Name too short</font>');
          
          
         // checkDuplicate();     
        }
    }); */
                           
});