<?php
class load{
	var $page;
	function place($data, $pre = 0)
	{
		if($data != Null && !empty($data)){
			if(is_array($data)){
				if (!empty($data[0]) && is_array($data[0]) && $pre == 0){
					foreach ($data as $key => $value) {
						$this->place($value);
					}
					return true;
				} else {
					if($pre == true){
						echo "<pre>"; 
						print_r($data);
						echo "</pre>";
						return true;
					} else {
						foreach ($data as $key => $value) {
							$this->place($value);
						}
					}
					return true;
				}	
			}
			echo $data;
		}
	}


	function view($page){
		$this->page = $page;
		$path = realpath('./').'/application/view/';
		$ext = '.php';

		if(!empty($_GET['ajax']) && $_GET['ajax'] == true){
			die(json_encode($this->page->data));
		}
		
		if(is_array($this->page->data) && !empty($this->page->data)){
			extract($this->page->data);
		}

		if(!empty($this->page->includes->data )){
			foreach ($this->page->includes->data as $file_path) {
				if(file_exists($path.$file_path.$ext)){
					require_once($path.$file_path.$ext);
				}
			}
		}
	}
}