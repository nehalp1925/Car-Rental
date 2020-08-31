<?php 

/**
 * 
 */
session_start();
class ForgotController{

	private $db;

	public function __construct(){
		$this->db = new DBManager();
		require_once "view/forgot_password.php";
	}

	function forgot(){
		if (!filter_var($_POST['forgot_email'], FILTER_VALIDATE_EMAIL)) {
			$_SESSION['errormsg'] = "Invalid email format";
			header("location: /php_project/?controller=forgot&action="); 
		}else{
			$user = $this->db->getUserByEmail($_POST['forgot_email']);

			if (!empty($user)) {

				Functions::sendEmail($_POST['forgot_email'], $user->getUsername(), "forget");
				$_SESSION['successmsg'] = "Please check your email to continuer";
				header("location: /php_project/");
			}else{
				$_SESSION['errormsg'] = "Please make sure the email you enter is the one you register with";
				header("location: /php_project/?controller=forgot&action=");
			}

		}
	}
	function error(){
		require_once 'view/404.php';
	}

}

 ?>