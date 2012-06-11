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
  'airlinesticketslists_airlinestickets' => 
  array (
    'id' => 'd1334b42-df39-9208-7ff3-4f601aaaa487',
    'relationship_name' => 'airlinesticketslists_airlinestickets',
    'lhs_module' => 'AirlinesTicketsLists',
    'lhs_table' => 'AirlinesTicketsLists',
    'lhs_key' => 'id',
    'rhs_module' => 'AirlinesTickets',
    'rhs_table' => 'AirlinesTickets',
    'rhs_key' => 'id',
    'join_table' => 'airlinesticlinestickets_c',
    'join_key_lhs' => 'airlinesti7e28tslists_ida',
    'join_key_rhs' => 'airlinestibcd8tickets_idb',
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
  'airlinestickets_accounts' => 
  array (
    'id' => 'd206cf50-67a9-ff76-4214-4f601a238a69',
    'relationship_name' => 'airlinestickets_accounts',
    'lhs_module' => 'AirlinesTickets',
    'lhs_table' => 'AirlinesTickets',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'join_table' => 'airlinesticets_accounts_c',
    'join_key_lhs' => 'airlinestiec2atickets_ida',
    'join_key_rhs' => 'airlinesti3969ccounts_idb',
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
  'airlinestickets_fits' => 
  array (
    'id' => 'd309b488-e96f-02ab-e22c-4f601ab00a3f',
    'relationship_name' => 'airlinestickets_fits',
    'lhs_module' => 'AirlinesTickets',
    'lhs_table' => 'AirlinesTickets',
    'lhs_key' => 'id',
    'rhs_module' => 'FITs',
    'rhs_table' => 'fits',
    'rhs_key' => 'id',
    'join_table' => 'airlinestickets_fits_c',
    'join_key_lhs' => 'airlinestia31ctickets_ida',
    'join_key_rhs' => 'airlinestib0dfitsfits_idb',
    'relationship_type' => 'one-to-many',
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
  'airlines_airlinestickets' => 
  array (
    'id' => 'd914f22b-57d0-3178-c0a5-4f601abcde92',
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
  'c_approval_airlinestickets' => 
  array (
    'id' => 'e19d7bda-50b4-1141-5914-4f601a3a1ab1',
    'relationship_name' => 'c_approval_airlinestickets',
    'lhs_module' => 'AirlinesTickets',
    'lhs_table' => 'AirlinesTickets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Approval',
    'rhs_table' => 'c_approval',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'AirlinesTickets',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => false,
  ),
  'groupprograms_airlinestickets' => 
  array (
    'id' => 'c841072b-9733-1b5d-cc83-4f601a6d5048',
    'relationship_name' => 'groupprograms_airlinestickets',
    'lhs_module' => 'GroupPrograms',
    'lhs_table' => 'groupprograms',
    'lhs_key' => 'id',
    'rhs_module' => 'AirlinesTickets',
    'rhs_table' => 'AirlinesTickets',
    'rhs_key' => 'id',
    'join_table' => 'groupprogralinestickets_c',
    'join_key_lhs' => 'groupprogr0fd9rograms_ida',
    'join_key_rhs' => 'groupprogr8400tickets_idb',
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
);
?>
