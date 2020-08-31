<?php 
session_start();

class RentController{

	private $db;

	public function __construct(){
		$this->db = new DBManager();
		
	}
	public function view(){
		$cars = $this->db->getAllCars();
		require_once "view/rent.php";
	}

	public function rentCar(){

		$tos = false;
		if (isset($_POST['tos'])&& $_POST['tos'] == "on") {
			$tos = true;
		}
		$dateTimestamp1 = strtotime($_POST['startDate']); 
		$dateTimestamp2 = strtotime($_POST['endDate']); 
		  
		// Compare the timestamp date  
		if ($dateTimestamp2-$dateTimestamp1 > 604800 ){
			$_SESSION['errormsg'] = "Couldn't more than 7 Days!";
			header("location: /php_project/?controller=rent&action=view");
		}else if (!isset($_POST['rented_car'])) {
			$_SESSION['errormsg'] = "Please select a car!";
			header("location: /php_project/?controller=rent&action=view");
		}else if(!empty($_POST['rent_email'])&&!filter_var($_POST['rent_email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['errormsg'] = "Invalid email format";
			header("location: /php_project/?controller=rent&action=view"); 
		}else{
			$rentCar = array(
				"CarID" 	=> $_POST['rented_car'],
				"CustomerID" 	=> $_SESSION['user']->getCustomerID(),
				"DateStart" 	=> $_POST['startDate'],
				"DateEnd" 	=> $_POST['endDate'],
				"TpsAccepted" 	=> $tos,
				"Cancelled" 	=> 0,
				"Inspected" 	=> true,
				"Notes" 	=> $_POST['notes'],
			);
			$rental = new Rental($rentCar);
			$this->db->rent_car($rental);
			$this->db->setCarStatus($_POST['rented_car']);
			$_SESSION['successmsg'] = " Car rental successfully!";

			$this->view();
		}
		
	}

	function error(){
		require_once 'view/404.php';
	}


}


 ?>