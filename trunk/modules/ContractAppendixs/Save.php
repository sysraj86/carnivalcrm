<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/ContractAppendixs/ContractAppendixs.php');
require_once('include/formbase.php');
require_once('modules/ContractConditions/ContractCondition.php');
require_once('modules/ContractAppendixValues/ContractAppendixValues.php');   
//require_once('modules/TransportContracts/TransportContracts.php');   
include("config.php");
global $sugar_config;
global $db;

$focus = new ContractAppendixs();

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
//        switch ($field) {
//            case 'template_ddown_c':
//                $value = implode("^,^",$_POST[$field]);
//                break;
//           
//            default:
//            break;
//        } 
        $focus->$field = $value;
    }
}

foreach($focus->additional_column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
         $focus->$field = $value;
    }
}

$ngay = explode('/',$focus->date,3);
$focus->ngay = $ngay[0];
$focus->thang = $ngay[1];
$focus->nam = $ngay[2];

// Cap nhat tong gia tri thanh toan(bang tien te) cho ContractAppendix  
$focus->tongthanhtoan = $focus->tigia * $focus->tongtien;
//

$focus->save($check_notify); 
 
   
$return_id = $focus->id;


$contracts_values = array(
  'id'          => $_REQUEST['contract_appendixs_value_id'], 
  'num_of_service'  => $_POST['num_of_service'],
  'service'         => $_POST['service'],
  'unit'   => $_POST['unit'],
  'tax'         => $_POST['thue'],
  'amount'       => $_POST['thanhtien'],
  'deleted'     => $_POST['deleted'],
);

// save contract_values

$contracts_values_line_count = count($contracts_values['id']); 
$deleted_count = 0;
for($i = 0; $i<$contracts_values_line_count; $i++){
    $contracts_value = new ContractAppendixValues();
        $contracts_value ->id = $contracts_values['id'][$i]; 
        $contracts_value ->contract_appendixs_value_id = $return_id;  
        $contracts_value ->service = $contracts_values['service'][$i];
        $contracts_value ->num_of_service = $contracts_values['num_of_service'][$i];
        $contracts_value ->unit = $contracts_values['unit'][$i];
        $contracts_value ->tax = $contracts_values['tax'][$i];
        $contracts_value ->amount = $contracts_values['amount'][$i];
        $contracts_value ->deleted = $contracts_values['deleted'][$deleted_count]; 
        
    if($contracts_value->deleted == 1){   
        $contracts_value ->mark_deleted($contracts_values['id'][$i]);     
    }else{
        $contracts_value->save();
    }
    $deleted_count ++;        
}

$contract_condition = array(
   'id'             => $_POST['contract_condition_id'] ,
   'dotthanhtoan'   => $_POST['dotthanhtoan'] ,
   'event'          => $_POST['event'] ,
   'percent'        => $_POST['phantram'] ,
   'money'          => $_POST['tienthanhtoan'] ,
   'currency'       => $_POST['tiente_thanhtoan'] ,
   'in_word'        => $_POST['in_word'] ,
   'deleted'        => $_POST['deleted'],
);
  $contract_condition_line_count = count($contract_condition['id']);
  
  for($j = 0; $j<$contract_condition_line_count; $j++){
      $contract_conditions = new ContractCondition();
        $contract_conditions->id =  $contract_condition['id'][$j];
        $contract_conditions->contract_condition_id =  $return_id;
        $contract_conditions->contract_phase =  $contract_condition['dotthanhtoan'][$j];
        $contract_conditions->event =  $contract_condition['event'][$j];
        $contract_conditions->percent =  $contract_condition['percent'][$j];
        $contract_conditions->money =  $contract_condition['money'][$j];
        $contract_conditions->currency =  $contract_condition['currency'][$j];
        $contract_conditions->in_word =  $contract_condition['in_word'][$j];
        $contract_conditions->deleted =  $contract_condition['deleted'][$deleted_count];
        
        if($contract_conditions->deleted == 1){
            $contract_conditions ->mark_deleted($contract_condition['id'][$j]);
        }else{
            $contract_conditions->save(); 
        }
        $deleted_count ++;
  }
  
   /* 
  
  $transport_contract = array(
    'id'        => $_POST['transport_id'],
    'loaixe'    => $_POST['loaixe'],
    'soxe'      => $_POST['soxe'],
    'lotrinh'   => $_POST['lotrinh'],
    'thoigiansudung'   => $_POST['thoigiansudung'],
    'dongia'    => $_POST['dongia'],
    'deleted'    => $_POST['deleted'],
  );
  $transport_contract_count = count($transport_contract['id']);
  
  for($n=0; $n<$transport_contract_count; $n++){
      $transportcontract = new TransportContracts();
      $transportcontract->id = $transport_contract['id'][$n];
      $transportcontract->loaixe = $transport_contract['loaixe'][$n];
      $transportcontract->soxe = $transport_contract['soxe'][$n];
      $transportcontract->lotrinh = $transport_contract['lotrinh'][$n];
      $transportcontract->thoigiansudung = $transport_contract['thoigiansudung'][$n];
      $transportcontract->dongia = $transport_contract['dongia'][$n];
      $transportcontract->contract_id = $return_id;
      $transportcontract->deleted = $transport_contract['deleted'][$n];
      if($transportcontract->deleted == 1){
          $transportcontract->mark_deleted($transportcontract->id);
      }
      else{ $transportcontract->save(); }
  }

   */


handleRedirect($return_id,'ContractAppendixs');     
?>
