<?php
header('Content-type: application/json');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


global $db, $app_list_strings;

/**
 * generate a list of detination based location
 *
 */
if (isset($_POST['destination'])) {
    $destination = $_POST['destination'];
    $query = "SELECT DISTINCT dl.destinatio2a7dcations_idb AS id, l.name, l.description ".
                 "FROM locations l JOIN destinations_locations_c dl ON l.id = dl.destinatio2a7dcations_idb ".
    "where destinatio010enations_ida = '$destination'"." and l.deleted = 0 and dl.deleted = 0";
    $result = $db->query($query);

    $locations = array();

    while ($row = $db->fetchByAssoc($result)) {
        $location = array();
        $location["id"] = $row["id"];
        $location["name"] = $row["name"];
        $location["description"] = $row["description"];
        $locations[$row['id']] = $location;
        //  array_push($locations,$location);
    }
    echo json_encode($locations);
}else{
    echo "{ERROR:'destination hasn't been setted'}";
}
?>
