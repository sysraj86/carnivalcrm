function filterPopup(fieldname, id, module, popup_request_data){
        // fieldname: name of field in popup searchdefs of module (eg hotel_contact_name)
        // id: id of field relate object (eg hotel_name)
        var filter = "";
        if(document.getElementById(id).value)
            filter = "&" + fieldname + "=" + document.getElementById(id).value ;
        open_popup(module, 600, 400, filter, true, false, popup_request_data, "single", true);
    }