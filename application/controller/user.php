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
		if(!empty($_POST)){
		 	$this->page->data['ajax'] = array('error' => '0', 'location'=>'/index.html');
 			if(true){
 				die(json_encode($this->page->data));
 			} else {
 				die(header('Location: /'));
 			}
 		}

 		$this->page->configure('page');
		$this->page->html->head->add('<title>Login | River Crossing Adventure!</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
		$this->page->navigation->active('login_page');
 		
 		$this->page->data['scroller_one'] = '<p>' . $this->db->select("SELECT * FROM `user`")[0]['first_name'] . '</p>';

 		$this->page->includes->add(array('includes/header', 'includes/navigation','login','includes/footer'));
 
 		$this->load->view($this->page);
 	}

 	function add()
 	{
 		// id first_name last_name username password email_address created login_attempts email_verified account_active
		if(!empty($_POST)){
		 	$this->page->data['ajax'] = array('error' => '0', 'location'=>'/index.html');
 			if(true){
 				die(json_encode($this->page->data));
 			} else {
 				die(header('Location: /'));
 			}
 		}

 		$this->page->configure('page');
		$this->page->html->head->add('<title>Register | River Crossing Adventure!</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
 		
 		$this->page->data['scroller_one'] = '<p>' . $this->db->select("SELECT * FROM `user`")[0]['first_name'] . '</p>';

 		$this->page->includes->add(array('includes/header', 'includes/navigation','login','includes/footer'));
 
 		$this->load->view($this->page);

 	}
}
?>