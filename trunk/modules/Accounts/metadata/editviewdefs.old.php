<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => array ( 
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
      ),
      'useTabs' => true,
      'syncDetailEditViews' => true,
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
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'git_type',
            'comment' => 'select type of git',
            'label' => 'LBL_GIT_TYPE',
          ),
          1 => 
          array (
            'name' => 'source',
            'comment' => 'select source of git',
            'label' => 'LBL_GIT_SOURCE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'established_date',
            'comment' => 'the date established company',
            'label' => 'LBL_ESTABLISHED_DATE',
          ),
          1 => 
          array (
            'name' => 'action',
            'comment' => 'the action of employees with git',
            'label' => 'LBL_GIT_ACTION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'potential',
            'comment' => 'Potential of GIT',
            'label' => 'LBL_POTENTIAL',
          ),
          1 => 'industry',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
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
