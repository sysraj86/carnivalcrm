<?php
require_once('custom/include/utils/DevToolKit.php');

class EditableFields extends DevToolKit {
	var $display_script = '';

	public function __construct(&$view) {
		$this->metadata_name = 'toggle_editable_fields';
		$this->event_function = 'toggleEditableFields';
		parent::__construct($view);
	}

	public function display() {
		parent::display();
	}

	public function process($prefix = '', $focus = '') {
		parent::process($prefix, $focus);
		
		echo $this->display_script;
	}

	protected function process_edit($prefix = '', $focus = '') {
		parent::process_edit($prefix, $focus);

		$this->process_metadata();
		$this->javascript[] = '<script type="text/javascript" src="custom/include/javascript/EditableFields.js"></script>';
		$this->javascript[] = '<script>var editableFieldsDefs = ' . json_encode($this->metadata) . ';</script>';
		$this->load_process_javascript($focus);
	}

	private function process_metadata() {
		$field_list = array();

		foreach($this->metadata as $field => $field_defs) {
			$this->display_script.= "<script>toggleEditableFields(document.getElementById('$field'));</script>";

			foreach($field_defs as $value => $value_defs) {
				foreach($this->field_mapping as $target_field => $map) {
					$type = $this->bean->field_defs[$target_field]['type'];
					$this->metadata[$field][$value][$target_field] = array(
						'type' => $type,
						'editable' => false,
					);

					if(! isset($value_defs[$target_field])) {
						$this->metadata[$field][$value][$target_field]['editable'] = true;
					} else {
						$this->metadata[$field][$value][$target_field]['editable'] = $value_defs[$target_field];
					}
				}
			}
		}
	}
}
?>
