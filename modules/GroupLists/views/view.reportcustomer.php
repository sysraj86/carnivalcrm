 <?php
    require_once('modules/GroupLists/GroupLists.php');
    require_once('include/export_utils.php'); 
    require_once('include/MVC/View/views/view.list.php');   
    class Viewreportcustomer extends ViewList{
        public function preDisplay(){
            parent::preDisplay();
        }
        function listViewProcess()  {
             $GLOBALS['log'] = LoggerManager::getLogger('SugarCRM');
 
            global $sugar_config;
            global $current_user;
            global $app_strings;
            global $timedate;
            $type = clean_string($_REQUEST['module']);
            $db = DBManagerFactory::getInstance();

           /* $query = $_REQUEST['query'];
            if($query){
                $ret_array = generateSearchWhere($type, $_REQUEST['current_post']);
                $w = $ret_array['where'];
                $where = "IN ( SELECT id from grouplists WHERE ".$w .")";  
            }
            else{
                $where = '';
            } */
            /*$ids = $_REQUEST['uid']; 
            if($ids) {
                $ids = explode(',', $ids);
                $ids = "'" . implode("','", $ids) . "'";
                $where = "in ($ids)";
            } 
            else if (isset($_REQUEST['all']) ){
                    $where = '';//get all

                } else {
                    if(!empty($_REQUEST['current_post'])) {
                        $ret_array = generateSearchWhere($type, $_REQUEST['current_post']);

                        $w = $ret_array['where'];
                        $where = "IN ( SELECT id from grouplists WHERE ".$w .")";

                    } else {
                        $where = '';
                    }
            }*/
            $focus = new GroupLists();
           // $query = $focus->create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false, $parentbean=null, $singleSelect = false);
            $query = $focus->
            //$where = $query['id'];
            $start_date = $_REQUEST['start_date'] ;
            $end_date = $_REQUEST['end_date'] ;
            $template =   file_get_contents('modules/GroupLists/tpls/report.tpl');
            $template = str_replace('{START}',$start_date,$template);
            $template = str_replace('{END}',$end_date,$template);
            $template = str_replace('{LIST_GIT}',$focus->get_GIT_to_report($where),$template);
            $template = str_replace('{LIST_FIT}',$focus->get_FIT_to_report($where),$template);

            $size=strlen($template);
            $filename = "DS KHACH DI TOUR TU ".$start_date." DEN ".$end_date.".doc";
            ob_end_clean();
            header("Cache-Control: private");
            header("Content-Type: application/force-download;");
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header("Content-length:$size");
            echo $template;
            ob_flush();

            //    header("Location: index.php?module=GroupLists&action=index");
            sugar_cleanup(true);
        }
        
    }

?>

