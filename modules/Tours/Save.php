<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Tours/Tour.php');
require_once('include/formbase.php');
require_once('modules/TourPrograms/TourProgram.php');
include("config.php");
global $sugar_config;
$focus = new Tour();
/*$isUpdate = true;*/

$focus->retrieve($_POST['record']);

if (!$focus->ACLAccess('Save')) {
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}
if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE;
} else {
    $check_notify = FALSE;
}

foreach ($focus->column_fields as $field) {
    if (isset($_POST[$field])) {
        $value = $_POST[$field];
        switch ($field) {
            case 'transport':
                $value = implode("^,^", $_POST[$field]);
                break;
            case 'noiden':
                $value = implode('^,^', $_POST[$field]);
            default:
                break;
        }
        $focus->$field = $value;
    }
}

foreach ($focus->additional_column_fields as $field) {
    if (isset($_POST[$field])) {
        $value = $_POST[$field];
        $focus->$field = $value;
    }
}
$tour_code_area = isset($_POST['tour_code_area']) ? $_POST['tour_code_area'] : "";
$tour_code_department = isset($_POST['tour_code_department']) ? $_POST['tour_code_department'] : "";
$tour_code_num = isset($_POST['tour_code_num']) ? $_POST['tour_code_num'] : "";
$tour_num = "";
$focus->tour_code = $tour_code_area . $tour_code_num . "/" . $tour_code_department;
if (isset($_POST['is_template'])) {
    $focus->is_template = $_POST['is_template'];
    $focus->template_name = isset($_POST['template_name']) ? $_POST['template_name'] : $focus->name;
    //get tour code

} else {
    $focus->is_template = 0;
    $focus->template_name = "";
    //get_tour_code

    $tour_num = isset($_POST['tour_num']) ? $_POST['tour_num'] : "";
    $focus->tour_code .= "-" . $tour_num;
}
if (isset($_POST['tour_picture_name'])) {
    $focus->picture = $_POST['tour_picture_name'];
}
if (!empty($_FILES['tour_image'])) {
    global $sugar_config;
    if ($_FILES['tour_image']['error'] == 0) {
        $file_name = $_FILES['tour_image']['name'];
        $tmp_name = $_FILES['tour_image']['tmp_name'];
        $ext = explode('.', $file_name);
        $img_ext = $ext[count($ext) - 1];
        $img_valid = false;
        $image_extension = 'jpg_jpeg_gif_bmp_png';
        $image_extension_arr = explode('_', $image_extension);
        for ($i = 0; $i < count($image_extension_arr); $i++) {
            if ($img_ext != $image_extension_arr[$i]) {
                $img_valid = true;
            }
        }
        if ($img_valid == false) {
            echo "<script language='javascript'> alert('file ảnh không hợp lệ'); </script>";
            return;
        }
        if (is_file('modules/images/' . $focus->picture)) {
            @unlink('modules/images/' . $focus->picture);
        }
        $destination = 'modules/images/' . $file_name;
        if (move_uploaded_file($tmp_name, $destination)) {
            $focus->picture = $file_name;
            //$this->image = $file_name;
        }
    }

}
if (empty($this->id) || $this->new_with_id == true) $isUpdate == false;
$focus->save($check_notify);
/**Synchronize with web **/
/*if(isset($sugar_config["sync_with_web"]) && $sugar_config["sync_with_web"]){

    $dbconfig = $sugar_config['msdbconfig'];
    $host_name = $dbconfig['db_host_name'];
    $username = $dbconfig['db_user_name'];
    $password = $dbconfig['db_password'];
    $name = $dbconfig['db_name'];
    // get connection
    $con = mssql_connect($host_name,$username,$password);
    //if con == null
    if(!$con){
        die('some thing wrong while connection with sql server');
    }
    $query = "";
    //if is update proccess.
    if ($isUpdate){


    }
   $result = mssql_query($query,$con);

}*/

$return_id = $focus->id;
/**
 * Countries HANDLE
 */
$tour_program_countries = $_POST['tour_program_countries'];
$countries = array();
//get destination selected in one line
$count = $_POST['tour_program_countries_count'];
//bien dem
$k = 0;
//duyet mang count = so luong program
for ($i = 0; $i < count($count); $i++) {

    $countriesArr = array();
    //duyet tu $k hien tai den $count[$i]*$i (hang * cot);
    for ($k = $k  ; $k < $count[$i]*($i+1); $k++) {
        if (!empty($tour_program_countries[$k])) {
            $countriesArr[] = $tour_program_countries[$k];
        }
    }
    $countries[] = base64_encode(json_encode($countriesArr));
}
/**
 * Areas HANDLE
 */
$a = $_POST['tour_program_areas'];
$areas = array();
$k= 0;
//get destination selected in one line
$count = $_POST['tour_program_areas_count'];
for ($i = 0; $i < count($count); $i++) {
    $areasArr = array();
    for ($k = $k; $k < $count[$i]*($i+1); $k++) {
        if (!empty($a[$k])) {
            $areasArr[] = $a[$k];
        }
    }
    $areas[] = base64_encode(json_encode($areasArr));
}
/**
 * Destinations HANDLE
 */
$d = $_POST['destinations'];
$destination = array();
$k = 0;
//get destination selected in one line
$destination_count = $_POST['destination_selected_count'];
for ($i = 0; $i < count($destination_count); $i++) {
    $des = array();
    for ($k = 0; $k < $destination_count[$i]*($i+1); $k++) {
        if (!empty($d[$k])) {
            $des[] = $d[$k];
        }
    }
    $destination[] = base64_encode(json_encode($des));
}
/**
 * Locations hanlde
 */
$location = $_POST['tour_program_locations'];
//get num of location selected
$location_count = $_POST['location_selected_count'];
$locations = array();
$k = 0;
for ($i = 0; $i < count($location_count); $i++) {
    $loc = array();
    for ($k = 0; $k < $location_count[$i]*($i+1); $k++) {
        if (!empty($location[$k])) {
            $loc[] = $location[$k];
        }
    }
    $locations[] = base64_encode(json_encode($loc));
}
$program = array(
    'ids' => $_POST['tour_program_id'],
    'titles' => $_POST['title'],
    'countries'=>$countries,
    'areas'=>$areas,
    'destinations' => $destination,
    'locations' => $locations,
    'notes' => $_POST['notes'],
    'descriptions' => $_POST['description_pro'],
    'path' => $_FILES['uploadfile'],
    'pictures' => $_POST['images'],
    'deleted' => $_POST['deleted'],
);
//$filename = $_FILES['uploadfile']['name'];

/*foreach($_FILE['uploadfile'] as $key => $error){
$name=$_FILE['uploadfile']['name'][$key];
move_uploaded_file($_FILE['uploadfile']['tmp_name'][$key],"modules/images/$name");
}*/


$tourProgramCountLine = count($program['titles']);

for ($i = 0; $i < $tourProgramCountLine; $i++) {
    $tourProgram = new TourProgram();
    $tourProgram->id = $program['ids'][$i];
    $tourProgram->tour_id = $return_id;
    $tourProgram->title = $program['titles'][$i];
    $tourProgram->areas = $program['areas'][$i];
    $tourProgram->countries = $program['countries'][$i];
    $tourProgram->destination = $program['destinations'][$i];
    $tourProgram->location = $program['locations'][$i];
    $tourProgram->notes = $program['notes'][$i];
    $tourProgram->description = str_replace("\\\"", "&quot;", $program['descriptions'][$i]);
    $tourProgram->picture = $program['pictures'][$i];
    // begin upload image
    $file_name = $program['path']['name'][$i];
    if (!empty($file_name)) {
        $tmp_name = $program['path']['tmp_name'][$i];
        $ext = explode('.', $file_name);
        $img_ext = $ext[count($ext) - 1];
        $img_valid = false;
        $image_extension = 'jpg_jpeg_gif_bmp_png';
        $image_extension_arr = explode('_', $image_extension);
        for ($j = 0; $j < count($image_extension_arr); $j++) {
            if ($img_ext != $image_extension_arr[$j]) {
                $img_valid = true;
            }
        }
        if ($img_valid == false) {
            echo "<script language='javascript'> alert('file ảnh không hợp lệ'); </script>";
            break;
        }
        if (is_file('modules/images/' . $tourProgram->picture)) {
            @unlink('modules/images/' . $tourProgram->picture);
        }

        $destination = 'modules/images/' . $file_name;
        if (move_uploaded_file($tmp_name, $destination)) {
            $tourProgram->picture = $file_name;
        }
    }
    // end upload image
    $tourProgram->deleted = $program['deleted'][$i];
    if ($tourProgram->deleted == 1) {
        $tourProgram->mark_deleted($tourProgram->id);
    }
    else {
        $tourProgram->save();
    }
}

handleRedirect($return_id, 'Tours');

?>
