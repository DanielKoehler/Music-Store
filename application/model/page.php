<?php
class page {
	var $navigation;
	var $includes;
	var $html;
	# Page elements
	var $data; 

	function __construct(){
		// Protect against SQL and PHP Injection as soon. 
		$_POST = $this->clean($_POST);
		$_GET = $this->clean($_GET);

		// Instantiate Classes.
		$this->db = new database();
		$this->html = new html();
		$this->includes = new includes();
		$this->navigation = new navigation();
		$this->page->data['ajax'] = array('error' => false, 'message' => array('type' => '', 'content' => ''), 'location' => array('state' => 'stay', 'mode' => 'partial', 'address' => ''));
	}

	function clean($data){
		#SQL injection protection, oh and PHP injection protection.
		if(is_array($data)){
			foreach ($data as $key => $value) {
				$value = $this->clean($value);
			}
			return $data;
		} else {
			return  mysql_real_escape_string(stripslashes($data));
		}
	}

	function configure($template)
	{
		switch ($template) {
			case 'page':

				// Fetch Notifcations
				$this->data['notifications'][0] = array();
				
				$this->navigation->add('home_page', 'left', 'Home', './index.php');
				$this->navigation->add('store_page', 'left', 'Store', 'index.php?c=store&amp;m=view');
				$this->navigation->add('about_page','left', 'About', './index.php?c=index&amp;m=about');

				if(!empty($_SESSION)){
					switch ($_SESSION['authorisation']) {
						case 5: // Normal User
							break;
						case 1: // Admin 
							$this->navigation->add('control_panel_page','left', 'Control Panel', './index.php?c=admin&amp;m=index');
							break;
					}
					$this->navigation->add('profile_page', 'right', $_SESSION['username'], './index.php?c=user&amp;m=login');
					$this->navigation->add_child('profile_page','Notifications', './index.php?c=user&amp;m=notification', null, null, null, null, count($this->data['notifications']));	
					$this->navigation->add_child('profile_page','Logout', './index.php?c=user&amp;m=logout');	
				} else {
					$this->navigation->add('login_page', 'right', 'Login', './index.php?c=user&amp;m=login');
				}

				$this->navigation->add('search_bar', 'right', '<i class="fa fa-search"></i>','./index.php?c=store&amp;m=search', '<form action="./index.php?c=store&amp;m=search" method="get"><input type="text" id="navbar-search" placeholder="Search the store" autocomplete="off" name="search"></form><div id="intellitype"></div>', 'search-button', '');

			

						// $this->navigation->add_child('login_page','or Register?', '/user/register.html');
				
				$this->navigation->add('shopping_cart', 'right', '<i class="fa fa-shopping-cart"></i><span class="cart-items">2</span>', '/basket/view.html', 
					'<ul>Cart Content...</ul>', 
					'cart', 'cart');

		
				$this->html->head->add('<meta charset="utf-8">');
				$this->html->head->add('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
				$this->html->head->add('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
				$this->html->head->add('<meta name="description" content="River Crossing Adventure! Store">');
				$this->html->head->add('<meta name="author" content="Daniel Koehler">');
				$this->html->head->add('<script type="text/javascript" src="./assets/js/global.js"></script>');
				$this->html->head->add('<script type="text/javascript" src="./assets/js/dkInterface.js"></script>');
				$this->html->head->add('<link href="./assets/css/dkInterface.css" rel="stylesheet" type="text/css">');
				$this->html->head->add('<link href="./assets/css/style.css" rel="stylesheet" type="text/css">');
	
				// Include THIRD PARTY style sheets, two fontface inport from Google Fonts and one from FontAwesome.
				$this->html->head->add("<!-- Third Party CSS include for Open Sans Font. -->\n<link href=\"http://fonts.googleapis.com/css?family=Open+Sans:300,400,800\" rel=\"stylesheet\" type=\"text/css\">");
				$this->html->head->add("<!-- Third Party CSS include for Open Sans Font. -->\n<link href='http://fonts.googleapis.com/css?family=Monsieur+La+Doulaise' rel='stylesheet' type='text/css'>");
				$this->html->head->add("<!-- Third Party CSS include for Open Sans Font. -->\n<link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>");
				$this->html->head->add("<!-- Third Party CSS include for Font Awesome, I\'m using this for vector Glyph Icons. --><link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css\" rel=\"stylesheet\">");

				break;
			
			default:
				$this->html->head->add('<meta charset="utf-8">');
				$this->html->head->add('<meta name="author" content="Daniel Koehler">');
				break;
		}
	}
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
		if(is_array($include)){
			foreach ($include as $file) {
				$this->add($file);
			}
		} else {
			$this->data[$include] = $include;
		}
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

class navigation {

	var $data;

	function __construct ()
	{
		$this->data = array();
	}

	function add($handle, $side, $anchor, $href = '#', $content = "", $li_class = "", $class = "ajax-handled-anchor no-navigation",$children = 0, $unread = 0,  $nav_object = 1)
	{
		$this->data[$handle] = array(
			'nav_object' => $nav_object, 
			'href' => $href,
			'class' => $class,
			'anchor' => $anchor,
			'content' => $content,
			'unread' => $unread,
			'side' => $side,
			'children' => $children,
			'li_class' => $li_class
			);
	}

	function add_child($parent, $anchor, $href = '#', $content = "", $li_class = "", $class = "ajax-handled-anchor no-navigation",$children = 0, $unread = 0,  $nav_object = 1)
	{
		if(empty($this->data[$parent]['children'])){
			$this->data[$parent]['children'] = array();
		}
		$this->data[$parent]['children'][] = array(
			'nav_object' => $nav_object, 
			'href' => $href,
			'class' => $class,
			'anchor' => $anchor,
			'content' => $content,
			'unread' => $unread,
			'children' => $children,
			'li_class' => $li_class
			);
	}

	function create($handle, $side, $anchor, $href = '#', $li_class = "", $content = "",  $class = "ajax-handled-anchor no-navigation", $children = 0, $unread = 0,  $nav_object = 1)
	{
		return array(
			'nav_object' => $nav_object, 
			'href' => $href,
			'class' => $class,
			'anchor' => $anchor,
			'content' => $content,
			'unread' => $unread,
			'side' => $side,
			'children' => $children,
			'li_class' => $li_class
			);
	}

	function flush ()
	{
		$this->data = array();
	}

	function remove($handle)
	{	
		if(isset($this->data[$handle])){
			unset($this->data[$handle]);
			return true;
		}
		return false;
	}

	function active($handle)
	{	
		if(isset($this->data[$handle])){
			if(!empty($this->data[$handle]['li_class'])) 
				$this->data[$handle]['li_class'] .= " active";
			else
				$this->data[$handle]['li_class'] = "active";
			return true;
		}
		return false;
	}

	function indent($n){
		return str_repeat('\t', $n);
	}
	
	function render($side)
	{
		$output = "";

		// print_r($this->data);

		if(!empty($this->data)){
			foreach ($this->data as $block_handle => $block) {
				if(!empty($block['nav_object'])){
					if($block['side'] == $side){
						$output .= $this->block($block, $block_handle);
					}
				}
			}
		}

		return '<ul class="navigation-bar ' . $side . '">' . $output . '</ul>';
	}

	private function block($block, $block_handle = null){
		
		$content = "<a";

		if(!empty($block['href'])){
			$content .= ' href="' . $block['href'] . '"';
		}
		
		if(!empty($block['class'])){
			$content .= ' class="' . $block['class'] . '"';
		}

		if(!empty($block_handle)){
			$content .= ' id="' . $block_handle . '"';
		}

		$content .= ">";

		if(!empty($block['anchor'])){
			$content .= $block['anchor'];
		}

		if($block['unread']){
			$content .= '<span class="navigation-unread">' . $block['unread'] . '</span>';
		}

		$content .= "</a>";


		if(!empty($block['children'])){
			$content .= "<ul>";
			foreach ($block['children'] as $child) {
				$content .= $this->block($child);
			}

			$content .= "</ul>\n";
		}

		return "<li" . (!empty($block['li_class']) ? ' class="' . $block['li_class'] . '"' :  null) . ">" . $content . $block['content'] . "</li>\n\n";  
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
}
