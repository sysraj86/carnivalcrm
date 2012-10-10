<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.edit.php');
    class ContractAppendixsViewEdit extends ViewEdit{
        function  ContractAppendixsViewEdit(){
            parent::ViewEdit();
        }
        function display(){
            global $db,$mod_strings;
            // Contract Value :
            $sql = "select * from contractappendixvalues where contract_appendixs_value_id = '".$this->bean->id."' and deleted = 0";
            $result = $db->query($sql);
            $html = "";
            $html .= '<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse" class="table_clone" id="giatrihopdong" maxcount="50">';
            $html .= '<tr bgcolor="#CCCCCC">
                            <th align="center">'.$mod_strings['LBL_DICHVU'].'</th>
                            <th align="center">'.$mod_strings['LBL_SOLUONG'].'</th>
                            <th align="center">'.$mod_strings['LBL_DONGIA'].'</th>
                            <th align="center">'.$mod_strings['LBL_THUE'].'</th>
                            <th align="center">'.$mod_strings['LBL_THANHTIEN'].'</th>
                            <th align="center">&nbsp;</th>
                        </tr>';
            $kt = 0;
            while($row = $db->fetchByAssoc($result)){
                $kt = 1;
                $html .= '<tr>';
                     $html .= '<td  align="center"> ';
                        $html .= '<input name="service[]" type="text" id="service" value="'.$row['service'].'" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                         $html .= '<input name="num_of_service[]" type="text" id="num_of_service" class="tinhtoan" value="'.$row['num_of_service'].'" />';
                     $html .= '</td> ';
                     $html .= '<td align="center">';
                        $html .= '<input name="unit[]" type="text" id="unit" class="tinhtoan " value="'.format_number($row['unit']).'" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input name="thue[]" type="text" id="thue" class="tinhtoan" value="'.format_number($row['tax']).'" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input readonly="readonly" name="thanhtien[]" type="text" id="thanhtien" class="tinhtoan thanhtien" value="'.format_number($row['amount']).'"  />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input type="hidden" name="contract_appendixs_value_id[]" id="contract_appendixs_value_id" value="'.$row['id'].'"/>'; 
                        $html .= '<input type="hidden" name="deleted[]" id="deleted" value="0"/>';
                        $html .= '<input type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input type="button" class="btnDelRow" value="Delete row" />';
                     $html .= '</td>';
                 $html .= '</tr> ';
            }
            if($kt==0){
                 $html .= '<tr>';
                     $html .= '<td  align="center"> ';
                        $html .= '<input name="service[]" type="text" id="service" value="" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                         $html .= '<input name="num_of_service[]" type="text" id="num_of_service" class="tinhtoan" value="" />';
                     $html .= '</td> ';
                     $html .= '<td align="center">';
                        $html .= '<input name="unit[]" type="text" id="unit" class="tinhtoan " value="" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input name="thue[]" type="text" id="thue" class="tinhtoan" value="" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input readonly="readonly" name="thanhtien[]" type="text" id="thanhtien" class="tinhtoan thanhtien" value=""  />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input type="hidden" name="contract_appendixs_value_id[]" id="contract_appendixs_value_id" value=""/>'; 
                        $html .= '<input type="hidden" name="deleted[]" id="deleted" value="0"/>';
                        $html .= '<input type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input type="button" class="btnDelRow" value="Delete row" />';
                     $html .= '</td>';
                 $html .= '</tr> ';
            }
            $html .= '</table> ';
            $this->ev->ss->assign("contract_value", $html);
            parent::display();
        }
        public function preDisplay()
        {
            parent::preDisplay();
        }  
    }                                                                                                             
?>