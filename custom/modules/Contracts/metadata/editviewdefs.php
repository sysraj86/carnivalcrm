<?php
$module_name = 'Contracts';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/include/js/jquery.table.clone.js',
        ),
        1 => 
        array (
          'file' => 'custom/include/js/doctien.js',
        ),
        2 => 
        array (
          'file' => 'modules/Contracts/js/calculating.js',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'number',
        ),
        1 => 
        array (
          0 => 'date_of_contracts',
          1 => 
          array (
            'name' => 'date_of_contracts_liquidate',
            'label' => 'LBL_DATE_OF_CONTRACTS_LIQUIDATE',
          ),
        ),
        2 => 
        array (
          0 => 'template_ddown_c',
          1 => 'assigned_user_name',
        ),
      ),
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'bena',
            'label' => 'LBL_BEN_A',
            'displayParams' => 
            array (
              'size' => '60',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'daidienbena',
            'customCode' => '
            {html_options id=salutation_a name=salutation_a options=$fields.salutation_a.options selected=$fields.salutation_a.value}
            <input id="daidienbena" name="daidienbena" value="{$fields.daidienbena.value}"/>
            ',
          ),
          1 => 'position_a',
        ),
        2 => 
        array (
          0 => 'address_a',
          1 => 'mst_bena',
        ),
        3 => 
        array (
          0 => 'fax_a',
          1 => 'phone_a',
        ),
        4 => 
        array (
          0 => 'bank_name',
          1 => 'account_name',
        ),
        5 => 
        array (
          0 => 'account_vnd',
          1 => 'account_usd',
        ),
        6 => 
        array (
          0 => 'swift_code',
          1 => 'bank_address',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'parent_name',
          ),
          1 => 
          array (
            'name' => 'customer_type',
          ),
        ),
        8 => 
        array (
          0 => 'contacts_contracts_name',
          1 => 'position_b',
        ),
        9 => 
        array (
          0 => 'address_b',
          1 => 'mst_benb',
        ),
        10 => 
        array (
          0 => 'phone_b',
          1 => 'fax_b',
        ),
        11 => 
        array (
          0 => 'bank_name_b',
          1 => 'account_name_b',
        ),
        12 => 
        array (
          0 => 'sotaikhoanbenb',
          1 => '',
        ),
        13 => 
        array (
          0 => 'birthday',
          1 => 'passport_no_guide',
        ),
      ),
      'LBL_TOUR_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 'groupprogracontracts_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'service',
            'label' => 'LBL_SERVICE',
          ),
          1 => 'tensanbay',
        ),
        2 => 
        array (
          0 => 'start_date_contract',
          1 => 'end_date_contract',
        ),
        3 => 
        array (
          0 => 'num_of_date',
          1 => 'num_of_night',
        ),
        4 => 
        array (
          0 => 'customer_number',
          1 => 'purpose',
        ),
      ),
      'LBL_CONTRACT_VALUES' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'contract_value',
            'customCode' => '{$contract_value}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'tongtien',
            'customCode' => '<input name="tongtien" id="tongtien" value="{$tongtien}">
            {html_options name=tiente id=tiente options=$fields.tiente.options selected=$fields.tiente.value}
            ',
          ),
          1 => 
          array (
            'name' => 'bangchu',
            'displayParams' => 
            array (
              'size' => '60',
            ),
          ),
        ),
        2 => 
        array (
          0 => 'contract_value_note',
          1 => '',
        ),
        3 => 
        array (
          0 => 'baogom',
          1 => '',
        ),
        4 => 
        array (
          0 => 'khongbaogom',
          1 => '',
        ),
      ),
      'LBL_CONTRACT_CONDITIONS' => 
      array (
        0 => 
        array (
          0 => 'solanthanhtoan',
          1 => 'tienhuyphat',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contract_condition',
            'customCode' => '{$contract_condition}',
          ),
        ),
      ),
    ),
  ),
);
?>
