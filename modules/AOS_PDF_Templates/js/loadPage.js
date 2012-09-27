$(document).ready(function(){
    loadField();
    $('#type').change(function(){
        loadField();
        insertSample(0);  
    });
    $('#sample').change(function(){
       loadField();  
    });
    function loadField(){
        if($('#type').val()=='Accounts'){
            $('#variable_text').val('$accounts_name');  
        }else if($('#type').val()=='Leads'){
            $('#variable_text').val('$leads_name');
        }else if($('#type').val()=='Contacts'){
            $('#variable_text').val('$contacts_name');
        }
    }
});