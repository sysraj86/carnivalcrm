<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    class ContractLiquidateViewDetail extends ViewDetail{
        function  ContractLiquidateViewDetail (){
            parent::ViewDetail();
        }
        function display(){
            $this->populateTemplates();
            $this->setDecodeHTML();
            $this->displayPopupHtml();
            global $mod_strings;
            global $app_strings;
            global $app_list_strings;
            global $gridline;
            $detailView = new DetailView();
            $offset     = 0;
            if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
               $result = $detailView->processSugarBean("CONTRACTLIQUIDATE", $this->bean, $offset);
                if($result == null) {
                    sugar_die($app_strings['ERROR_NO_RECORD']);
                }
                $this->bean = $result;
            }else{
                header("Location: index.php?module=ContractLiquidate&action=index");
            }

            if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
                $this->bean->id = "";
            }

            global $theme;
            $theme_path = "themes/".$theme."/";
            $image_path = $theme_path."images/";
            require_once($theme_path.'layout_utils.php');

            $GLOBALS['log']->info("ContractLiquidate detail view");
            $this->dv->ss->assign("MOD",          $mod_strings);
            $this->dv->ss->assign("APP",          $app_strings);
            $this->dv->ss->assign("THEME",        $theme);
            $this->dv->ss->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
            $this->dv->ss->assign("IMAGE_PATH",   $image_path);
            $this->dv->ss->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
            $this->dv->ss->assign("ID",           $this->bean->id);
            $this->dv->ss->assign("ASSIGNED_USER_NAME",  $this->bean->assigned_user_name);
            $this->dv->ss->assign("NAME",  $this->bean->name);
            $this->dv->ss->assign("NUMBER",  $this->bean->number);
            $this->dv->ss->assign("DATE",  $this->bean->date);
            $this->dv->ss->assign("CONTRACT",  $this->bean->contract); 
            $this->dv->ss->assign("CONTRACT_ID",  $this->bean->contract_id);            
            $this->dv->ss->assign("TONGCONG_CONTRACT_KEHOACH",  number_format($this->bean->tongcong_contract_kehoach,'1','.','')); 
            $this->dv->ss->assign("TONGCONG_CONTRACT_THUCTE",  number_format($this->bean->tongcong_contract_thucte,'1','.','')); 
            $this->dv->ss->assign("TONGCONG_TANG_KEHOACH",  number_format($this->bean->tongcong_tang_kehoach,'1','.','')); 
            $this->dv->ss->assign("TONGCONG_TANG_THUCTE",  number_format($this->bean->tongcong_tang_thucte,'1','.','')); 
            $this->dv->ss->assign("TONGCONG_GIAM_KEHOACH",  number_format($this->bean->tongcong_giam_kehoach,'1','.','')); 
            $this->dv->ss->assign("TONGCONG_GIAM_THUCTE",  number_format($this->bean->tongcong_giam_thucte,'1','.','')); 
            $this->dv->ss->assign("TONGTIEN_KEHOACH",  number_format($this->bean->tongtien_kehoach,'1','.','')); 
            $this->dv->ss->assign("TONGTIEN_THUCTE",  number_format($this->bean->tongtien_thucte,'1','.',''));
            $this->dv->ss->assign("TIENTHANHTOAN",  number_format($this->bean->tienthanhtoan,'1','.',''));
            $this->dv->ss->assign("TIENCONLAI",  number_format($this->bean->tienconlai,'1','.',''));
            $this->dv->ss->assign("TIENTRALAI",  number_format($this->bean->tientralai,'1','.',''));
            $this->dv->ss->assign("GIATRIHOPDONG", $this->bean->giatrihopdong_detail());
            $this->dv->ss->assign("PHATSINHTANG", $this->bean->phatsinhtang_detail()); 
            $this->dv->ss->assign("PHATSINHGIAM", $this->bean->phatsinhgiam_detail());   
            $this->dv->ss->assign("BANGCHU",  $this->bean->bangchu);

            

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
                <form id="popupForm" action="index.php?entryPoint=generateDoc3" method="post">
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

            $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='ContractLiquidate'";        
            $res = $this->bean->db->query($sql);
            while($row = $this->bean->db->fetchByAssoc($res)){
                $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
            }
        }

        function preDisplay(){
            /* BEGIN - SECURITY GROUPS */ 
            $metadataFile = null;
            $foundViewDefs = false;
            if(empty($_SESSION['groupLayout'])) {
                //get group ids of current user and check to see if a layout exists for that group
                global $current_user;
                require_once('modules/SecurityGroups/SecurityGroup.php');
                $groupFocus = new SecurityGroup();
                $groupList = $groupFocus->getUserSecurityGroups($current_user->id);
                //reorder by precedence....    
                foreach($groupList as $groupItem) {
                    $GLOBALS['log']->debug("Looking for: ".'custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/detailviewdefs.php');
                    if(file_exists('custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/detailviewdefs.php')){
                        $_SESSION['groupLayout'] = $groupItem['id'];
                        $metadataFile = 'custom/modules/' . $this->module . '/metadata/'.$groupItem['id'].'/detailviewdefs.php';
                        break;
                    }            
                }
            } else {
                if(file_exists('custom/modules/' . $this->module . '/metadata/'.$_SESSION['groupLayout'].'/detailviewdefs.php')){
                    $metadataFile = 'custom/modules/' . $this->module . '/metadata/'.$_SESSION['groupLayout'].'/detailviewdefs.php';
                }        
            }        
            if(isset($metadataFile)){
                $foundViewDefs = true;
            }
            else {        
                $metadataFile = $this->getMetaDataFile();
            }
            /* END - SECURITY GROUPS */  
            $this->dv = new DetailView2();
            $this->dv->ss =&  $this->ss;
            $this->dv->setup($this->module, $this->bean, $metadataFile, 'modules/ContractLiquidate/tpls/DetailView/'.$this->bean->type.'.tpl');         
        }     
    }                                                                                                             
?>