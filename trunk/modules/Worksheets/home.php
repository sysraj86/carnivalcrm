<?php
  $ss = new Sugar_Smarty();
  $ss->assign("MOD", $mod_strings);
  $ss->assign("APP", $app_strings);
  $ss->display('modules/Worksheets/tpls/home.tpl') ;
?>
