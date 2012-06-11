<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
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
        1 => 
        array (
          'file' => 'modules/Accounts/jquery.min.js',
        ),
        2 => 
        array (
          'file' => 'modules/Accounts/js/jquery-ui-1.8.13.custom.min.js',
        ),
        3 => 
        array (
          'file' => 'modules/Accounts/Validate.js',
        ),
        4 => 
        array (
          'file' => 'modules/Accounts/duplicate.js',
        ),
        5 => 
        array (
          'file' => 'custom/modules/Accounts/js/dropdown.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'mst',
            'label' => 'LBL_ACCOUNTS_MST',
          ),
        ),
        1 => 
        array (
          0 => 'git_type',
          1 => 
          array (
            'name' => 'address',
            'label' => 'LBL_ADDRESS',
            'displayParams' => 
            array (
              'cols' => 80,
              'rows' => 6,
            ),
          ),
        ),
        2 => 
        array (
          0 => 'country',
          1 => '',
        ),
        3 => 
        array (
          0 => 'province_city',
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
            'customCode' => '<input name="mavung"  id="mavung" size="10" maxlength="10" type="text" value="{$fields.mavung.value}" readonly="readonly">&nbsp;<input name="phone_office"  id="phone_office" size="25" maxlength="25" type="text" value="{$fields.phone_office.value}">',
          ),
          1 => 'phone_fax',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
        ),
        7 => 
        array (
          0 => 'source',
          1 => 'git_action',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'established_date',
            'label' => 'LBL_ESTABLISHED_DATE',
            'displayParams' => 
            array (
              'showFormats' => true,
            ),
          ),
          1 => 'potential',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    ),
  ),
);
?>
