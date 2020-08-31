<?php

// session_start();
require_once "controller/CarController.class.php";

class DashboardController{

	private $db;

	public function view(){
		$this->db = new DBManager();
		$cars = $this->db->getAllCars();
		require_once "view/dashboard.php";
	}


	public function searchCar(){
		$this->db = new DBManager();
		$car = $this->db->getCarbyType($_POST['cartype']);
		
		if(!empty($car)){
			$_SESSION['car'] = $car; 
			/*$con = new CarController();
			$con->view();*/
			// require_once "view/cars.php";
			header("location: /php_project/?controller=car&action=view");
		}else{
			$_SESSION['errormsg'] = " No such car in system!";
			header("location: /php_project/?controller=car&action=");
/*			$con = new CarController();
			$con->view();*/
		}

	}
	function error(){
		require_once 'view/404.php';
	}


}


 ?>