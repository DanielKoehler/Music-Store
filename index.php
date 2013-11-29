<?php
session_start();
date_default_timezone_set('UTC');

$models = array('page', 'database', 'load', 'site');

$ext = '.php';
$path = realpath('./').'/application/model/';

foreach ($models as $model) {
	require_once($path.$model.$ext);
}

$path = realpath('./').'/application/controller/';
$error = false;
$controller = 'index';
$method = 'index';
$id =  null;

if(!empty($_GET['c'])){
	$controller = $_GET['c'];
	if(!empty($_GET['m'])){
		$method = str_replace('-', '_', $_GET['m']);
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
		}
	}
}

if(file_exists($path.$controller.$ext)){
	require_once($path.$controller.$ext);
	if(class_exists($controller)){
		$class = new $controller;
		if(method_exists($class,$method)){
				$class->$method($id);
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
} else {
	$error = true;
}

if($error === true){
	echo '<h1>404 Error: Page not found.</h1><p>Reason: Unknown (This is not actually true, the controller method pair doesn\'t exist...).</p>';
	// header('Location:/404.html');
}
