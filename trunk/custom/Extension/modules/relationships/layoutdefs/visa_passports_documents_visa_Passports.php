<?php
// created: 2011-08-13 01:30:56
$layout_defs["visa_Passports"]["subpanel_setup"]["visa_passports_documents"] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VISA_PASSPORTS_DOCUMENTS_FROM_DOCUMENTS_TITLE',
  'get_subpanel_data' => 'visa_passports_documents',
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
