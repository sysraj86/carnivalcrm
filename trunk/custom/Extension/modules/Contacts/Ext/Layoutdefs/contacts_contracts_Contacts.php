<?php
// created: 2012-11-12 16:42:17
$layout_defs["Contacts"]["subpanel_setup"]["contacts_contracts"] = array (
  'order' => 100,
  'module' => 'Contracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_CONTRACTS_FROM_CONTRACTS_TITLE',
  'get_subpanel_data' => 'contacts_contracts',
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
