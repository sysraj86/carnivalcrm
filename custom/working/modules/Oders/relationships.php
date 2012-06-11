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
  'quotes_oders' => 
  array (
    'id' => '4ed959e5-f91e-35ee-2a94-4ea699a45ee6',
    'relationship_name' => 'quotes_oders',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Oders',
    'rhs_table' => 'oders',
    'rhs_key' => 'id',
    'join_table' => 'quotes_oders_c',
    'join_key_lhs' => 'quotes_oded7c9squotes_ida',
    'join_key_rhs' => 'quotes_odec393rsoders_idb',
    'relationship_type' => 'one-to-one',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'tours_oders' => 
  array (
    'id' => '6f8f7066-1730-47b9-9820-4ea699cce824',
    'relationship_name' => 'tours_oders',
    'lhs_module' => 'Tours',
    'lhs_table' => 'tours',
    'lhs_key' => 'id',
    'rhs_module' => 'Oders',
    'rhs_table' => 'oders',
    'rhs_key' => 'id',
    'join_table' => 'tours_oders_c',
    'join_key_lhs' => 'tours_odere23crstours_ida',
    'join_key_rhs' => 'tours_oder61c7rsoders_idb',
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
  'oders_activities_calls' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Oders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Oders',
    'rhs_module' => 'Calls',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'oders_activities_calls',
  ),
  'oders_activities_meetings' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Oders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Oders',
    'rhs_module' => 'Meetings',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'oders_activities_meetings',
  ),
  'oders_activities_notes' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Oders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Oders',
    'rhs_module' => 'Notes',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'oders_activities_notes',
  ),
  'oders_activities_tasks' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Oders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Oders',
    'rhs_module' => 'Tasks',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'oders_activities_tasks',
  ),
  'oders_activities_emails' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Oders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Oders',
    'rhs_module' => 'Emails',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'oders_activities_emails',
  ),
);
?>
