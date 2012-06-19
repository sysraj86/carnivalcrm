$(document).ready(function(){
    // Override ham set_return cua Sugar de nhung them vao code xu ly
    set_return_and_save_background = function(popup_reply_data){
        // Doan code mac dinh cua sugar
        var form_name=popup_reply_data.form_name;var name_to_value_array=popup_reply_data.name_to_value_array;var passthru_data=popup_reply_data.passthru_data;var select_entire_list=typeof(popup_reply_data.select_entire_list)=='undefined'?0:popup_reply_data.select_entire_list;var current_query_by_page=popup_reply_data.current_query_by_page;var query_array=new Array();if(name_to_value_array!='undefined'){for(var the_key in name_to_value_array)
        {if(the_key=='toJSON')
        {}
        else
        {query_array.push(the_key+"="+name_to_value_array[the_key]);}}}
        var selection_list=popup_reply_data.selection_list;if(selection_list!='undefined'){for(var the_key in selection_list)
        {query_array.push('subpanel_id[]='+selection_list[the_key])}}
        var module=get_module_name();var id=get_record_id();query_array.push('value=DetailView');query_array.push('module='+module);query_array.push('http_method=get');query_array.push('return_module='+module);query_array.push('return_id='+id);query_array.push('record='+id);query_array.push('isDuplicate=false');query_array.push('action=Save2');query_array.push('inline=1');query_array.push('select_entire_list='+select_entire_list);if(select_entire_list==1){query_array.push('current_query_by_page='+current_query_by_page);}
        var refresh_page=escape(passthru_data['refresh_page']);for(prop in passthru_data){if(prop=='link_field_name'){query_array.push('subpanel_field_name='+escape(passthru_data[prop]));}else{if(prop=='module_name'){query_array.push('subpanel_module_name='+escape(passthru_data[prop]));}else{query_array.push(prop+'='+escape(passthru_data[prop]));}}}
        var query_string=query_array.join('&');request_map[request_id]=passthru_data['child_field'];var returnstuff=http_fetch_sync('index.php',query_string);request_id++;got_data(returnstuff,true);if(refresh_page==1){document.location.reload(true);}
        // End doan code mac dinh cua sugar
        reload();   // Extend code
    }
    
    // Override ham sub_p_rem cua Sugar de nhung them vao code xu ly
    sub_p_rem = function(sp,lf,li,rp){
        // Doan code mac dinh cua sugar
        return_url="index.php?module="+get_module_name()+"&action=SubPanelViewer&subpanel="+sp+"&record="+get_record_id()+"&sugar_body_only=1&inline=1";remove_url="index.php?module="+get_module_name()
        +"&action=DeleteRelationship"
        +"&record="+get_record_id()
        +"&linked_field="+lf
        +"&linked_id="+li
        +"&return_url="+escape(escape(return_url))
        +"&refresh_page="+rp;showSubPanel(sp,remove_url,true);
        // End doan code mac dinh cua sugar
        reload();   // Extend code
    }
    
    function reload(){
        window.location.reload();    
    }
});