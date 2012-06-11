<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************gf

 * Description:  Executes a step in the installation process.
 ********************************************************************************/
$moduleList[] = 'FITs';
$moduleList[] = 'Hotels';
$moduleList[] = 'Restaurants';
$moduleList[] = 'Contracts';
$moduleList[] = 'Tours';
$moduleList[] = 'GroupPrograms';
$moduleList[] = 'Destinations';
$moduleList[] = 'TravelGuides';
$moduleList[] = 'Transports';
$moduleList[] = 'TransportBookings'; 
$moduleList[] = 'Airlines';
$moduleList[] = 'Orders';
$moduleList[] = 'Oders';//added 31-05-2012
$moduleList[] = 'Countries';
$moduleList[] = 'Cars';
$moduleList[] = 'Locations';
$moduleList[] = 'PassportList';
$moduleList[] = 'Passports';
$moduleList[] = 'Comments'; 
$moduleList[] = 'CommentAirlines';
$moduleList[] = 'AirlinesTickets';
$moduleList[] = 'AirlinesTicketsLists';
$moduleList[] = 'Insurances';
$moduleList[] = 'GroupLists';
$moduleList[] = 'Worksheets';
$moduleList[] = 'TicketExchangeOrders';
$moduleList[] = 'TicketOrder';
$moduleList[] = 'Billing';
$moduleList[] = 'RoomBookings';
$moduleList[] = 'ServiceBookings';
$moduleList[] = 'GuideContracts';
$moduleList[] = 'Quotes';
$moduleList[] = 'FoodMenu';
$moduleList[] = 'ContractAppendixs';
$moduleList[] = 'ContractLiquidate';
$moduleList[] = 'AOS_PDF_Templates'; 
$moduleList[] = 'RestaurantBookings'; 
$moduleList[] = 'CostGuides'; 
$moduleList[] = 'C_Reports'; 
$moduleList[] = 'RoomLists'; 
//added 31-05-2012
$moduleList[] = 'AppendixContract'; 
 
                     

// new module
$beanList['Restaurants']       = 'Restaurants';
$beanList['Hotels']     = 'Hotels';
$beanList['FITs']     = 'FITs';
$beanList['Contracts']     = 'Contract';
$beanList['Tours']     = 'Tour';
$beanList['GroupPrograms']     = 'GroupProgram';
$beanList['Destinations']     = 'Destination';
$beanList['TravelGuides']     = 'TravelGuide';
$beanList['Transports']     = 'Transport';
$beanList['TransportBookings']     = 'TransportBookings';
$beanList['TransportBookingsLine']     = 'TransportBookingsLine';
$beanList['Airlines']     = 'Airline';
$beanList['TourPrograms']     = 'TourProgram';
$beanList['ContractCondition']     = 'ContractCondition';
$beanList['ContractValue']     = 'ContractValue';
$beanList['ContractAppendixValues']     = 'ContractAppendixValues'; 
$beanList['GroupsProgramsLine']     = 'GroupsProgramsLine';
$beanList['Orders']     = 'Order';
$beanList['Oders']     = 'Oder';//added 31-05-2012
$beanList['Countries']     = 'Country';
$beanList['Cars']     = 'Car';
$beanList['Locations']     = 'Location';
$beanList['SightSeeingCars']     = 'SightSeeingCars';
$beanList['PickUpCars']     = 'PickUpCars';
$beanList['TeamLeader']     = 'TeamLeader';
$beanList['Guide']     = 'Guide';  
$beanList['RoomBookingsSevice']     = 'RoomBookingsSevice'; 
$beanList['PassportList']     = 'PassportList';
$beanList['Passports']     = 'Passports';
$beanList['Comments']     = 'Comments'; 
$beanList['CommentAirlines']     = 'CommentAirlines'; 
$beanList['AirlinesTickets']     = 'AirlinesTickets';
$beanList['Worksheets']     = 'Worksheets';
$beanList['Insurances']     = 'Insurances';
$beanList['GroupLists']     = 'GroupLists';
$beanList['Billing']     = 'Billing';
$beanList['RoomBookings']     = 'RoomBookings';
$beanList['ServiceBookings']     = 'ServiceBookings';
$beanList['RoomBookingsLine']     = 'RoomBookingsLine';
$beanList['ServiceBookingsLine']     = 'ServiceBookingsLine';

$beanList['GuideContracts']     = 'GuideContracts';
$beanList['AirlinesTicketsLists']     = 'AirlinesTicketsLists'; 
$beanList['TransportBookings']     = 'TransportBookings';
$beanList['TicketExchangeOrders']  = 'TicketExchangeOrders';
$beanList['TicketOrder']  = 'TicketOrder';  
$beanList['Quotes']     = 'Quotes'; 
$beanList['FoodMenu']     = 'FoodMenu'; 
$beanList['ContractAppendixs']     = 'ContractAppendixs';
$beanList['ContractLiquidate']     = 'ContractLiquidate';
$beanList['ContractLiquidateValues']     = 'ContractLiquidateValues'; 
$beanList['ContractLiquidateIncre']     = 'ContractLiquidateIncre'; 
$beanList['ContractLiquidateDecre']     = 'ContractLiquidateDecre';  
$beanList['AOS_PDF_Templates'] = 'AOS_PDF_Templates';
$beanList['TransportContracts'] = 'TransportContracts';
$beanList['PassportLists']  = 'PassportList';  
$beanList['RestaurantBookings']  = 'RestaurantBookings';  
$beanList['RestaurantBookingsLine']     = 'RestaurantBookingsLine';  
$beanList['CostGuides']     = 'CostGuides';  
$beanList['C_Reports']     = 'C_Reports';  
$beanList['RoomLists']     = 'RoomLists'; 

 //added 31-05-2012  
$beanList['AppendixContract']     = 'AppendixContract';  

// new beanfile

$beanFiles['Restaurants'] = 'modules/Restaurants/Restaurants.php';
$beanFiles['Hotels'] = 'modules/Hotels/Hotels.php';
$beanFiles['FITs']  = 'modules/FITs/FITs.php';
$beanFiles['Contract']  = 'modules/Contracts/Contract.php';
$beanFiles['Tour']  = 'modules/Tours/Tour.php';
$beanFiles['GroupProgram']  = 'modules/GroupPrograms/GroupProgram.php';
$beanFiles['Destination']  = 'modules/Destinations/Destination.php';
$beanFiles['TravelGuide']  = 'modules/TravelGuides/TravelGuide.php';
$beanFiles['Transport']  = 'modules/Transports/Transport.php';
$beanFiles['TransportBookings']  = 'modules/TransportBookings/TransportBookings.php';
$beanFiles['TransportBookingsLine']  = 'modules/TransportBookingsLine/TransportBookingsLine.php';
$beanFiles['Airline']  = 'modules/Airlines/Airline.php';
$beanFiles['AirlinesTickets']  = 'modules/AirlinesTickets/AirlinesTickets.php';
$beanFiles['AirlinesTicketsLists']  = 'modules/AirlinesTicketsLists/AirlinesTicketsLists.php';
$beanFiles['TicketExchangeOrders']  = 'modules/TicketExchangeOrders/TicketExchangeOrders.php'; 
$beanFiles['TicketOrder']  = 'modules/TicketOrder/TicketOrder.php'; 
$beanFiles['TourProgram']  = 'modules/TourPrograms/TourProgram.php';
$beanFiles['ContractCondition']  = 'modules/ContractConditions/ContractCondition.php';
$beanFiles['ContractValue']  = 'modules/ContractValues/ContractValue.php';
$beanFiles['ContractAppendixValues']  = 'modules/ContractAppendixValues/ContractAppendixValues.php'; 
$beanFiles['GroupsProgramsLine']  = 'modules/GroupsProgramsLine/GroupsProgramsLine.php';
$beanFiles['Order']  = 'modules/Orders/Order.php';
$beanFiles['Oder']  = 'modules/Oders/Oder.php';//added 31-05-2012
$beanFiles['Country']  = 'modules/Countries/Country.php';
$beanFiles['Car']  = 'modules/Cars/Car.php';
$beanFiles['Location']  = 'modules/Locations/Location.php';
$beanFiles['PickUpCars']  = 'modules/PickUpCars/PickUpCars.php';
$beanFiles['TeamLeader']  = 'modules/TeamLeader/TeamLeader.php';
$beanFiles['Guide']  = 'modules/Guide/Guide.php';
$beanFiles['RoomBookingsSevice']  = 'modules/RoomBookingsSevice/RoomBookingsSevice.php';
$beanFiles['SightSeeingCars']  = 'modules/SightSeeingCars/SightSeeingCars.php';
$beanFiles['PassportList']  = 'modules/PassportList/PassportList.php';
$beanFiles['Passports']  = 'modules/Passports/Passports.php';
$beanFiles['Comments']  = 'modules/Comments/Comments.php';
$beanFiles['CommentAirlines']  = 'modules/CommentAirlines/CommentAirlines.php'; 
$beanFiles['Insurances']  = 'modules/Insurances/Insurances.php';
$beanFiles['GroupLists']  = 'modules/GroupLists/GroupLists.php';
$beanFiles['Worksheets']  = 'modules/Worksheets/Worksheets.php';
$beanFiles['Billing']  = 'modules/Billing/Billing.php';
$beanFiles['RoomBookings']  = 'modules/RoomBookings/RoomBookings.php';
$beanFiles['ServiceBookings']  = 'modules/ServiceBookings/ServiceBookings.php';
$beanFiles['RestaurantBookings']  = 'modules/RestaurantBookings/RestaurantBookings.php';
$beanFiles['RoomBookingsLine']  = 'modules/RoomBookingsLine/RoomBookingsLine.php';
$beanFiles['ServiceBookingsLine']  = 'modules/ServiceBookingsLine/ServiceBookingsLine.php';
$beanFiles['RestaurantBookingsLine']  = 'modules/RestaurantBookingsLine/RestaurantBookingsLine.php';
$beanFiles['GuideContracts']  = 'modules/GuideContracts/GuideContracts.php';
$beanFiles['TransportBookings']  = 'modules/TransportBookings/TransportBookings.php';
$beanFiles['Quotes']  = 'modules/Quotes/Quotes.php';
$beanFiles['FoodMenu']  = 'modules/FoodMenu/FoodMenu.php';
$beanFiles['ContractAppendixs']  = 'modules/ContractAppendixs/ContractAppendixs.php';
$beanFiles['ContractLiquidate']  = 'modules/ContractLiquidate/ContractLiquidate.php';
$beanFiles['ContractLiquidateValues']  = 'modules/ContractLiquidateValues/ContractLiquidateValues.php';
$beanFiles['ContractLiquidateIncre']  = 'modules/ContractLiquidateIncre/ContractLiquidateIncre.php';
$beanFiles['ContractLiquidateDecre']  = 'modules/ContractLiquidateDecre/ContractLiquidateDecre.php';
$beanFiles['AOS_PDF_Templates'] = 'modules/AOS_PDF_Templates/AOS_PDF_Templates.php';  
$beanFiles['TransportContracts'] = 'modules/TransportContracts/TransportContracts.php';  
$beanFiles['CostGuides'] = 'modules/CostGuides/CostGuides.php';  
$beanFiles['C_Reports'] = 'modules/C_Reports/C_Reports.php';  
$beanFiles['RoomLists'] = 'modules/RoomLists/RoomLists.php';

//added 31-05-2012  
$beanFiles['AppendixContract'] = 'modules/AppendixContract/AppendixContract.php';  




    
$modInvisList[] = 'TourPrograms';
$modInvisList[] = 'ContractConditions';
$modInvisList[] = 'ContractAppendixValues';
$modInvisList[] = 'ContractValues';
$modInvisList[] = 'GroupsProgramsLine';
$modInvisList[] = 'SightSeeingCars';
$modInvisList[] = 'PickUpCars';
$modInvisList[] = 'Guide';
$modInvisList[] = 'TeamLeader';
$modInvisList[] = 'RoomBookingsLine';
$modInvisList[] = 'ServiceBookingsLine';

$modInvisList[] = 'TransportBookingsLine';
$modInvisList[] = 'TransportContracts';
$modInvisList[] = 'ContractLiquidateValues';
$modInvisList[] = 'ContractLiquidateIncre';
$modInvisList[] = 'ContractLiquidateDecre';
$modInvisList[] = 'RestaurantBookingsLine';
$modInvisList[] = 'AppendixContract';

?>
