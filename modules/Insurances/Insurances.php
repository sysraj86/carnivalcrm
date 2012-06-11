<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   

    class  Insurances extends SugarBean{

        var $new_schema = true;
        var $module_dir = 'Insurances';
        var $object_name = 'Insurances';
        var $table_name = 'insurances';
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

        function Insurances(){
            global $sugar_config;
            parent::SugarBean();
        }

        function get_summary_text() {
            return "$this->name";
        }

        function bean_implements($interface){
            switch($interface){
                case 'ACL':return true;
            }
            return false;
        }

        function get_fit_to_export($id = ''){
            $sql = "SELECT
            f.first_name ,f.last_name
            FROM
            insurances_fits_c ifi INNER JOIN fits f ON ifi.insurancese657itsfits_idb = f.id WHERE
            f.deleted = 0 AND ifi.deleted = 0 AND ifi.insurances87aeurances_ida ='".$id."'";
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
            f.first_name ,f.last_name
            FROM
            insurances_fits_c ifi INNER JOIN fits f ON ifi.insurancese657itsfits_idb = f.id WHERE
            f.deleted = 0 AND ifi.deleted = 0 AND ifi.insurances87aeurances_ida ='".$id."'";
            $result = $this->db->query($sql);
            $count = $this->db->getRowCount($result);
            return $count;
                 //return $this->db->getRowCount($result);
        }
        
        function get_fit_count($id = ''){
            $sql = "SELECT COUNT(*) FROM grouplists_fits_c gf INNER JOIN fits f ON f.id = gf.grouplists4843itsfits_idb  WHERE gf.deleted = 0 AND f.deleted = 0 AND grouplistsd262uplists_ida ='".$id."'";
            $result = $this->db->query($sql);
            $n = $this->db->getRowCount($result);  
            return  $n;
        }
        
        function get_git_count($id = ''){
            $sql = "SELECT COUNT(*) FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
            INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
            WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND ga.grouplists228auplists_ida ='".$id."'";
            $result = $this->db->query($sql);
            $n = $this->db->getRowCount($result);  
            return  $n;
        }
    }
?>
