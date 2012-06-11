<?php
require_once('custom/include/utils/DevToolKit.php');

class RequiredFields extends DevToolKit {
	public function __construct(&$view) {
		$this->metadata_name = 'toggle_required_fields';
		$this->event_function = 'toggleRequiredFields';
		parent::__construct($view);
	}

	public function display() {
		parent::display();
	}

	protected function process_edit($prefix = '', $focus = '') {
		parent::process_edit($prefix, $focus);

		global $app_list_strings, $app_strings, $mod_strings;

		$app_list_strings_encoded = json_encode($app_list_strings);
		$app_strings_encoded = json_encode($app_strings);
		$mod_strings_encoded = json_encode($mod_strings);

		$this->process_metadata();
		$this->javascript[] = "<script>SUGAR.language.setLanguage('app_list_strings', $app_list_strings_encoded);</script>";
		$this->javascript[] = "<script>SUGAR.language.setLanguage('app_strings', $app_strings_encoded);</script>";
		$this->javascript[] = "<script>SUGAR.language.setLanguage('mod_strings', $mod_strings_encoded);</script>";
		$this->javascript[] = '<script type="text/javascript" src="custom/include/javascript/RequiredFields.js"></script>';
		$this->javascript[] = '<script>var requiredFieldsDefs = ' . json_encode($this->metadata) . ';</script>';
		$this->javascript[] = '<script>var spanRequired = "<span class=\"required\">*</span>";</script>';
		$this->load_process_javascript($focus);
	}

	private function process_metadata() {
		$field_list = array();
		
		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs as $value => $value_defs) {
				foreach($value_defs as $target_field => $required) {
					$panel_id = $this->field_mapping[$target_field]['panel'];
					$row_id = $this->field_mapping[$target_field]['row'];
					$field_id = $this->field_mapping[$target_field]['field'];
					$label = $this->bean->field_defs[$target_field]['vname'];
					$field_list[] = $target_field;

					if(is_array($this->view->ev->defs['panels'][$panel_id][$row_id][$field_id]) && isset($this->view->ev->defs['panels'][$panel_id][$row_id][$field_id]['label'])) {
						$label = $this->view->ev->defs['panels'][$panel_id][$row_id][$field_id]['label'];
					}

					$this->metadata[$field][$value][$target_field] = array(
						'label' => $label,
						'required' => $value,
					);
				}
			}
		}

		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs as $value => $value_defs) {
				foreach($field_list as $target_field) {
					if(! isset($this->metadata[$field][$value][$target_field])) {
						$panel_id = $this->field_mapping[$target_field]['panel'];
						$row_id = $this->field_mapping[$target_field]['row'];
						$field_id = $this->field_mapping[$target_field]['field'];
						$label = $this->bean->field_defs[$target_field]['vname'];

						if(is_array($this->view->ev->defs['panels'][$panel_id][$row_id][$field_id]) && isset($this->view->ev->defs['panels'][$panel_id][$row_id][$field_id]['label'])) {
							$label = $this->view->ev->defs['panels'][$panel_id][$row_id][$field_id]['label'];
						}

						$this->metadata[$field][$value][$target_field] = array(
							'label' => $label,
							'required' => 0,
						);
					}
				}
			}
		}
	}
}
?>
