<?php
require_once('custom/include/utils/DevToolKit.php');

class DuplicateFields extends DevToolKit {
	public function __construct(&$view) {
		$this->metadata_name = 'check_duplicate_fields';
		parent::__construct($view);
	}

	public function display() {}

	protected function process_edit($prefix = '', $focus = '') {
		parent::process_edit($prefix, $focus);

		global $app_strings;

		$app_strings_encoded = json_encode($app_strings);
		$this->javascript[] = "<script>SUGAR.language.setLanguage('app_strings', $app_strings_encoded);</script>";

		foreach($this->metadata as $field => $defs) {
			$unique_values = $this->get_existing_values($field, $defs);
			$this->javascript[] = '<script>addToValidateIsInArray(\'EditView\', \'' . $field . '\', \'in_array\', \'true\', \'' . $app_strings['LBL_DEVTOOLKIT_MESSAGE_DUPLICATE_FIELD'] . '\', \'' . json_encode($unique_values) . '\', \'==\')</script>';
		}
	}

	private function get_existing_values($field, $defs) {
		global $app_strings;

		if(isset($this->bean->field_defs[$field]['source']) && $this->bean->field_defs[$field]['source'] == 'custom_fields') {
			$select = "SELECT {$this->bean->table_name}_cstm.{$field} ";
			$from = "FROM {$this->bean->table_name} INNER JOIN {$this->bean->table_name}_cstm ON {$this->bean->table_name}.id = {$this->bean->table_name}_cstm.id_c ";
		} else if(! isset($this->bean->field_defs[$field]['source']) || $this->bean->field_defs[$field]['source'] == '') {
			$select = "SELECT {$this->bean->table_name}.{$field} ";
			$from = "FROM {$this->bean->table_name} ";
		}

		$unique_values = array();
		$query = $select . $from . "WHERE {$this->bean->table_name}.deleted = 0";
		$query.= (isset($_REQUEST['record']) && ! empty($_REQUEST['record'])) ? " AND {$this->bean->table_name}.id <> '{$_REQUEST['record']}'" : '';

		if(count($defs) > 0) {
			foreach($defs as $def) {
				$field_type = $this->bean->field_defs[$def]['type'];
				$function = 'process_' . $field_type;
				$id_list = $this->$function($def);

				if(count($id_list) > 0) {
					$id_clause = "'" . implode("', '", $id_list) . "'";
					$query.= " AND {$this->bean->table_name}.id IN ({$id_clause})";
				}
			}
		}

		$result = $this->bean->db->query($query, true, $app_strings['ERR_DEVTOOLKIT_QUERY_DUPLICATE_FIELD']);

		while($row = $this->bean->db->fetchByAssoc($result)) {
			$unique_values[] = $row[$field];
		}

		return $unique_values;
	}

	private function process_relate($field) {
		$id_name = $this->bean->field_defs[$field]['id_name'];
		$link = $this->bean->field_defs[$field]['link'];
		$relationship = $this->bean->field_defs[$link]['relationship'];
		$id_list = array();

		if((isset($_REQUEST[$id_name]) && ! empty($_REQUEST[$id_name])) || (isset($this->bean->$id_name) && ! empty($this->bean->$id_name))) {
			$parent_id = (empty($this->bean->id)) ? $_REQUEST[$id_name] : $this->bean->$id_name;
			$parent_bean = loadBean($this->bean->field_defs[$field]['module']);
			$parent_bean->retrieve($parent_id);

			foreach($parent_bean->field_defs as $parent_field => $defs) {
				if($defs['type'] == 'link' && $defs['relationship'] == $relationship) {
					$parent_bean->load_relationship($parent_field);
					$id_list = $parent_bean->$parent_field->get();
				}
			}
		}

		return $id_list;
	}
}
?>
