<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
 // require_once('include/EditView/EditView.php');
  require_once('include/MVC/View/views/view.edit.php');
  require_once('modules/Releases/Release.php');
  require_once('modules/Contracts/Forms.php');   
  class ContractsViewEdit extends ViewEdit{
      function ContractsViewEdit(){
          parent::ViewEdit();
      }
      function display(){
            global $mod_strings,$app_list_strings;
            // Contract Value:
            $html = '
                <table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse" class="table_clone" id="contract_value">
                        <thead>
                            <tr bgcolor="#CCCCCC">
                                <th align="center"> '.$mod_strings['LBL_CONTRACT_SERVICE'].'</th>
                                <th align="center"> '.$mod_strings['LBL_CONTRACT_SOLUONG'].'</th> 
                                <th align="center"> '.$mod_strings['LBL_CONTRACT_GIATOUR'].'</th>
                                <th align="center"> '.$mod_strings['LBL_CONTRACT_THUE'].'</th>
                                <th align="center"> '.$mod_strings['LBL_CONTRACT_THANHTIEN'].'</th>
                                <th align="center">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
            ';
            if($this->bean->contract_values_line_count() > 0){
                $html .= $this->bean->get_contract_values_editview_line();
            }else{
                $html .= '<tr>';
                     $html .= '<td  align="center"> ';
//                        $html .= '<input name="age[]" type="text" id="age" value="" />';
                        $html .= '<select class="type_service" name="type_service[]" id="type_service">'.get_select_options($app_list_strings['contract_type_service_dom'],'').'</select>
                                  <input name="age[]" type="text" style="display:none" id="age" value="" />
                        ';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                         $html .= '<input name="tong_sl_khach[]" type="text" id="tong_sl_khach" class="tinhtoan" value="" />';
                     $html .= '</td> ';
                     $html .= '<td align="center">';
                        $html .= '<input name="gia_tour[]" type="text" id="gia_tour" class="tinhtoan " value="" /> ';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input name="thue[]" type="text" id="thue" class="tinhtoan" value="" /> ';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input readonly="readonly" name="thanhtien[]" type="text" id="thanhtien" class="tinhtoan thanhtien" value=""  />';
                        $html .= '<input type="hidden" name="contract_value_id[]" id="contract_value_id" value=""/> <input type="hidden" name="deleted[]" id="deleted" value="0"/>';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input type="button" class="btnDelRow" value="Delete row" />';
                     $html .= '</td>';
                 $html .= '</tr> ';
                 
            }
            $html .= '</tbody>
                        </table>';
            $this->ev->ss->assign("contract_value", $html);
            // Contract Condition:
            $html = '
                  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="contract_condition">
                        <tbody>
            ';
            if($this->bean->contract_condition_line_count() > 0){
                $html .= $this->bean->get_contract_condition_editview_line();
            }else{
                $curency = get_select_options_with_id($app_list_strings['currency_dom'],'VND');
                $html .= '<tr>';
                    $html .= '<td>';
                        $html .= '<fieldset>';
                            $html .= '<table cellpadding="0" cellspacing="0" border="0" width="100%"> ';
                                $html .= '<tr>';
                                    $html .= '<td>';
                                        $html .= '<input name="dotthanhtoan[]" id="dotthanhtoan" type="text" value=""/><input name="event[]" type="text" id="event" value=""/> Bên B thanh toán cho bên A <input name="phantram[]" id="phantram" class="percent" type="text" value=""/> % số tiền là  <input name="tienthanhtoan[]" type="text"  id="tienthanhtoan" value=""/> <select name="tiente_thanhtoan[]" class="tientethanhtoan" id="tiente_thanhtoan">'.$curency.'</select> <br />';
                                        $html .= '<input type="hidden" name="contract_condition_id[]" id="contract_condition_id" value=""/>  <input type="hidden" name="deleted[]" id="deleted" value="0"/>';
                                        $html .= 'Bằng chữ: <input name="in_word[]" type="text" id="in_word" value=""  size="90"/>';
                                    $html .= '</td>';
                                $html .= '</tr>';
                            $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                    $html .= '<td>';
                        $html .= '<input  type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input  type="button" class="btnDelRow" value="Delete" />';
                    $html .= '</td>';
                $html .= '</tr>';
                 
            }
            $html .= '</tbody>
                        </table>';
            
            $this->ev->ss->assign("contract_condition", $html);
            $this->ev->ss->assign("tongtien", format_number($this->bean->tongtien)); 
            parent::display();
        }  

      //function populateTemplates(){
//        global $app_list_strings, $current_user;
//        
//        $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='Contracts'";        
//        $res = $this->bean->db->query($sql);
//        while($row = $this->bean->db->fetchByAssoc($res)){
//            $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
//        }
//    }
  }
?>
