<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 1/4/12
 * Time: 10:04 AM
 * FileName: view.list.php
 */

require_once('include/MVC/View/views/view.list.php');
class CustomToursViewList extends ViewList
{
    public function preDisplay()
    {
        echo '<script type="text/javascript" src="custom/include/js/jquery.js"></script>';
        echo '<script type="text/javascript" src="modules/Tours/js/Sync.js"></script>';
        parent::preDisplay();
        $this->lv->actionsMenuExtraItems[] = $this->builMyMenuItem();
    }
    function listViewProcess(){
            $this->processSearchForm();
            $this->lv->searchColumns = $this->searchForm->searchColumns;

            if(!$this->headers)
                return;
            if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
                $this->lv->setup($this->seed, 'custom/modules/Tours/tpls/ListViewGeneric.tpl', $this->where, $this->params);
                $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
                echo get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);
                echo $this->lv->display();
            }
        }

    public function builMyMenuItem()
    {
        global $app_strings;

        return <<<EOHTML
        <a href='#' style='width: 150px' class='menuItem'
            onmouseover='hiliteItem(this,"yes");' onmouseout='unhiliteItem(this);'
            onclick="sync_with_web(this); return false;">
            Sync with web site
         </a>
EOHTML;

    }
}