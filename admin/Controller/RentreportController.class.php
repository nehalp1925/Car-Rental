<?php
class RentreportController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$rental = $this->db->getAllRental();
		$stats = $this->db->getrentreortStats();
		
		require_once 'View/rentreport.php';
	}
	function error(){
		require_once 'View/404.php';
	}

	
}