<?php
class store {
	var $page;
	var $db;
	var $load;

	function __construct()
	{
		$this->page = new page();
		$this->load = new load();
		$this->db = new database();
	}

	function index(){

	}

 	function cart()
 	{	
 		$this->db->insert('order', $_SESSION['order']);
 	}
}
?>