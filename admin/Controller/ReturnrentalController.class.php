<?php
class ReturnrentalController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$returnedcar = $this->db->getAllReturn();
		$rentedCars = $this->db->getAllRentedCars();
		require_once 'View/returnrental.php';
	}

	function getCarInfo(){
		die(json_encode($this->db->getSingleCar($_POST['id'])->toArray()));
	}

/*Validation form*/

	/*function registerReturn(){
		//$rr = $this->db->getReturnByReturnID($_POST['ReturnID']);



		if(empty($_POST['RentalID'])){
			$_SESSION['errormsg'] = " Please Select Rented Car.";
			$this->view();
		}else if(empty($_POST['Inspected'])){
			$_SESSION['errormsg'] = " Please Enter Inspected.";
			$this->view();
		}else if(empty($_POST['Damage'])){
			$_SESSION['errormsg'] = " Please Enter Damage.";
			$this->view();
		}else if(empty($_POST['Damage'])){
			$_SESSION['errormsg'] = " Please Enter Damage.";
			$this->view();
		}else if(empty($_POST['Notes'])){
			$_SESSION['errormsg'] = " Please Enter Notes.";
			$this->view();
		}else if(empty($_POST['GasLevel'])){
			$_SESSION['errormsg'] = " Please Enter GasLevel.";
			$this->view();
		}else if(empty($_POST['Millage'])){
			$_SESSION['errormsg'] = " Please Enter Millage.";
			$this->view();
		}else if(empty($_POST['AdditionalCharge'])){
			$_SESSION['errormsg'] = " Please Enter AdditionalCharge.";
			$this->view();
		}else if(isset($_POST['returncar'])){
			$inspect=0;
			$damage=0;
			 if (isset($_POST['Inspected']) && $_POST['Inspected'] == "Yes") {
				$inspect=1;
			}
			 if (isset($_POST['Damage']) && $_POST['Damage'] == "Yes") {
				$damage=1;
			}
			$rentalID = $this->db->getRentalID($_POST['carID']);

			$result  = array(

				"RentalID"			=> $rentalID['RentalID'],
				"ReturnDate"		=> $_POST['ReturnDate'],
				"Inspected"			=> $inspect,
				"Damage"			=> $damage,
				"Notes"				=> $_POST['notes'],
				"GasLevel"			=> $_POST['gaslevel'],
				"Millage"			=> $_POST['millage'],
				"AdditionalCharge"	=> $_POST['addCharges'] );

			$returnD = new Returnrental($result);
			$this->db->addReturn($returnD);
			$this->db->updateCarstatus($_POST['carID']);


			$_SESSION['msg'] = $returnD->getReturnID() . " was added successfully!";
			$this->view();
		}
	}*/



	function registerReturn(){
		if(isset($_POST['returncar'])){
			$inspect=0;
			$damage=0;
			if (isset($_POST['Inspected'])&&$_POST['Inspected']=="Yes") {
				$inspect=1;
			}
			if (isset($_POST['Damage'])&&$_POST['Damage']=="Yes") {
				$damage=1;
			}
			$rentalID = $this->db->getRentalID($_POST['carID']);

			$result  = array(

				"RentalID"=> $rentalID['RentalID'],
				"ReturnDate"=> $_POST['ReturnDate'],
				"Inspected"=> $inspect,
				"Damage"=> $damage,
				"Notes"=> $_POST['notes'],
				"GasLevel"=> $_POST['gaslevel'],
				"Millage"=> $_POST['millage'],
				"AdditionalCharge"=> $_POST['addCharges'] );

			$returnD = new Returnrental($result);
			$this->db->addReturn($returnD);
			$this->db->updateCarstatus($_POST['carID']);


			$_SESSION['msg'] = $returnD->getReturnID() . " was added successfully!";
			$this->view();
			}
}

function editReturn(){
		unset($_POST['editReturn']); //remove non related bean property
		$returnE = new Returnrental($_POST);
		$this->db->editRenturn($returnE);

		$_SESSION['msg'] = $rental->getReturnID() .  " was edited successfully!";
		$this->view();
		//header("location: index.php");
	}

	function deleteReturn(){
		$result = $this->db->deleteReturn($_GET['DReturnID']);


		if($result)
			$_SESSION['msg'] = "Return ID " . $_GET['DReturnID'] . " was deleted successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see Again!";

		$this->view();
	}

	function singleReturn(){
		if(isset($_POST['id'])){
			$returnC = $this->db->getsingleReturn($_POST['id']);
			exit(json_encode($returnC->toArray()));
		}
	}

	function error(){
		require_once 'View/404.php';
	}
}

