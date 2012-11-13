<?php

require_once('XTemplate\xtpl.php');
    require_once('data/Tracker.php');
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');
    require_once('include/DetailView/DetailView.php');
    
    global $mod_strings;
    global $app_strings;
    global $app_list_strings;
    global $gridline;
    
    
    $focus = new Tour();
    $detailView = new DetailView();
    $offset     = 0;

// ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
// A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
   if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
       $result = $detailView->processSugarBean("TOURS", $focus, $offset);
       if($result == null) {
        sugar_die($app_strings['ERROR_NO_RECORD']);
       }
       $focus = $result;
   }else{
       header("Location: index.php?module=Tours&action=index");
   }
   
   if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
       $focus->id = "";
   }
   
    echo "\n<p>\n";
    echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, true);
    echo "\n</p>\n";
    global $theme;
    $theme_path = "themes/".$theme."/";
    $image_path = $theme_path."images/";
    require_once($theme_path.'layout_utils.php');

    $GLOBALS['log']->info("Tours detail view");

    $xtpl=new XTemplate ('modules/Tours/DetailView.html');
    
    $xtpl->assign("MOD",          $mod_strings);
    $xtpl->assign("APP",          $app_strings);
    $xtpl->assign("THEME",        $theme);
    $xtpl->assign("GRIDLINE",     ($gridline) ? $gridline : 0);
    $xtpl->assign("IMAGE_PATH",   $image_path);
    $xtpl->assign("PRINT_URL",   "index.php?".$GLOBALS['request_string']);
    $xtpl->assign("ID",           $focus->id);

    if($focus->frame_type == 'F'){
        $xtpl->assign("EXPORT_BUTTON",'<input title="Export to PDF" class="button" type="button" onclick="window.location.href=\'index.php?module=Tours&action=sugarpdf&sugarpdf=basic&record='.$focus->id.'\'" value="Export to PDF" />');    
    }else{
        $xtpl->assign("EXPORT_BUTTON",'<input title="Export to Word" class="button" type="button" onclick="window.location.href=\'index.php?module=Tours&action=export2word&record='.$focus->id.'\'" value="Export to Word" />');    
    }
    
    if(!empty($focus->name)){
        $xtpl->assign("NAME",  $focus->name); 
    }
     else{
            $xtpl->assign("NAME",'');
     }
    $xtpl->assign("TOURCODE",  $focus->tour_code);  
   // $xtpl->assign("FROM",  $focus->from_place);
    $xtpl->assign("ASSIGNED_USER_NAME",  $focus->assigned_user_name); 
    $xtpl->assign("ASSIGNED_USER_ID",  $focus->assigned_user_id);
    $xtpl->assign("DESTINATION_FROM_ID",  $focus->destination_from_id); 
   // $xtpl->assign("TO",  $focus->to_place);
    $xtpl->assign("DESTINATION_TO_ID",  $focus->destination_to_id); 
    $xtpl->assign("START_DATE",  $focus->start_date); 
    $xtpl->assign("END_DATE",  $focus->end_date); 
    $xtpl->assign("DURATION",  $focus->duration); 
    $xtpl->assign("ACCOUNT_NAME",        $focus->accounts_tours_name)  ; 
    $xtpl->assign("ACCOUNT_ID",        $focus->accounts_t4d21ccounts_ida)  ;
    $xtpl->assign("DATE_ENTERED",  $focus->date_entered); 
    $xtpl->assign("DATE_MODIFIED",  $focus->date_modified); 
    $xtpl->assign("CREATED_BY_NAME",  $focus->created_by_name); 
    $xtpl->assign("MODIFIED_BY_NAME",  $focus->modified_by_name); 
    $xtpl->assign("TEMPLATE_NAME",($focus->is_template==1)?"<strong>$focus->template_name</strong>":"");
    if(!empty($focus->status)){
     $xtpl->assign("STATUS",translate('tour_status_dom','',$focus->status));     
    }else{
                 $xtpl->assign("STATUS", ''); 
    }
    if(!empty($focus->transport)){
        $values = explode('^,^', $focus->transport);
        $translated ='';
        foreach($values as $val){
          $translated .= '<li>'.translate('transport_dom', '', $val).'</li>';
        }
        $xtpl->assign("TRANSPORT", $translated);  
    }else{
        $xtpl->assign("TRANSPORT", ''); 
    }
    
    if(!empty($focus->noiden)){
        $des = explode('^,^',$focus->noiden);
        $destination = '';
        foreach($des as $desarr){
            $destination .= '<li>'. translate('destination_dom_list','',$desarr).'</li>';
        }
        $xtpl->assign('DESTINATION',$destination);
    }
    else{
        $xtpl->assign('DESTINATION','');
    }
 
    
    if(!empty($focus->picture)){
      $xtpl->assign('PICTURE',"<img src='modules/images/".$focus->picture."' width='300' height='300'/>") ;
    }
    else {$xtpl->assign('PICTURE','');}
    
    
    $xtpl->assign("VALUE",  $focus->contract_value); 
    if(!empty($focus->currency)) {
        $xtpl->assign("CURRENCY",translate('currency_dom','',$focus->currency));  
    }
    else{$xtpl->assign("CURRENCY",  '');  }
    
    if(!empty($focus->deparment)){
     $xtpl->assign("DEPARMENT",translate('deparment_dom','',$focus->deparment));     
    }  
    else{$xtpl->assign("DEPARMENT",  '');  }
    
    if(!empty($focus->type)){
        $xtpl->assign('TYPE', translate('tourprogram_type_dom','',$focus->type));
    }
    else{
        $xtpl->assign('TYPE', '');
    }
    

    $xtpl->assign("DESCRIPTION", nl2br(html_entity_decode_utf8($focus->description)));
    $xtpl->assign("TOUR_PROGRAM_LINE_DETAIL", $focus->getDetailViewHTMLTourProgramDetail($focus->id));
   // $xtpl->assign("TOUR_PROGRAM_LINE_DETAIL", '');  
    
    $xtpl->parse("main");
    $xtpl->out("main");
    
    require_once('include/SubPanel/SubPanelTiles.php');
   $subpanel = new SubPanelTiles($focus, 'Tours');
   echo $subpanel->display();

   /* $str = "<script>
    YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
   </script>";
   
    echo $str;*/
?>
