<?php
$dictionary['Opportunity']['fields']['ngaykhoihanh'] = array (
    'required' => false,
    'name' => 'ngaykhoihanh',
    'vname' => 'LBL_NGAYKHOIHANH',
    'type' => 'date',
    'enable_range_search' => true,
    'size' => '30',
    'options' => 'date_range_search_dom',
);
$dictionary['Opportunity']['fields']['songuoilon'] = array (
    'name' => 'songuoilon',
    'vname' => 'LBL_SONGUOILON',
    'type' => 'int',
    'importable' => 'true',
    'default' => '0', 
    'size' => '20',
    'enable_range_search' => true,
    'duplicate_merge' => 'disabled', 
    'options' => 'numeric_range_search_dom',
);
$dictionary['Opportunity']['fields']['thongtintreem'] = array (
    'required' => false,
    'name' => 'thongtintreem',
    'vname' => 'LBL_THONGTINTREEM',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'len' => '255',
    'studio' => 'visible',
    'rows' => '4',
    'cols' => '50',
);
$dictionary['Opportunity']['fields']['songaydi'] = array (
    'name' => 'songaydi',
    'vname' => 'LBL_SONGAYDI',
    'type' => 'int',
    'importable' => 'true',
    'default' => '0', 
    'size' => '20',
    'maxsize' => '255',
    'enable_range_search' => true,
    'duplicate_merge' => 'disabled',
    'options' => 'numeric_range_search_dom',
);
$dictionary['Opportunity']['fields']['noimuondi'] = array (
    'name' => 'noimuondi',
    'vname' => 'LBL_NOIMUONDI',
    'type' => 'varchar',
);
$dictionary['Opportunity']['fields']['phuongtienmuondi'] = array (
    'name' => 'phuongtienmuondi',
    'vname' => 'LBL_PHUONGTIENMUONDI',
    'type' => 'varchar',
);
?>