<?php
$controllers = array(
	'login' => array('view','login','logout','error'),
	'admindashboard' => array('view', 'error','totalcar'),
	'index' 	=> array('view', 'error'),
	'employees' => array('view', 'registerEmployee', 'editEmployee', 'banEmployee', 'deleteEmployee', 'singleEmployee', 'error'),
	'carDetail' => array('view', 'registerCar', 'editCar', 'banCar', 'deleteCar', 'singleCar', 'error'),
	'customer' => array('view', 'registerCustomer', 'editCustomer', 'banCustomer', 'deleteCustomer','singleCustomer', 'error'),
	'rental'	=>array('view', 'registerRental', 'editRental', 'deleteRental', 'singleRental', 'error'),
	'returnrental'	=>array('view', 'registerReturn', 'editReturn', 'deleteReturn', 'singleReturn','getCarInfo', 'error'),
	'carsreport' =>array('view', 'error'),
	'rentreport' =>array('view', 'error'),
	'customerreport' =>array('view', 'error'),


	
	'404' 		=> array('404'),

);


/*validate if controller and or if action in said controller also exist*/
	if(array_key_exists($controller, $controllers)) //checks to see if the controller exists
		if(in_array($action, $controllers[$controller])) //checks to see if the action exists in the controller
		dispatch($controller,$action);
		else
			dispatch($controller,'error');
		else
			dispatch('index','error');

		
		function dispatch($controller, $action){
			//requering my models
			require_once "Model/Returnrental.class.php";
			require_once "Model/Employee.class.php";
			require_once "Model/CarDetail.class.php";
			require_once "Model/Customer.class.php";
			require_once "Model/Rental.class.php";
			require_once "Model/DBManager.class.php";
		//requering my controller
			$file = "Controller/".ucfirst($controller)."Controller.class.php";
			require_once $file;

		


			$type = ucfirst($controller) . "Controller";
			$control = new $type();
			$control->{$action}();
		}
?>