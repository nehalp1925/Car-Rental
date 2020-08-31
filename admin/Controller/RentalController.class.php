 <?php
 class RentalController{
 	private $db;

 	function __construct(){
 		$this->db = new DBManager();
 	}

 	function view(){
 		$rental = $this->db->getAllRental();
 		$allCustomers = $this->db->getAllCustomer();
 		$allcars =$this->db->getAllCar();

 		require_once 'View/rental.php';

 	}
	/*function registerRental(){
		if(isset($_POST['addrental'])){
			unset($_POST['addrental']); //remove non related bean property
			$rental = new Rental($_POST);
			$this->db->addRental($rental);

			$_SESSION['msg'] = $rental->getRentalID() . " was added successfully!";
			$this->view();
		}
	}*/



	function registerRental(){
		//$emp = $this->db->getEmployeeByUsername($_POST['Username']);

		


		if(empty($_POST['CarID'])){
			$_SESSION['errormsg'] = " Please Enter CarID.";
			$this->view();
		}else if(empty($_POST['CustomerID'])){
			$_SESSION['errormsg'] = " Please Enter CustomerID.";
			$this->view();
		}else if(empty($_POST['DateStart'])){
			$_SESSION['errormsg'] = " Please Enter DateStart.";
			$this->view();
		}else if(empty($_POST['DateEnd'])){
			$_SESSION['errormsg'] = " Please Enter DateEnd.";
			$this->view();
		}else if(empty($_POST['TosAccepted'])){
			$_SESSION['errormsg'] = " Please Enter TosAccepted.";
			$this->view();
		}else if(empty($_POST['Cancelled'])){
			$_SESSION['errormsg'] = " Please Enter Cancelled.";
			$this->view();
		}else if(empty($_POST['Inspected'])){
			$_SESSION['errormsg'] = " Please Enter Inspected.";
			$this->view();
		}else if(empty($_POST['Notes'])){
			$_SESSION['errormsg'] = " Please Enter Notes.";
			$this->view();
		}else if(isset($_POST['addrental'])){
			unset($_POST['addrental']); //remove non related bean property
			$rental = new Rental($_POST);
			$this->db->addRental($rental);

			$_SESSION['msg'] = $rental->getRentalID() . " was added successfully!";
			$this->view();
			
		}
	}



	function editRental(){
		unset($_POST['editRental']); //remove non related bean property
		$rental = new Rental($_POST);
		$this->db->editRental($rental);

		$_SESSION['msg'] = $rental->getRentalID() .  " was edited successfully!";
		$this->view();
		//header("location: index.php");
	}

	

	function deleteRental(){
		$result = $this->db->deleteRental($_GET['DRentalID']);


		if($result)
			$_SESSION['msg'] = "Rental ID " . $_GET['DRentalID'] . " was deleted successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see Again!";

		$this->view();
	}

	function error(){
		require_once 'View/404.php';
	}

	function singleRental(){
		if(isset($_POST['id'])){
			$rent = $this->db->getsingleRental($_POST['id']);
			exit(json_encode($rent->toArray()));
		}
	}


}

