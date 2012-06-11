<?php
// created: 2011-09-20 09:11:08
$subpanel_layout['list_fields'] = array (
  'groupprogram_code' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'start_date_group' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'end_date_group' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'status' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_STATUS',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'link' => 'assigned_user_link',
    'type' => 'relate',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Contracts',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Contracts',
    'width' => '5%',
    'default' => true,
  ),
);
?>
