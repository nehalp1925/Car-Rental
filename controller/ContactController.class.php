<?php 

class ContactController{

	public function __construct(){
		$this->db = new DBManager();
		require_once "view/contact.php";
	}
	function error(){
		require_once 'view/404.php';
	}


}


 ?>