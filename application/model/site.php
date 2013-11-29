<?php
class site {
	var $settings;
	function __construct(){
		$db = new database();
		$this->settings = array();
		foreach ($db->yield_select("SELECT * FROM `system`") as $row){
			$this->settings[$row['property']] = $row['value'];
		}
		$db->force_disconnect();
	}

}
