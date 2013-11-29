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
					if($pre === 1){
						echo "<pre>"; 
						print_r($data);
						echo "</pre>";
						return true;
					} else {
						foreach ($data as $key => $value) {
							if($pre != false && $pre != true){
								$this->place($value, $pre); // Suffix
							} else {
								$this->place($value);
							}
						}
					}
					return true;
				}	
			}
			if($pre != false && $pre != true){
				echo $data . $pre;  // Suffix
			} else {
				echo $data;
			}
		}
	}


	function view($page){
		$this->page = $page;
		$path = realpath('./').'/application/view/';
		$ext = '.php';

		if(!empty($_POST['ajax']) && $_POST['ajax'] == true){
			die(json_encode($this->page->data));
		}
		
		if(!empty($this->page->data) && is_array($this->page->data)){
			extract($this->page->data);
		}

		if(!empty($this->page->includes->data)){
			foreach ($this->page->includes->data as $file_path) {
				if(!file_exists($path.$file_path.$ext)){
					die(header('Location: /404.html'));
				} 
				require_once($path.$file_path.$ext);
			}
		} else {
			if(!file_exists($path.$page.$ext)){
				die(header('Location: /404.html'));
			} else {
				require_once($path.$page.$ext);
			}
		}
	}
}