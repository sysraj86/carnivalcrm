<?php
$module_name = 'Quotes';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'lbl_overview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'department',
            'label' => 'LBL_DEPARTMENT',
          ),
          1 => 
          array (
            'name' => 'quotes_status',
            'label' => 'LBL_QUOTES_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'parent_name',
            'label' => 'LBL_LIST_RELATED_TO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'quotes_tours_name',
            'label' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
          ),
          1 => 
          array (
            'name' => 'contacts_quotes_name',
            'label' => 'LBL_CONTACTS_QUOTES_FROM_CONTACTS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'orders_quotes_name',
            'label' => 'LBL_ORDERS_QUOTES_FROM_ORDERS_TITLE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'sender',
            'label' => 'LBL_SENDER',
          ),
          1 => 
          array (
            'name' => 'senddate',
            'label' => 'LBL_SENDDATE',
          ),
        ),
        5 => 
        array (
          0 => 'assigned_user_name',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
