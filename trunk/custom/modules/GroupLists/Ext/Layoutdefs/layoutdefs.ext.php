<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-22 11:02:04
$layout_defs["GroupLists"]["subpanel_setup"]["grouplists_accounts"] = array (
  'order' => 100,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPLISTS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'grouplists_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-08-22 10:53:04
$layout_defs["GroupLists"]["subpanel_setup"]["grouplists_fits"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPLISTS_FITS_FROM_FITS_TITLE',
  'get_subpanel_data' => 'grouplists_fits',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['GroupLists']['subpanel_setup']['grouplists_accounts']['override_subpanel_name'] = 'GroupLists_subpanel_grouplists_accounts';


//auto-generated file DO NOT EDIT
$layout_defs['GroupLists']['subpanel_setup']['grouplists_fits']['override_subpanel_name'] = 'GroupLists_subpanel_grouplists_fits';

?>