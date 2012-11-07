<?php


header("Content-Type: application/json");
global $db;
if (isset($_POST['service_id']) && isset($_POST['type'])) {
    $services = array();
    $type = $_POST['type']; // type: Restaurants or Holtels
    $id = $_POST['service_id']; // service ID
    if($id != ''){
        if($type === 'Restaurants') { // if restaurants
            $sql = "SELECT * FROM restaurants WHERE deleted = 0 AND id = '{$id}'";
            $result = $db->query($sql);
            $services = $db->fetchByAssoc($result);
        }elseif($type === 'Hotels') { // if hotels
            $sql = "SELECT * FROM hotels WHERE deleted = 0 AND id = '{$id}'";
            $result = $db->query($sql);
            $services = $db->fetchByAssoc($result);
        } 
    }
    
    echo json_encode($services); //echo services list as json
} else {
    echo json_encode("{'ERROR':'worksheet id or type null'}"); //echo ERROR
}
