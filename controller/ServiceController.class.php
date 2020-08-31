<?php 

class ServiceController{

	public function __construct(){
		$this->db = new DBManager();
		require_once "view/service.php";
	}
	function error(){
		require_once 'view/404.php';
	}


}


 ?>