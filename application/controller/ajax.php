<?php
class ajax {
	var $page;
	var $db;
	var $load;

	function __construct()
	{
		$this->page = new page();
		$this->load = new load();
		$this->db = new database();
	}

	function validate_registation_form()
	{
		// if(!empty($_POST)){
				
		// }

		die(json_encode(array('ajaxModel' => True, 'error' => '1', 'message' => array('type' => 'error', 'content' => '<div>'))));
	}

	function add()
	{

	}

	function search_suggestion()
	{
		$suggestions = array();
		$products = $this->db->select("SELECT `name` FROM `product` WHERE `name` LIKE :query", array('query'=> '%'.$_POST['query'].'%'));

		foreach ($products as $product) {
			$pos = strpos(strtolower($product['name']), ' ' . strtolower($_POST['query']));
			if($pos){
				$suggestions[] = substr($product['name'], $pos);
			} else {
				$suggestions[] = $product['name'];
			}
		}
		
		die(json_encode(array_splice($suggestions, 0,6)));
		
	}
}
?>