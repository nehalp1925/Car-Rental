<?php
class IndexController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		/*$employees = $this->db->getAllEmployees();
		require_once 'View/employees.php';*/
		require_once 'View/admin_dashboard.php';
	}

	function error(){
		require_once 'view/404.php';
	}
}

