<?php 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

require_once('include/MVC/View/views/view.list.php'); 

class FITsViewList extends ViewList{ 
     function FITsViewList() 
     { 
         parent::ViewList();
     }
     function listViewPrepare(){
        parent::listViewPrepare();
        global $current_user;
        $_SESSION[$current_user->user_name]['displayColumns'] =  $this->lv->displayColumns;
     } 
      
     /* 
      * Override listViewProcess with addition to where clause to exclude project templates 
      */ 

}
?>
