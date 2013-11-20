<?php
class page {
	var $navigation;
	var $includes;
	var $html;
	# Page elements
	var $data; 
	var $navigation_links;
	# Dynamic paths
	var $js_path;

	function __construct(){
		$this->db = new database();
		$this->script = array();
		$this->scripts = "";
		$this->html = new html();
		$this->heads = "";
		$this->js_path = "/assets/js/";
		$this->navigation = new navigation();
		$this->includes = new includes();
	}

	function clean($data){
		#SQL injection protection, oh and PHP injection protection.
		if(is_array($data)){
			foreach ($data as $key => $value) {
				$value = $this->clean($value);
			}
			return $data;
		} else {
			return  mysql_real_escape_string(stripcslashes($data));
		}
	}

	function standard(){
		# Add standard links, meta, scripts etc.

	} 

	// Filename (First Param) for external links should should be relative to the /js/ dir.

	function add_script($script, $type = "external",$handle = 0, $standard = 1){
		switch ($type) 
		{
			case 'embedded':
				if ($handle) {
					$this->script[$handle][] = "<script type=\"text/javascript\">\n". $script ."\n</script>\n";
				} else {
					$this->scripts .= "<script type=\"text/javascript\">\n". $script ."\n</script>";
				}
				break;
			case 'external':

				if($standard && !file_exists(realpath('./') . $this->js_path . $script)){
					die("SymanticError: Script: " . $this->js_path . $script . " not found.");
				}
				if ($handle && $standard == 1) {
					$this->script[$handle][] = "<script type=\"text/javascript\" src=\"." . $this->js_path . $script . "\"></script>\n";
				} elseif ($handle && $standard == 0) {
					$this->script[$handle][] = "<script type=\"text/javascript\" src=\"" . $script . "\"></script>\n";
				} else {
					$this->scripts .= "<script type=\"text/javascript\" src=\"" . $script . "\"></script>\n";
				}
				break;
		}
	} 
}

class navigation {
	var $links;

	function __construct(){
		$this->links = array();
	}
	// Navigation Functions
	function add($links = array()){
		foreach ($links as $link) {
			$this->links[$link[0]] = array("name"=>$link[1], "href"=>$link[2],"class" =>(!empty($link[3]) ? $link[3] : 'nav link'));
		}
	}

	function remove_link($handle){
		unset($this->links[$handle]);
	}

	function activate_link($handle){
		$this->links[$handle]['class'] = "active";
	}	

	function render(){
		$navigation = array();
		foreach ($this->links as $link) {
			$navigation[] = '<li class="' . (!empty($link['class']) ? $link['class'] : Null ). '"><a href="' . (!empty($link['href']) ? $link['href'] : Null ). '">' . (!empty($link['name']) ? $link['name'] : Null ). '</a></li>';
		}
		return $navigation;
	}
	// END Navigation Functions
}
class includes {
	var $data;
	function __construct ()
	{
		$this->data = array();
	}

	function flush ()
	{
		$this->data = array();
	}

	function add($include)
	{
		$this->data[$include] = $include;
	}

	function remove($include)
	{	
		// Default to -1
		if(!empty($include)){
			unset($this->data[$include]);
		} else {
			unset($this->data[count($this->data) - 1]);
		}
		
	}
}

class html {
	var $head;
	function __construct()
	{
		$this->head = new head();
	}
}

class head {
	var $data;
	function add($head)
	{
		$this->data[] = $head;
	}

	function render()
	{
		$heads = "";
		foreach ($this->data as $head) {
			$heads .= $head . "\n";
		} 
		return $heads;
	}

	function configure($template)
	{
		switch ($template) {
			case 'page':
				$this->add('<meta charset="utf-8">');
				$this->add('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
				$this->add('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
				$this->add('<meta name="description" content="My bootstrap and custom MVC site.">');
				$this->add('<meta name="author" content="Daniel Koehler">');
				break;
			
			default:
				$this->add('<meta charset="utf-8">');
				$this->add('<meta name="author" content="Daniel Koehler">');
				break;
		}
	}
}
