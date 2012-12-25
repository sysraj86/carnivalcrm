<?php
$module_name = 'Quotes';
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
          3 => 
          array (
            'customCode' => '<input title="{$MOD.LBL_EXPORTTOWORD}" type="button" accessKey="{$MOD.LBL_EXPORTTOWORD}" class="button" onclick="window.location.href=\'index.php?module=Quotes&action=export2word&record={$fields.id.value}&department={$fields.department.value}\'" name="button" value="Export To Word">',
          ),
        ),
      ),
      'includes' => 
      array (
        2 => 
        array (
          'file' => 'custom/include/js/jquery.js',
        ),
        1 => 
        array (
          'file' => 'modules/Quotes/js/detailview.js',
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
      'lbl_overview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'department',
            'label' => 'LBL_DEPARTMENT',
          ),
          1 => 
          array (
            'name' => 'quotes_status',
            'label' => 'LBL_QUOTES_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'parent_name',
            'label' => 'LBL_LIST_RELATED_TO',
          ),
        ),
        2 => 
        array (
          0 => 'quotes_tours_name',
          1 => 'contacts_quotes_name',
        ),
        3 => 
        array (
          0 => 'orders_quotes_name',
          1 => 
          array (
            'name' => 'opportunities_quotes_name',
          ),
        ),
        4 => 
        array (
          0 => 'sender',
          1 => 'senddate',
        ),
        5 => 
        array (
          0 => 'assigned_user_name',
        ),
        6 => 
        array (
          0 => 'description',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'cost_detail',
            'label' => 'LBL_COST_DETAIL',
            'customCode' => '{$doshtml} {$ibhtml} <!-- CHIET TINH OUT BOUND -->
                <div id="outbound">
                     <table width="100%" border="1" class="table_clone" cellspacing="0" cellpadding="2" style="border-collapse:collapse">
                        <tr>
                             <td  class="tdborder"> Price / Person</td> <td class="tdborder"> Tax </td> <td class="tdborder">Total </td>
                        </tr>
                        <tr>
                             <td class="tdborder">{$ob_price} &nbsp; {$lbl_currency}</td>
                             <td class="tdborder">{$ob_tax} {$lbl_currency} </td>
                             <td class="tdborder">{$ob_total_price} &nbsp; {$lbl_currency} </td>
                        </tr> 
                        <tr>
                            <td colspan="3"> Note : {$price_note}</td>
                        </tr>
                     </table>
                </div>',
          ),
          
        ),
      ),
      'lbl_gia_bao_gom' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'flight_schedules',
            'label' => 'LBL_FLIGHT_SCHEDULER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ib_include',
            'label' => 'LBL_IB_INCLUDE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'transport',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hotel',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'room',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'food',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'guide',
            'label' => 'LBL_GUIDE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'insurance',
            'label' => 'LBL_INSURANCE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'other',
            'label' => 'LBL_OTHER',
          ),
        ),
      ),
      'lbl_others' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'not_content',
            'label' => 'LBL_NOT_CONTENT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'child_cost',
            'label' => 'LBL_CHILD_COST_INFORMATIONS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'surcharge',
            'label' => 'LBL_SURCHARGE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ob_notes',
            'label' => 'LBL_OB_NOTES',
          ),
        ),
      ),
    ),
  ),
);
?>
