<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   if(isset($_POST['parent_type'])){
        $parent_type    = isset($_POST['parent_type']) ? htmlspecialchars($_POST['parent_type']):"";
        $ss = new Sugar_Smarty();
        $ss->assign('PARENT',$parent_type);
   }
?>
