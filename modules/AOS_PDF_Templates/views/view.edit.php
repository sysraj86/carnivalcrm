<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class AOS_PDF_TemplatesViewEdit extends ViewEdit {
	function AOS_PDF_TemplatesViewEdit(){
 		parent::ViewEdit();
 	}
	
	function display(){
		$this->displayJSInclude();
		$this->setFields();
		parent::display();
		$this->displayJS();
	}
	
	function displayJSInclude(){
		echo '
			<script type="text/javascript" language="Javascript" src="include/JSON.js"></script>
            <script type="text/javascript" language="Javascript" src="include/javascript/tiny_mce/tiny_mce.js"></script>
			<script type="text/javascript" language="Javascript" src="modules/AOS_PDF_Templates/js/loadPage.js"></script>
			<link type="text/css" href="include/javascript/tiny_mce/advanced/css/editor_ui.css" />
			<script type="text/javascript" language="Javascript">
			
			var selected = 0;

			function showVariable(fld){
				document.getElementById(\'variable_text\').value=fld;
			}
			
			function setType(type){
				document.getElementById("type").value = type;
				populateModuleVariables(type);
			}

			function populateVariables(type){
				options = contractsOptions;
                if(type == \'Contracts\'){
                    options = contractsOptions;
                }else if(type == \'ContractAppendixs\'){
                    options = contractAppendixOptions;
                }else if(type == \'ContractLiquidate\'){
                    options = contractLiquidateOptions;
				}else if(type == \'Contacts\'){
					options = contactOptions;
				}else if(type == \'Leads\'){
					options = leadOptions;
				}else if(type == \'Users\'){
					options = userOptions;
				}else if(type == \'Products\'){
					options = productOptions;
				}else if(type == \'Services\'){
					options = serviceOptions;
				}
                else if(type == \'TravelGuides\'){
                    options = travelguideOptions;
                }
                else if(type == \'Hotels\'){
                    options = hotelOptions ;
                }
                else if(type == \'Restaurants\'){
                    options = resOptions ;
                }
                else if(type == \'FITs\'){
                    options = fitOptions ;
                }
                else if(type == \'Accounts\'){
                    options = accountOptions;
                }
                else{
                    //options = contractsOptions;
					options = accountOptions;
				}
				for(i=0;i<document.getElementById(\'variable_name\').options.length;i++){
					document.getElementById(\'variable_name\').remove(0);
				} 
				document.getElementById(\'variable_name\').innerHTML = options;
				document.getElementById(\'variable_name\').options.selectedIndex =0;
				document.getElementById(\'variable_text\').value = \'\';
			}
			
			function populateModuleVariables(type){
				options = contractsModOptions;
                if (type == \'Contracts\'){
                    options = contractsModOptions ;
                }
                else if(type == \'ContractAppendixs\'){
                    options = contractAppendixModOptions;
                }
                else if(type == \'ContractLiquidate\'){
                    options = contractLiquidateModOptions;
                }
                else if(type == \'Contacts\'){
					options = contactModOptions;
				}
                else if(type == \'Leads\'){
					options = leadModOptions;
				}
                else if(type == \'TravelGuides\'){
                    options = travelguideModOptions;
                }
                else if(type == \'Hotels\'){
                    options = hotelModOptions;
                }
                else if(type == \'Restaurants\'){
                    options = resModOptions ;
                }
                else if(type == \'FITs\'){
                    options = fitModOptions;
                }
                else if(type == \'Accounts\'){
                    options = accountModOptions;
                } 
                else{
					options = contractsModOptions;
				}
				for(i=0;i<document.getElementById(\'module_name\').options.length;i++){
					document.getElementById(\'module_name\').remove(0);
				} 
				document.getElementById(\'module_name\').innerHTML = options;
				populateVariables(type);
			}

			function insert_variable(text) {
				if (text != \'\'){
    				var inst = tinyMCE.getInstanceById("description");
				if (inst) inst.getWin().focus();
					inst.execCommand(\'mceInsertContent\', false, text);
					inst.execCommand(\'mceToggleEditor\');
					inst.execCommand(\'mceToggleEditor\');
				}
			}

			function insertSample(smpl){
				if(smpl != 0){
				    var body = tinyMCE.getInstanceById("description");
				    var header = tinyMCE.getInstanceById("pdfheader");
				    var footer = tinyMCE.getInstanceById("pdffooter");
				    var cnf = true;
				    if(body.getContent() != \'\' || header.getContent() != \'\' || footer.getContent() != \'\'){
					    cnf=confirm(\'Warning this will overwrite you current Work\');
				    }
				    if(cnf){
				    smpl = eval(smpl);
				    setType(smpl[0]);
				    body.setContent(smpl[1]);
				    header.setContent(smpl[2]);
				    footer.setContent(smpl[3]);
				    selected = document.getElementById(\'sample\').options.selectedIndex;
				    }
				    else{
				    document.getElementById(\'sample\').options.selectedIndex =selected;
				    }
			    }else{
                    var body = tinyMCE.getInstanceById("description");
                    body.setContent("");
                }
		}
			</script>';
	}
	
	function setFields(){
		global $app_list_strings, $mod_strings;
		//Setting type Field
		$this->ss->assign('CUSTOM_TYPE','<select id="type" name="type" onchange="populateModuleVariables(this.options[this.selectedIndex].value)">'.
							get_select_options($app_list_strings[$this->bean->field_defs['type']['options']],$this->bean->type).
							'</select>');
		
		//Loading Sample Files
		$json = getJSONobj();
		$samples;
		if ($handle = opendir('modules/AOS_PDF_Templates/samples')) {
		$sample_options_array[] = ' ';
			while (false !== ($file = readdir($handle))) {
				if($value = ltrim(rtrim($file,'.php'),'smpl_')){
					require_once('modules/AOS_PDF_Templates/samples/'.$file);
					$file = rtrim($file,'.php');
					$file = new $file();
					$fileArray =
					array(
					$file->getType(),
					$file->getBody(),
					$file->getHeader(),
					$file->getFooter()
					);
					
					$fileArray = $json->encode($fileArray);
					$value =  $mod_strings['LBL_'.strtoupper($value)];
					$sample_options_array[$fileArray] = $value;
				}
    			}	
    		$samples = get_select_options($sample_options_array,'');
		closedir($handle);
		}
		
		$this->ss->assign('CUSTOM_SAMPLE','<select id="sample" name="sample" onchange="insertSample(this.options[this.selectedIndex].value)">'.
							$samples.
							'</select>');
							

		$account_options_array = array(''=>'');
		$contact_options_array = array(''=>'');
		$lead_options_array = array(''=>'');
		$user_options_array = array(''=>'');
        $travelguide_options_array = array(''=>'');
        $hotel_options_array = array(''=>'');
        $res_options_array = array(''=>'');
        $fit_options_array = array(''=>'');
		$contracts_options_array = array(''=>'');
        $contract_appendix_options_array = array(''=>'');
        $contract_liquidate_options_array = array(''=>'');
		
		//Getting Fields
        // Account 
		$account = new Account();
		foreach($account->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
				if($arr['vname'] != 'LBL_DELETED'){
				$account_options_array['$accounts_'.$name] = translate($arr['vname'],'Accounts');
				}
			}
		}
        
        // travelguide
        $travelguide = new TravelGuide();
        foreach($travelguide->field_defs as $name => $arr){
            if(!((isset($arr['dbType'])&& strtolower($arr['dbType'])=='id')||$arr['type']=='id' || $arr['type']== 'link')){
                if($arr['vname'] !='LBL_DELETED'){
                    $travelguide_options_array ['$travelguide_'.$name] = translate($arr['vname'],'TravelGuides');
                }
            }
        }
        
        // hotel
        
        $hotel = new Hotels();
         foreach($hotel->field_defs as $name => $arr){
            if(!((isset($arr['dbType'])&& strtolower($arr['dbType'])=='id')||$arr['type']=='id' || $arr['type']== 'link')){
                if($arr['vname'] !='LBL_DELETED'){
                    $hotel_options_array ['$hotel_'.$name] = translate($arr['vname'],'Hotels');
                }
            }
        }        
        // restaurant
        $res = new Restaurants();
         foreach($res->field_defs as $name => $arr){
            if(!((isset($arr['dbType'])&& strtolower($arr['dbType'])=='id')||$arr['type']=='id' || $arr['type']== 'link')){
                if($arr['vname'] !='LBL_DELETED'){
                    $res_options_array ['$res_'.$name] = translate($arr['vname'],'Restaurants');
                }
            }
        }
        
        // fits
        $fit = new FITs();
        foreach($fit->field_defs as $name => $arr){
            if(!((isset($arr['dbType'])&& strtolower($arr['dbType'])=='id')||$arr['type']=='id' || $arr['type']== 'link')){
                if($arr['vname'] !='LBL_DELETED'){
                    $fit_options_array ['$fit_'.$name] = translate($arr['vname'],'FITs');
                }
            }
        }
        
        // contracts
        $contracts = new Contract();
        foreach($contracts->field_defs as $name => $arr){
            if(!((isset($arr['dbType'])&& strtolower($arr['dbType'])=='id')||$arr['type']=='id' || $arr['type']== 'link')){
                if($arr['vname'] !='LBL_DELETED'){
                    $contracts_options_array ['$contracts_'.$name] = translate($arr['vname'],'Contracts');
                }
            }
        }
        
        // contract appendixs

        
        $contractappendixs = new ContractAppendixs();
        foreach($contractappendixs->field_defs as $name => $arr){
            if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
                if($arr['vname'] != 'LBL_DELETED'){
                    $contract_appendix_options_array['$contractappendixs_'.$name] = translate($arr['vname'],'ContractAppendixs');
                }
            }
        }
        
        // contract liquidate

        
        $contractliquidate = new ContractLiquidate();
        foreach($contractliquidate->field_defs as $name => $arr){
            if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
                if($arr['vname'] != 'LBL_DELETED'){
                    $contract_liquidate_options_array['$contractliquidate_'.$name] = translate($arr['vname'],'ContractLiquidate');
                }
            }
        }
		
		$contact = new Contact();
		foreach($contact->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
				if($arr['vname'] != 'LBL_DELETED'){
				    $contact_options_array['$contacts_'.$name] = translate($arr['vname'],'Contacts');
				}
			}
		}
		
		$lead = new Lead();
		foreach($lead->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
				if($arr['vname'] != 'LBL_DELETED'){
				$lead_options_array['$leads_'.$name] = translate($arr['vname'],'Leads');
				}
			}
		}
		
		$user = new User();
		foreach($user->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link' || $arr['type'] == 'bool' || $arr['type'] == 'datetime' || $arr['link_type'] == 'relationship_info')){
				if($arr['vname'] != 'LBL_DELETED' && $arr['vname'] != 'LBL_USER_HASH' && $arr['vname'] != 'LBL_LIST_ACCEPT_STATUS' && $arr['vname'] != 'LBL_AUTHENTICATE_ID' && $arr['vname'] != 'LBL_MODIFIED_BY' && $arr['name'] != 'created_by_name'){
				$user_options_array['$users_'.$name] = translate($arr['vname'],'Users');
				}
			}
		}
		
		
		$account_mod_options_array['Accounts'] = translate('LBL_MODULE_NAME','Accounts');
        
        // travelguide
        $travelguide_mod_options_array['TravelGuides'] = translate('LBL_MODULE_NAME','TravelGuides');
        // hotel 
        $hotel_mod_options_array['Hotels']  = translate('LBL_MODULE_NAME','Hotels');
        // restaurants
        $res_mod_options_array['Restaurants']  = translate('LBL_MODULE_NAME','Restaurants');
        // fit
		$fit_mod_options_array['FITs']  = translate('LBL_MODULE_NAME','FITs');  
        // contracts
        $contracts_mod_options_array['Contracts'] = translate('LBL_MODULE_NAME','Contracts')  ;
        // contracts appendix
        $contract_appendix_mod_options_array['ContractAppendixs'] = translate('LBL_MODULE_NAME','ContractAppendixs')  ;
        // contracts liquidate 
        $contract_liquidate_mod_options_array['ContractLiquidate'] = translate('LBL_MODULE_NAME','ContractLiquidate')  ;
        
		$contact_mod_options_array['Contacts'] = translate('LBL_MODULE_NAME','Contacts');
		$contact_mod_options_array['Accounts'] = translate('LBL_MODULE_NAME','Accounts');
		
		$lead_mod_options_array['Leads'] = translate('LBL_MODULE_NAME','Leads');

		
		
        // get field
        $account_options = get_select_options($account_options_array,'');
		$contact_options = get_select_options($contact_options_array,'');
		$lead_options = get_select_options($lead_options_array,'');
		$user_options = get_select_options($user_options_array,'');
        $travelguide_options = get_select_options($travelguide_options_array,'');
        $hotel_options = get_select_options($hotel_options_array,'');
        $res_options = get_select_options($res_options_array,'');
        $fit_options = get_select_options($fit_options_array,'');
        $contracts_options = get_select_options($contracts_options_array,'');
        $contract_appendix_options = get_select_options($contract_appendix_options_array,'');
        $contract_liquidate_options = get_select_options($contract_liquidate_options_array,'');
        
		
		// get label
        $account_module_options = get_select_options($account_mod_options_array,'');
		$contact_module_options = get_select_options($contact_mod_options_array,'');
		$lead_module_options = get_select_options($lead_mod_options_array,'');
		
        $travelguide_module_options = get_select_options($travelguide_mod_options_array,'');  
        $hotel_module_options = get_select_options($hotel_mod_options_array,'') ;
        $res_module_options  = get_select_options($res_mod_options_array,'');
        $fit_module_options = get_select_options($fit_mod_options_array,'');
        $contracts_module_options = get_select_options($contracts_mod_options_array, '');
        $contract_appendix_module_options = get_select_options($contract_appendix_mod_options_array, ''); 
        $contract_liquidate_module_options = get_select_options($contract_liquidate_mod_options_array, ''); 
        
        if($this->bean->type == 'Contracts'){
            $mod_options = $contracts_module_options;
            $var_options = $contracts_options;
        }else if($this->bean->type == 'ContractAppendixs'){
            $mod_options = $contract_appendix_module_options;
            $var_options = $contract_appendix_options;
        }else if($this->bean->type == 'ContractLiquidate'){
        $mod_options = $contract_liquidate_module_options;
        $var_options = $contract_liquidate_options;
        }else if($this->bean->type == 'Accounts'){
			$mod_options = $account_module_options;
			$var_options = $account_options;
		}else if($this->bean->type == 'Contacts'){
			$mod_options = $contact_module_options;
			$var_options = $contact_options;
		}else if($this->bean->type == 'Leads'){
			$mod_options = $lead_module_options;
			$var_options = $lead_options;
		}
        else if($this->bean->type == 'TravelGuides'){
            $mod_options = $travelguide_module_options;
            $var_options = $travelguide_options;
        }
        else if($this->bean->type == 'Hotels'){
            $mod_options = $hotel_module_options;
            $var_options = $hotel_options;
        }
        else if($this->bean->type == 'Restaurants'){
            $mod_options = $res_module_options;
            $var_options = $res_options;
        }
        else if($this->bean->type == 'FITs'){
            $mod_options = $fit_module_options;
            $var_options = $fit_options;
        }
        else {
            $mod_options = $contracts_module_options;
            $var_options = $contracts_options;
        }

       
		
		$account_options = ereg_replace( "\n", '', $account_options);
		$contact_options = ereg_replace( "\n", '', $contact_options);
		$lead_options = ereg_replace( "\n", '', $lead_options);
		$user_options = ereg_replace( "\n", '', $user_options);
        $travelguide_options = ereg_replace("\n",'',$travelguide_options);
        $hotel_options = ereg_replace("\n",'',$hotel_options);
        $res_options = ereg_replace("\n",'',$res_options);
        $fit_options = ereg_replace("\n",'',$fit_options);
        $contracts_options = ereg_replace("\n",'',$contracts_options);
        $contract_appendix_options = ereg_replace("\n",'',$contract_appendix_options);
		$contract_liquidate_options = ereg_replace("\n",'',$contract_liquidate_options);
        
		$account_module_options = ereg_replace( "\n", '', $account_module_options);
		$contact_module_options = ereg_replace( "\n", '', $contact_module_options);
		$lead_module_options = ereg_replace( "\n", '', $lead_module_options);
        $travelguide_module_options = ereg_replace("\n",'',$travelguide_module_options);
        $hotel_module_options = ereg_replace("\n",'',$hotel_module_options);  
        $res_module_options = ereg_replace("\n",'',$res_module_options);  
        $fit_module_options = ereg_replace("\n",'',$fit_module_options);  
        $contracts_module_options = ereg_replace("\n",'',$contracts_module_options);
        $contract_appendix_module_options = ereg_replace("\n",'',$contract_appendix_module_options);  
        $contract_liquidate_module_options = ereg_replace("\n",'',$contract_liquidate_module_options);
		
		$insert_fields = <<<HTML
		<select name='module_name' id='module_name' tabindex="50" onchange="populateVariables(this.options[this.selectedIndex].value);">
			$mod_options
		</select>
		<select name='variable_name' id='variable_name' tabindex="50" onchange="showVariable(this.options[this.selectedIndex].value);">
			$var_options
		</select>
		<input type="text" size="30" tabindex="60" name="variable_text" readonly id="variable_text" />
		<input type='button' tabindex="70" onclick='insert_variable(document.EditView.variable_text.value);' class='button' value='Insert'>
		<script type="text/javascript">
			var accountOptions = "$account_options";
			var contactOptions = "$contact_options";
			var leadOptions = "$lead_options";
			var userOptions = "$user_options";
            var travelguideOptions = "$travelguide_options";
            var hotelOptions = "$hotel_options";
            var resOptions = "$res_options";
            var fitOptions = "$fit_options";
            var contractsOptions = "$contracts_options";
			var contractAppendixOptions = "$contract_appendix_options";
            var contractLiquidateOptions = "$contract_liquidate_options";
            
			var accountModOptions = "$account_module_options";
			var contactModOptions = "$contact_module_options";
			var leadModOptions = "$lead_module_options";
            var travelguideModOptions = "$travelguide_module_options";
            var hotelModOptions = "$hotel_module_options";
            var resModOptions = "$res_module_options";
            var fitModOptions = "$fit_module_options";
            var contractsModOptions = "$contracts_module_options";
            var contractAppendixModOptions = "$contract_appendix_module_options";
            var contractLiquidateModOptions = "$contract_liquidate_module_options";
		</script>
HTML;
		$this->ss->assign('INSERT_FIELDS',$insert_fields);
	}
	
	function displayJS(){
		require_once("include/JSON.php");
		require_once("include/SugarTinyMCE.php");
		global $locale;
		
		$tiny = new SugarTinyMCE();
        	$tinyMCE = $tiny->getConfig();
		
		$locationHref = 'http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/'));
		$js =<<<JS
		<script language="javascript" type="text/javascript">
		$tinyMCE
		var location_href = '{$locationHref}';
		var df = '{$locale->getPrecedentPreference('default_date_format')}';
 		
 		tinyMCE.baseURL = location_href+'/include/javascript/tiny_mce';
		tinyMCE.srcMode = '';
 		tinyMCE.init({
    			theme : "advanced",
    			theme_advanced_toolbar_align : "left",
    			mode: "exact",
			elements : "description",
			theme_advanced_toolbar_location : "top",
			theme_advanced_buttons1: "code,help,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,forecolor,backcolor,separator,styleprops,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,selectall,separator,search,replace,separator,bullist,numlist,separator,outdent,indent,separator,ltr,rtl,separator,undo,redo,separator, link,unlink,anchor,image,separator,sub,sup,separator,charmap,visualaid",
			theme_advanced_buttons3: "tablecontrols,separator,advhr,hr,removeformat,separator,insertdate,pagebreak",
			plugins : "advhr,insertdatetime,table,paste,searchreplace,directionality,style,pagebreak",
			height:"500",
			width: "100%",
			inline_styles : true,
			directionality : "ltr",
			remove_redundant_brs : true,
			entity_encoding: 'raw',
			cleanup_on_startup : true,
			strict_loading_mode : true,
			convert_urls : false,
			plugin_insertdate_dateFormat : '{DATE '+df+'}',
			pagebreak_separator : "<pagebreak />",
		});
		
		tinyMCE.init({
    			theme : "advanced",
    			theme_advanced_toolbar_align : "left",
    			mode: "exact",
			elements : "pdfheader,pdffooter",
			theme_advanced_toolbar_location : "top",
			theme_advanced_buttons1: "code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,undo,redo,separator,forecolor,backcolor,separator,styleprops,styleselect,formatselect,fontselect,fontsizeselect,separator,insertdate",
			theme_advanced_buttons2 : "",
    			theme_advanced_buttons3 : "",
			plugins : "advhr,insertdatetime,table,paste,searchreplace,directionality,style",
			width: "100%",
			inline_styles : true,
			directionality : "ltr",
			entity_encoding: 'raw',
			cleanup_on_startup : true,
			strict_loading_mode : true,
			convert_urls : false,
			remove_redundant_brs : true,
			plugin_insertdate_dateFormat : '{DATE '+df+'}',
		});

		</script>

JS;
		echo $js;
	}

}
?>
