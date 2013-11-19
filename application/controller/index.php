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
 		// Set up <head>
 		$this->page->html->head->configure('page');
		$this->page->html->head->add('<title>Home Page | Some Store</title>');
		$this->page->html->head->add('<script src="./assets/ajax.js"');

		// Set up top level basic navigation
 		$this->page->navigation->add_link('home_page', 'Store',"./index.php?c=index&m=index");
 		$this->page->navigation->add_link('login_page', 'Login',"./index.php?c=user&m=login");
 		$this->page->navigation->add_link('category_page', 'Categories',"./index.php?c=category&m=index");
 		$this->page->navigation->activate_link('home_page');
 		
 		$this->page->data['some_example_data'] = $this->db->select("SELECT * FROM `user`");


 		$this->page->includes->add('includes/header');
 		$this->page->includes->add('includes/navigation');
 		$this->page->includes->add('index');
 		$this->page->includes->add('includes/footer');
 
 		$this->load->view($this->page);
 	}
}
?>