<?php
$module_name = 'CostGuides';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'area',
            'label' => 'LBL_AREA',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'congtacphi',
            'label' => 'LBL_CONGTACPHI',
          ),
          1 => 
          array (
            'name' => 'chiphikhachsan',
            'label' => 'LBL_CHIPHIKHACHSAN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cacbuaan',
            'label' => 'LBL_CACBUAAN',
          ),
          1 => 
          array (
            'name' => 'chiphivemaybay',
            'label' => 'LBL_CHIPHIVEMAYBAY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'chiphivetau',
            'label' => 'LBL_CHIPHIVETAU',
          ),
          1 => 
          array (
            'name' => 'chiphianngu',
            'label' => 'LBL_CHIPHIANNGU',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'chiphivexe',
            'label' => 'LBL_CHIPHIVEXE',
          ),
          1 => 
          array (
            'name' => 'tours_costguides_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'chihdvhalong',
            'label' => 'LBL_CHIHDVHALONG',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 'description',
        ),
        7 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
