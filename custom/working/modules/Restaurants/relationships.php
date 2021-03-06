<?php
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

$relationships = array (
  'restaurant_contracts' => 
  array (
    'id' => '7adbd9fa-41fb-6299-7f1b-500e4ec48e46',
    'relationship_name' => 'restaurant_contracts',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'countries_restaurants' => 
  array (
    'id' => '8fb6590b-2495-d35b-d352-500e4eb5771d',
    'relationship_name' => 'countries_restaurants',
    'lhs_module' => 'Countries',
    'lhs_table' => 'countries',
    'lhs_key' => 'id',
    'rhs_module' => 'Restaurants',
    'rhs_table' => 'restaurants',
    'rhs_key' => 'id',
    'join_table' => 'countries_restaurants_c',
    'join_key_lhs' => 'countries_8307untries_ida',
    'join_key_rhs' => 'countries_024aaurants_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'destinations_restaurants' => 
  array (
    'id' => 'e2a5f2c6-8189-a065-3711-500e4ea32300',
    'relationship_name' => 'destinations_restaurants',
    'lhs_module' => 'Destinations',
    'lhs_table' => 'destinations',
    'lhs_key' => 'id',
    'rhs_module' => 'Restaurants',
    'rhs_table' => 'restaurants',
    'rhs_key' => 'id',
    'join_table' => 'destination_restaurants_c',
    'join_key_lhs' => 'destinatio9a61nations_ida',
    'join_key_rhs' => 'destinatio712aaurants_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'restaurants_activities_calls' => 
  array (
    'id' => 'f5600b28-360a-c936-04e7-500e4ec934d8',
    'relationship_name' => 'restaurants_activities_calls',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'restaurants_activities_meetings' => 
  array (
    'id' => '1bdad929-fde4-6bd2-0a57-500e4ec2cb22',
    'relationship_name' => 'restaurants_activities_meetings',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'restaurants_activities_notes' => 
  array (
    'id' => '21df5534-2628-9534-039c-500e4e45b298',
    'relationship_name' => 'restaurants_activities_notes',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'restaurants_activities_tasks' => 
  array (
    'id' => '2808b364-b7fc-ef28-8809-500e4e7e0db0',
    'relationship_name' => 'restaurants_activities_tasks',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'restaurants_billing' => 
  array (
    'id' => '2e17d272-1171-b80e-ac32-500e4e16c4e9',
    'relationship_name' => 'restaurants_billing',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Billing',
    'rhs_table' => 'billing',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'restaurants_contacts' => 
  array (
    'id' => '3408063d-25b3-f780-d070-500e4e243c2e',
    'relationship_name' => 'restaurants_contacts',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Restaurants',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'restaurants_foodmenu' => 
  array (
    'id' => '44549d77-d665-5f2f-2924-500e4e99b596',
    'relationship_name' => 'restaurants_foodmenu',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'FoodMenu',
    'rhs_table' => 'foodmenu',
    'rhs_key' => 'id',
    'join_table' => 'restaurants_foodmenu_c',
    'join_key_lhs' => 'restaurant3385aurants_ida',
    'join_key_rhs' => 'restauranta31eoodmenu_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'restaurants_groupprograms' => 
  array (
    'id' => '4bde87ac-129b-7fb2-df0c-500e4e9a811c',
    'relationship_name' => 'restaurants_groupprograms',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'GroupPrograms',
    'rhs_table' => 'groupprograms',
    'rhs_key' => 'id',
    'join_table' => 'restaurantsroupprograms_c',
    'join_key_lhs' => 'restaurant7162aurants_ida',
    'join_key_rhs' => 'restaurantccbbrograms_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'restaurants_servicebookings' => 
  array (
    'id' => '52d9a990-b80b-2945-4af3-500e4e9f1b7b',
    'relationship_name' => 'restaurants_servicebookings',
    'lhs_module' => 'Restaurants',
    'lhs_table' => 'restaurants',
    'lhs_key' => 'id',
    'rhs_module' => 'ServiceBookings',
    'rhs_table' => 'servicebookings',
    'rhs_key' => 'id',
    'join_table' => 'restaurantsvicebookings_c',
    'join_key_lhs' => 'restaurant96e9aurants_ida',
    'join_key_rhs' => 'restaurant71f9ookings_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'tours_restaurants' => 
  array (
    'id' => 'b3455913-5476-fd7b-d13b-500e4e05e3e6',
    'relationship_name' => 'tours_restaurants',
    'lhs_module' => 'Tours',
    'lhs_table' => 'tours',
    'lhs_key' => 'id',
    'rhs_module' => 'Restaurants',
    'rhs_table' => 'restaurants',
    'rhs_key' => 'id',
    'join_table' => 'tours_restaurants_c',
    'join_key_lhs' => 'tours_rest8203tstours_ida',
    'join_key_rhs' => 'tours_rest15fcaurants_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'restaurants_restaurantbookings' => 
  array (
    'rhs_label' => 'Restaurant Bookings',
    'lhs_label' => 'Restaurants',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'Restaurants',
    'rhs_module' => 'RestaurantBookings',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'restaurants_restaurantbookings',
  ),
);
?>
