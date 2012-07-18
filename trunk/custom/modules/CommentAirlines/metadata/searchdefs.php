<?php
$module_name = 'CommentAirlines';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'code',
      1 => 'name',
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'code' => 
      array (
        'name' => 'code',
        'default' => true,
        'width' => '10%',
      ),
      'groupprogra_comments_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_GROUPPROGRAMS_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'groupprogra_comments_name',
      ),
      'ykienkhac1' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_YKIENKHAC',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'ykienkhac1',
      ),
      'loaimaybay' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_LOAIMAYBAY',
        'width' => '10%',
        'name' => 'loaimaybay',
      ),
      'truongdoan' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TRUONGDOAN',
        'width' => '10%',
        'default' => true,
        'name' => 'truongdoan',
      ),
      'lichtrinh' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LICHTRINH',
        'width' => '10%',
        'default' => true,
        'name' => 'lichtrinh',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'hanghangkhong' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HANGHANGKHONG',
        'width' => '10%',
        'default' => true,
        'name' => 'hanghangkhong',
      ),
      'fits_comments_name' => 
      array (
        'name' => 'fits_comments_name',
        'default' => true,
        'width' => '10%',
      ),
      'modified_user_id' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'modified_user_id',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'ngaybatdau' => 
      array (
        'type' => 'date',
        'label' => 'LBL_NGAYBATDAU',
        'width' => '10%',
        'default' => true,
        'name' => 'ngaybatdau',
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
