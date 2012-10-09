<?php
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');

    class ViewLoadAreaByDepartment extends SugarView{

        function ViewLoadAreaByDepartment() {
            parent::SugarView();
        }

        function display(){

            global $db;
            $focus = new Tour();
            if(isset($_POST['department']) && isset($_POST['department']) != ''){
                $data = $focus->loadAreaByDepartment($_POST['department']);
                if(count($data)>0){
                    $area_options .= '<option value ="">none</option>';
                    foreach($data as $row){
                        $area_options .= "<option data-code='" . $row['code'] . "' data-country='" . $row['country_id'] . "' value='" . $row['id'] . "'>" . $row['name'].'-'.$row['country']."</option>";       
                    }
                    echo $area_options;    
                }
            }

        }  // end function
    } // end class
?>
