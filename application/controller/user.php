<?php
class user {
	var $page;
	var $db;
	var $load;

	function __construct()
	{
		$this->page = new page();
		$this->load = new load();
		$this->db = new database();
	}

 	function login()
 	{
 	// 	// Set up <head>
 	// 	$this->page->html->head->configure('page');
		// $this->page->html->head->add('<title>Home Page | Some Store</title>');

		// $this->page->html->head->add('<script type="text/javascript" src="/assets/js/helper.js"></script>');
		// $this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
		// $this->page->html->head->add('<script type="text/javascript" src="/assets/js/dkInterface.js"></script>');
		// $this->page->html->head->add("<link href='/assets/css/dkInterface.css' rel='stylesheet' type='text/css'>");
		// $this->page->html->head->add("<link href='/assets/css/style.css' rel='stylesheet' type='text/css'>");
		
		// $this->page->html->head->add("<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>");

		// // Set up top level basic navigation
 	// 	$this->page->navigation->add(array(array('home_page', 'Store',"./index.php?c=index&m=index"), array('login_page', 'Login',"./index.php?c=user&m=login"), array('category_page', 'Categories',"./index.php?c=category&m=index")));
 	// 	$this->page->navigation->activate_link('login_page');
 		
 	// 	$users = $this->db->select("SELECT * FROM `user`");

 	// 	$this->page->includes->add('includes/header');
 	// 	// $this->page->includes->add('includes/navigation');
 	// 	$this->page->includes->add('index');
 	// 	$this->page->includes->add('includes/footer');
 
 	// 	$this->load->view($this->page);

 		$ajax['content'] = '<div class="scroller-content inverted"></div>';
 		$ajax['error'] = false;  
 		$ajax['appendScroller'] = true; 
 		$ajax['disableScroller'] = 'all'; // array(1,2,5,6) n based index
 		$ajax['navigation'] = array('home'=>array('children' => 0, 'active' => 0),'products'=>array('children' => 0, 'active' => 0));  

 		die(json_encode($ajax));

 	}
}
?>