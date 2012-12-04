<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    class ContractsViewDetail extends ViewDetail{
        function ContractsViewDetail(){
            parent::ViewDetail();
        }
        function display(){
            global $mod_strings,$app_list_strings;
            $this->displayPopupHtml();
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

            $html .= $this->bean->get_contract_values_detailview();
            $html .= '</tbody>
                        </table>';
            $this->dv->ss->assign("contract_value", $html);
            // Contract Condition:
            $html = '
                  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="contract_condition">
                        <tbody>
            ';
            
            $html .= $this->bean->get_contract_condition_detailview();
            $html .= '</tbody>
                        </table>';
            
            $this->dv->ss->assign("contract_condition", $html);
            $this->dv->ss->assign("tongtien", format_number($this->bean->tongtien));
            parent::display();
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

        //function preDisplay(){
//            /* BEGIN - SECURITY GROUPS */ 
//            $metadataFile = null;
//            $foundViewDefs = false;
//            if(empty($_SESSION['groupLayout'])) {
                //get group ids of current user and check to see if a layout exists for that group
//                global $current_user;
//                require_once('modules/SecurityGroups/SecurityGroup.php');
//                $groupFocus = new SecurityGroup();
//                $groupList = $groupFocus->getUserSecurityGroups($current_user->id);
                //reorder by precedence....    
//                foreach($groupList as $groupItem) {
//                    $GLOBALS['log']->debug("Looking for: ".'custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/detailviewdefs.php');
//                    if(file_exists('custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/detailviewdefs.php')){
//                        $_SESSION['groupLayout'] = $groupItem['id'];
//                        $metadataFile = 'custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/detailviewdefs.php';
//                        break;
//                    }            
//                }
//            } else {
//                if(file_exists('custom/modules/' . $this->module . '/metadata/'.$_SESSION['groupLayout'].'/detailviewdefs.php')){
//                    $metadataFile = 'custom/modules/' . $this->module . '/metadata/'.$_SESSION['groupLayout'].'/detailviewdefs.php';
//                }        
//            }        
//            if(isset($metadataFile)){
//                $foundViewDefs = true;
//            }
//            else {        
//                $metadataFile = $this->getMetaDataFile();
//            }
//            /* END - SECURITY GROUPS */  
//            $this->dv = new DetailView2();
//            $this->dv->ss =&  $this->ss;
//            $this->dv->setup($this->module, $this->bean, $metadataFile, 'modules/Contracts/tpls/DetailView/'.$this->bean->type.'.tpl');         
//        }     
    }                                                                                                             
?>