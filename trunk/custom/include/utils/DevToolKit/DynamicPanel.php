<?php
require_once('custom/include/utils/DevToolKit.php');

class DynamicPanel extends DevToolKit {
	public function __construct(&$view) {
		$this->metadata_name = 'toggle_panel_fields';
		$this->event_function = 'togglePanel';
		parent::__construct($view);
	}

	public function display() {
		parent::display();
	}

	protected function display_detail() {
		$panels = array_keys($this->view->dv->defs['panels']);
		$invisible_panels = array();

		foreach($this->metadata as $field => $field_defs) {
			if($this->bean->$field != '' && isset($field_defs[$this->bean->$field])) {
				foreach($field_defs[$this->bean->$field] as $panel => $visible) {
					if($visible == 0 && $panel != 'default') {
						$invisible_panels[] = strtolower($panel);
					}
				}
			}
		}
		foreach($panels as $panel) {
			if(in_array(strtolower($panel), $invisible_panels)) {
				unset($this->view->dv->defs['panels'][$panel]);
			}
		}
	}

	protected function process_edit($prefix = '', $focus = '') {
		parent::process_edit($prefix, $focus);
		$this->process_metadata();
		$this->javascript[] = '<script type="text/javascript" src="custom/include/javascript/DynamicPanel.js"></script>';
		$this->javascript[] = '<script>var panelFieldsDefs = ' . json_encode($this->metadata) . ';</script>';
		$this->load_process_javascript($focus);
	}

	protected function process_detail($prefix = '', $focus = '') {
		parent::process_detail($prefix, $focus);

		$this->process_metadata();
	}

	private function process_metadata() {
		global $app_list_strings;

		$panel_list = array();

		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs as $value => $panel_defs) {
				$panel_list = array_merge($panel_list, array_keys($panel_defs));
			}
		}
		
		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs as $value => $panel_defs) {
				foreach($panel_list as $panel) {
					if(! isset($this->metadata[$field][$value][$panel])) {
						$this->metadata[$field][$value][$panel] = 0;
					}
				}
			}
		}
		
		foreach($this->metadata as $field => $field_defs) {
			$this->display_script.= "<script>togglePanel(document.getElementById('$field'));</script>";
			$dropdown = '';

			if($this->bean->field_defs[$field]['type'] == 'enum') {
				$dropdown = $this->bean->field_defs[$field]['options'];
			} else {
				$dropdown = 'dom_int_bool';
			}

			foreach($app_list_strings[$dropdown] as $dd_key => $dd_value) {
				if(! isset($this->metadata[$field][$dd_key])) {
					foreach($panel_list as $panel) {
						$this->metadata[$field][$dd_key][$panel] = 0;
					}
				}
			}
		}
	}
}
?>
