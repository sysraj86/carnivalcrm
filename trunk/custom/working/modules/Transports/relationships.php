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
  'countries_transports' => 
  array (
    'id' => '9e46ee17-d282-7e66-7295-50a6162f0409',
    'relationship_name' => 'countries_transports',
    'lhs_module' => 'Countries',
    'lhs_table' => 'countries',
    'lhs_key' => 'id',
    'rhs_module' => 'Transports',
    'rhs_table' => 'transports',
    'rhs_key' => 'id',
    'join_table' => 'countries_transports_c',
    'join_key_lhs' => 'countries_f24buntries_ida',
    'join_key_rhs' => 'countries_0579nsports_idb',
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
  'destinations_transports' => 
  array (
    'id' => '54c20ae1-f78a-9b44-2923-50a616f5efdb',
    'relationship_name' => 'destinations_transports',
    'lhs_module' => 'Destinations',
    'lhs_table' => 'destinations',
    'lhs_key' => 'id',
    'rhs_module' => 'Transports',
    'rhs_table' => 'transports',
    'rhs_key' => 'id',
    'join_table' => 'destinations_transports_c',
    'join_key_lhs' => 'destinatio458bnations_ida',
    'join_key_rhs' => 'destinatio9d10nsports_idb',
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
  'transports_activities_calls' => 
  array (
    'id' => 'b03ad530-999b-1ef8-65e4-50a6165a049c',
    'relationship_name' => 'transports_activities_calls',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Transports',
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
  'transports_activities_meetings' => 
  array (
    'id' => 'bde814e4-4dd7-abe4-13ba-50a6168c7f0a',
    'relationship_name' => 'transports_activities_meetings',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Transports',
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
  'transports_activities_notes' => 
  array (
    'id' => 'c52f1510-0e62-5c20-5677-50a6164dff03',
    'relationship_name' => 'transports_activities_notes',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Transports',
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
  'transports_activities_tasks' => 
  array (
    'id' => 'cd8f0f9a-8300-1412-7cd6-50a6161787de',
    'relationship_name' => 'transports_activities_tasks',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Transports',
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
  'transports_billing' => 
  array (
    'id' => 'd48a38da-8578-feec-4ea7-50a616dbf322',
    'relationship_name' => 'transports_billing',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'Billing',
    'rhs_table' => 'billing',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Transports',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'transports_contacts' => 
  array (
    'id' => 'db4fe09f-5640-91b4-1f5e-50a616325612',
    'relationship_name' => 'transports_contacts',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Transports',
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
  'transports_transportbookings' => 
  array (
    'id' => 'e56f3655-4b39-7f63-ce99-50a61692c9a6',
    'relationship_name' => 'transports_transportbookings',
    'lhs_module' => 'Transports',
    'lhs_table' => 'transports',
    'lhs_key' => 'id',
    'rhs_module' => 'TransportBookings',
    'rhs_table' => 'transportbookings',
    'rhs_key' => 'id',
    'join_table' => 'transports_portbookings_c',
    'join_key_lhs' => 'transports6e65nsports_ida',
    'join_key_rhs' => 'transportsc2aeookings_idb',
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
  'transports_cars' => 
  array (
    'rhs_label' => 'Cars',
    'lhs_label' => 'Transports',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'Transports',
    'rhs_module' => 'Cars',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'transports_cars',
  ),
);
?>
