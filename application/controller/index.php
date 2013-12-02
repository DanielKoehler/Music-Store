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

 		$this->page->includes->add(array('includes/header', 'includes/navigation','index','includes/footer'));
 
 		$this->load->view($this->page);
 	}

 	function ui() 
	{
 		// Set up <head>
 		$this->page->configure('page');
		$this->page->html->head->add('<title>UI example | Some Store</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
 		
 		$this->page->includes->add(array('includes/header', 'includes/navigation','ui','includes/footer'));
 
 		$this->load->view($this->page);
 	}

 	function about() 
	{
 		// Set up <head>
 		$this->page->configure('page');
		$this->page->html->head->add('<title>About | Some Store</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
 		
 		$this->page->includes->add(array('includes/header', 'includes/navigation','about','includes/footer'));
 
 		$this->load->view($this->page);
 	}

 	function not_found()
 	{

 	}
}
?>