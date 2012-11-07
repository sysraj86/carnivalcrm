<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    class ContractAppendixsViewDetail extends ViewDetail{
        function  ContractAppendixsViewDetail (){
            parent::ViewDetail();
        }
        function display(){
            $this->populateTemplates();
            $this->setDecodeHTML();
            $this->displayPopupHtml();
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

        function setDecodeHTML(){
            $this->bean->pdfheader = html_entity_decode(str_replace('&nbsp;',' ',$this->bean->pdfheader));
            $this->bean->description = html_entity_decode(str_replace('&nbsp;',' ',$this->bean->description));
            $this->bean->pdffooter = html_entity_decode(str_replace('&nbsp;',' ',$this->bean->pdffooter));
        }

        function displayPopupHtml(){
            global $app_list_strings,$app_strings, $mod_strings;
            if(trim($this->bean->template_ddown_c) != ''){
                $templates = explode('^,^',trim($this->bean->template_ddown_c));

                echo '    <div id="popupDiv_ara" style="display:none;position:fixed;top: 39%; left: 41%;opacity:1;z-index:9999;background:#FFFFFF;">
                <form id="popupForm" action="index.php?entryPoint=generateDoc" method="post">
                <table style="border: #000 solid 2px;padding-left:40px;padding-right:40px;padding-top:10px;padding-bottom:10px;font-size:110%;" >
                <tr height="20">
                <td colspan="2">
                <b>'.$app_strings['LBL_SELECT_TEMPLATE'].':-</b>
                </td>
                </tr>';
                foreach($templates as $template){
                    $template = str_replace('^','',$template);
                    $js = "document.getElementById('popupDivBack_ara').style.display='none';document.getElementById('popupDiv_ara').style.display='none';var form=document.getElementById('popupForm');if(form!=null){form.templateID.value='".$template."';form.submit();}else{alert('Error!');}";
                    echo '<tr height="20">
                    <td width="17" valign="center"><a href="#" onclick="'.$js.'"><img src="themes/default/images/txt_image_inline.gif" width="16" height="16" /></a></td>
                    <td><b><a href="#" onclick="'.$js.'">'.$app_list_strings['template_ddown_c_list'][$template].'</a></b></td></tr>';
                }
                echo ' <input type="hidden" name="templateID" value="" />
                <input type="hidden" name="task" value="doc" />
                <input type="hidden" name="module" value="'.$_REQUEST['module'].'" />
                <input type="hidden" name="uid" value="'.$this->bean->id.'" />
                <input type="hidden" name="contractid" value="'.$this->bean->id.'"/>
                </form>
                <tr style="height:10px;"><tr><tr><td colspan="2"><button style=" display: block;margin-left: auto;margin-right: auto" onclick="document.getElementById(\'popupDivBack_ara\').style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';return false;">Cancel</button></td></tr>
                </table>
                </div>
                <div id="popupDivBack_ara" onclick="this.style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';" style="top:0px;left:0px;position:fixed;height:100%;width:100%;background:#000000;opacity:0.5;display:none;vertical-align:middle;text-align:center;z-index:9998;">
                </div>
                <script>
                function showPopup(task){
                var form=document.getElementById(\'popupForm\');
                var ppd=document.getElementById(\'popupDivBack_ara\');
                var ppd2=document.getElementById(\'popupDiv_ara\');

                form.task.value=task;
                form.templateID.value=\''.$template.'\';
                form.contractid.value=\''.$this->bean->id.'\';
                form.submit();

                }
                </script>';
            }

        }

        function populateTemplates(){
            global $app_list_strings, $current_user;

            $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='Contracts'";        
            $res = $this->bean->db->query($sql);
            while($row = $this->bean->db->fetchByAssoc($res)){
                $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
            }
        }
        function preDisplay(){
             parent::preDisplay();
        }     
    }                                                                                                             
?>