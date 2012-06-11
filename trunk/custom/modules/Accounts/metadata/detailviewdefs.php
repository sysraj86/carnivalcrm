<?php
$viewdefs ['Accounts'] = 
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
          3 => 'FIND_DUPLICATES',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'code',
            'label' => 'LBL_ACCOUNT_CODE',
          ),
        ),
        1 => 
        array (
          0 => 'git_type',
          1 => 
          array (
            'name' => 'mst',
            'label' => 'LBL_ACCOUNTS_MST',
          ),
        ),
        2 => 
        array (
          0 => 'country',
          1 => 'address',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'province_city',
          ),
          1 => 'deparment',
        ),
        4 => 
        array (
          0 => 'district',
          1 => 'industry',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'phone_office',
            'customCode' => '<a href="callto://+{$fields.mavung.value}{$fields.phone_office.value}">({$fields.mavung.value})&nbsp;{$fields.phone_office.value}</a>',
          ),
          1 => 'phone_fax',
        ),
        6 => 
        array (
          0 => 'email1',
          1 => 'website',
        ),
        7 => 
        array (
          0 => 'source',
          1 => 'git_action',
        ),
        8 => 
        array (
          0 => 'established_date',
          1 => 
          array (
            'name' => 'potential',
            'comment' => 'Potential of GIT',
            'label' => 'LBL_POTENTIAL',
          ),
        ),
        9 => 
        array (
          0 => 'description',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
?>
