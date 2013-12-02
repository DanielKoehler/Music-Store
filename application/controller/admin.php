<?php
class admin {
	var $page;
	var $db;
	var $load;

	function __construct()
	{
		$this->page = new page();
		$this->load = new load();
		$this->db = new database();
	}

 	function index()
 	{
 		$this->page->configure('page');
		$this->page->html->head->add('<title>Home Page | Some Store</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
		$this->page->navigation->active('control_panel_page');
 		
 		$this->page->includes->add(array('includes/header', 'includes/navigation','admin_index','includes/footer'));
 
 		$this->load->view($this->page);
 	}
}
?>