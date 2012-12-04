<?php
// created: 2012-11-15 15:29:25
$subpanel_layout['list_fields'] = array (
  'code' => 
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
    'width' => '45%',
    'default' => true,
  ),
  'groupprograestickets_name' => 
  array (
    'type' => 'relate',
    'link' => 'groupprograirlinestickets',
    'vname' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_GROUPPROGRAMS_TITLE',
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
    'module' => 'AirlinesTickets',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'AirlinesTickets',
    'width' => '5%',
    'default' => true,
  ),
);
?>
