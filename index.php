<?php

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require(ROOT . 'core/model.php');
require(ROOT . 'core/controller.php');

$param = explode('/', $_GET['p']);

$controller = (isset($param[0]) && $param[0] != "") ? $param[0] : "accueil";
$action = (isset($param[1]) && $param[1] != "") ? $param[1] : "index";

$i = file_exists('controllers/' . $controller . '.php');

if ($i == true) {
	require('controllers/' . $controller . '.php');

	$controller = new $controller();

	if (method_exists($controller, $action)) {
		if (isset($param[2]) && $param[2] != "") {
			$controller -> $action($param[2]);
		} else {
			$controller -> $action();
		}
	} else {
		include('404.php');
	}
} else {
	include('404.php');
}

?>
