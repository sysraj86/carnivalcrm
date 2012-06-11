<?php
require_once('custom/include/utils/DevToolKit.php');

class DynamicDropdown extends DevToolKit {
	public function __construct(SugarView &$view) {
		$this->metadata_name = 'update_dropdown_field_defs';
		$this->event_function = 'updateDropdownFields';
		parent::__construct($view);
	}

	public function display() {
		parent::display();
	}

	public function process() {
		parent::process();
	}

	protected function process_edit($prefix = '', $focus = '') {
		parent::process_edit($prefix, $focus);

		global $app_list_strings;

		if($this->bean->id != '') {
			$this->process_default_values();
		}

		$app_list_strings_encoded = json_encode($app_list_strings);
		$this->javascript[] = "<script>SUGAR.language.setLanguage('app_list_strings', $app_list_strings_encoded);</script>";
		$this->javascript[] = '<script type="text/javascript" src="custom/include/javascript/DropdownFields.js"></script>';
		$this->javascript[] = '<script>var updateDropdownFieldsDefs = ' . json_encode($this->metadata) . ';</script>';
		$this->load_process_javascript($focus);
	}

	protected function process_detail($prefix = '', $focus = '') {
		global $app_list_strings;

		foreach($this->metadata as $primary_field => $primary_defs) {
			foreach($primary_defs[$this->bean->$primary_field] as $secundary_field => $secundary_dropdown) {
				$app_list_strings[$this->bean->field_defs[$secundary_field]['options']] = $app_list_strings[$secundary_dropdown];
			}
		}
	}

	protected function process_list($prefix = '', $focus = '') {
		global $app_list_strings;

		foreach($this->metadata as $primary_field => $primary_defs) {
			foreach($this->metadata[$primary_field] as $primary_value => $secundary_defs) {
				foreach($secundary_defs as $secundary_field => $secundary_dropdown) {
					$dropdown_field = $this->bean->field_defs[$secundary_field]['options'];
					$app_list_strings[$dropdown_field] = array_merge($app_list_strings[$dropdown_field], $app_list_strings[$secundary_dropdown]);
				}
			}
		}
	}

	private function process_default_values() {
		$default_values = array();

		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs[$this->bean->$field] as $target_field => $target_dd) {
				$sub_field = str_replace("[]", "", $target_field);
				$default_values[$target_field] = $this->bean->$sub_field;
			}
		}

		$this->javascript[] = '<script>var defaultValuesDefs = ' . json_encode($default_values) . ';</script>';
	}
}
?>
