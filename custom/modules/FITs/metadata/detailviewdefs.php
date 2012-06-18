<?php
$viewdefs ['FITs'] = 
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
          4 => 
          array (
            'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
          ),
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
          'file' => 'custom/include/js/jquery.js',
        ),                
        1 => 
        array (
          'file' => 'custom/modules/FITs/js/detailview.js',
        )      
      ),
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'gender',
          1 => 'birthday',
        ),
        2 => 
        array (
          0 => 'fit_type',
          1 => 'religion',
        ),
        3 => 
        array (
          0 => 'phone_mobile',
          1 => 
          array (
            'name' => 'phone_home',
            'comment' => 'Home phone number of the contact',
            'label' => 'LBL_HOME_PHONE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX_PHONE',
          ),
        ),
        5 => 
        array (
          0 => 'nationality',
          1 => 'provice_city',
        ),
        6 => 
        array (
          0 => 'address',
          1 => 'district',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'nick_skype',
            'label' => 'LBL_NICK_SKYPE',
          ),
          1 => 'nick_chat',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'fit_type2',
            'label' => 'LBL_FIT2_TYPE',
          ),
          1 => 'source',
        ),
        1 => 
        array (
          0 => 'potential',
          1 => 
          array (
            'name' => 'level',
            'label' => 'LBL_LEVEL',
          ),
        ),
      ),
      'LBL_PASSPORT_INFO' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'passport_no',
            'label' => 'LBL_PASSPORT_NO',
          ),
        ),
        1 => 
        array (
          0 => 'date_issue',
          1 => 'expiration_date',
        ),
        2 => 
        array (
          0 => 'issue_place',
          1 => 'passport_status',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'visited_country',
            'label' => 'LBL_VISITED_COUNTRY',
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
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 'deparment',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accounts_fits_name',
            'label' => 'LBL_ACCOUNT_NAME',
          ),
          1 => 'fit_title',
        ),
        2 => 
        array (
          0 => 'career',
          1 => 
          array (
            'name' => 'fit_relationship_type',
            'label' => 'LBL_RELATIONSHIP_TYPE',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'fits_fits_name',
            'label' => 'LBL_MEMBER_OF',
          ),
        ),
        4 => 
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
