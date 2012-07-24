<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/23/11
 * Time: 9:51 AM
 * FileName: Ajax.php
 */
/**
 *
 */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
global $db, $app_list_strings;
$response = "";
$action = "";
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
if (isset($_POST['department']) && isset($_POST['frame_type'])) {
    $department = $_POST['department'];
    $frame_type = $_POST['frame_type'];
    $sql = "SELECT * FROM tours WHERE deparment = '$department' AND frame_type = '$frame_type' AND is_template = 1 AND deleted = 0";
    $result = $db->query($sql);
    Tour::destinationToList();
    $tours = array();
    while ($row = $db->fetchByAssoc($result)) {
        $transport = explode('^,^', $row['transport']);
        $transport_dom = get_select_options($app_list_strings['transport_dom'], $transport);
        $destination = explode('^,^', $row['noiden']);
        $destiantion_dom = get_select_options_with_id($app_list_strings['destination_dom_list'], $destination);
        /*$tour = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "description" => $row['description'],
            "from_place" => $row['from_place'],
            "to_place" => $row['to_place'],
            "start_date" => $row[''],
            "end_date" => $row[''],
            "transport" => $transport,
            "transport_dom" => $transport_dom,
            "picture" => $row['picture']
        );*/
        foreach ($row as $key => $value) {
            if ($key == "description")
                $tour[$key] = html_entity_decode_utf8($value);
            else
                $tour[$key] = $value;
        }
        $tour['transport'] = $transport;
        $tour['transport_dom'] = $transport_dom;
        $tour['destination_dom'] = $destiantion_dom;
        $tours[$row['id']] = $tour;
    }
    $response = json_encode($tours);
}
else if (isset($_POST['tour_id'])) {
    //tour id
    $tour_id = $_POST['tour_id'];
    //tour
    $tour = new Tour();
    //fill field
    $tour->retrieve($tour_id);
    ///get program line
    $result = $tour->get_tour_program_lines($tour_id);
    $lines = array();
    $allCountries = Country::get_list_countries();
    while ($row = $db->fetchByAssoc($result)) {
        $line = array();
        $programs = array();
        $selectedKey = array();
        //countries
        $countries = json_decode(base64_decode($row['countries']));
        //countries -> html select
        $list_countries = get_select_options_with_id($allCountries, $countries);
        //areas
        $allAreas = Tour::get_list_areas_by_countries($countries, 1);
        //paser base64 string -> json string -> array
        $areas = json_decode(base64_decode($row['areas']));
        $list_areas = "<option value=''>--None--</option>";
        if ($areas && count($areas) > 0) {
            $list_areas = get_select_options_with_id($allAreas, $areas);
        }
        //cities
        $allCities = Tour::get_list_cities_by_areas($areas);
        $cities = json_decode(base64_decode($row['destination']));
        $list_cities = "<option value=''>--None--</option>";
        if (count($cities) > 0) {
            $list_cities = get_select_options_with_id($allCities, $cities);
        }
        //location
        $allLocation = Tour::get_list_location_by_cities($cities);
        $location = json_decode(base64_decode($row['location']));
        $list_locations = "<option value=''>--None--</option>";
        if (count($location) > 0) {
            $list_locations = get_select_options_with_id($allLocation, $location);
        }
        /* $location_list = get_select_options_with_id($app_list_strings['location_dom_list'], "");*/
        $programs['id'] = $row['id'];
        $programs['title'] = $row['title'];
        $programs['note'] = $row['notes'];
        $programs['description'] = $row['description'];
        $programs['picture'] = $row['picture'];
        $line['program'] = $programs;
        $line['countries_option_list'] = $list_countries;
        $line['areas_option_list'] = $list_areas;
        $line['destination_option_list'] = $list_cities;
       $line['location_option_list'] = $list_locations;
        $line['countries_count'] = count($countries);
        $line['areas_count'] = count($areas);
        $line['cities_count'] = count($cities);
        $line['locations_count'] = count($locations);

        $lines[] = $line;
    }

    /* $sql = "select * from tourprograms where tour_id = '$tour_id' and deleted = 0";
    $result = $db->query($sql);
    $programs = array();
    while ($row = $db->fetchByAssoc($result)) {
        $program = array(
            "ID" => $row['id'],
            "title" => $row['date_time'],
            "description" => $row['description_pro'],
            "note" => $row['note'],
            "picture" => $row['picture']
        );
        $programs[$row['id']]=$program;
    }*/
    $response = json_encode($lines);
}
else if ($action == "sync") {
    if (isset($_POST['tour_id_sync'])) {
        $synced = array();
        $id = $_POST['tour_id_sync'];
        if (!empty($id)) {
            $ids = explode("|", $id);

            foreach ($ids as $i) {
                $tour = new Tour();
                $tour->retrieve($i);
                if ($synced[$i] = $tour->sync()) {
                    $tour->synced = true;
                    $tour->save();
                }
            }
            $response = json_encode($synced);
        } else {
            return false;
        }

    }
}
else if ($action == "get_tour_num") {
    $response = Tour::get_tour_num();
}
else if ($action == "get_destination_by_area") {
    if (isset($_POST['area'])) {
        $area = $_POST['area'];
        $destinations = Destination::getDestinationsByArea($area);
        $response = get_select_options_with_id($destinations, '');
    }
}
else if ($action == "get_cities_by_areas") {
    if (isset($_POST['areas'])) {
        $areas = $_POST['areas'];
        $areas = explode("|", $areas);
        $cities = array();

        $query = "SELECT D.* FROM destinations D JOIN c_areas_destinations_c AD
        ON D.ID = AD.c_areas_de577anations_idb JOIN c_areas A
        ON A.ID = AD.c_areas_de9d4fc_areas_ida
        WHERE (1!=1 ";

        foreach ($areas as $id) {
            $query .= " or A.id = '$id'";
        }
        $query .= ') and D.deleted = 0 and AD.deleted=0 and A.deleted = 0';
        $result = $db->query($query);

        while ($row = $db->fetchByAssoc($result)) {
            $cities[$row['id']] = $row['name'];
        }
        $response = json_encode($cities);
    }
}
else if ($action == "get_area_by_countries") {
    if (isset($_POST['countries'])) {
        $countries = $_POST['countries'];
        $countries = explode("|", $countries);
        $areas = array();
        $query = "SELECT a.id,a.name FROM  c_areas a JOIN c_areas_countries_c ac
                    ON a.id = ac.c_areas_co30d8c_areas_idb JOIN countries c
                    ON c.id = ac.c_areas_cobbabuntries_ida WHERE (1 != 1";
        foreach ($countries as $id) {
            $query .= " or c.id = '$id'";
        }
        $query .= ') and a.deleted = 0 and ac.deleted = 0 and c.deleted = 0';
        $result = $db->query($query);
        while ($row = $db->fetchByAssoc($result)) {
            $areas[$row['id']] = $row['name'];
        }
        $response = json_encode($areas);
    }
}
echo $response;
?>
