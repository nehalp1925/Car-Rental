<?php
class LoginController{

	public function __construct(){
		$this->db = new DBManager();
	}

	public function view(){
		require_once 'View/login.php';
	}

	public function login(){

		unset($_POST['login']);
		$userinfo = $this->db->verify_login($_POST);

		if (!empty($userinfo)){

			$_SESSION['employee'] = serialize($userinfo);
			header("location: /php_project/admin/?controller=admindashboard&action=view");
			// echo "<script>location = '/php_project/admin/?controller=admindashboard&action=view'</script>";

		}else{
			$_SESSION['errormsg'] = "Username/Password don't match!";
			header("location: /php_project/admin/?controller=login&action=view");
			// require_once 'View/login.php';
		}
	}
	function logout(){
		unset($_SESSION['employee']);
		unset($_SESSION['successmsg']);
   		unset($_SESSION['errormsg']);
		header("location: /php_project/admin/");
	}

	function error(){
		require_once 'View/404.php';
	}
}

 ?>