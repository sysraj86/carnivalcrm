<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  GroupLists extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'GroupLists';
        var $object_name = 'GroupLists';
        var $table_name = 'grouplists';
        var $importable = true; 
        
        var $id;
        var $date_entered;
        var $date_modified;
        var $modified_user_id;
        var $assigned_user_id;
        var $created_by;
        var $created_by_name;
        var $currency_id;
        var $modified_by_name;
        var $name;
        var $description;
        var $grouplist_code;
        var $start_date;
        var $end_date;
        
        function Worksheets(){
            global $sugar_config;
            parent::SugarBean();
        }
        
                
        function get_summary_text() {
            return "$this->name";
        }
        
        function get_export2word($id = ''){
            $sql = " SELECT
            f.last_name ,f.first_name
            FROM grouplists_fits_c gf
            INNER JOIN fits f
            ON f.id = gf.grouplists4843itsfits_idb
            WHERE gf.deleted = 0
            AND f.deleted = 0
            AND grouplistsd262uplists_ida = '".$id."'
            UNION ALL SELECT f.last_name, f.first_name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
            INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
            WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND ga.grouplists228auplists_ida ='".$id."'" ;
            $result = $this->db->query($sql);
            $count = $this->db->getRowCount($result);
            $avg = ceil($count/2);
            $html = '';
            $html .= '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; padding: 0px;">';
            $html .= '<tr>'; 
            $html .= '<td valign="top">';
            $html .= '<table cellspacing="0" cellpadding="0" border ="1" width="100%" style="border-collapse: collapse; padding: 0px;">';
            $html .= '<tr> <th> STT </th> <th> HỌ VÀ TÊN </th> </tr>';
            for($i =1 ; $i<=$avg; $i++){
                $row = $this->db->fetchByAssoc($result);
                $html .= '<tr>';
                $html .= '<td align="center">'.$i.'</td>';
                $html .= '<td>'. $row['first_name'].' '.$row['last_name']. '</td>';
                $html .= '</tr>'; 
            }
            $html .= '</table>';
            $html .= '</td>';
            
            $html .= '<td valign="top">';
            $html .= '<table cellspacing="0" cellpadding="0" border ="1" width="100%" style="border-collapse: collapse; padding: 0px;">';
            $html .= '<tr> <th> STT </th> <th> HỌ VÀ TÊN </th> </tr>'; 
            for($j = $avg+1; $j<=$count; $j++){
                $row = $this->db->fetchByAssoc($result);
                $html .= '<tr>'; 
                $html .= '<td align="center">'.$j.'</td>';
                $html .= '<td>'. $row['first_name'].' '.$row['last_name']. '</td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
            $html .= '</td>'; 
            $html .= '</tr>';  
            $html .= '</table>';
            return $html;
        }
        
        function get_count($id = ''){
            $sql = "SELECT
            f.last_name
            FROM grouplists_fits_c gf
            INNER JOIN fits f
            ON f.id = gf.grouplists4843itsfits_idb
            WHERE gf.deleted = 0
            AND f.deleted = 0
            AND grouplistsd262uplists_ida = '".$id."'
            UNION ALL SELECT f.last_name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
            INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
            WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND ga.grouplists228auplists_ida ='".$id."'" ;
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);
        }
        
        function get_GIT_to_report($where = ''){
            $sql = "SELECT f.last_name, f.first_name,f.phone_mobile, a.name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
            INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
            WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND ga.grouplists228auplists_ida IN ";
            $sql .= $where;
            $result = $this->db->query($sql);
            $stt = 1;
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
               $html .= '<tr>' ;
                    $html .= '<td>'.$stt.'</td>';
                    $html .= '<td>'.$row['first_name'].' '.$row['first_name'].'</td>';
                    $html .= '<td align="center">'.$row['phone_mobile'].'</td>';
                    $html .= '<td>'.$row['name'].'</td>';
               $html .= '</tr>' ;
               $stt ++;
            }
            $html .= '<tr>' ; 
                $html .= '<td colspan="3" align="center">Tổng cộng </td>';
                $html .= '<td> <b>'.$this->db->getRowCount($result).' Khách </b></td>';  
            $html .= '</tr>';
            
            return $html;
        }
        
        function get_FIT_to_report($where =''){
            $sql = " SELECT
            f.last_name ,f.first_name ,f.phone_mobile
            FROM grouplists_fits_c gf
            INNER JOIN fits f
            ON f.id = gf.grouplists4843itsfits_idb
            WHERE gf.deleted = 0
            AND f.deleted = 0
            AND grouplistsd262uplists_ida IN ";
            $sql .= $where;
            
            $result = $this->db->query($sql);
            $stt = 1;
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
               $html .= '<tr>' ;
                    $html .= '<td>'.$stt.'</td>';
                    $html .= '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
                    $html .= '<td align="center">'.$row['phone_mobile'].'</td>';
               $html .= '</tr>' ;
               $stt ++;
            }
            $html .= '<tr>' ; 
                $html .= '<td colspan="2" align="center">Tổng cộng </td>';
                $html .= '<td><b>'.$this->db->getRowCount($result).' Khách</b></td>';  
            $html .= '</tr>';
            
            return $html;
            
         }
        
        /*function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false, $parentbean=null, $singleSelect = false){
        
            $dateWhereClause = '';
            $low_secs = ' 0:00:01';
            $high_secs = ' 23:59:59';

            global $timedate;

            if(!empty($_REQUEST['start_date_basic']) || !empty($_REQUEST['end_date_basic'])){
                if(!empty($_REQUEST['start_date_basic'])){
                    $from_date = trim($_REQUEST['start_date_basic']);
                    $mysql_from = $timedate->to_db_date($from_date,false);
                    $fromClause = "grouplists.start_date >= '$mysql_from' "; 
                }

                if(!empty($_REQUEST['end_date_basic'])){
                    $to_date = trim($_REQUEST['end_date_basic']);
                    $mysql_to = $timedate->to_db_date($to_date,false);
                    $toClause = " grouplists.end_date <= '$mysql_to' "; 
                }            
                if($fromClause && $toClause){
                    $and = 'AND';
                }

                $dateWhereClause = " AND ( $fromClause $and $toClause ) ";                
            }    

            $ret_array = parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted, $join_type, true, $parentbean, $singleSelect);

            //to make these custom fields pre-populatable, they had to go in searchdefs. But that automatically
            //puts them in the query as sugar wants. But we want to use these fields as we wish. So remove what sugar adds.
            $ret_array['where'] = preg_replace('/AND \( grouplists\.start_date[^)]+\)/', '', $ret_array['where']);
            $ret_array['where'] = preg_replace('/AND \( grouplists\.end_date[^)]+\)/', '', $ret_array['where']);

            $ret_array['where'] = preg_replace(' /\(grouplists\.start_date[^)]+\)/', '1', $ret_array['where']);



            $ret_array['where'] .= $dateWhereClause;
            if ( !$return_array ){

                return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];
            }

            return $ret_array;
        
        }  */
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
      }
    }
?>
