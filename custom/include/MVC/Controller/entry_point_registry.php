<?php
$entry_point_registry['generateDoc'] = array('file' => 'modules/AOS_PDF_Templates/generateDoc_Contract.php' , 'auth' => '1'); 
$entry_point_registry['generateDoc2'] = array('file' => 'modules/AOS_PDF_Templates/generateDoc_ContractAppendixs.php' , 'auth' => '1'); 
$entry_point_registry['generateDoc3'] = array('file' => 'modules/AOS_PDF_Templates/generateDoc_ContractLiquidate.php' , 'auth' => '1'); 


 // autocomplete
 $entry_point_registry['autocomplete'] = array('file' => 'autocomplete.php', 'auth' => true);
    // check duplicate   
 $entry_point_registry['AjaxCheckDuplicate']  = array('file' => 'AjaxCheckDuplicate.php', 'auth' => true);
 $entry_point_registry['AjaxCheckDuplicateAccount']  = array('file' => 'custom/modules/Accounts/AjaxCheckDuplicateAccount.php', 'auth' => true);
 $entry_point_registry['AjaxCheckDuplicateCustomer']  = array('file' => 'custom/modules/FITs/AjaxCheckDuplicateCustomer.php', 'auth' => true);
    // report
 $entry_point_registry['ReportCustomer']  = array('file' => 'ReportCustomer.php', 'auth' => true);
 $entry_point_registry['ParentType']    =  array('file'=>'modules/Contracts/ParentType.php','auth'=>true);
 $entry_point_registry['DosAjaxGetDatabase']    =  array('file'=>'modules/Worksheets/DosAjaxGetDatabase.php','auth'=>true);
 $entry_point_registry['InboundAjaxDatabase']    =  array('file'=>'modules/Worksheets/InboundAjaxDatabase.php','auth'=>true);
 $entry_point_registry['HotelsByDestination']    =  array('file'=>'modules/Worksheets/AjaxHotel.php','auth'=>true);
 $entry_point_registry['GetLocationByDestinations'] =  array('file'=>'modules/Tours/AjaxDestination.php','auth'=>true);
 $entry_point_registry['TourAjax'] =  array('file'=>'modules/Tours/Ajax.php','auth'=>true);
 $entry_point_registry['GetServicesByWorksheet'] = array('file'=>'modules\GroupPrograms\AjaxServices.php','auth'=>true);
 $entry_point_registry['GetCostGuide']    =  array('file'=>'modules/Worksheets/GetCostGuide.php','auth'=>true);
 $entry_point_registry['GetHotelAndCustomer']    =  array('file'=>'modules/Roomlists/GetDatabase.php','auth'=>true);
 $entry_point_registry['ordergetlistcus']    =  array('file'=>'modules/Orders/AjaxGetListCus.php','auth'=>true);
 
 $entry_point_registry['GetInfoOfService']    =  array('file'=>'modules/GroupPrograms/LoadAjaxInfoServices.php','auth'=>true);
?>