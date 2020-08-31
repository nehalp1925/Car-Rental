<?php
class CarsreportController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$car = $this->db->getAllCar();
		$stats = $this->db->getcarreortStats();

		require_once 'View/carsreport.php';

	}
	function error(){
		require_once 'View/404.php';
	}

	
}