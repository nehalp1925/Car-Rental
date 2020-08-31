<?php
class CustomerreportController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$customer = $this->db->getAllCustomer();
		$stats = $this->db->getcustomerreortStats();
		
		require_once 'View/customerreport.php';
	}
	function error(){
		require_once 'View/404.php';
	}


}