<?php 

/**
 * 
 */
session_start();
class ResetController{

	private $db;

	public function __construct(){
		$this->db = new DBManager();
		if (isset($_GET['user_forget'])) {
			$_SESSION['forgetuser'] = Functions::decrypt($_GET['user_forget']);
		}
		
		require_once "view/reset_password.php";
	}


	function reset(){

		if(!empty($_POST['newpassword']) && ($_POST['newConpassword'] != $_POST['newConpassword'])){
			$_SESSION['errormsg'] = " Confirm Password doesn't match!";
			header("location: /php_project/?controller=reset&action=");
			
		}else{

			$this->db->reset_password($_SESSION['forgetuser'], $_POST['newpassword']);

			$_SESSION['successmsg'] = "Your new password already set, please login to continuer!";
			header("location: /php_project/");

		}
	}
	function error(){
		require_once 'view/404.php';
	}
}

 ?>