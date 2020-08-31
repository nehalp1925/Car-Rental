<?php
session_start();
class LoginController{
	
	public function __construct(){
		$this->db = new DBManager();
		require_once "view/index.php";
	}

	public function login(){
		
		unset($_POST['login']);
		$userinfo = $this->db->verify_login($_POST);

		if (!empty($userinfo)){
			$valid = $userinfo->getValid();
			if($valid == 1){
				$_SESSION['user'] = $userinfo;
				header("location: /php_project/?controller=dashboard&action=view");
			}else{
				$_SESSION['errormsg'] = "Please valid your account";
				header("location: /php_project/");
			}
		}else{
			$_SESSION['errormsg'] = "Username/Password don't match!";
			header("location: /php_project/");
		}
	}
	function logout(){
		unset($_SESSION['user']);
		unset($_SESSION['successmsg']); 
   		unset($_SESSION['errormsg']);
		header("location: /php_project/");
	} 
	
	function error(){
		require_once 'view/404.php';
	}
}

 ?>