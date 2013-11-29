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
		$suggestions = array('hampster',
		'rabbit',
		'cat',
		'dog',
		'gerbal',
		'mouse',
		'rat',
		'ferret',
		'turtle',
		'snake',
		'lissard',
		'fish',
		'hampster',
		'rabbit',
		'cat',
		'dog',
		'hampster',
		'rabbit',
		'cat',
		'dog',
		'gerbal',
		'mouse',
		'rat',
		'gerbil',
		'mouse',
		'rat',
		'bird',
		'frog',
		'tortise',
		'terrapin',
		'ant',
		'worm',
		'chamelon',
		'mice',
		'chinchilla',
		'horse');

		$input = preg_quote($_POST['query'], '~'); // don't forget to quote input string!
		$result = preg_grep('~' . $input . '~', $suggestions);
		die(json_encode($result));
 		
 	}
}
?>