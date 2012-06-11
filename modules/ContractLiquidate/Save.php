<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/ContractLiquidate/ContractLiquidate.php');
require_once('include/formbase.php');
require_once('modules/ContractLiquidateValues/ContractLiquidateValues.php');
require_once('modules/ContractLiquidateIncre/ContractLiquidateIncre.php');   
require_once('modules/ContractLiquidateDecre/ContractLiquidateDecre.php');   
include("config.php");
global $sugar_config;

$focus = new ContractLiquidate();

$focus->retrieve($_POST['record']);

if(!$focus->ACLAccess('Save')){
        ACLController::displayNoAccess(true);
        sugar_cleanup(true);
}
if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE;
}else{
    $check_notify = FALSE;
}


foreach($focus->column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
        switch ($field) {
            case 'template_ddown_c':
                $value = implode("^,^",$_POST[$field]);
                break;
           
            default:
            break;
        } 
        $focus->$field = $value;
    }
}

foreach($focus->additional_column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
         $focus->$field = $value;
    }
}

$date = explode('/',$focus->date,3);
$focus->day = $date[0];
$focus->month = $date[1];
$focus->year = $date[2];
$focus->save($check_notify); 
 
  
$return_id = $focus->id;

 $deleted_count = 0;
// Save gia tri hop dong
$giatrihopdong = array(   
  'contract_value_name'         => $_POST['contract_value_name'],
  'id'                          => $_POST['contract_value_id'],
  'deleted'                     => $_POST['deleted'],
  'contract_dongia_kehoach'     => $_POST['contract_dongia_kehoach'],
  'contract_soluong_kehoach'    => $_POST['contract_soluong_kehoach'],
  'contract_thanhtien_kehoach'  => $_POST['contract_thanhtien_kehoach'],
  'contract_dongia_thucte'      => $_POST['contract_dongia_thucte'],
  'contract_soluong_thucte'     => $_POST['contract_soluong_thucte'],
  'contract_thanhtien_thucte'   => $_POST['contract_thanhtien_thucte'],
  
);
$giatrihopdong_count = count($giatrihopdong['id']); 
for($i = 0; $i<$giatrihopdong_count; $i++){
    $contracts_value = new ContractLiquidateValues();
    if(($giatrihopdong['contract_thanhtien_thucte'][$i] != '' && $giatrihopdong['contract_thanhtien_thucte'][$i] != 0) || $giatrihopdong['deleted'][$deleted_count]== 1){
        $contracts_value->id = $giatrihopdong['id'][$i]; 
        $contracts_value->contract_value_name = $giatrihopdong['contract_value_name'][$i];  
        $contracts_value->contract_dongia_kehoach = $giatrihopdong['contract_dongia_kehoach'][$i];
        $contracts_value->contract_soluong_kehoach = $giatrihopdong['contract_soluong_kehoach'][$i];
        $contracts_value->contract_thanhtien_kehoach = $giatrihopdong['contract_thanhtien_kehoach'][$i];
        $contracts_value->contract_dongia_thucte = $giatrihopdong['contract_dongia_thucte'][$i];
        $contracts_value->contract_soluong_thucte = $giatrihopdong['contract_soluong_thucte'][$i];
        $contracts_value->contract_thanhtien_thucte = $giatrihopdong['contract_thanhtien_thucte'][$i]; 
        $contracts_value->deleted = $giatrihopdong['deleted'][$deleted_count];  
        $contracts_value->contract_liquidate_id = $return_id;
        if($contracts_value->deleted == 1){
            $contracts_value->mark_deleted($contracts_value ->id);    
        }else{
            $contracts_value->save();
        }   
    }
    $deleted_count ++ ;
}

// Save gia tri phat sinh tang
$phatsinhtang = array(   
  'phatsinhtang_name'               => $_POST['phatsinhtang_name'],
  'id'                              => $_POST['phatsinhtang_id'],
  'deleted'                         => $_POST['deleted'],
  'phatsinhtang_dongia_kehoach'     => $_POST['phatsinhtang_dongia_kehoach'],
  'phatsinhtang_soluong_kehoach'    => $_POST['phatsinhtang_soluong_kehoach'],
  'phatsinhtang_thanhtien_kehoach'  => $_POST['phatsinhtang_thanhtien_kehoach'],
  'phatsinhtang_dongia_thucte'      => $_POST['phatsinhtang_dongia_thucte'],
  'phatsinhtang_soluong_thucte'     => $_POST['phatsinhtang_soluong_thucte'],
  'phatsinhtang_thanhtien_thucte'   => $_POST['phatsinhtang_thanhtien_thucte'],
  
);
$phatsinhtang_count = count($phatsinhtang['id']); 
for($i = 0; $i<$phatsinhtang_count; $i++){
    $Contract_Incre = new ContractLiquidateIncre();
    if(($phatsinhtang['phatsinhtang_thanhtien_thucte'][$i] != '' && $phatsinhtang['phatsinhtang_thanhtien_thucte'][$i] != 0) || $phatsinhtang['deleted'][$deleted_count] == 1){
        $Contract_Incre->id = $phatsinhtang['id'][$i]; 
        $Contract_Incre->phatsinhtang_name = $phatsinhtang['phatsinhtang_name'][$i];  
        $Contract_Incre->phatsinhtang_dongia_kehoach = $phatsinhtang['phatsinhtang_dongia_kehoach'][$i];
        $Contract_Incre->phatsinhtang_soluong_kehoach = $phatsinhtang['phatsinhtang_soluong_kehoach'][$i];
        $Contract_Incre->phatsinhtang_thanhtien_kehoach = $phatsinhtang['phatsinhtang_thanhtien_kehoach'][$i];
        $Contract_Incre->phatsinhtang_dongia_thucte = $phatsinhtang['phatsinhtang_dongia_thucte'][$i];
        $Contract_Incre->phatsinhtang_soluong_thucte = $phatsinhtang['phatsinhtang_soluong_thucte'][$i];
        $Contract_Incre->phatsinhtang_thanhtien_thucte = $phatsinhtang['phatsinhtang_thanhtien_thucte'][$i]; 
        $Contract_Incre->deleted = $phatsinhtang['deleted'][$deleted_count];
        $Contract_Incre->contract_liquidate_id = $return_id;    
        if($Contract_Incre->deleted == 1){
            $Contract_Incre ->mark_deleted($Contract_Incre->id);
        }else{
            $Contract_Incre->save();
        }       
    }
    $deleted_count++;
}

// Save gia tri phat sinh giam
$phatsinhgiam = array(   
  'phatsinhgiam_name'               => $_POST['phatsinhgiam_name'],
  'id'                              => $_POST['phatsinhgiam_id'],
  'deleted'                         => $_POST['deleted'],
  'phatsinhgiam_dongia_kehoach'     => $_POST['phatsinhgiam_dongia_kehoach'],
  'phatsinhgiam_soluong_kehoach'    => $_POST['phatsinhgiam_soluong_kehoach'],
  'phatsinhgiam_thanhtien_kehoach'  => $_POST['phatsinhgiam_thanhtien_kehoach'],
  'phatsinhgiam_dongia_thucte'      => $_POST['phatsinhgiam_dongia_thucte'],
  'phatsinhgiam_soluong_thucte'     => $_POST['phatsinhgiam_soluong_thucte'],
  'phatsinhgiam_thanhtien_thucte'   => $_POST['phatsinhgiam_thanhtien_thucte'],
  
);
$phatsinhgiam_count = count($phatsinhgiam['id']); 
for($i = 0; $i<$phatsinhgiam_count; $i++){
    $Contract_Decre = new ContractLiquidateDecre();
    if(($phatsinhgiam['phatsinhgiam_thanhtien_thucte'][$i] != '' && $phatsinhgiam['phatsinhgiam_thanhtien_thucte'][$i] != 0) || $phatsinhgiam['deleted'][$deleted_count] ==1 ){
        $Contract_Decre->id = $phatsinhgiam['id'][$i]; 
        $Contract_Decre->phatsinhgiam_name = $phatsinhgiam['phatsinhgiam_name'][$i];  
        $Contract_Decre->phatsinhgiam_dongia_kehoach = $phatsinhgiam['phatsinhgiam_dongia_kehoach'][$i];
        $Contract_Decre->phatsinhgiam_soluong_kehoach = $phatsinhgiam['phatsinhgiam_soluong_kehoach'][$i];
        $Contract_Decre->phatsinhgiam_thanhtien_kehoach = $phatsinhgiam['phatsinhgiam_thanhtien_kehoach'][$i];
        $Contract_Decre->phatsinhgiam_dongia_thucte = $phatsinhgiam['phatsinhgiam_dongia_thucte'][$i];
        $Contract_Decre->phatsinhgiam_soluong_thucte = $phatsinhgiam['phatsinhgiam_soluong_thucte'][$i];
        $Contract_Decre->phatsinhgiam_thanhtien_thucte = $phatsinhgiam['phatsinhgiam_thanhtien_thucte'][$i]; 
        $Contract_Decre->deleted = $phatsinhgiam['deleted'][$deleted_count];
        $Contract_Decre->contract_liquidate_id = $return_id;
        if($Contract_Decre->deleted == 1){
            $Contract_Decre->mark_deleted($Contract_Decre->id);
        }else{
            $Contract_Decre->save();
        }        
    }
    $deleted_count++;   
}



  



handleRedirect($return_id,'ContractLiquidate');     
?>
