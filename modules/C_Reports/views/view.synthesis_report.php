<?php
    require_once("modules/C_Reports/C_Reports.php");      
    require_once("modules/C_Reports/AdvancedDatetime.php");
    require_once("include/TimeDate.php");  
    class ViewSynthesis_Report extends SugarView{ 
        function ViewSynthesis_Report(){ 
            parent::display();
        }
        function display(){
            $ss = new Sugar_Smarty();
            $table = array(
                'Contacts'      => 'Contacts',
                'Accounts'      => 'Accounts',
                'Opportunities' => 'Opportunities',
                'Cases'     => 'Cases',
                'Notes'     => 'Notes',
                'Calls'     => 'Calls',
                'Emails'    => 'Emails',
                'Meetings'  => 'Meetings',
                'Tasks'     => 'Tasks',
                'Leads'     => 'Leads',
                'Project'   =>'Projects',
            );
            $timedate = new TimeDate();
            global $db, $mod_strings, $app_list_strings,$current_user;
            $ss = new Sugar_Smarty()   ;
            $ss->assign('MOD',$mod_strings);
            $focus = new C_Reports();
            $role =  $focus->getUserRole('Reports',$current_user->id);//
            $list_user = $focus->getUserForReportAsRole();//
            $list_group = $focus->getAllSecuritySuite(); //
//            if(($role['access1']) &&($role['access2'] == 90 || $role['access3'] == 90)){
//                $ss->assign('ADMIN','90');
//            }
            $ss->assign('lst_group',get_select_options_with_id($app_list_strings['report_securitysuite_dom'],''));
            $ss->assign('lst_user',get_select_options_with_id($app_list_strings['report_user_dom'],''));

            if(isset($_REQUEST['submit'])){
                $start_date =  $_REQUEST['start_date'];
                $end_date =  $_REQUEST['end_date'];
               // $group = $_REQUEST['lst_group'];
                $user_id = $_REQUEST['lst_user'];
                $list_user = $_REQUEST['user_id'];
                $time_range = $_REQUEST['time_range'];
                $start_end_yes = $_REQUEST['start_end_yes'];
                $report_option = $_REQUEST['report_option'];

                $type =  $time_range ?  $time_range: $start_end_yes;
                $ss->assign('TYPE',$type);
                $ss->assign('report_option',$report_option);
            //    $ss->assign('lst_group',get_select_options_with_id($app_list_strings['report_securitysuite_dom'],$group));
                $lst_user = get_select_options($app_list_strings['report_user_dom'],$user_id);
                $ss->assign('lst_user',$lst_user);

                if($list_user){
                    $user_id = json_decode(base64_decode($list_user));
                    if(count($user_id)>0){
                      $user_id = $user_id;  
                    }
                }
                if($user_id){
                       $user_id = (array)$user_id; 
                }
                else{
                    unset($app_list_strings['report_user_dom']['0']);  
                    $user_id = array_keys($app_list_strings['report_user_dom']);
                    //$user_id = implode("','",$user_id); 
                }

                if($group){
                    $group = (array)$group;
                }
                else{
                    unset($app_list_strings['report_securitysuite_dom']['0']);
                    $group = array_keys($app_list_strings['report_securitysuite_dom']);
                }


                $dateOp = new AdvancedDatetimeOperations($focus);
                $user_format = $timedate->get_date_format($current_user);
                $date_format = ($_REQUEST['date_format']!=''?$_REQUEST['date_format']:$user_format);
                if($start_end_yes){
                    $time_range = '' ;
                    $start_date = $timedate->to_display($_REQUEST['start_date'],$date_format,'Y-m-d');
                    $end_date = $timedate->to_display($_REQUEST['end_date'], $date_format,'Y-m-d');
                }
                else{
                    $start_date = date('Y-m-d');
                    $end_date = date('Y-m-d');
                    $dateOp->calc_date2($start_date, $end_date, $time_range);
                }
                
                $date_start = $timedate->to_display($start_date,'Y-m-d',$user_format);
                $date_end = $timedate->to_display($end_date,'Y-m-d',$user_format);
                
                $html = '';
                $html = '<br /><div style="color:red"><b>Note : (Created/Assigned/Modified)</b></div>';
                $html .= '<table class="h3Row" cellpadding="0" cellspacing="0" width="100%" border="1" style="border-collapse: collapse;"> ';
                $html .= '<thead>';
                //$html .= '<tr>';
//                    $html .= '<td colspan="'.(count($table)+1).'" style="background:#EBEBED"> 1 </td>';
//                $html .= '</tr>';
//                $html .= '<tr>';
//                $html .= '<td colspan="'.(count($table)+1).'" style="background:#EBEBED"><font color="red"><b> C : Created <br/> A: Assigned <br/> M: Modifired <br/> </b> </font></td>';
//                $html .= '</tr>';
//                $html .= '<tr>';
                    $html .= '<td class="tb_border" style="background:#EBEBED"><b>User</b></td>';   
                foreach($table as $table_value){
                    if($table_value == 'C_Contract'){
                        $table_value = 'Contract';
                    }
                    $html .= '<td style="background:#EBEBED;text-align:center" class="tb_border" width="'.(100/count($table)).'%"><b>'.$table_value.'</b></td>' ;
                }
                $html .= '</tr>';
                $html .= '</thead>';
                
                if(count($user_id) >0 && $user_id[0] != '0'){
                    foreach($user_id as $value){
                       $html .= '<tr height="20">'; 
                        $html .= '<td class="tb_border"> '.translate('report_user_dom','',$value).' </td>';
                        foreach($table as $table_value){
                            $recordCreate = $focus->countRecordCreate(strtolower($table_value),$value,$start_date,$end_date);
                            $recordModify = $focus->countRecordAsignedTo(strtolower($table_value),$value,$start_date,$end_date);
                            $recordModified = $focus->countRecordModify(strtolower($table_value),$value,$start_date,$end_date); 
                            if($recordCreate > 0){
                                $create_url = '<a target="blank" href="index.php?module='.$table_value.'&action=index&query=true&created_by_basic='.$value.'&date_entered_basic_range_choice=between&start_range_date_entered_basic='.$date_start.'&end_range_date_entered_basic='.$date_end.'&searchFormTab=basic_search">'.$recordCreate.'</a>';
                            }
                            else{
                                $create_url = $recordCreate;
                            }
                            if($recordModify >0){
                                $modify_url = '<a target="blank" href="index.php?module='.$table_value.'&action=index&query=true&assigned_user_id='.$value.'&date_modified_basic_range_choice=between&start_range_date_modified_basic='.$date_start.'&end_range_date_modified_basic='.$date_end.'&searchFormTab=basic_search">'.$recordModify.'</a>';
                            }
                            else{
                                $modify_url = $recordModify ;
                            }
                            if($recordModified >0){
                                $modified_url = '<a target="blank" href="index.php?module='.$table_value.'&action=index&query=true&modified_user_id_basic='.$value.'&date_modified_basic_range_choice=between&start_range_date_modified_basic='.$date_start.'&end_range_date_modified_basic='.$date_end.'&searchFormTab=basic_search">'.$recordModified.'</a>';
                            }
                            else{
                                $modified_url = $recordModified ;
                            }
                            $html .= '<td style="text-align:center" class="tb_border">'.$create_url.' / '.$modify_url.' / '.$modified_url.' </td>';
                        }
                        $html .= '</tr>';
                    }
                }
                    //$countACC = $focus->get_audit_table_name();
                
                $html .= '</table>';
               // $start_date = $timedate->to_display($_REQUEST['start_date'],$date_format,$user_format);
              //  $end_date = $timedate->to_display($_REQUEST['end_date'],$date_format,$user_format);
                $ss->assign('start_date',$_REQUEST['start_date']);
                $ss->assign('end_date',$_REQUEST['end_date']);
                $ss->assign('date_format',$user_format);

            }
            $html .= '<script type="text/javascript"> 
            jQuery(document).ready(function(){
               jQuery("table[class=\'h3Row\']").find("tbody").find("tr:even").addClass("evenListRowS1");
               jQuery("table[class=\'h3Row\']").find("tbody").find("tr:odd").addClass("oddListRowS1");
            });
            </script>';
            $ss->assign('CONTENT',$html);
            $ss->display("modules/C_Reports/tpls/Synthesis_Report.tpl");
        }
    }
?>
