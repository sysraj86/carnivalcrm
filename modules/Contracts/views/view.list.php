<?php
require_once('include/MVC/View/views/view.list.php');
require_once('modules/Contracts/Contract.php');
require_once('modules/Currencies/Currency.php');
class ContractsViewList extends ViewList{

function listViewProcess(){
    $this->processSearchForm();
    $this->lv->searchColumns = $this->searchForm->searchColumns;
    if(!$this->headers)
    return;
    if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
        $this->lv->setup($this->seed, 'modules/Contracts/tpls/ListViewGeneric.tpl', $this->where, $this->params);
        $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
        echo get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);


        /**
        * added by Hoc Bui
        *
        * @var OpportunitiesViewList
        */

        $filter_fields = array();
        $orderBy = "";
        $ret_array = $this->seed->create_new_list_query($orderBy, $this->where, $filter_fields, $this->params, 0, '', true, $this->seed, true);

        $main_query = $ret_array['select'] . $params['custom_select'] . $ret_array['from'] . $params['custom_from'] . $ret_array['inner_join']. $ret_array['where'] . $params['custom_where'] . $ret_array['order_by'] . $params['custom_order_by'];

        //print_r($ret_array);
        //exit;
        /*$query = "SELECT amount_usdollar,amount, deleted FROM opportunities " ;
        if($this->where)
        $query .= "WHERE ".$this->where;*/

        global $db;
        $result = $db->query($main_query);
        $i=0;
        $total = 0;
        while(($row=$db->fetchByAssoc($result)) != null) {
            if($row['deleted'] != 1){
                $total += $row['tongtien'];
            }
            $i++; 
        }
        // $this->lv->ss->assign("total", currency_format_number($GLOBALS['ESCOppAmount'])) ;
        $this->lv->ss->assign("total", currency_format_number($total)) ;

        /**
        * end Hoc Bui
        *
        * @var OpportunitiesViewList
        */

        echo $this->lv->display();

    //echo currency_format_number($GLOBALS['ESCOppAmount']);
    }
}


}
?>