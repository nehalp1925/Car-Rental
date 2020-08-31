<?php
class CarDetailController{
	private $db;

	function __construct(){
		$this->db = new DBManager();
	}

	function view(){
		$car = $this->db->getAllCar();
		require_once 'View/carDetail.php';
	}



	/*function registerCar(){
		if(isset($_POST['addcar'])){
			unset($_POST['addcar']); //remove non related bean property
			$carD = new CarDetail($_POST);
			$this->db->addCar($carD);
			//var_dump($_POST);
			$_SESSION['msg'] = $carD->getModel() . " was added successfully!";
			$this->view();
		}
	}*/

	function editCar(){
		unset($_POST['editCar']); //remove non related bean property
		$cars = new CarDetail($_POST);
		$this->db->editCar($cars);

		$_SESSION['msg'] = $cars->getBrand() .  " was edited successfully!";
		$this->view();
		/*var_dump($_POST);
		die();*/
		//header("location: index.php");
	}

	function banCar(){
		if($this->db->banCar($_GET['BCarID']))
			$_SESSION['msg'] = "Car ID " . $_GET['BCarID'] . " was banned successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see again!";

		$this->view();
	}

	function deleteCar(){
		$result = $this->db->deleteCar($_GET['DCarID']);


		if($result)
			$_SESSION['msg'] = "Car ID " . $_GET['DCarID'] . " was deleted successfully!";
		else
			$_SESSION['msg'] = "oops, sorry something bad happend???? Please see Again!";

		$this->view();
	}

	function error(){
		require_once 'View/404.php';
	}

	function singleCar(){
		if(isset($_POST['id'])){
			$c = $this->db->getSingleCar($_POST['id']);
			exit(json_encode($c->toArray()));
		}
	}
	/*validate form for customer*/


	
		function registerCar(){
			if(isset($_POST['addcar'])){

				if(empty($_POST['Brand']) || empty($_POST['Model'])  || empty($_POST['Type']) || empty($_POST['TankCapacity']) || empty($_POST['GasConsumption']) || empty($_POST['Color']) || empty($_POST['NumberOfPassenger']) || empty($_POST['RentPrice']) || empty($_POST['Description'])){
					$_SESSION['errormsg'] = " Please Enter All Required Field.";
					$this->view();

				}else{


					$imgError 	= "";
					$Image 	= "";
					$uploadOk 	= 1;

					if(!empty($_FILES['fileToUpload']['name'])){
						$target_dir = "img/";
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

						if($check !== false) {
							$uploadOk = 1;

						// Check file size
							if ($_FILES["fileToUpload"]["size"] > 500000){
								$imgError = "Sorry, your file is too large.<br>";
								$uploadOk = 0;
							}

							$acceptableTypes = ["jpg", "png", "jpeg", "gif", "tiff", "webm"];

					// Allow certain file formats
							if(!in_array($imageFileType, $acceptableTypes)) {
								$imgError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
								$uploadOk = 0;
							}

							if($uploadOk){
								if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
									$Image = basename($_FILES["fileToUpload"]["name"]);
								else
									$imgError = "Sorry, there was an error uploading your file.";
							} else {
								$imgError = "File is not an image.";
								$uploadOk = 0;
							}
						}

						if($uploadOk){

							$newcar = array(
								"Brand" 	=> $_POST['Brand'],
								"Model" 	=> $_POST['Model'],
								"Image" 	=>  $Image,
								"Type"		=> $_POST['Type'],
								"TankCapacity"		=> $_POST['TankCapacity'],
								"GasConsumption"		=> $_POST['GasConsumption'],
								"Color" => $_POST['Color'],
								"NumberOfPassenger"		=> $_POST['NumberOfPassenger'],
								"RentPrice"		=> $_POST['RentPrice'],
								"Description"		=> $_POST['Description']

							);

					//remove non related bean property
							$carD = new CarDetail($newcar);
							$this->db->addCar($carD);
					//var_dump($_POST);
							$_SESSION['msg'] = $carD->getModel() . " was added successfully!";
							$this->view();
						}else
							$this->view();


					}
				}
			}
		}
	}
