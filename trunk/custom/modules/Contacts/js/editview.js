// For fixbug 261
$(document).ready(function(){
    // Onload
    controlParentType();
    
    // Onchange
    $('#parent_type').change(function(){
        controlParentType();
        $('#phone_work, #phone_fax').val('');
    });
    
    function controlParentType(){
        var parentType = $('#parent_type').val();
        if(parentType == 'Airlines'){
            $('#btn_parent_name').remove();
            $('#btn_clr_parent_name').before('<button type="button" name="btn_parent_name" id="btn_parent_name" tabindex="107" title="Select [Alt+T]" accesskey="T" class="button firstChild" value="Select" onclick=\'open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","phone":"phone_work"}}, "single", true);\'><img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=652842577"></button>');
        }else if(parentType == 'Accounts'){
            $('#btn_parent_name').remove();
            $('#btn_clr_parent_name').before('<button type="button" name="btn_parent_name" id="btn_parent_name" tabindex="107" title="Select [Alt+T]" accesskey="T" class="button firstChild" value="Select" onclick=\'open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","phone_office":"phone_work","phone_fax":"phone_fax"}}, "single", true);\'><img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=652842577"></button>');
        }else if(parentType == 'Hotels'){
            $('#btn_parent_name').remove();
            $('#btn_clr_parent_name').before('<button type="button" name="btn_parent_name" id="btn_parent_name" tabindex="107" title="Select [Alt+T]" accesskey="T" class="button firstChild" value="Select" onclick=\'open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","tel":"phone_work","fax":"phone_fax"}}, "single", true);\'><img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=652842577"></button>');
        }else if(parentType == 'Restaurants'){
            $('#btn_parent_name').remove();
            $('#btn_clr_parent_name').before('<button type="button" name="btn_parent_name" id="btn_parent_name" tabindex="107" title="Select [Alt+T]" accesskey="T" class="button firstChild" value="Select" onclick=\'open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","tel":"phone_work","fax":"phone_fax"}}, "single", true);\'><img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=652842577"></button>');
        }else if(parentType == 'Services'){
            $('#btn_parent_name').remove();
            $('#btn_clr_parent_name').before('<button type="button" name="btn_parent_name" id="btn_parent_name" tabindex="107" title="Select [Alt+T]" accesskey="T" class="button firstChild" value="Select" onclick=\'open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","tel":"phone_work"}}, "single", true);\'><img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=652842577"></button>');
        }else if(parentType == 'Transports'){
            $('#btn_parent_name').remove();
            $('#btn_clr_parent_name').before('<button type="button" name="btn_parent_name" id="btn_parent_name" tabindex="107" title="Select [Alt+T]" accesskey="T" class="button firstChild" value="Select" onclick=\'open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","phone":"phone_work"}}, "single", true);\'><img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=652842577"></button>');
        }else{
            // Con lai cac truong hop khac phat sinh them thi add vao day
        }
    }
});