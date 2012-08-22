<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class AreasLogicHook {

        // Ham co chuc nang loc trung Area theo ten, dong thoi tao quan he n - n giua Area va Country
        function createN2NRelationship(&$bean, $event, $arguments) {

            global $current_user, $db;
            if(!isset($_POST['record'])  && trim($bean->country) != ""){
                
                // Lay ra id cua Area neu no da ton tai trong database
                $sql_get_area = "SELECT id FROM c_areas WHERE name = '".$bean->name."' AND deleted = 0 ORDER BY date_entered";
                $get_area_query = $db->query($sql_get_area);
                $get_area_result = $db->fetchByAssoc($get_area_query);
                $area_id = $get_area_result['id'];
                $count_duplicate_area = $db->getRowCount($get_area_query);
                
                // Xoa Area vua import duoc vi da ton tai 1 Area cung ten trong database
                if($area_id != '' && $count_duplicate_area > 1){
                    $sql_del_area = "DELETE FROM c_areas WHERE id = '".$bean->id."'";
                    $db->query($sql_del_area);    
                }
                
                // Lay ra id cua Country neu no da ton tai trong database                
                $sql_get_country = "SELECT id FROM countries WHERE name = '".$bean->country."' AND deleted = 0 ORDER BY date_entered";
                $get_country_query = $db->query($sql_get_country);
                $get_country_result = $db->fetchByAssoc($get_country_query);
                $country_id = $get_country_result['id'];

                // Lay 2 id vua tim duoc de tao quan he
                $this->setRelationship($country_id, $area_id);
            }
            
        }
        
        // Tao relationship
        function setRelationship($country_id, $area_id){
            global $db;
            $id = create_guid(); // Tao ID cho relate record theo chuan cua Sugar
            $queryIns = "   INSERT INTO countries_c_areas_c
                            VALUES (        
                                '".$id."',
                                NOW(),
                                0,
                                '".$country_id."',
                                '".$area_id."'
                            )";
            $db->query($queryIns);            
        } 
    }
?>
