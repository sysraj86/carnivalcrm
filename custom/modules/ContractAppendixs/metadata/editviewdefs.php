<?php
$module_name = 'ContractAppendixs';
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
          'file' => 'modules/ContractAppendixs/js/calculating.js',
        ),
        2 => 
        array (
          'file' => 'custom/include/js/doctien.js',
        ),
        3 => 
        array (
          'file' => 'custom/include/js/CustomSelectField.js',
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
          0 => 'number',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contracts_cappendixs_name',
            'customCode' => '
           <input type="hidden" name="contracts_2225ntracts_ida" id="contracts_2225ntracts_ida" value="{$fields.contracts_2225ntracts_ida.value}">
           <input type="text" name="contracts_cappendixs_name" id="contracts_cappendixs_name" value="{$fields.contracts_cappendixs_name.value}" data="Button=cleardata,selectdata|Module=Contracts|Fields=id,name,number,date_of_contracts|Inputs=contracts_2225ntracts_ida,contracts_cappendixs_name,contract,date_of_contracts" class="select">
           ',
          ),
          1 => 'contract',
        ),
        2 => 
        array (
          0 => 'date',
          1 => 'date_of_contracts',
        ),
        3 => 
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
        4 => 
        array (
          0 => 'address_a',
          1 => 'phone_a',
        ),
        5 => 
        array (
          0 => 'fax',
          1 => 'mst_bena',
        ),
        6 => 
        array (
          0 => 'parent_name',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'daidienbenb_name',
            'customCode' => '
            {html_options id=salutation_b name=salutation_b options=$fields.salutation_b.options selected=$fields.salutation_b.value}
            <input data="Button=cleardata,selectdata|Module=Contacts|Fields=last_name|Inputs=daidienbenb_name" class="select" id="daidienbenb_name" name="daidienbenb_name" value="{$fields.daidienbenb_name.value}"/>
            ',
          ),
          1 => 'position_b',
        ),
        8 => 
        array (
          0 => 'address_b',
          1 => 'phone_b',
        ),
        9 => 
        array (
          0 => 'sotaikhoanbenb',
          1 => 'mst_benb',
        ),
        10 => 
        array (
          0 => 'birthday',
          1 => 'passport_no_guide',
        ),
        11 => 
        array (
          0 => 'date_issued_guide',
          1 => 'place_issued_guide',
        ),
        12 => 
        array (
          0 => 'tours_contrappendixs_name',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'tour',
            'customCode' => '{$contract_value}',
          ),
        ),
        14 => 
        array (
          0 => 'tongtien',
          1 => 
          array (
            'name' => 'bangchu',
            'customCode' => '
            <input id="bangchu" name="bangchu" readonly value="{$fields.bangchu.value}"/>
            ',
          ),
        ),
        15 => 
        array (
          0 => 'tigia',
          1 => 'tiente',
        ),
        16 => 
        array (
          0 => 'tongtien2',
        ),
        17 => 
        array (
          0 => 'template_ddown_c',
          1 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
