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
      'useTabs' => true,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
          array (
            'name',
            'account_code',
          ),
          array(
             'git_type',
             'address',
          ),
          
          array(
            'phone_office' ,
            'phone_fax',
          ),
          
          array(
            'country_name','destination_name',
          ),
          
          array(
            'district'
          ),
          
          array(
             'email1', 'industry',
          ),
          
          array(
            'source', 'website',
          ),
          
          array(
            'established_date', 'git_action'
          ),
          
          array(
            'description'
          ),
         /* array (

            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
            'displayParams' => 
            array (
              'link_target' => '_blank',
            ),
           ),
          array (
            'name' => 'phone_fax',
            'comment' => 'The fax phone number of this company',
            'label' => 'LBL_FAX',
          ),
          array (
            'name' => 'git_type',
            'comment' => 'select type of git',
            'label' => 'LBL_GIT_TYPE',
          ),
          array (
            'name' => 'source',
            'comment' => 'select source of git',
            'label' => 'LBL_GIT_SOURCE',
          ),
          array (
            'name' => 'established_date',
            'comment' => 'the date established company',
            'label' => 'LBL_ESTABLISHED_DATE',
          ),
          array (
            'name' => 'git_action',
            'comment' => 'the action of employees with git',
            'label' => 'LBL_GIT_ACTION',
          ),
  
          array (
            'name' => 'potential',
            'comment' => 'Potential of GIT',
            'label' => 'LBL_POTENTIAL',
          ),
          array (
            'name' => 'industry',
            'comment' => 'The company belongs in this industry',
            'label' => 'LBL_INDUSTRY',
          ),

          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          array (
            'name' => 'billing_address_street',
            'label' => 'LBL_BILLING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
            ),
          ),

          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),*/
        ),
      'LBL_PANEL_ASSIGNMENT' => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
      ),
  ),
);
?>
