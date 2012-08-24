<?php
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');

    class ViewLoadAreaByDepartment extends SugarView{

        function ViewLoadAreaByDepartment() {
            parent::SugarView();
        }

        function display(){

            global $db;
            
            if(isset($_POST['department']) && isset($_POST['department']) != ''){
                $area_options = '<option data-code="" value="">--None--</option>';
                $sql_get_area = "
                    SELECT DISTINCT a.id, a.name, a.code, c.name as country, c.id as country_id 
                    FROM c_areas a JOIN countries_c_areas_c ca ON a.id = ca.countries_92a9c_areas_idb 
                        JOIN countries c ON c.id = ca.countries_f060untries_ida
                    WHERE c.department = '".$_POST['department']."'
                        AND a.deleted = 0 
                        AND c.deleted = 0 
                        AND ca.deleted = 0";
                $result_get_area = $db->query($sql_get_area);
                while($row = $db->fetchByAssoc($result_get_area)){
                     $area_options .= "<option data-code='" . $row['code'] . "' data-country='" . $row['country_id'] . "' value='" . $row['id'] . "'>" . $row['name'].' - '.$row['country'] . "</option>";       
                }
                echo $area_options;    
            }
           
        }  // end function
    } // end class
?>
