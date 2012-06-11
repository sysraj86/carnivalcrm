<?php

require_once('modules/SecurityGroups/SecurityGroup_sugar.php');
class SecurityGroup extends SecurityGroup_sugar {
	
    
	function SecurityGroup(){	
		parent::SecurityGroup_sugar();
	}

	var $last_run = array('module' => '', 'record' => '', 'action' => '', 'response' => '');

	
	/**
	 * Gets the join statement used for returning all rows in a list view that a user has group rights to.
	 * Make sure any use of this also return records that the user has owner access to. 
	 * (e.g. caller uses getOwnerWhere as well)
	 *
	 * @param GUID $user_id
	 * @return STRING
	 */
	function getGroupWhere($table_name,$module,$user_id)
	{
			
		//need a different query if doing a securitygroups check
		if($module == "SecurityGroups") {
			return " $table_name.id in (
				select secg.id from securitygroups secg
				inner join securitygroups_users secu on secg.id = secu.securitygroup_id and secu.deleted = 0 
					and secu.user_id = '$user_id'
				where secg.deleted = 0  
			)";

		} else {		
			return " $table_name.id in (
				select secr.record_id from securitygroups secg
				inner join securitygroups_users secu on secg.id = secu.securitygroup_id and secu.deleted = 0 
					and secu.user_id = '$user_id'
				inner join securitygroups_records secr on secg.id = secr.securitygroup_id and secr.deleted = 0 
					and secr.module = '$module' 
				where secg.deleted = 0  
			)";

			//and secr.record_id = $table_name.id //not needed as the in clause takes care of this check
		}
	}

	/**
	 * Gets the join statement used for returning all users that a given user is in the same group with.
	 *
	 * @param GUID $user_id
	 * @return STRING
	 */
	function getGroupUsersWhere($user_id)
	{
			
		return " users.id in (
			select sec.user_id from securitygroups_users sec
			inner join securitygroups_users secu on sec.securitygroup_id = secu.securitygroup_id and secu.deleted = 0 
				and secu.user_id = '$user_id'
			where sec.deleted = 0   
		)";

	}

	/**
	 * Gets the join statement used for returning all rows in a list view that a user has group rights to.
	 * Make sure any use of this also return records that the user has owner access to. 
	 * (e.g. caller uses getOwnerWhere as well)
	 *
	 * NOTE: Make sure to add the check in the where clause for ($table_name.assigned_user_id or securitygroup_join.record_id is not null)
	 *
	 * @param STRING $table_name
	 * @param STRING $module
	 * @param GUID $user_id
	 * @return STRING
	 */
	function getGroupJoin($table_name,$module,$user_id)
	{
			
		//need a different query if doing a securitygroups check
		if($module == "SecurityGroups") {
			return " LEFT JOIN (select distinct secg.id from securitygroups secg
	inner join securitygroups_users secu on secg.id = secu.securitygroup_id and secu.deleted = 0
			and secu.user_id = '".$user_id."'
	where secg.deleted = 0 
) securitygroup_join on securitygroup_join.id = ".$table_name.".id ";

		} else {		
			return " LEFT JOIN (select distinct secr.record_id as id from securitygroups secg
	inner join securitygroups_users secu on secg.id = secu.securitygroup_id and secu.deleted = 0
			and secu.user_id = '".$user_id."'
	inner join securitygroups_records secr on secg.id = secr.securitygroup_id and secr.deleted = 0
			 and secr.module = '".$module."'
	where secg.deleted = 0 
) securitygroup_join on securitygroup_join.id = ".$table_name.".id ";
		}
	}

	/**
	 * Gets the join statement used for returning all users that a given user is in the same group with.
	 *
	 * @param GUID $user_id
	 * @return STRING
	 */
	function getGroupUsersJoin($user_id)
	{	
		return " LEFT JOIN (
			select distinct sec.user_id as id from securitygroups_users sec
			inner join securitygroups_users secu on sec.securitygroup_id = secu.securitygroup_id and secu.deleted = 0 
				and secu.user_id = '$user_id'
			where sec.deleted = 0   
		) securitygroup_join on securitygroup_join.id = users.id ";

	}
	
	/**
	 * @returns true if group is assigned to the record
	 */
	function groupHasAccess($module,$id, $action = '')
	{
		if(!isset($id) || $id == '[SELECT_ID_LIST]')
		{
			return true; //means that this is a listview and everybody is an owner of the listview
		}

		global $db;
		global $current_user;
		global $sugar_config;
		$query = "select count(securitygroups.id) as results from securitygroups "
				."inner join securitygroups_users on securitygroups.id = securitygroups_users.securitygroup_id and securitygroups_users.deleted = 0 "
				."  and securitygroups_users.user_id = '$current_user->id' "
				."inner join securitygroups_records on securitygroups.id = securitygroups_records.securitygroup_id and securitygroups_records.deleted = 0 "
				."	and securitygroups_records.record_id = '$id' "
				."	and securitygroups_records.module = '$module' ";
		if(!empty($action) && isset($sugar_config['securitysuite_strict_rights']) && $sugar_config['securitysuite_strict_rights'] == true) {
			$query .= " inner join securitygroups_acl_roles on securitygroups.id = securitygroups_acl_roles.securitygroup_id and securitygroups_acl_roles.deleted = 0"
			." inner join acl_roles_actions on securitygroups_acl_roles.role_id = acl_roles_actions.role_id and acl_roles_actions.deleted = 0 "
			." inner join acl_actions on acl_actions.id = acl_roles_actions.action_id and acl_actions.deleted = 0 "
			." and acl_actions.category = '$module' "
			." and acl_actions.name = '$action'	";
		}
		$query .= "where securitygroups.deleted = 0 ";

		if(!empty($action) && isset($sugar_config['securitysuite_strict_rights']) && $sugar_config['securitysuite_strict_rights'] == true) {
			$query .= " and acl_roles_actions.access_override = 80  ";
		}
		$GLOBALS['log']->debug("SecuritySuite: groupHasAccess $query");
		$result = $db->query($query);
		$row = $db->fetchByAssoc($result);
		if(isset($row) && $row['results']>0) return true;
		
		return false;
	}
	
	function inherit(&$focus,$isUpdate)
	{
		SecurityGroup::assign_default_groups($focus,$isUpdate); //this must be first because it does not check for dups
		//don't do inheritance if popup selector method is chosen and a user is making the request...
		if(
			(isset($sugar_config['securitysuite_popup_select']) && $sugar_config['securitysuite_popup_select'] == true
			 && isset($_REQUEST['action']) && $_REQUEST['action'] == 'Save')
		) {
			return; 
			
		}
		SecurityGroup::inherit_creator($focus,$isUpdate);
		SecurityGroup::inherit_assigned($focus,$isUpdate);
		SecurityGroup::inherit_parent($focus,$isUpdate);
		
	}
	
	function assign_default_groups(&$focus,$isUpdate)
	{
		global $sugar_config;
		global $current_user;
		if(!$isUpdate) {
			$defaultGroups = SecurityGroup::retrieveDefaultGroups();
			foreach($defaultGroups as $default_id => $defaultGroup) {

				if($defaultGroup['module'] == "All" || $defaultGroup['module'] == $focus->module_dir) {
					if($focus->module_dir == "Users") {
						$query = "insert into securitygroups_users(id,date_modified,deleted,securitygroup_id,user_id,noninheritable) "
							."select distinct '".create_guid()."',".db_convert('','today').",0,g.id,'$focus->id',1 "
							."from securitygroups g "
							."left join securitygroups_users d on d.securitygroup_id = g.id and d.user_id = '$focus->id' and d.deleted = 0 "
							."where d.id is null and g.id = '".$defaultGroup['securitygroup_id']."' and g.deleted = 0 ";
					} else {
						$query = "insert into securitygroups_records(id,securitygroup_id,record_id,module,date_modified,deleted) "					
							."select distinct '".create_guid()."',g.id,'$focus->id','$focus->module_dir',".db_convert('','today').",0 "
							."from securitygroups g "
							."left join securitygroups_records d on d.securitygroup_id = g.id and d.record_id = '$focus->id' and d.module = '$focus->module_dir' and d.deleted = 0 "
							."where d.id is null and g.id = '".$defaultGroup['securitygroup_id']."' and g.deleted = 0 ";
					}
					$GLOBALS['log']->debug("SecuritySuite: Assign Default Groups: $query");
					$focus->db->query($query,true); 
				}
			} //end foreach default group
		}
		
	} 
	
	function inherit_creator(&$focus,$isUpdate)
	{
		global $sugar_config;
		global $current_user;
		if(!$isUpdate && isset($sugar_config['securitysuite_inherit_creator']) && $sugar_config['securitysuite_inherit_creator'] == true) {

			if(isset($_SESSION['portal_id']) && isset($_SESSION['user_id'])) {
				return; //don't inherit if from portal
			}
			
			//inherit only for those that support Security Groups
			$groupFocus = new SecurityGroup();
			$security_modules = $groupFocus->getSecurityModules();
			//if(in_array($focus->module_dir,$security_modules)) {
			if(in_array($focus->module_dir,array_keys($security_modules))) {//rost fix2
					
				//test to see if works for creating a note for a case from the portal...this may need to be handled slightly differently
				//inherits portal users groups? Could be an interesting twist...
				$query = "insert into securitygroups_records(id,securitygroup_id,record_id,module,date_modified,deleted) "
						."select distinct ";
				if($focus->db->dbType == 'mysql') {
					$query .= " uuid() ";
				} else if($focus->db->dbType == 'mssql') {
					$query .= " lower(newid()) ";
				}
				$query .= ",u.securitygroup_id,'$focus->id','$focus->module_dir',".db_convert('','today').",0 "
						."from securitygroups_users u "
						."inner join securitygroups g on u.securitygroup_id = g.id and g.deleted = 0 and (g.noninheritable is null or g.noninheritable <> 1) "
						."left join securitygroups_records d on d.securitygroup_id = u.securitygroup_id and d.record_id = '$focus->id' and d.module = '$focus->module_dir' and d.deleted = 0 "
						."where d.id is null and u.user_id = '$current_user->id' and u.deleted = 0 and (u.noninheritable is null or u.noninheritable <> 1)";
				$GLOBALS['log']->debug("SecuritySuite: Inherit from Creator: $query");
				$focus->db->query($query,true); 
			}
		}
		
	} 
	
	function inherit_assigned(&$focus,$isUpdate)
	{
		global $sugar_config;
		global $current_user;
		if(isset($sugar_config['securitysuite_inherit_assigned']) && $sugar_config['securitysuite_inherit_assigned'] == true) {
	
			if(!empty($focus->assigned_user_id)) {
				$assigned_user_id = $focus->assigned_user_id;
				//inherit only for those that support Security Groups
				$groupFocus = new SecurityGroup();
				$security_modules = $groupFocus->getSecurityModules();
				//if(in_array($focus->module_dir,$security_modules)) {
				if(in_array($focus->module_dir,array_keys($security_modules))) {//rost fix2

					//test to see if works for creating a note for a case from the portal...this may need to be handled slightly differently
					//inherits portal users groups? Could be an interesting twist...
					$query = "insert into securitygroups_records(id,securitygroup_id,record_id,module,date_modified,deleted) "
							."select distinct ";
					if($focus->db->dbType == 'mysql') {
						$query .= " uuid() ";
					} else if($focus->db->dbType == 'mssql') {
						$query .= " lower(newid()) ";
					}
					$query .= ",u.securitygroup_id,'$focus->id','$focus->module_dir',".db_convert('','today').",0 "
							."from securitygroups_users u "
							."inner join securitygroups g on u.securitygroup_id = g.id and g.deleted = 0 and (g.noninheritable is null or g.noninheritable <> 1) "
							."left join securitygroups_records d on d.securitygroup_id = u.securitygroup_id and d.record_id = '$focus->id' and d.module = '$focus->module_dir' and d.deleted = 0 "
							."where d.id is null and u.user_id = '$assigned_user_id' and u.deleted = 0  and (u.noninheritable is null or u.noninheritable <> 1)";
					$GLOBALS['log']->debug("SecuritySuite: Inherit from Assigned: $query");
					$focus->db->query($query,true); 
				}
			} //if !empty assigned_user_id
		}
		
	} 
	
	function inherit_parent(&$focus,$isUpdate)
	{
		global $sugar_config;
		//new record or if update from soap api for cases or bugs
		//TEST FOR PORTAL NOTES
		//if((!$isUpdate || ($isUpdate && !empty($focus->note_id) && ($focus->object_name == "Case" || $focus->object_name == "Bug")))
		if(!$isUpdate
			&& isset($sugar_config['securitysuite_inherit_parent']) && $sugar_config['securitysuite_inherit_parent'] == true) {
 
			$focus_module_dir = $focus->module_dir;
			$focus_id = $focus->id;
			
			//inherit only for those that support Security Groups
			$groupFocus = new SecurityGroup();
			$security_modules = $groupFocus->getSecurityModules();
			//if(!in_array($focus_module_dir,$security_modules)) {
			if(!in_array($focus_module_dir,array_keys($security_modules))) {//rost fix2
				return; //don't inherit for this module
			}

			//from subpanel
			//PHP Notice error fix
			$parent_type = "";
			$parent_id = "";
			
			if(isset($_REQUEST['relate_to']) && isset($_REQUEST['relate_id'])) {
				$parent_type = $_REQUEST['relate_to'];
				$parent_id = $_REQUEST['relate_id'];
    		}
    		
			if(isset($_SESSION['portal_id'])) {
				$parent_id = $_SESSION['user_id']; //soap stores contact id in user_id field
				$parent_type = "Contacts";
			}	
			
			//from activity type creation
			if((empty($parent_type) || empty($parent_id)) && isset($_REQUEST['parent_type']) && isset($_REQUEST['parent_id'])) {
				$parent_type = $_REQUEST['parent_type'];
				$parent_id = $_REQUEST['parent_id'];
			}	

			//full form from subpanel
			if((empty($parent_type) || empty($parent_id)) && isset($_REQUEST['return_module']) && isset($_REQUEST['return_id'])) {
				$parent_type = $_REQUEST['return_module'];
				$parent_id = $_REQUEST['return_id'];
			}	
			
			/** need to find relate fields...for example for Cases look to see if account_id is set */
			//allow inheritance for all relate field types....iterate through and inherit each related field
			//if(empty($parent_type) || empty($parent_id)) {
				foreach($focus->field_name_map as $name=>$def) {
			
				   if($def['type']=='relate' && isset($def['id_name']) 
				   		&& isset($def['module']) && strtolower($def['module']) != "users" ) {

						if(isset($_REQUEST[$def['id_name']])) {
							$relate_parent_id = $_REQUEST[$def['id_name']];
							$relate_parent_type = $def['module'];
							
							SecurityGroup::inherit_parentQuery($focus, $relate_parent_type, $relate_parent_id, $focus_id, $focus_module_dir);
						} else if(isset($_SESSION['portal_id']) && isset($_SESSION[$def['id_name']])) { //catch soap account
							$relate_parent_id = $_SESSION[$def['id_name']];
							$relate_parent_type = $def['module'];
							
							SecurityGroup::inherit_parentQuery($focus, $relate_parent_type, $relate_parent_id, $focus_id, $focus_module_dir);
						}
				   }
				} 
			//}
			
			if(!empty($parent_type) && !empty($parent_id)) { // && $parent_type != "Emails" && $parent_type != "Meetings") {
				SecurityGroup::inherit_parentQuery($focus, $parent_type, $parent_id, $focus_id, $focus_module_dir);
			} //end if parent type/id
		} //end if new record
	}
	
	function inherit_parentQuery(&$focus, $parent_type, $parent_id, $focus_id, $focus_module_dir) {
		if(empty($parent_type) || empty($parent_id)) return; //no info passed
		
		/** can speed this up by doing one query */
		//should be just one query but need a unique guid for each insert
		//WE NEED A UNIQUE GUID SO USE THE BUILT IN SQL GUID METHOD
		$query = "insert into securitygroups_records(id,securitygroup_id,record_id,module,date_modified,deleted) "
				."select distinct ";
		if($focus->db->dbType == 'mysql') {
			$query .= " uuid() ";
		} else if($focus->db->dbType == 'mssql') {
			$query .= " lower(newid()) ";
		}
		$query .= ",r.securitygroup_id,'$focus_id','$focus_module_dir',".db_convert('','today').",0 "
				."from securitygroups_records r "
				."inner join securitygroups g on r.securitygroup_id = g.id and g.deleted = 0 and (g.noninheritable is null or g.noninheritable <> 1) "
				."left join securitygroups_records d on d.securitygroup_id = r.securitygroup_id and d.record_id = '$focus_id' and d.module = '$focus_module_dir' and d.deleted = 0 "
				."where d.id is null and r.module = '$parent_type' "
				."and r.record_id = '$parent_id' "
				."and r.deleted = 0 ";
				//using left join instead
				//and not exists (select top 1 s.id from securitygroups_records s where s.deleted = 0 and s.record_id = '$focus_id' and s.securitygroup_id = r.securitygroup_id and s.module = '$focus_module_dir') ";
		$GLOBALS['log']->debug("SecuritySuite: Inherit from Parent: $query");
		$focus->db->query($query,true);	
	}
	
	/**
	 * If user is a member of just one group inherit group for new record
	 * returns true if inherit just one else false
	 */
	function inheritOne($user_id, $record_id, $module) {
		//check to see if in just one group...if so, inherit that group and return true
		global $db; 
		
		$query = "select count(securitygroups.id) as results from securitygroups "
				."inner join securitygroups_users on securitygroups.id = securitygroups_users.securitygroup_id "
				." and securitygroups_users.deleted = 0 "
				." where securitygroups.deleted = 0 and securitygroups_users.user_id = '$user_id' "
				."  and (securitygroups.noninheritable is null or securitygroups.noninheritable <> 1) "
				."  and (securitygroups_users.noninheritable is null or securitygroups_users.noninheritable <> 1) ";
		$GLOBALS['log']->debug("SecuritySuite: Inherit One Pre-Check Qualifier: $query");
		$result = $db->query($query);
		$row = $db->fetchByAssoc($result);
		if(isset($row) && $row['results'] == 1) {
				
			$query = "insert into securitygroups_records(id,securitygroup_id,record_id,module,date_modified,deleted) "
					."select distinct '".create_guid()."',u.securitygroup_id,'$record_id','$module',".db_convert('','today').",0 "
					."from securitygroups_users u "
					."inner join securitygroups g on u.securitygroup_id = g.id and g.deleted = 0 and (g.noninheritable is null or g.noninheritable <> 1) "
					."left join securitygroups_records d on d.securitygroup_id = u.securitygroup_id and d.record_id = '$record_id' and d.module = '$module' and d.deleted = 0 "
					."where d.id is null and u.user_id = '$user_id' and u.deleted = 0 and (u.noninheritable is null or u.noninheritable <> 1)";
			$GLOBALS['log']->debug("SecuritySuite: Inherit One: $query");
			$db->query($query,true); 		
			return true;
		}
		
		return false;
	}

	/**
	 * returns # of groups a user is a member of that are inheritable
	 *
	 * TODO: cache this value in the session var
	 */
	function getMembershipCount($user_id) {
		global $db; 
		
		if(!isset($_SESSION['securitygroup_count'])) {
			$query = "select count(securitygroups.id) as results from securitygroups "
					."inner join securitygroups_users on securitygroups.id = securitygroups_users.securitygroup_id "
					." and securitygroups_users.deleted = 0 "
					." where securitygroups.deleted = 0 and securitygroups_users.user_id = '$user_id' "
					."  and (securitygroups.noninheritable is null or securitygroups.noninheritable <> 1) "
					."  and (securitygroups_users.noninheritable is null or securitygroups_users.noninheritable <> 1) ";
			$GLOBALS['log']->debug("SecuritySuite: Inherit One Pre-Check Qualifier: $query");
			$result = $db->query($query);
			$row = $db->fetchByAssoc($result);
			if(isset($row)) {
				$_SESSION['securitygroup_count'] = $row['results'];
			}
		}
		
		return $_SESSION['securitygroup_count'];
	}
	
	function retrieveDefaultGroups() {
	
		$default_groups = array();
		$query = "select securitygroups_default.id, securitygroups.name, securitygroups_default.module, securitygroups_default.securitygroup_id "
				."from securitygroups_default "
				."inner join securitygroups on securitygroups_default.securitygroup_id = securitygroups.id "
				."where securitygroups_default.deleted = 0 and securitygroups.deleted = 0";
		$GLOBALS['log']->debug("SecuritySuite: Retrieve Default Groups: $query");
		$result = $this->db->query($query);
		while(($row=$this->db->fetchByAssoc($result)) != null) {
			$default_groups[$row['id']] = array('group'=>$row['name'],'module'=>$row['module'],'securitygroup_id'=>$row['securitygroup_id']);
		}
		
		return $default_groups;
	}

    function saveDefaultGroup($group_id, $module) {
    	$query = "INSERT INTO securitygroups_default (id, securitygroup_id, module, date_modified, deleted) "
    			."VALUES ( ";
				if($this->db->dbType == 'mysql') {
					$query .= " uuid() ";
				} else if($this->db->dbType == 'mssql') {
					$query .= " lower(newid()) ";
				}
		$query .= ",'$group_id', '$module',".db_convert('','today').",0 )";
		$GLOBALS['log']->debug("SecuritySuite: Save Default Group: $query");
        $this->db->query($query);
    }
    
    function removeDefaultGroup($default_id) {
		$query = "delete from securitygroups_default where id = '$default_id' ";
        $this->db->query($query);
    }
    
    /**
     * Used to get the modules that are tied to security groups. 
     * There should be a relationship of some sort in order to tie the two together.
     *
     * This will be used for things such as default groups for modules, etc.
     */
    function getSecurityModules() {
		global $app_list_strings;
		
    	$security_modules = array();
    	
		require_once('modules/Relationships/Relationship.php');
		$rs = new Relationship();
		$query =  "SELECT lhs_module, rhs_module FROM $rs->table_name WHERE deleted=0 AND (lhs_module = 'SecurityGroups' OR rhs_module='SecurityGroups')";
		$GLOBALS['log']->debug("SecuritySuite: Get SecuritySuite Enabled Modules: $query");
		$result = $rs->db->query($query);
		while(($row=$rs->db->fetchByAssoc($result)) != null) {
			
			if($row['lhs_module'] == 'SecurityGroups') {
				//$security_modules[$row['rhs_module']] = $row['rhs_module'];
				$security_modules[$row['rhs_module']] = $app_list_strings['moduleList'][$row['rhs_module']];//rost fix
			} else {
				//$security_modules[$row['lhs_module']] = $row['lhs_module'];
				$security_modules[$row['lhs_module']] = $app_list_strings['moduleList'][$row['lhs_module']];//rost fix
			
			}
		}
		
		return $security_modules;
    }
    
    /** To get the link name used to call load_relationship */
    function getLinkName($this_module, $rel_module) {
    	include_once('modules/Relationships/RelationshipHandler.php');
    	$rh = new RelationshipHandler($GLOBALS['db'],$this_module);
		$rh->process_by_rel_bean($rel_module);
		$rh->build_info();
		$rh->get_rel1_vardef_field_base($rh->base_bean->field_defs);
		return $rh->rel1_vardef_field_base;

    }
    
    /**
     * Add a Security Group to a record
     */
    function addGroupToRecord($module, $record_id, $securitygroup_id) {
    	if(empty($module) || empty($record_id) || empty($securitygroup_id)) {
    		return; //missing data
    	}
		global $db; 
		$query = "insert into securitygroups_records(id,securitygroup_id,record_id,module,date_modified,deleted) "
				."values( '".create_guid()."','".$securitygroup_id."','$record_id','$module',".db_convert('','today').",0) ";
		$GLOBALS['log']->debug("SecuritySuite: addGroupToRecord: $query");
		$db->query($query,true); 
    }
    
	/**
	 * Return a list of groups that this user belongs to.
	 */
	function getUserSecurityGroups($user_id)
	{	
		global $db;
		$query = "select securitygroups.id, securitygroups.name from securitygroups_users "
				."inner join securitygroups on securitygroups_users.securitygroup_id = securitygroups.id "
				."		and securitygroups.deleted = 0 "
				."where securitygroups_users.user_id='$user_id' and securitygroups_users.deleted = 0 ";
		$result = $db->query($query,true,"Error finding the full membership list for a user: ");
		
		$group_array = Array();
		$result = $db->query($query);
		while(($row=$db->fetchByAssoc($result)) != null) {			
			$group_array[$row['id']] = $row;
		}

		return $group_array;
	}

	/**
	 * Return a list of all groups
	 */
	function getAllSecurityGroups()
	{	
		global $db;
		$query = "select id, name from securitygroups "
				."where securitygroups.deleted = 0 "
				."order by name";
		$result = $db->query($query,true,"Error finding the full membership list for a user: ");
		
		$group_array = Array();
		$result = $db->query($query);
		while(($row=$db->fetchByAssoc($result)) != null) {			
			$group_array[$row['id']] = $row;
		}

		return $group_array;
	}	
	
	/**
	 * Return a list of all members of a group
	 */
	function getMembers()
	{
		global $db; 
		
		$query = "select users.id, users.user_name, users.first_name, users.last_name "
				."from securitygroups "
				."inner join securitygroups_users on securitygroups.id = securitygroups_users.securitygroup_id "
				." and securitygroups_users.deleted = 0 "
				."inner join users on securitygroups_users.user_id = users.id and users.deleted = 0 "
				." where securitygroups.deleted = 0 and users.employee_status = 'Active' "
				."  and securitygroups.id = '$this->id' ";
		$GLOBALS['log']->debug("SecuritySuite: getMembers: $query");
		$user_array = Array();
		$result = $db->query($query);
		while(($row=$db->fetchByAssoc($result)) != null) {			
			$user_array[$row['id']] = $row;
		}

		return $user_array;
	}
	
}
?>