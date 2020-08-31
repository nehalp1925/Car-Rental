<?php
class AdmindashboardController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$car = $this->db->getAllCar();
		$stats = $this->db->getDashboardStats();
		require_once 'View/admindashboard.php';
	}
	function error(){
		require_once 'View/404.php';
	}

	function totalcar(){
		$total = $this->db->countcar();
		$this->view();
	}
}