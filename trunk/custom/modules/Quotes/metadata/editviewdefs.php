<?php
$module_name = 'Quotes';
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
          'label' => '20',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '20',
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
          'file' => 'custom/include/js/CustomSelectField.js',
        ),
        2 => 
        array (
          'file' => 'modules/Quotes/calculate.js',
        ),
        3 => 
        array (
          'file' => 'modules/Quotes/js/table.addrow.plugin.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => false,
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
          0 => 
          array (
            'name' => 'name',
            'customCode' => '<input type="text" name="name" size="30" id="name" value="{$fields.name.value}"/> <input type="hidden" id="tour_name" value="{$tour_name}"/> <input type="hidden" id="tour_id" value="{$tour_id}"/> <input type="hidden" id="is_tour" value="{$is_tour}"/>',
          ),
          1 => 
          array (
            'name' => 'parent_name',
            'label' => 'LBL_LIST_RELATED_TO',
          ),
        ),
        2 => 
        array (
          0 => 'quotes_tours_name',
          1 => array(
            'name' => 'contacts_quotes_name',
            'customCode' => '
            <input type="text" name="contacts_quotes_name" id="contacts_quotes_name" value="{$fields.contacts_quotes_name.value}" data="Button=cleardata,selectdata|Module=Contacts|Fields=id,name|Inputs=contacts_q33a7ontacts_ida,contacts_quotes_name" filter="Fields=account_id_advanced,accounts_contacts_name_advanced|Inputs=parent_id,parent_name" class="select">
            <input type="hidden" name="contacts_q33a7ontacts_ida" id="contacts_q33a7ontacts_ida" value="{$fields.contacts_q33a7ontacts_ida.value}">
            ',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'orders_quotes_name',
          ),
          1 => 
          array (
            'name' => 'opportunities_quotes_name',
          ),
        ),
        4 => 
        array (
          0 => 'sender',
          1 => 
          array (
            'name' => 'senddate',
            'displayParams' => 
            array (
              'showFormats' => true,
            ),
          ),
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
            'customCode' => '<div id="dos"><table width="100%" class="table_clone" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
                <thead>
                  <tr height="15">
                    <td class="tdborder" rowspan="2" style="text-align:center">{$MOD.LBL_DOS_TICKET}</td>
                    <td class="tdborder" colspan="2" style="text-align:center">{$MOD.LBL_DOS_TOUR_COST}</td>
                    <td class="tdborder" colspan="2" style="text-align:center">{$MOD.LBL_DOS_SURCHANGE}</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr height="15">
                    <td class="tdborder">{$MOD.LBL_DOS_FARE}</td>
                    <td class="tdborder">{$MOD.LBL_DOS_FACILITY_COST}</td>
                    <td class="tdborder">{$MOD.LBL_DOS_SINGLE_ROM}</td>
                    <td class="tdborder">{$MOD.LBL_DOS_FOREIGN}</td>
                    <td>&nbsp;</td>
                  </tr>
                  </thead>
                  <tbody>
                  {if $fields.id.value eq "" or $countdos eq 0}
                  <tr height="15">
                    <td class="tdborder"><select name="dos_hotel_standard[]" id="dos_hotel_standard">{$dos_hotel_standard} </select></td>
                    <td class="tdborder"><input type="text" class="ticket_cost" name="ticket_cost[]" id="tickect_cost" /></td>
                    <td class="tdborder"><input type="text" class="facility_cost" name="facility_cost[]" id="facility_cost" /></td> <!-- Gia phuong tien -->
                    <td class="tdborder"><input type="text" class="single_room" name="single_room[]" id="single_room" /></td>
                    <td class="tdborder"><input type="text" class="foreign" name="foreign[]" id="foreign" /></td>
                    <td class="tdborder"><input type="button" class="btnAddRow" value="{$MOD.LBL_BTN_ADD}" /> &nbsp; <input type="button" class="btnDeleteRow" value="{$MOD.LBL_BTN_DELETE}"/></td>
                  </tr>
                  {/if}
                  {$doshtml}
                  </tbody>
                </table> </div> 
                
                <!-- CHI TIET INBOUND -->
                <div id="inbound">
                    <table width="100%" border="1" class="table_clone" cellspacing="0" cellpadding="2" style="border-collapse:collapse">
                    <thead>
                      <tr height="15">
                        <td colspan="8" style="text-align:center" class="tdborder"><strong>{$MOD.LBL_IB_TABLE_TITLE}</strong></td>
                      </tr>
                      <tr height="15">
                        <td class="tdborder"><strong>{$MOD.LBL_IB_GROUP_SIZE}</strong></td>
                        <td class="tdborder"><input type="text" name="group_site1" id="group_site1" value="{$group_site1}"/></td>
                        <td class="tdborder"><input type="text" name="group_site2" id="group_site2" value="{$group_site2}"/></td>
                        <td class="tdborder"><input type="text" name="group_site3" id="group_site3" value="{$group_site3}"/></td>
                        <td class="tdborder"><input type="text" name="group_site4" id="group_site4" value="{$group_site4}"/></td>
                        <td class="tdborder"><input type="text" name="group_site5" id="group_site5" value="{$group_site5}"/></td>
                        <td class="tdborder"><input name="group_site6" type="text" id="group_site6" value="{$group_site6}" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      </thead>
                      <tbody>
                      {if $fields.id.value eq "" or $countib eq 0}
                      <tr height="15">
                        <td class="tdborder"><select name="ib_hotel_standard[]" id="ib_hotel_standard">{$ib_hotel_standard}</select></td>
                        <td class="tdborder"><input type="text" name="group_site1_cost[]" id="group_site1_cost"/></td>
                        <td class="tdborder"><input type="text" name="group_site2_cost[]" id="group_site2_cost"/></td>
                        <td class="tdborder"><input type="text" name="group_site3_cost[]" id="group_site3_cost"/></td>
                        <td class="tdborder"><input type="text" name="group_site4_cost[]" id="group_site4_cost"/></td>
                        <td class="tdborder"><input type="text" name="group_site5_cost[]" id="group_site5_cost"/></td>
                        <td class="tdborder"><input type="text" name="group_site6_cost[]" id="group_site6_cost"/></td>
                        <td class="tdborder"><input type="button" class="btnAddRow" value="{$MOD.LBL_BTN_ADD}" /> &nbsp; <input type="button" class="btnDeleteRow" value="{$MOD.LBL_BTN_DELETE}"/></td>
                      </tr>
                      {/if}
                      {$ibhtml}
                      </tbody>
                    </table>
                </div>
                <!-- CHIET TINH OUT BOUND -->
                <div id="outbound">
                     <table width="100%" border="1" class="table_clone" cellspacing="0" cellpadding="2" style="border-collapse:collapse">
                        <tr>
                             <td  class="tdborder"> Price / Person</td> <td  class="tdborder"> Tax </td  class="tdborder"> <td>Total </td>
                        </tr>
                        <tr>
                             <td class="tdborder"><input type="text" class="ob_price" id="ob_price" name="ob_price" size="25" value="{$ob_price}"/> <select name="ob_currency" id="ob_currency" class="ob_currency">{$ob_currency}</select></td>
                             <td class="tdborder"><input type="text" class="ob_tax" id="ob_tax" name="ob_tax" size="25" value="{$ob_tax}"/> <label class="currency"></label> </td>
                             <td class="tdborder"><input type="text" class="ob_total_price" id="ob_total_price" name="ob_total_price" size="25" value="{$ob_total_price}"/> <label class="currency"></label> </td>
                        </tr>
                        <tr>
                            <td colspan="3"> Note : <input type="text" size="120" name="price_note" id="price_note" value="{$price_note}"/></td>
                        </tr>                        
                     </table>
                </div>  
                
                ',
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
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ib_include',
            'label' => 'LBL_IB_INCLUDE',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'transport',
            'lable' => 'LBL_TRANSPORT',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hotel',
            'label' => 'LBL_HOTEL',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'room',
            'label' => 'LBL_ROOM',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'food',
            'label' => 'LBL_FOOD',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'guide',
            'label' => 'LBL_GUIDE',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'insurance',
            'label' => 'LBL_INSURANCE',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'other',
            'label' => 'LBL_OTHER',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
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
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'child_cost',
            'label' => 'LBL_CHILD_COST_INFORMATIONS',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'surcharge',
            'label' => 'LBL_SURCHARGE',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ob_notes',
            'label' => 'LBL_OB_NOTES',
            'displayParams' => 
            array (
              'cols' => 120,
              'rows' => 6,
            ),
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
