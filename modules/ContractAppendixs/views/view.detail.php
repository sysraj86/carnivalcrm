<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    class ContractAppendixsViewDetail extends ViewDetail{
        function  ContractAppendixsViewDetail (){
            parent::ViewDetail();
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
            while($row = $db->fetchByAssoc($result)){
                
                $html .= '<tr>';
                     $html .= '<td  style="text-align:center"> ';
                        $html .= $row['service'];
                     $html .= '</td>';
                     $html .= '<td style="text-align:center">';
                         $html .= $row['num_of_service'];
                     $html .= '</td> ';
                     $html .= '<td style="text-align:center">';
                        $html .= format_number($row['unit']);
                     $html .= '</td>';
                     $html .= '<td style="text-align:center">';
                        $html .= format_number($row['tax']);
                     $html .= '</td>';
                     $html .= '<td style="text-align:center">';
                        $html .= format_number($row['amount']);
                     $html .= '</td>';
                     $html .= '</td>';
                 $html .= '</tr> ';
            }
            $html .= '</table> ';
            $this->dv->ss->assign("contract_value", $html);
            parent::display();
        }


        function preDisplay(){
             parent::preDisplay();
        }     
    }                                                                                                             
?>