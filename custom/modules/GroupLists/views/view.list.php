<?php

require_once('include/MVC/View/views/view.list.php');

class CustomGroupListsViewList extends ViewList
{
    /**
    * @see ViewList::preDisplay()
    */
    public function preDisplay()
    {
        parent::preDisplay();

        $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();
    }
    function listViewProcess(){
        $this->processSearchForm();
        $this->lv->searchColumns = $this->searchForm->searchColumns;

        if(!$this->headers)
            return;
        if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
            $this->lv->setup($this->seed, 'custom/modules/GroupLists/tpls/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);
            echo $this->lv->display();
        }
    }

    /**
    * @return string HTML
    */
    protected function buildMyMenuItem()
    {
        global $app_strings;

        return <<<EOHTML
         <a href='#' style='width: 150px' class='menuItem'
            onmouseover='hiliteItem(this,"yes");' onmouseout='unhiliteItem(this);'
            onclick="get_link('{$_REQUEST['module']}','{$app_strings['LBL_LISTVIEW_NO_SELECTED']}')  ";>
            Report
         </a>
EOHTML;
    }
}
