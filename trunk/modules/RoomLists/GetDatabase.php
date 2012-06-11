<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    if(isset($_POST['id']) && isset($_POST['type'])){
        $id = isset($_POST['id'])? htmlspecialchars($_POST['id']):"";
        $type = isset($_POST['type'])? htmlspecialchars($_POST['type']):""; 

        $arrHT = get_hotel($id,$type);
        $arrCus = get_customer($id);
        $allData = array('hotels' => json_encode($arrHT) , 'customer' => json_encode($arrCus)) ;
        $allData = json_encode($allData);
        echo $allData;
    }

    function get_hotel($id ='',$type = ''){
        global $db;
        if ($type == 'ob'){
            $query ="SELECT id, NAME FROM hotels 
            WHERE id IN(SELECT
            tours_hote9da4shotels_idb
            FROM tours_hotels_c WHERE tours_hote943flstours_ida IN( SELECT tour_id FROM groupprograms WHERE id='".$id."'))" ;
        }
        else if($type == 'dos' || $type == 'ib'){
            $query = "SELECT NAME,id FROM hotels
            WHERE id IN(SELECT
            parent_id
            FROM groupsprogramslines
            WHERE parent = 'Hotels'
            AND groupprogram_id = '".$id."'
            AND deleted = 0) AND deleted =0 ";  
        }

        $result = $db->query($query);
        while($row = $db->fetchByAssoc($result)){
            $arrHT[] = array('id' => $row['id'], 'name' => $row['NAME']);
        }
        return $arrHT;
    }
    function get_customer($id = ''){
        global $db;
        $sql = "SELECT f.first_name,f.last_name,f.salutation,f.phone_mobile,f.gender
        FROM fits f INNER JOIN grouplists_fits_c gc ON f.id = gc.grouplists4843itsfits_idb
        INNER JOIN grouplists g ON g.id = gc.grouplistsd262uplists_ida
        WHERE g.deleted = 0 AND gc.deleted =0 AND f.deleted =0 AND g.id IN(SELECT grouplists87eduplists_ida FROM grouplists_roupprograms_c WHERE grouplistsf242rograms_idb ='".$id."' AND deleted =0)
        UNION ALL
        SELECT
        f.first_name,f.last_name,f.salutation,f.phone_mobile,f.gender
        FROM fits f INNER JOIN accounts_fits_c af ON f.id = af.accounts_f7035itsfits_idb
        INNER JOIN accounts a ON a.id = af.accounts_fd483ccounts_ida INNER JOIN 
        grouplists_accounts_c ga ON a.id = ga.grouplistsa472ccounts_idb INNER JOIN
        grouplists g ON g.id = ga.grouplists228auplists_ida  
        WHERE g.deleted = 0
        AND ga.deleted = 0
        AND a.deleted = 0
        AND f.deleted = 0
        AND af.deleted = 0 AND g.id IN(SELECT grouplists87eduplists_ida FROM grouplists_roupprograms_c WHERE grouplistsf242rograms_idb ='".$id."' AND deleted =0)";

        $result = $db->query($sql);
        while($row = $db->fetchByAssoc($result)){
            if($row['gender']=='male'){
                $gioitinh = 'Nam';
            }
            else{$gioitinh = 'Nữ';}

            $arrCus[] = array('label' => $row['salutation'].''.$row['first_name'].' '.$row['last_name'], 'value' => $row['salutation'].'_'.$row['first_name'].'_'.$row['last_name'].'_'.$gioitinh.'_'.$row['phone_mobile']);
        }
        return $arrCus;
    }
?>
