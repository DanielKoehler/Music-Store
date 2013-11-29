<?php
class index {
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
		$this->page->navigation->active('home_page');
 		
 		$this->page->data['scroller_one'] = '<p>' . $this->db->select("SELECT * FROM `user`")[0]['first_name'] . '</p>';

 		$this->page->includes->add(array('includes/header', 'includes/navigation','index','includes/footer'));
 
 		$this->load->view($this->page);
 	}

 	function ui() 
	{
 		// Set up <head>
 		$this->page->configure('page');
		$this->page->html->head->add('<title>UI example | Some Store</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
 		
 		$this->page->data['scroller_one'] = '<p>' . $this->db->select("SELECT * FROM `user`")[0]['first_name'] . '</p>';

 		$this->page->includes->add(array('includes/header', 'includes/navigation','ui','includes/footer'));
 
 		$this->load->view($this->page);
 	}
}
?>