<?php
class DevToolKitManager {
	private $toolkits = array();

	public function __construct(SugarView &$view) {
		require_once('include/utils/file_utils.php');

		$files = array();
		getFiles($files, 'custom/include/utils/DevToolKit', '/\.php/');

		foreach($files as $file) {
			preg_match("/\/(\w+)\.php$/", $file, $matches);

			$class = $matches[1];

			require_once($file);

			$bean = new $class($view);
			if($bean->has_metadata()) {
				$this->toolkits[] = $bean;
			}
		}
	}

	public function display() {
		foreach($this->toolkits as $toolkit) {
			$toolkit->display();
		}
	}

	public function process() {
		foreach($this->toolkits as $toolkit) {
			$toolkit->process();
		}
	}
}
?>
