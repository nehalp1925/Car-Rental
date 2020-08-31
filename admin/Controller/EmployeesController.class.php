<?php
//session_start();

class EmployeesController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$employees = $this->db->getAllEmployees();
		require_once 'View/employees.php';

	}

	function editEmployee(){
		unset($_POST['editEmployee']); //remove non related bean property
		$employee = new Employee($_POST);
		$this->db->editEmployee($employee);

		$_SESSION['msg'] = $employee->getUsername() .  " was edited successfully!";
		$this->view();
		//header("location: index.php");
	}

	function banEmployee(){
		if($this->db->banEmployee($_GET['BUserID']))
			$_SESSION['msg'] = "Employee ID " . $_GET['BUserID'] . " was banned successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see again!";

		$this->view();
	}

	function deleteEmployee(){
		$result = $this->db->deleteEmployee($_GET['DUserID']);


		if($result)
			$_SESSION['msg'] = "Employee ID " . $_GET['DUserID'] . " was deleted successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see Again!";

		$this->view();
	}

	function error(){
		require_once 'View/404.php';
	}

	function singleEmployee(){
		if(isset($_POST['id'])){
			$emp = $this->db->getSingleEmployee($_POST['id']);
			exit(json_encode($emp->toArray()));
		}
	}



	/*validate form for employee*/


	function registerEmployee(){
		$emp = $this->db->getEmployeeByUsername($_POST['Username']);

		$empe = $this->db->getEmployeeByEmail($_POST['Email']);
		


		if(!empty($_POST['Username']) && !empty($emp)){
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
		}else if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['errormsg'] = "Invalid email format";
			$this->view(); 
		}else if(empty($_POST['Email'])){
			$_SESSION['errormsg'] = " Please Enter Email.";
			$this->view();
		}else if(!empty($_POST['Email']) && !empty($empe)){
			$_SESSION['errormsg'] = $_POST['Email']." Exist Already!";
			$this->view();
		}else if(isset($_POST['addemp'])){
			unset($_POST['addemp']); //remove non related bean property
			$employee = new Employee($_POST);
			$this->db->addEmployee($employee);

			$_SESSION['successmsg'] = $employee->getUsername() . " was added successfully!";
			$this->view();
		}
	}


}

