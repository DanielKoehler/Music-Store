<?php
class user {
	var $page;
	var $db;
	var $load;
	var $site;

	function __construct()
	{
		$this->page = new page();
		$this->load = new load();
		$this->db = new database();
		$this->site = new site();
	}

 	function login()
 	{
		if(!empty($_POST)){

			$form = $_POST['userlogin'];

		 	$password = sha1($form['password'] . $this->site->settings['salt_key']);
		 	$username = $form['username'];

		 	if(empty($form['password']) or empty($form['username'])){
	 			
	 			$this->page->data['ajax'] = array('error' => true, 'message' => 'Invalid Form Data', 'location' => array('state' => 'stay', 'mode' => '', 'address' => ''));
		 		$this->exit_script($this->page->data, './index.php?c=user&m=login');

		 	}

		 	$user = $this->db->select("SELECT * FROM `user` WHERE (`username` = :username AND `password` = :password)  OR (`email_address` = :email_address AND `password` = :password)", array('password' => $password, 'username' => $username, 'password' => $password, 'email_address' => $username));

		 	if(count($user) !== 1){

		 		$this->page->data['ajax'] = array('error' => true, 'message' => array('type' => 'error', 'content' => 'Invalid Username or Password'), 'location' => 'stay');
		 		$this->exit_script($this->page->data, './index.php?c=user&m=login');
		 	
		 	}

		 	$user = $user[0];

		 	$_SESSION['id'] = $user['id'];
		 	$_SESSION['username'] = $user['username'];
		 	$_SESSION['authorisation'] = $user['authorisation'];

		 	switch ($_SESSION['authorisation']) {
		 		case 5:
		 			$redirect = './index.php?c=user&m=index';
		 			break;
		 		case 1:
		 			$redirect = './index.php?c=admin&m=index';
		 			break;
		 		default:
		 			$redirect = './index.php?c=user&m=index';
		 			break;
		 	}

		 	$this->exit_script(array('error' => false, 'message' => array('type' => 'success', 'content' => trim(sprintf("Welcome %s %s", $user['first_name'], $user['last_name']))), 'location' => array('address' => $redirect, 'state' => 'move', 'mode' => 'full')), $redirect);
 		
 		}

 		$this->page->configure('page');
		$this->page->html->head->add('<title>Login | River Crossing Adventure!</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
		$this->page->navigation->active('login_page');
 		
 		$this->page->data['scroller_one'] = '<p>' . $this->db->select("SELECT * FROM `user`")[0]['first_name'] . '</p>';

 		$this->page->includes->add(array('includes/header', 'includes/navigation','login','includes/footer'));
 
 		$this->load->view($this->page);
 	}

 	function logout()
 	{
 		session_destroy();
 		$redirect = './index.php?c=user&m=login';
 		$this->exit_script(array('error' => false, 'message' => array('type' => 'success', 'content' => 'You are now logged out.', 'location' => array('address' => $redirect, 'state' => 'move', 'mode' => 'full'))), $redirect);
 	}

 	function add()
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
		$this->page->html->head->add('<title>Register | River Crossing Adventure!</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
 		
 		$this->page->data['scroller_one'] = '<p>' . $this->db->select("SELECT * FROM `user`")[0]['first_name'] . '</p>';

 		$this->page->includes->add(array('includes/header', 'includes/navigation','register','includes/footer'));
 
 		$this->load->view($this->page);
 	}

	function exit_script($data, $url = "./index.php?c=index&m=index", $ajax_overide = false)
	{
		if($_POST['ajax'] == true or $ajax_overide == true){
			die(json_encode($data));
		} else {
			die(header('Location: ' . $url));
		}
	}
}
?>