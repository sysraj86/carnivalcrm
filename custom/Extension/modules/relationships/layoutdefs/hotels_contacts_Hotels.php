<?php
// created: 2011-08-19 11:15:42
$layout_defs["Hotels"]["subpanel_setup"]["hotels_contacts"] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HOTELS_CONTACTS_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'hotels_contacts',
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
