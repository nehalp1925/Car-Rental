<?php
session_start();
class RegisterController{
	private $db;
	public function __construct(){
		$this->db = new DBManager();
		require_once "view/register.php";
	}

	function register(){
		$user = $this->db->getUserByUsername($_POST['r_username']);

		$usere = $this->db->getUserByEmail($_POST['r_email']);
		$credit_card = Functions::validatecard($_POST['credit_card']);
/*
		$regex = "^(?<intro>[A-Z]{2})(?<numeric>\d{2})(?<year>\d{4})(?<tail>\d{7})$";

		$result = preg_match($regex, $_POST["driverNo"]);*/


		if(!empty($_POST['r_username']) && !empty($user)){
			$_SESSION['errormsg'] = $_POST['r_username'] ." Exist Already!";
			header("location: /php_project/?controller=register&action=");
		}else if(!empty($_POST['r_password']) && ($_POST['r_password'] != $_POST['confirm_password'])){
			$_SESSION['errormsg'] = " Confirm Password doesn't match!";
			header("location: /php_project/?controller=register&action=");
		}else if (!filter_var($_POST['r_email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['errormsg'] = "Invalid email format";
			header("location: /php_project/?controller=register&action="); 
		}else if(!empty($_POST['r_email']) && !empty($usere)){
			$_SESSION['errormsg'] = $_POST['r_email']." Exist Already!";
			header("location: /php_project/?controller=register&action=");
		}else if(!$credit_card){
			$_SESSION['errormsg'] = "Invalid credit card number format";
			header("location: /php_project/?controller=register&action=");
		}else{
			$newCustomer = array(
				"Username" 	=> $_POST['r_username'],
				"Password" 	=> md5($_POST['r_password']),
				"Fullname" 	=> $_POST['first_name']." ".$_POST['last_name'],
				"DateOfBirth" 	=> $_POST['dob'],
				"Phone" 	=> $_POST['phone'],
				"Email" 	=> $_POST['r_email'],
				"Address" 	=> $_POST['address'],
				"DriveNo" 	=> $_POST['driverNo'],
				"CreditCardNo" 	=> $_POST['credit_card']
			);

			$customer = new Customer($newCustomer);
			$this->db->add_Customer($customer);

			$_SESSION['successmsg'] = $_POST['r_username'] . " was registered successfully! Please check your email to validate your account";

			Functions::sendEmail($_POST['r_email'], $_POST['r_username'], "register");
			header("location: /php_project/");
		}
	}

	function validation(){
		$username = Functions::decrypt($_GET['user_rg']);

		$user = $this->db->getUserByUsername($username);

		if (!empty($user)) {
			$this->db->activateCustomer($username);
			$_SESSION['successmsg'] = $username . " was validated successfully! Please login your account";
			header("location: /php_project/");
		}else{
			$_SESSION['errormsg'] = $username . "fail to validate";
			header("location: /php_project/");
		}
	}

	function error(){
		require_once 'view/404.php';
	}
}

 ?>