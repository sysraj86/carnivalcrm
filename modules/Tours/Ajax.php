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
    //duyet ket qua
    $list_countries =  get_select_options_with_id(Country::get_list_countries(), '');
    while ($row = $db->fetchByAssoc($result)) {
        $line = array();
        $programs = array();
        $selectedKey = array();
        $destination_list = "";
        $location_html = "";
        if (!empty($row['destination'])) {
            //get selected destination
            $des_selected = json_decode(base64_decode($row['destination']));
            //set output
            $programs['destinations'] = $des_selected;
            $des_selected_count = is_array($des_selected) ? count($des_selected) : 0;
            //generate option list of destination
            $destination_list = get_select_options_with_id($app_list_strings['destination_dom_list'], $des_selected);
            if ($des_selected_count) {
                // LAY TAT CA LOCATION CUA CAC DESTINATION DA CHON
                $location = $tour->getLocationsByDes($des_selected);
                // LOAD LOCATION DA CHON
                $location_selected = json_decode(base64_decode($row['location'], true));
                //set output
                $programs['locations'] = $location_selected;
                ///dem xem co bao nhieu location da duoc chon
                $lc_selected_count = (is_array($location_selected) && count($location) > 0) ? count($location_selected) : 0;
                //DUYET TUNG LOCATION
                foreach ($location as $l) {
                    //description
                    $des = ($l['description'] != null) ? $l['description'] : '';
                    //id
                    $id = $l['id'];
                    $name = $l['name'];
                    $str_seected = '';
                    if (is_array($location_selected))
                        $str_seected = (in_array($l['id'], $location_selected)) ? 'selected' : '';

                    $location_html .= '<option ' . $str_seected . ' data-description="' . $des . '" value="' . $id . '">' . $name . '</option>';
                }
            }
        }
        else {
            $destination_list = get_select_options_with_id($app_list_strings['destination_dom_list'], '');
        }
        /* $location_list = get_select_options_with_id($app_list_strings['location_dom_list'], "");*/
        $programs['id'] = $row['id'];
        $programs['title'] = $row['title'];
        $programs['note'] = $row['notes'];
        $programs['description'] = $row['description'];
        $programs['picture'] = $row['picture'];
        $line['program'] = $programs;
        $line['destination_list'] = $destination_list;
        $line['location_list'] = $location_html;
        $line['countries_list'] = $list_countries;
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
        $query .= ') and D.deleted = 0';
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
        $query .= ') and a.deleted = 0';
        $result = $db->query($query);
        while ($row = $db->fetchByAssoc($result)) {
            $areas[$row['id']] = $row['name'];
        }
        $response = json_encode($areas);
    }
}
echo $response;
?>
