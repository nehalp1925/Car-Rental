<?php
class CustomerController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$customer = $this->db->getAllCustomer();
		require_once 'View/customer.php';
	}

	function editCustomer(){
		unset($_POST['editCustomer']); //remove non related bean property
		$customers = new Customer($_POST);
		$this->db->editCustomer($customers);

		$_SESSION['msg'] = $customers->getUsername() .  " was edited successfully!";
		$this->view();
		/*var_dump($_POST);
		die();*/
		//header("location: index.php");
	}

	function banCustomer(){
		if($this->db->banCustomer($_GET['BCustomerID']))
			$_SESSION['msg'] = "Customer ID " . $_GET['BCustomerID'] . " was banned successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see again!";

		$this->view();
	}

	function deleteCustomer(){
		$result = $this->db->deleteCustomer($_GET['DCustomerID']);


		if($result)
			$_SESSION['msg'] = "Customer ID " . $_GET['DCustomerID'] . " was deleted successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see Again!";

		$this->view();
	}

	function error(){
		require_once 'View/404.php';
	}

	function singleCustomer(){
		if(isset($_POST['id'])){
			$cust = $this->db->getSingleCustomer($_POST['id']);
			exit(json_encode($cust->toArray()));
		}
	}

	/*validate form for customer*/


	function registerCustomer(){
		$cus = $this->db->getCustomerByUsername($_POST['Username']);

		$cuse = $this->db->getCustomerByEmail($_POST['Email']);



		if(!empty($_POST['Username']) && !empty($cus)){
			$_SESSION['errormsg'] = $_POST['Username'] ." Exist Already!";
			$this->view();
		}else if(empty($_POST['Username'])){
			$_SESSION['errormsg'] = " Please Enter Username.";
			$this->view();
		}else if(empty($_POST['Password']) && ($_POST['Password'])){
			$_SESSION['errormsg'] = "Please Enter your Password!";
			$this->view();
		}else if(empty($_POST['Password'])){
			$_SESSION['errormsg'] = " Please Enter Password.";
			$this->view();
		}else if(empty($_POST['Fullname'])){
			$_SESSION['errormsg'] = " Please Enter Fullname.";
			$this->view();
		}else if(empty($_POST['DateOfBirth'])){
			$_SESSION['errormsg'] = " Please Enter Date Of Birth.";
			$this->view();
		}else if(empty($_POST['Phone'])){
			$_SESSION['errormsg'] = " Please Enter Phone Number.";
			$this->view();
		}else if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['errormsg'] = "Invalid email format";
			$this->view(); 
		}else if(empty($_POST['Email'])){
			$_SESSION['errormsg'] = " Please Enter Email.";
			$this->view();
		}else if(!empty($_POST['Email']) && !empty($cuse)){
			$_SESSION['errormsg'] = $_POST['Email']." Exist Already!";
			$this->view();
		}else if(empty($_POST['Address'])){
			$_SESSION['errormsg'] = " Please Enter Address.";
			$this->view();
		}else if(empty($_POST['DriverNo'])){
			$_SESSION['errormsg'] = " Please Enter DriverNo.";
			$this->view();
		}else if(empty($_POST['CreditCardNo'])){
			$_SESSION['errormsg'] = " Please Enter CreditCardNo.";
			$this->view();
		}else if(isset($_POST['addcustomer'])){
			unset($_POST['addcustomer']); //remove non related bean property
			$customer = new Customer($_POST);
			$this->db->addCustomer($customer);
			//var_dump($_POST);
			$_SESSION['msg'] = $customer->getUsername() . " was added successfully!";
			$this->view();
		}
	}

}

