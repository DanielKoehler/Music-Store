<?php
class site {
	var $system;
	function __construct(){
		$db = new database();
		$this->system = $db->select("SELECT * FROM `system`");
		$db->force_disconnect();
	}

}
