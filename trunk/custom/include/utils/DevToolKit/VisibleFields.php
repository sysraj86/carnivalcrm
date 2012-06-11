<?php
require_once('custom/include/utils/DevToolKit.php');

class VisibleFields extends DevToolKit {
	public function __construct(&$view) {
		$this->metadata_name = 'toggle_visible_fields';
		$this->event_function = 'toggleVisibleFields';
		parent::__construct($view);
	}

	public function display() {
		parent::display();
	}

	protected function display_detail() {
		$invisible_fields = array();

		foreach($this->metadata as $field => $field_defs) {
			if($this->bean->$field != '' && isset($field_defs[$this->bean->$field])) {
				foreach($field_defs[$this->bean->$field] as $target_field => $visible) {
					if($visible == 0) {
						$invisible_fields[] = $target_field;
					}
				}
			}
		}

		foreach($this->view->dv->defs['panels'] as $panel_id => $panel) {
			foreach($panel as $row_id => $row) {
				foreach($row as $field_id => $field) {
					$target_field = (is_array($field)) ? $field['name'] : $field;

					if(in_array($target_field, $invisible_fields)) {
						$this->view->dv->defs['panels'][$panel_id][$row_id][$field_id] = null;
					}
				}
			}
		}
	}

	protected function process_edit($prefix = '', $focus = '') {
		parent::process_edit($prefix, $focus);

		$this->process_metadata();
		$this->javascript[] = '<script type="text/javascript" src="custom/include/javascript/VisibleFields.js"></script>';
		$this->javascript[] = '<script>var visibileFieldsDefs = ' . json_encode($this->metadata) . ';</script>';
		$this->load_process_javascript($focus);
	}

	private function process_metadata() {
		$field_list = array();
		
		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs as $value => $value_defs) {
				foreach($value_defs as $target_field => $visible) {
					$panel_id = $this->field_mapping[$target_field]['panel'];
					$row_id = $this->field_mapping[$target_field]['row'];
					$field_id = $this->field_mapping[$target_field]['field'];
					$field_list[] = $target_field;
					$this->metadata[$field][$value][$target_field] = array(
						'visible' => $visible,
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
						$this->metadata[$field][$value][$target_field] = array(
							'visible' => 0,
						);
					}
				}
			}
		}
	}
}
?>
