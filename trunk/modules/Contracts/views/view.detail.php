<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    class ContractsViewDetail extends ViewDetail{
        function  ContractsViewDetail (){
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
               $result = $detailView->processSugarBean("CONTRACTS", $this->bean, $offset);
                if($result == null) {
                    sugar_die($app_strings['ERROR_NO_RECORD']);
                }
                $this->bean = $result;
            }else{
                header("Location: index.php?module=Contracts&action=index");
            }

            if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
                $this->bean->id = "";
            }
            echo "\n<p>\n";
            echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$this->bean->name." :".$this->bean->type, true);
            echo "\n</p>\n";
            global $theme;
            $theme_path = "themes/".$theme."/";
            $image_path = $theme_path."images/";
            require_once($theme_path.'layout_utils.php');

            $GLOBALS['log']->info("Contracts detail view");
            $this->dv->ss->assign("MOD",          $mod_strings);
            $this->dv->ss->assign("APP",          $app_strings);
            $this->dv->ss->assign("THEME",        $theme);
            $this->dv->ss->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
            $this->dv->ss->assign("IMAGE_PATH",   $image_path);
            $this->dv->ss->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
            $this->dv->ss->assign("ID",           $this->bean->id);
            $this->dv->ss->assign("ASSIGNED_TO",  $this->bean->assigned_user_name);
            $this->dv->ss->assign("NAME",  $this->bean->name);
            $this->dv->ss->assign("NUMBER",  $this->bean->number);
            $this->dv->ss->assign("DATE",  $this->bean->date);  
            $this->dv->ss->assign("MONTH",  $this->bean->month);  
            $this->dv->ss->assign("YEAR",  $this->bean->year);  

            if(!empty($this->bean->salutation_a))   {
                $this->dv->ss->assign("SALUTATION", translate('xung_ho_dom','', $this->bean->salutation_a))  ;  
            }
            else{
                $this->dv->ss->assign("SALUTATION",'');
            }
            $this->dv->ss->assign("DAIDIENBENA", $this->bean->daidienbena);
            $this->dv->ss->assign("DAIDIENBENB", $this->bean->daidienbenb);
            // $this->dv->ss->assign("POSITION_A", translate('position_dom','',$this->bean->position_a));   fix bug 1270
            if(!empty($this->bean->position_a))  {
                $this->dv->ss->assign("POSITION_A", translate('position_dom','', $this->bean->position_a));     
            }
            else{
                $this->dv->ss->assign("POSITION_A","" );
            }
            $this->dv->ss->assign("ADDRESS_A", $this->bean->address_a);
            $this->dv->ss->assign("PHONE_A", $this->bean->phone_a);
            $this->dv->ss->assign("PHONE_A", $this->bean->phone_a);
            $this->dv->ss->assign("FAXA", $this->bean->fax_a);
            $this->dv->ss->assign("FAXB", $this->bean->fax_b);
            $this->dv->ss->assign("MST_BENA", $this->bean->mst_bena);
            $this->dv->ss->assign("BANK_NAME", $this->bean->bank_name);
            $this->dv->ss->assign("ACCOUNT_NAME", $this->bean->account_name);
            $this->dv->ss->assign("ACCOUNT_VND", $this->bean->account_vnd);
            $this->dv->ss->assign("ACCOUNT_USD", $this->bean->account_usd);
            $this->dv->ss->assign("SWIFT_CODE", $this->bean->account_usd);
            $this->dv->ss->assign("BANK_ADDRESS", $this->bean->bank_address);
            $this->dv->ss->assign("DAIDIENBENB_NAME", $this->bean->daidienbenb_name);
            $this->dv->ss->assign("ASSIGNED_USER_NAME",  $this->bean->assigned_user_name);
            if (!empty($this->bean->salutation_b)){
                $this->dv->ss->assign("SALUTATION_B", translate('xung_ho_dom','', $this->bean->salutation_b));  
            }
            else{
                $this->dv->ss->assign("SALUTATION_B", "" );
            }
            if(!empty($this->bean->position_b))  {
                $this->dv->ss->assign("POSITION_B", translate('position_dom','', $this->bean->position_b));     
            }
            else{
                $this->dv->ss->assign("POSITION_B","" );
            }

            $this->dv->ss->assign("ADDRESS_B",  $this->bean->address_b);   
            $this->dv->ss->assign("MST_BENB",  $this->bean->mst_benb);   
            $this->dv->ss->assign("PHONE_B",  $this->bean->phone_b);   
            $this->dv->ss->assign("TOUR_NAME",  $this->bean->groupprogracontracts_name);   
            $this->dv->ss->assign("TOUR_ID",  $this->bean->groupprogr4251rograms_ida);   
            $this->dv->ss->assign("PURPOSE",  $this->bean->purpose);   
            $this->dv->ss->assign("KETHOP",  $this->bean->associate);   
            $this->dv->ss->assign("START_DATE",  $this->bean->start_date_contract);   
            $this->dv->ss->assign("END_DATE",  $this->bean->end_date_contract);
            $this->dv->ss->assign("TREPERCENT",  $this->bean->trepercent);   
            $this->dv->ss->assign("TREPERCENT_1",  $this->bean->trepercent_1);   
            $this->dv->ss->assign("NUM_OF_NIGHT",  $this->bean->num_of_night);
            $this->dv->ss->assign("NUM_OF_DATE",  $this->bean->num_of_date);
            $this->dv->ss->assign("PARENT",  $this->bean->parent_type);
            $this->dv->ss->assign("PARENT_ID", $this->bean->parent_id);
            $this->dv->ss->assign("PARENT_NAME",$this->bean->parent_name);
            $this->dv->ss->assign("BIRTHDAY", $this->bean->birthday);
            $this->dv->ss->assign("PASSPORT", $this->bean->passport);
            $this->dv->ss->assign("DATE_ISSUED", $this->bean->date_issued);

            $this->dv->ss->assign("SL_KHACH",  $this->bean->sl_khach);   
         
            $this->dv->ss->assign("CONTRACT_VALUES",  $this->bean->get_contract_values_detailview($this->bean->id));

            $this->dv->ss->assign("TONGTIEN",  number_format($this->bean->tongtien,'2',',','.'));   
            $this->dv->ss->assign("BANGCHU",  $this->bean->bangchu);   
            $this->dv->ss->assign("SL_KHACH_1",  $this->bean->sl_khach_1);   
            $this->dv->ss->assign("GIA_TOUR_1",  number_format($this->bean->gia_tour_1,'2',',','.'));
                
                $tiente =  translate('currency_dom','', $focus->tiente);
                if(is_array($tiente)) $tiente = 'VND';
                $tiente_usd =  translate('currency_dom','', $focus->tiente_usd);
                if(is_array($tiente_usd)) $tiente_usd = 'USD';  
                $tiente_vnd =  translate('currency_dom','', $focus->tiente_vnd);
                if(is_array($tiente_vnd)) $tiente_vnd = 'VND';
                
                   
            $this->dv->ss->assign("TIENTE",    $tiente); 
            $this->dv->ss->assign("TIENTE_USD",    $tiente_usd);
            $this->dv->ss->assign("TIENTE_VND",    $tiente_vnd);
            $this->dv->ss->assign("TEN_NGANHANG",    $this->bean->ten_nganhang);
            $this->dv->ss->assign("BAOGOM",   html_entity_decode(nl2br($this->bean->baogom)));
            $this->dv->ss->assign("KHONGBAOGOM", html_entity_decode(nl2br($this->bean->khongbaogom)));
            $this->dv->ss->assign("DOTTHANHTOAN", $this->bean->dotthanhtoan);
            $this->dv->ss->assign("CONTRACT_CONDITIONS", $this->bean->get_contract_condition_detailview($this->bean->id));
            $this->dv->ss->assign("SOLANTHANHTOAN", $this->bean->solanthanhtoan);
            $this->dv->ss->assign("NGUOIDAIDIENBENB", $this->bean->nguoidaidienbenb);
            $this->dv->ss->assign("NGUOIDAIDIENBENA", $this->bean->nguoidaidienbena);
            $this->dv->ss->assign("TENSANBAY", $this->bean->tensanbay);
            $this->dv->ss->assign("TIENHUYPHAT", $this->bean->tienhuyphat);
            $this->dv->ss->assign("SOHOCHIEUKHACHLE", $this->bean->sohochieukhachle);
            $this->dv->ss->assign("NGAYCAPHOCHIEU", $this->bean->ngaycaphochieu);
            $this->dv->ss->assign("TIENTEHUYPHAT", translate('currency_dom','',$this->bean->tientehuyphat));
            $this->dv->ss->assign("TRANSPORTCONTRACT_LINE", $this->bean->get_transportcontract_detailview());
            $this->dv->ss->assign("template_ddown_c_id", $this->bean->template_ddown_c);
            $this->dv->ss->assign("template_ddown_c_name", translate('template_ddown_c_list','',$this->bean->template_ddown_c));

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
            $this->dv->setup($this->module, $this->bean, $metadataFile, 'modules/Contracts/tpls/DetailView/'.$this->bean->type.'.tpl');         
        }     
    }                                                                                                             
?>