<?php
	$controller = "login";
	$action 	= "view";

	if(isset($_GET['controller']) && isset($_GET['action'])){
		$controller = $_GET['controller'];
		$action 	= $_GET['action'];
	}

	if(isset($_GET['core']))
		require_once 'core.php';
	else
		require_once 'View/layout.php';

?>