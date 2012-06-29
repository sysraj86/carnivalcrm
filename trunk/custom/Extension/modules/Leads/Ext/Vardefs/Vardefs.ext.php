<?php

$dictionary['Lead']['fields']['type'] = array (
      'name' => 'type',
    'type' => 'enum',
    'vname'=>'LBL_TYPE',
    'options'=>'lead_type_dom',
);
$dictionary['Lead']['fields']['gender'] = array (
    'required' => true,
    'name' => 'gender',
    'vname' => 'LBL_GENDER',
    'type' => 'radioenum',
    'massupdate' => 1,
    'default' => 'male',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'enable',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'gender_dom',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '',
);


?>

