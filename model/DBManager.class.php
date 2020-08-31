<?php 

class DBManager{

	private $db;
	
	function __construct(){
		$host 	= "localhost";
		$user 	= "root";
		$pass 	= "";
		$dbname = "herzing";
		
		try{
			$this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch(Exception $e){
			die("Database Connection Error: " . $e->getMessage());
		}
	}


    //verify the user information
    function verify_login($user){
        $usernew = false;
        $query      = $this->db->prepare("SELECT * FROM customer WHERE Username = :username and Password = :password ");
        $query->execute(array(
            "username" => $user['username'],
            "password" => md5($user['password'])
        ));
        $userdata = $query->fetch(PDO::FETCH_ASSOC);

        if($userdata)
            $usernew = new Customer($userdata);
        
        return $usernew;
    }

    //function for get user information by username
    function getUserByUsername($username){
        $query = $this->db->prepare("SELECT * FROM customer WHERE Username = :name");
        $query->execute(array("name" => $username));
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user)
            return new Customer($user);
        else
            return false;
    }

    //function for get user information by email
    function getUserByEmail($email){
        $query = $this->db->prepare("SELECT * FROM customer WHERE Email = :email");
        $query->execute(array("email" => $email));
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user)
            return new Customer($user);
        else
            return false;
    }
    //function for register
    function add_Customer($newcustomer){
        $query = $this->db->prepare("INSERT INTO customer VALUES (DEFAULT, :uname, :password, :fullname, :dob, :phone, :email, :address, :driverno, :credit_card, DEFAULT)");
        $query->execute(array(
            "uname"  => $newcustomer->getUsername(),
            "password"  => $newcustomer->getPassword(),
            "fullname"  => $newcustomer->getFullname(),
            "dob"   => $newcustomer->getDateOfBirth(),
            "phone"     => $newcustomer->getPhone(),
            "email"     => $newcustomer->getEmail(),
            "address"   => $newcustomer->getAddress(),
            "driverno"  => $newcustomer->getDriveNo(),
            "credit_card"  => $newcustomer->getCreditCardNo()
        ));
    }
    //function for updating user valid
    function activateCustomer($username){
        $query = $this->db->prepare("UPDATE customer SET valid = true WHERE Username = :name");
        $query->execute(array("name" => $username));
    }
    //function for updating user password
    function reset_password($username, $password){
        $query = $this->db->prepare("UPDATE customer SET Password = :ps WHERE username = :name");
        $query->execute(
            array("name" => $username,
                  "ps"   => md5($password)
              ));
    }

    //function for get all cars from database
    function getAllCars(){
        $query      = $this->db->query("SELECT * FROM car WHERE Status = true"); 
        $allcars   = $query->fetchAll(PDO::FETCH_ASSOC);
        $cars = [];
        foreach ($allcars as $car) {
            $cars[] = new Cars($car);
        }
        return $cars;
    }
    //function for rent a car
    function rent_car($rental){
         $query = $this->db->prepare("INSERT INTO rental VALUES (DEFAULT, :carId, :customerId, :dateStart, :dateEnd, :tosAccepted, :cancelled, :inspected, :notes)");
        $query->execute(array(
            "carId"  => $rental->getCarID(),
            "customerId"  => $rental->getCustomerID(),
            "dateStart"  => $rental->getDateStart(),
            "dateEnd"   => $rental->getDateEnd(),
            "tosAccepted"     => $rental->getTpsAccepted(),
            "cancelled"     => $rental->getCancelled(),
            "inspected"   => $rental->getInspected(),
            "notes"  => $rental->getNotes(),
        ));

    }
    //function for set car status as false
    function setCarStatus($carID){
        $query = $this->db->prepare("UPDATE car SET Status = false WHERE CarID = :carid");
        $query->execute(array("carid" => $carID));

    }

    //function for read car by carID
    function getCarbyID($Id){
        $query = $this->db->prepare("SELECT * FROM car WHERE CarID = :carId");
        $query->execute(array("carId" => $Id));
        $car = $query->fetch(PDO::FETCH_ASSOC);
        if($car)
            return new Cars($car);
        else
            return false;
    }
    //function for read car by type and brand
    function getCarbySearch($type, $brand){
        $query = $this->db->prepare("SELECT * FROM car WHERE Brand = :brand and Type = :type ");
        $query->execute(
            array(
                "brand" => $brand,
                "type" => $type,
            ));
        $allcar = $query->fetchAll(PDO::FETCH_ASSOC);
        $serchcar = [];
        foreach ($allcar as $key) {
            $serchcar[] = new Cars($key);
        }
        return $serchcar;
    }

    //function for read car by type and brand
    function getCarbyType($type){
        $query = $this->db->prepare("SELECT * FROM car WHERE Type = :type ");
        $query->execute(array("type" => $type,));
        $allcars = $query->fetchAll(PDO::FETCH_ASSOC);
        $cars = [];
        foreach ($allcars as $car) {
            $cars[] = new Cars($car);
        }
        return $cars;
        
    }




    /**
     * Gets the value of db
     * @return mixed
     */
    public function getDb(){
      return $this->db;
    }
    
    /**
     * Sets the value of db
     *
     * @param mixed $db
     * @return self
     */
    public function setDb($db){
      $this->db = $db;
    }
}



 ?>