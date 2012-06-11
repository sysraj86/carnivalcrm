function get_start_date(){
    return document.getElementById('start_date_basic').value;
}
function get_end_date(){
    return document.getElementById('end_date_basic').value;
}
function get_link(module,message){
   var href = 'index.php?entryPoint=ReportCustomer';
    /*sugarListView.get_checks();
    if(sugarListView.get_checks_count() < 1) {
        alert("{$app_strings['LBL_LISTVIEW_NO_SELECTED']}");
        return false;
    }
    window.location = "index.php?module="+module+"&action="+action;*/ 
    return sListView.send_form(true,module,href,message); 
}