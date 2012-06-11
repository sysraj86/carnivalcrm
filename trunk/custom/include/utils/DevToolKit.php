<?php
class DevToolKit {
	protected $view;
	protected $view_type;
	protected $bean;
	protected $metadata;
	protected $metadata_name;
	protected $javascript;
	protected $field_mapping;
	protected $metadata_file;
	protected $event_function;
	protected $display_script = '';
	protected $view_symbol = '';

	public function __construct(&$view) {
		$this->view = $view;
		$this->view_type = $this->view->type;
		$this->bean = $this->view->bean;
		$this->view_symbol = substr($this->view_type, 0, 1) . 'v';
	}

	public function has_metadata() {
		$metadata_name = $this->metadata_name;
		$default_file = 'modules/' . $this->bean->module_dir . '/metadata/' . $metadata_name . '.php';
		$custom_file = 'custom/' . $default_file;
		$has_metadata = false;

		if(file_exists($custom_file)) {
			$this->metadata_file = $custom_file;
			$has_metadata = true;
		} else if(file_exists($default_file)) {
			$this->metadata_file = $default_file;
			$has_metadata = true;
		}

		return $has_metadata;
	}

	public function display() {
		$this->load_field_mapping();
		$view_symbol = $this->view_symbol;

		foreach($this->metadata as $field => $field_defs) {
			if(isset($this->field_mapping[$field])) {
				$panel_id = $this->field_mapping[$field]['panel'];
				$row_id = $this->field_mapping[$field]['row'];
				$field_id = $this->field_mapping[$field]['field'];
	
				if($this->field_mapping[$field]['type'] == 'scalar') {
					$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id] = array(
						'name' => $field,
						'label' => $this->bean->field_defs[$field]['vname'],
					);
				}

				$function = 'display_' . strtolower($this->bean->field_defs[$field]['type']);
				$this->$function($panel_id, $row_id, $field_id);
			}
		}

		$function = 'display_' . $this->view_type;
		$this->$function();
	}

	protected function display_edit() {}

	protected function display_detail() {}

	protected function display_list() {}

	protected function display_enum($panel_id, $row_id, $field_id) {
		$view_symbol = $this->view_symbol;

		if(! isset($this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams'])) {
			$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams'] = array(
				'javascript' => 'onchange="' . $this->event_function . '(this);"',
			);
		}
		if(! isset($this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript'])) {
			$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript'] = 'onchange="' . $this->event_function . '(this);"';
		} else {
			preg_match("/onchange=/", $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript'], $matches);

			if(count($matches) == 1) {
				preg_match("/' . $this->event_function . '/", $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript'], $matches);

				if(count($matches) == 0) {
					$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript'] = preg_replace("/onchange=\"/", "onchange=\"{$this->event_function}(this);", $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript']);
				}
			} else {
				$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['displayParams']['javascript'].= " onchange=\"{$this->event_function}(this);";
			}
		}
	}

	protected function display_bool($panel_id, $row_id, $field_id) {
		$view_symbol = $this->view_symbol;
		$name = $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['name'];
		$checked = (isset($this->bean->$name) && $this->bean->$name == 1) ? 'checked=""' : '';

		if(isset($this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'])) {
			if(preg_match("/onchange=/", $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'])) {
				$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'] = str_replace('onchange="', 'onchange="' . $this->event_function . '(this);', $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode']);
			} else {
				$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'] = str_replace('name="', 'onchange="' . $this->event_function . '(this);" name="', $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode']);
			}
		} else {
			$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'] = '<input type="hidden" value="0" name="' . $name . '"/><input id="' . $name . '" type="checkbox" ' . $checked . ' tabindex="0" title="" value="1" name="' . $name . '" onchange="' . $this->event_function . '(this);"/>';
		}
	}

	protected function display_varchar($panel_id, $row_id, $field_id) {
		$view_symbol = $this->view_symbol;
		$name = $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['name'];
		$value = (isset($this->bean->$name) && ! empty($this->bean->$name)) ? $this->bean->$name : '';

		if(isset($this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'])) {
			if(preg_match("/onchange=/", $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'])) {
				$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'] = str_replace('onchange="', 'onchange="' . $this->event_function . '(this);', $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode']);
			} else {
				$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'] = str_replace('name="', 'onchange="' . $this->event_function . '(this);" name="', $this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode']);
			}
		} else {
			$this->view->$view_symbol->defs['panels'][$panel_id][$row_id][$field_id]['customCode'] = '<input id="' . $name . '" type="text"  tabindex="0" title="" value="' . $value . '" name="' . $name . '" onchange="' . $this->event_function . '(this);"/>';
		}
	}

	protected function display_currency($panel_id, $row_id, $field_id) {
		$this->display_varchar($panel_id, $row_id, $field_id);
	}

	protected function display_float($panel_id, $row_id, $field_id) {
		$this->display_varchar($panel_id, $row_id, $field_id);
	}

	protected function display_relate($panel_id, $row_id, $field_id) {}

	public function process($prefix = '', $focus = '') {
		if(! is_array($this->metadata)) {
			$this->init();
		}

		$function = 'process_' . $this->view_type;
		$this->$function($prefix, $focus);
		$this->process_javascript();
		
		if($this->view_type == 'edit') {
			echo $this->display_script;
		}
	}

	protected function load_process_javascript($focus) {
		foreach($this->metadata as $field => $field_defs) {
			foreach($field_defs as $value => $dd_defs) {
				$value = (isset($focus) && is_object($focus)) ? $focus : 0;
				if(! is_object($focus) || (is_object($focus) && isset($focus->$field) && $focus->$field == $value)) {
					$this->javascript[] = '<script>' . $this->event_function . '(document.getElementById(\'' . $field . '\'))</script>';
				}
			}
		}
	}

	protected function process_prefix() {
		$new_metadata = array();

		foreach($this->metadata as $primary_field => $primary_defs) {
			$new_primary_field = $prefix . $primary_field;

			foreach($primary_defs as $primary_value => $secundary_defs) {
				foreach($secundary_defs as $secundary_key => $secundary_val) {
					$secundary_key = ($secundary_key == 'name') ? $prefix . $secundary_key : $secundary_key;
					$new_metadata[$new_primary_field][$primary_value][$secundary_key] = $secundary_val;
				}
			}
		}

		$this->metadata = $new_metadata;
	}

	protected function load_field_mapping() {
		if(! is_array($this->metadata)) {
			$this->init();
		}

		$mapping = array();
		$view_bean = substr($this->view_type, 0, 1) . 'v';

		foreach($this->view->$view_bean->defs['panels'] as $panel_id => $panel_defs) {
			foreach($panel_defs as $row_id => $row_defs) {
				foreach($row_defs as $field_id => $field_defs) {
					$field = '';
					$type = '';

					if(is_array($field_defs) && isset($field_defs['name'])) {
						$field = $field_defs['name'];
						$type = 'array';
					} else if(is_scalar($field_defs) && ! is_null($field_defs)) {
						$field = $field_defs;
						$type = 'scalar';
					}

					if($field != '' && $type != '') {
						$this->field_mapping[$field] = array(
							'type' => $type,
							'panel' => $panel_id,
							'row' => $row_id,
							'field' => $field_id,
						);
					}
				}
			}
		}
	}

	protected function process_edit($prefix = '', $focus = '') {
		$focus = ($focus == '') ? $this->bean : $focus;

		if($prefix != '') {
			$this->process_prefix();
		}
	}

	protected function process_detail($prefix = '', $focus = '') {}

	protected function process_list($prefix = '', $focus = '') {}

	private function init() {
		$this->bean = $this->view->bean;
		$this->load_metadata();
	}

	private function process_javascript() {
		if(is_array($this->javascript) && count($this->javascript) > 0) {
			foreach($this->javascript as $javascript) {
				echo $javascript;
			}
		}
	}

	private function load_metadata() {
		$metadata_name = $this->metadata_name;
		include($this->metadata_file);
		
		$this->metadata = $$metadata_name;
	}
}
?>
