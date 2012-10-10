<?php
$module_name = 'GroupPrograms';
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
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'start_date_group',
            'label' => 'LBL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'end_date_group',
            'label' => 'LBL_END_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'groupprograsportlist_name',
            'label' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
          ),
          1 => 
          array (
            'name' => 'groupprograketslists_name',
            'label' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETSLISTS_FROM_AIRLINESTICKETSLISTS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'groupprograorksheets_name',
            'label' => 'LBL_GROUPPROGRAMS_WORKSHEETS_FROM_WORKSHEETS_TITLE',
          ),
          1 => 
          array (
            'name' => 'hotels_groupprograms_name',
            'label' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_HOTELS_TITLE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'grouplists_pprograms_name',
            'label' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'restaurantspprograms_name',
            'label' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_RESTAURANTS_TITLE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
