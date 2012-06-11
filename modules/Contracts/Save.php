<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Contracts/Contract.php');
require_once('include/formbase.php');
require_once('modules/ContractConditions/ContractCondition.php');
require_once('modules/ContractValues/ContractValue.php');   
require_once('modules/TransportContracts/TransportContracts.php');
require_once('modules/FITs/CustomerRating.php');
include("config.php");
global $sugar_config;

$focus = new Contract();

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
if(!empty($focus->date_of_contracts)){
    $date = explode('/',$focus->date_of_contracts);
    $focus->date = $date[0];
    $focus->month = $date[1];
    $focus->year = $date[2];
}
$focus->save($check_notify); 

// Check Cham diem va phan loai khach hang
if($focus->parent_type == 'FITs' || $focus->parent_type == 'Accounts'){
    $rating = new CustomerRating();
    $rating->Rating($focus->parent_id,$focus->parent_type);
}
   
$return_id = $focus->id;


$contracts_values = array(
  'id'          => $_POST['contract_value_id'], 
  'num_of_cus'  => $_POST['tong_sl_khach'],
  'age'         => $_POST['age'],
  'tour_cost'   => $_POST['gia_tour'],
  'tax'         => $_POST['thue'],
  'money'       => $_POST['thanhtien'],
  'deleted'     => $_POST['deleted'],
);

// save contract_values

$contracts_values_line_count = count($contracts_values['id']); 
$giatrihopdong= "";
for($i = 0; $i<$contracts_values_line_count; $i++){
    $contracts_value = new ContractValue()  ;
    if(($contracts_values['money'][$i] != '' || $contracts_values['money'][$i] != 0) && $contracts_values['deleted'][$i] != 1){
        $contracts_value ->id = $contracts_values['id'][$i]; 
        $contracts_value ->contract_value_id = $return_id;  
        $contracts_value ->age = $contracts_values['age'][$i];
        $contracts_value ->num_of_cus = $contracts_values['num_of_cus'][$i];
        $contracts_value ->tour_cost = $contracts_values['tour_cost'][$i];
        $contracts_value ->tax = $contracts_values['tax'][$i];
        $contracts_value ->money = $contracts_values['money'][$i];
        $contracts_value ->deleted = $contracts_values['deleted'][$i];
        $contracts_value->save();
    }elseif($contracts_values['deleted'][$i] == 1){
        $contracts_value ->mark_deleted($contracts_values['id'][$i]);
    }
    
    
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
  
  for($i = 0; $i<$contract_condition_line_count; $i++){
        $contract_conditions = new ContractCondition();
        if(($contract_condition['money'][$i] != '' || $contract_condition['money'][$i] != 0) && $contract_condition['deleted'][$i] != 1){
            $contract_conditions->id =  $contract_condition['id'][$i];
            $contract_conditions->contract_condition_id =  $return_id;
            $contract_conditions->contract_phase =  $contract_condition['dotthanhtoan'][$i];
            $contract_conditions->event =  $contract_condition['event'][$i];
            $contract_conditions->percent =  $contract_condition['percent'][$i];
            $contract_conditions->money =  $contract_condition['money'][$i];
            $contract_conditions->currency =  $contract_condition['currency'][$i];
            $contract_conditions->in_word =  $contract_condition['in_word'][$i];
            $contract_conditions->deleted =  $contract_condition['deleted'][$i];
            $contract_conditions->save();
        }elseif($contract_condition['deleted'][$i] == 1){
            $contract_conditions ->mark_deleted($contract_condition['id'][$i]);
        }
    
  }
  
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
  
  for($i=0; $i<$transport_contract_count; $i++){
      $transportcontract = new TransportContracts();
      if($transport_contract['deleted'][$i] != 1){
          $transportcontract->id = $transport_contract['id'][$i];
          $transportcontract->loaixe = $transport_contract['loaixe'][$i];
          $transportcontract->soxe = $transport_contract['soxe'][$i];
          $transportcontract->lotrinh = $transport_contract['lotrinh'][$i];
          $transportcontract->thoigiansudung = $transport_contract['thoigiansudung'][$i];
          $transportcontract->dongia = $transport_contract['dongia'][$i];
          $transportcontract->contract_id = $return_id;
          $transportcontract->deleted = $transport_contract['deleted'][$i];
          $transportcontract->save();
      }else{
          $transportcontract->mark_deleted($transport_contract['id'][$i]);
      }
  }




handleRedirect($return_id,'Contracts');     
?>
