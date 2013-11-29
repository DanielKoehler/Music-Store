<?php
// Lets try some REST like verbs for method names
class basket {
	var $page;
	var $db;
	var $load;

	function __construct()
	{
		$this->page = new page();
		$this->load = new load();
		$this->db = new database();
	}

 	function view()
 	{	
 		
 	}

 	function delete()
 	{

 	}

 	function post()
 	{

 	}
}
?>