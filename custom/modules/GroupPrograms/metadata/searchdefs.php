<?php
$module_name = 'GroupPrograms';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'groupprogram_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'groupprogram_code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'team_leader' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LEADER',
        'width' => '10%',
        'default' => true,
        'name' => 'team_leader',
      ),
      'guide' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_GUIDE',
        'width' => '10%',
        'default' => true,
        'name' => 'guide',
      ),
      'guide_pick_up_at_airport' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PICK_UP',
        'width' => '10%',
        'default' => true,
        'name' => 'guide_pick_up_at_airport',
      ),
      'operator' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OPERATOR',
        'width' => '10%',
        'default' => true,
        'name' => 'operator',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'tour_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOURCODE',
        'width' => '10%',
        'default' => true,
        'name' => 'tour_code',
      ),
      'tour_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TOUR_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'tour_name',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'modified_user_id' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'modified_user_id',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
        'name' => 'current_user_only',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
