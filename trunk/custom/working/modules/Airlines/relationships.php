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
  'airlines_activities_calls' => 
  array (
    'id' => '199ed0d0-c5be-695a-b778-4eca1d12e90d',
    'relationship_name' => 'airlines_activities_calls',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Airlines',
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
  'airlines_activities_meetings' => 
  array (
    'id' => '1b74e798-7e3a-5ba6-583c-4eca1d265602',
    'relationship_name' => 'airlines_activities_meetings',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Airlines',
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
  'airlines_activities_notes' => 
  array (
    'id' => '1ca847b8-8cfb-d593-dcba-4eca1de7e7da',
    'relationship_name' => 'airlines_activities_notes',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Airlines',
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
  'airlines_activities_tasks' => 
  array (
    'id' => '1d67b972-fde5-baae-735b-4eca1d997c00',
    'relationship_name' => 'airlines_activities_tasks',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Airlines',
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
  'airlines_airlinestickets' => 
  array (
    'id' => '1e8799ff-e2f3-cb55-9205-4eca1dc75af5',
    'relationship_name' => 'airlines_airlinestickets',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'AirlinesTickets',
    'rhs_table' => 'AirlinesTickets',
    'rhs_key' => 'id',
    'join_table' => 'airlines_ailinestickets_c',
    'join_key_lhs' => 'airlines_a476cirlines_ida',
    'join_key_rhs' => 'airlines_a1d09tickets_idb',
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
  'airlines_billing' => 
  array (
    'id' => '1f5523f2-8867-9dc2-b997-4eca1d382cd1',
    'relationship_name' => 'airlines_billing',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'Billing',
    'rhs_table' => 'billing',
    'rhs_key' => 'id',
    'join_table' => 'airlines_billing_c',
    'join_key_lhs' => 'airlines_be4f5irlines_ida',
    'join_key_rhs' => 'airlines_bb713billing_idb',
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
  'airlines_contacts' => 
  array (
    'id' => '2056c056-27f4-ea5e-2de1-4eca1d6ce576',
    'relationship_name' => 'airlines_contacts',
    'lhs_module' => 'Airlines',
    'lhs_table' => 'airlines',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'join_table' => 'airlines_contacts_c',
    'join_key_lhs' => 'airlines_c7d68irlines_ida',
    'join_key_rhs' => 'airlines_c6901ontacts_idb',
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
  'tours_airlines' => 
  array (
    'id' => '7c21214e-b8cd-b21a-f2f6-4eca1d570e66',
    'relationship_name' => 'tours_airlines',
    'lhs_module' => 'Tours',
    'lhs_table' => 'tours',
    'lhs_key' => 'id',
    'rhs_module' => 'Airlines',
    'rhs_table' => 'airlines',
    'rhs_key' => 'id',
    'join_table' => 'tours_airlines_c',
    'join_key_lhs' => 'tours_airl69b4estours_ida',
    'join_key_rhs' => 'tours_airl6d54irlines_idb',
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
  'airlines_commentairlines' => 
  array (
    'rhs_label' => 'Airline Comments',
    'lhs_label' => 'Airlines',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'Airlines',
    'rhs_module' => 'CommentAirlines',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'airlines_commentairlines',
  ),
);
?>
