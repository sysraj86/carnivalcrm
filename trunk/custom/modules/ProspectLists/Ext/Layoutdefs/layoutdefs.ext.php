<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-10-26 19:00:56
$layout_defs["ProspectLists"]["subpanel_setup"]["prospectlists_fits"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROSPECTLISTS_FITS_FROM_FITS_TITLE',
  'get_subpanel_data' => 'prospectlists_fits',
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



$layout_defs['ProspectLists']['subpanel_setup']['securitygroups'] = array(
	'top_buttons' => array(array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'SecurityGroups', 'mode' => 'MultiSelect'),),
	'order' => 900,
	'sort_by' => 'name',
	'sort_order' => 'asc',
	'module' => 'SecurityGroups',
	'refresh_page'=>1,
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'SecurityGroups',
	'add_subpanel_data' => 'securitygroup_id',
	'title_key' => 'LBL_SECURITYGROUPS_SUBPANEL_TITLE',
);





?>