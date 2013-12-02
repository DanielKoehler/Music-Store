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
 		$this->page->configure('page');
		$this->page->html->head->add('<title>Store | Some Store</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
		$this->page->navigation->active('store_page');

		switch (@$_GET['sort']) {
			case 'value':
				
				break;
			
			default:
				$this->page->data['ordering'] = "Newest First";
				$product_query = "SELECT * FROM `product` ORDER BY `id` DESC";
				break;
		}
 		
 		$this->page->data['products'] = $this->db->select($product_query);

 		$this->page->includes->add(array('includes/header', 'includes/navigation','store','includes/footer'));
 
 		$this->load->view($this->page);
	}

	function product()
	{

 		$this->page->data['products'] = $this->db->select("SELECT * FROM `product` ORDER BY `id` DESC");
 		
 		$this->page->configure('page');
		$this->page->html->head->add('<title>Store | Some Store</title>');
		$this->page->html->head->add('<script type="text/javascript" src="/assets/js/parallax.js"></script>');
		$this->page->navigation->active('store_page');



 		$this->page->includes->add(array('includes/header', 'includes/navigation','store','includes/footer'));
 
 		$this->load->view($this->page);
	}

 	function cart()
 	{	
 		$this->db->insert('order', $_SESSION['order']);
 	}
}
?>