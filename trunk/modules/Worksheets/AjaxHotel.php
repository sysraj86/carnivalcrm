<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    global $db;
    if(isset($_POST['destination'])&& isset($_POST['standard'])){
        $destination  = isset($_POST['destination']) ? htmlspecialchars($_POST['destination']):"";
        $standard  = isset($_POST['standard']) ? htmlspecialchars($_POST['standard']):"";
        $id  = isset($_POST['tour_id']) ? htmlspecialchars($_POST['tour_id']):"";
        $idArr = array();
        $idArr = Worksheets::getHotelData($id);
        $arrID = '';
        foreach($idArr as $val){
           $arrID .= $val['id'].',' ;
        }
        $sql = "SELECT
        DISTINCT
        h.id,
        h.name,
        h.standard,desht.destinatio6fe0nations_ida
        FROM hotels h
        INNER JOIN destinations_hotels_c desht
        ON h.id = desht.destinatiocbebshotels_idb
        WHERE h.deleted = 0
        AND desht.deleted = 0
        AND desht.destinatio6fe0nations_ida = '".$destination."' AND h.standard = '".$standard."'";//" AND h.id in ('".$arrID."')";

        $result = $db->query($sql);
        $hotels = array();
        while($row = $db->fetchByAssoc($result)){
            $hotel = array('id'=> $row['id'],'name'=> $row['name']);
            $hotels[] = $hotel;
        }

        echo json_encode($hotels);
    }
    else{
        echo json_encode("{error:'Destination not found!'}");
    }
?>
