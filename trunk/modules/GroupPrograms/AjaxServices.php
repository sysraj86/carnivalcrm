<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/16/11
 * Time: 8:22 AM
 */
//set header return to json
header("Content-Type: application/json");
global $db;
if (isset($_POST['worksheet_id']) && isset($_POST['type'])) {
    $type = $_POST['type']; //type: Restaurants or Holtels
    $id = $_POST['worksheet_id']; //worksheet ID
    //if hotels
    $query = "";
    //select content in worksheet
    $query = "select content,type from worksheets where id = '$id' and deleted = 0";
    //execute query
    $result = $db->query($query);
    //get row
    $row = $db->fetchByAssoc($result);
    //get content and decode
    $content = base64_decode($row['content']);
    $content = json_decode($content);
    $worksheet_type = $row['type'];
    $services = array();

    if ($type === 'Restaurants') { // if restaurants
    if($worksheet_type == 'Inbound'){
        $restaurants = array_merge($content->nhahang_mienbac,$content->nhahang_mientrung,$content->nhahang_miennam);
    }
     else if($worksheet_type == 'DOS') {
         $restaurants = $content->nhahang;
     }   
      if ($restaurants != null) {
            foreach ($restaurants as $item) {
                //id cua nha hang
                $id = $item->nh_id;
                //name cua nha hang
                $name = $item->nh_name;
                //create a service
                $service = array(
                    "name" => $name,
                    "id" => $id
                );
                //push into list services
                $services[] = $service;
            }
        }
    } else if ($type === 'Hotels') { // if hotels
        if($worksheet_type == 'Inbound'){
            $hotels = array_merge($content->khachsan_mienbac, $content->khachsan_mientrung, $content->khachsan_miennam);
        }
        else if($worksheet_type == 'DOS'){
            $hotels = $content->khachsan;
        }
        
        if ($hotels != null) {
            foreach ($hotels as $item) {
                $id = $item->ks_id;
                $name = $item->ks_name;
                $service = array(
                    "name" => $name,
                    "id" => $id
                );
                $services[] = $service;
            }
        }
    }
    echo json_encode($services); //echo services list as json
} else {
    echo json_encode("{'ERROR':'worksheet id or type null'}"); //echo ERROR
}
