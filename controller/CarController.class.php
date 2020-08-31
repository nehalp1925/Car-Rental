<?php 
session_start();

class CarController{

	private $db;

	public function __construct(){
		$this->db = new DBManager();
		// $cars = $this->db->getAllCars();
		
	}
	public function view(){
		$cars = $this->db->getAllCars();
		require_once "view/cars.php";
	}

	function singleCar(){
		if(  isset($_POST['id'])   ){
			$car = $this->db->getCarbyID($_POST['id']);
			//$carArr = $car->toArray();
			//var_dump($carArr);
			/*
			var_dump( json_encode($carArr,  JSON_UNESCAPED_UNICODE) ) ;*/
			exit(json_encode($car->toArray()));
		}
	}

	function searchCar(){
		$car = $this->db->getCarbySearch($_POST['car_type'], $_POST['car_brand']);
		
		if($car){
			$_SESSION['car'] = $car; 
			// header("location: /php_project/?controller=car&action=");
			$this->view();
		}else{
			$_SESSION['errormsg'] = " No such car in system!";
			// header("location: /php_project/?controller=car&action=");
			$this->view();
		}
	}
	
	function error(){
		require_once 'view/404.php';
	}


}


 ?>