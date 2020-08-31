<?php
class DBManager{
  private $db;

  public function __construct(){
    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $dbname = "herzing";

            //Tris to connect to the database using the provided credentials
            //if the connection works it will keep the persistance, else it will throw and error
    try{
      $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

      /*TO SEE MYSQL ERRORS*/
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(Exception $e){
      die("Database Connection Error: " . $e->getMessage());
    }
  }

  function countcar(){
    $query = $this->db->prepare("SELECT COUNT * FROM car")->fetchColumn();
  }

  function getDashboardStats(){
    $query = $this->db->query("
      SELECT SUM(cars) cars, sum(customers) customers, sum(rental) rentals 
      FROM(
      SELECT COUNT(*) cars, 0 customers, 0 rental FROM car
      UNION
      SELECT 0 , COUNT(*) customers, 0 rental FROM customer
      UNION
      SELECT 0 , 0,  COUNT(*) rental FROM rental 
      ) stats
      ");
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function getrentreortStats(){
    $query = $this->db->query("
      SELECT SUM(cars) cars, sum(customers) customers, sum(rental) rentals 
      FROM(
      SELECT COUNT(*) cars, 0 customers, 0 rental FROM car
      UNION
      SELECT 0 , COUNT(*) customers, 0 rental FROM customer
      UNION
      SELECT 0 , 0,  COUNT(*) rental FROM rental 
      ) stats
      ");
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function getcustomerreortStats(){
    $query = $this->db->query("
      SELECT SUM(cars) cars, sum(customers) customers, sum(rental) rentals 
      FROM(
      SELECT COUNT(*) cars, 0 customers, 0 rental FROM car
      UNION
      SELECT 0 , COUNT(*) customers, 0 rental FROM customer
      UNION
      SELECT 0 , 0,  COUNT(*) rental FROM rental 
      ) stats
      ");
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function getcarreortStats(){
    $query = $this->db->query("
      SELECT SUM(cars) cars, sum(customers) customers, sum(rental) rentals 
      FROM(
      SELECT COUNT(*) cars, 0 customers, 0 rental FROM car
      UNION
      SELECT 0 , COUNT(*) customers, 0 rental FROM customer
      UNION
      SELECT 0 , 0,  COUNT(*) rental FROM rental 
      ) stats
      ");
    return $query->fetch(PDO::FETCH_ASSOC);
  }



    //verify the user information
  function verify_login($user){

    $usernew = false;
    $query      = $this->db->prepare("SELECT * FROM employee WHERE Username = :Username and Password = :Password ");
    $query->execute(array(
      "Username" => $user['uname'],
      "Password" => md5($user['pwd'])
    ));

    $userdata = $query->fetch(PDO::FETCH_ASSOC);
    if($userdata)
      $usernew = new Employee($userdata);

    return $usernew;
  }



  
  public function getAllEmployees(){
            $query      = $this->db->query("SELECT * FROM employee ORDER BY UserID"); //whenever you want to select everything from your table
            $EmployeesArray = $query->fetchAll(PDO::FETCH_ASSOC);
            $employeesObj = [];

            foreach ($EmployeesArray as $array)
              $employeesObj[] = new Employee($array);

            return $employeesObj;
          }


        //function for get user information by username
          function getEmployeeByUsername($Username){
            $query = $this->db->prepare("SELECT * FROM employee WHERE Username = :Username");
            $query->execute(array("Username" => $Username));
            $emp = $query->fetch(PDO::FETCH_ASSOC);
            if($emp)
              return new Employee($emp);
            else
              return false;
          }

        //function for get user information by email
          function getEmployeeByEmail($Email){
            $query = $this->db->prepare("SELECT * FROM employee WHERE Email = :Email");
            $query->execute(array("Email" => $Email));
            $emp = $query->fetch(PDO::FETCH_ASSOC);
            if($emp)
              return new Employee($emp);
            else
              return false;
          }

        /**
         * getAllStudents : Function to get a single student in the database and return an object
         * @return [studentBean]
         */
        public function getSingleEmployee($UserID){
          $query  = $this->db->prepare("SELECT * FROM employee WHERE UserID = :UserID");
          $query->execute(array($UserID));
          $result = $query->fetch(PDO::FETCH_ASSOC);

          if($result)
            return new Employee($result);
          else
            return false;
        }

        /*insert employees*/
        /**
         * [addStudent function to add a student in the database]
         * @param [type] $student [StudentBean]
         */
        public function addEmployee($employee){
          $array = $employee->toArray();

          unset($array['UserID']);
          unset($array['Status']);
            //var_dump($array);
           //var_dump($employee);
          $query = $this->db->prepare("INSERT INTO employee VALUES (DEFAULT, :Username, :Password, :Fullname, :Email, :Level, DEFAULT)");
          $query->execute($array);
        }

        /**
         * [deleteStudent function to delete a student from the database]
         * @param  [type] $id [the id of the student to delete]
         * @return [type]     [true or false if the student was deleted or not]
         */
        public function deleteEmployee($id){
          $query = $this->db->prepare("DELETE FROM employee WHERE UserID = :id");
          return $query->execute(array("id" => $id));
        }

        /**
         * [banStudent function to ban a student from the database]
         * @param  [type] $id [the id of the student to delete]
         * @return [type]     [true or false if the student was deleted or not]
         */
        public function banEmployee($id){
          $query = $this->db->prepare("UPDATE employee SET Status = 0 WHERE UserID = :id");
          return $query->execute(array("id" => $id));
        }

        /**
         * [editStudent function to edit a student in the database]
         * @param  [type] $student [description]
         * @return [type]          [T/F]
         */
        public function editEmployee($employee){
          $query = $this->db->prepare("UPDATE employee SET Password = :Password, Fullname = :Fullname, Email = :Email, Status = :Status WHERE UserID = :UserID");
          $result = $query->execute(
            array('Password' => $employee->getPassword(),
              'Fullname' => $employee->getFullname(),
              'Email'    => $employee->getEmail(),
              'Status'   => $employee->getStatus(),
              'UserID'   => $employee->getUserID(),

            )

          );

          return $result;
        }




        /*CarDEtail*/
        /**
         * getAllStudents : Function to get all the student in the database and return an object
         * @return [studentBean]
         */
        public function getAllCar(){
            $query      = $this->db->query("SELECT * FROM car ORDER BY CarID"); //whenever you want to select everything from your table
            $carArray = $query->fetchAll(PDO::FETCH_ASSOC);
            $carObj = [];

            foreach ($carArray as $array)
              $carObj[] = new CarDetail($array);

            return $carObj;
          }
        //function for get user information by username
          function getCarByBrand($Brand){
            $query = $this->db->prepare("SELECT * FROM car WHERE Brand = :Brand");
            $query->execute(array("Brand" => $Brand));
            $car = $query->fetch(PDO::FETCH_ASSOC);
            if($car)
              return new CarDetail($car);
            else
              return false;
          }





          /*insert Cars*/
        /**
         * [addStudent function to add a student in the database]
         * @param [type] $student [StudentBean]
         */
        public function addCar($car){
          $query = $this->db->prepare("INSERT INTO car VALUES (DEFAULT, :Brand, :Model, :Type, :TankCapacity, :GasConsumption, :Color, :NumberOfPassenger, :RentPrice, :Image, :Description, DEFAULT)");
          $query->execute(array(
            'Brand'           => $car->getBrand(),
            'Model'             => $car->getModel(),
            'Type'              => $car->getType(),
            'TankCapacity'      => $car->getTankCapacity(),
            'GasConsumption'    => $car->getGasConsumption(),
            'Color'             => $car->getColor(),
            'NumberOfPassenger' => $car->getNumberOfPassenger(),
            'RentPrice'         => $car->getRentPrice(),
            'Image'             => $car->getImage(),
            'Description'       => $car->getDescription(),

          ));
        }

        public function editCar($cars){
          $query = $this->db->prepare("UPDATE car SET Brand = :Brand, Model = :Model, Type = :Type, TankCapacity = :TankCapacity ,GasConsumption = :GasConsumption, Color = :Color, NumberOfPassenger = :NumberOfPassenger, RentPrice = :RentPrice, Image = :Image, Description = :Description, Status = :Status WHERE CarID = :CarID");
          $result = $query->execute(
            array('Brand'           => $cars->getBrand(),
              'Model'             => $cars->getModel(),
              'Type'              => $cars->getType(),
              'TankCapacity'      => $cars->getTankCapacity(),
              'GasConsumption'    => $cars->getGasConsumption(),
              'Color'             => $cars->getColor(),
              'NumberOfPassenger' => $cars->getNumberOfPassenger(),
              'RentPrice'         => $cars->getRentPrice(),
              'Image'             => $cars->getImage(),
              'Description'       => $cars->getDescription(),
              'Status'            => $cars->getStatus(),
              'CarID'             => $cars->getCarID(),


            )

          );
           /*var_dump($result);
           die();*/
           
           return $result;
         }

       /**
         * getAllStudents : Function to get a single student in the database and return an object
         * @return [studentBean]
         */
       public function getSingleCar($CarID){
        $query  = $this->db->prepare("SELECT * FROM car WHERE CarID = :CarID");
        $query->execute(array($CarID));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
          return new CarDetail($result);
        else
          return false;
      }

        /**
         * [deleteStudent function to delete a student from the database]
         * @param  [type] $id [the id of the student to delete]
         * @return [type]     [true or false if the student was deleted or not]
         */
        public function deleteCar($id){
          $query = $this->db->prepare("DELETE FROM car WHERE CarID = :id");
          return $query->execute(array("id" => $id));
        }

        /**
         * [banStudent function to ban a student from the database]
         * @param  [type] $id [the id of the student to delete]
         * @return [type]     [true or false if the student was deleted or not]
         */
        public function banCar($id){
          $query = $this->db->prepare("UPDATE car SET Status = 0 WHERE CarID = :id");
          return $query->execute(array("id" => $id));
        }
        public function updateCarstatus($id){
          $query = $this->db->prepare("UPDATE car SET Status = 1 WHERE CarID = :id");
          return $query->execute(array("id" => $id));
        }







        /*customer Detail*/
        public function getAllCustomer(){
            $query      = $this->db->query("SELECT * FROM customer ORDER BY CustomerID"); //whenever you want to select everything from your table
            $CustomerArray = $query->fetchAll(PDO::FETCH_ASSOC);
            $CustomerObj = [];

            foreach ($CustomerArray as $array)
              $CustomerObj[] = new Customer($array);

            return $CustomerObj;
          }



        //function for get user information by username
          function getCustomerByUsername($Username){
            $query = $this->db->prepare("SELECT * FROM customer WHERE Username = :Username");
            $query->execute(array("Username" => $Username));
            $cus = $query->fetch(PDO::FETCH_ASSOC);
            if($cus)
              return new Customer($cus);
            else
              return false;
          }

        //function for get user information by email
          function getCustomerByEmail($Email){
            $query = $this->db->prepare("SELECT * FROM customer WHERE Email = :Email");
            $query->execute(array("Email" => $Email));
            $cus = $query->fetch(PDO::FETCH_ASSOC);
            if($cus)
              return new Customer($cus);
            else
              return false;
          }

        /**
         * getAllStudents : Function to get a single student in the database and return an object
         * @return [studentBean]
         */
        public function getSingleCustomer($CustomerID){
          $query  = $this->db->prepare("SELECT * FROM customer WHERE CustomerID = :CustomerID");
          $query->execute(array($CustomerID));
          $result = $query->fetch(PDO::FETCH_ASSOC);
          if($result)
            return new Customer($result);
          else
            return false;
        }


        

        /*insert Customer*/
        /**
         * [addStudent function to add a student in the database]
         * @param [type] $student [StudentBean]
         */
        public function addCustomer($customer){
          $array = $customer->toArray();

          unset($array['CustomerID']);
          unset($array['valid']);
            //var_dump($array);
            //var_dump($car);
          $query = $this->db->prepare("INSERT INTO customer VALUES (DEFAULT, :Username, :Password, :Fullname, :DateOfBirth, :Phone, :Email, :Address, :DriverNo, :CreditCardNo, DEFAULT)");
          $query->execute($array);
        }

        /**
         * [deleteStudent function to delete a student from the database]
         * @param  [type] $id [the id of the student to delete]
         * @return [type]     [true or false if the student was deleted or not]
         */
        public function deleteCustomer($id){
          $query = $this->db->prepare("DELETE FROM customer WHERE CustomerID = :id");
          return $query->execute(array("id" => $id));
        }


        public function editCustomer($customers){
          $query = $this->db->prepare("UPDATE customer SET Password = :Password, Fullname = :Fullname, DateOfBirth =:DateOfBirth, Phone=:Phone ,Email = :Email, Address = :Address, DriverNo = :DriverNo, CreditCardNo = :CreditCardNo WHERE CustomerID = :CustomerID");
          $result = $query->execute(
            array('Password'        => $customers->getPassword(),
              'Fullname'        => $customers->getFullname(),
              'DateOfBirth'     => $customers->getDateOfBirth(),
              'Phone'           => $customers->getPhone(),
              'Email'           => $customers->getEmail(),
              'Address'         => $customers->getAddress(),
              'DriverNo'        => $customers->getDriverNo(),
              'CreditCardNo'    => $customers->getCreditCardNo(),
              'CustomerID'      => $customers->getCustomerID(),

            )

          );
           /* var_dump($result);
           die();*/
           
           return $result;
         }










         /* Rental Car Detail*/
         public function getAllRental(){
            $query      = $this->db->query("SELECT * FROM rental ORDER BY RentalID"); //whenever you want to select everything from your table
            $RentalsArray = $query->fetchAll(PDO::FETCH_ASSOC);
            $RentalsObj = [];

            foreach ($RentalsArray as $array)
              $RentalsObj[] = new Rental($array);

            return $RentalsObj;
          }

        /**
         * getAllStudents : Function to get a single student in the database and return an object
         * @return [studentBean]
         */
        public function getSingleRental($RentalID){
          $query  = $this->db->prepare("SELECT * FROM rental WHERE RentalID = :RentalID");
          $query->execute(array($RentalID));
          $result = $query->fetch(PDO::FETCH_ASSOC);

          if($result)
            return new Rental($result);
          else
            return false;
        }
        public function getRentalID($CarID){
          $query  = $this->db->prepare("SELECT RentalID FROM rental WHERE CarID = :CarID");
          $query->execute(array("CarID"=>$CarID));
          $result = $query->fetch(PDO::FETCH_ASSOC);
          return $result;
        }

        public function addRental($rental){

          $array = $rental->toArray();

          unset($array['RentalID']);
            //unset($array['Status']);
          $query = $this->db->prepare("INSERT INTO rental VALUES (DEFAULT, :CarID, :CustomerID, :DateStart, :DateEnd, :TosAccepted, :Cancelled, :Inspected, :Notes)");
          $query->execute($array);


        }


        public function editRental($rental){
          $query = $this->db->prepare("UPDATE rental SET CarID = :CarID, CustomerID = :CustomerID, DateStart = :DateStart, DateEnd = :DateEnd, TosAccepted = :TosAccepted, Cancelled = :Cancelled,Inspected = :Inspected, Notes = :Notes WHERE RentalID = :RentalID");
          $result = $query->execute(
            array('CarID'   => $rental->getCarID(),
              'CustomerID'  => $rental->getCustomerID(),
              'DateStart'   => $rental->getDateStart(),
              'DateEnd'     => $rental->getDateEnd(),
              'TosAccepted' => $rental->getTosAccepted(),
              'Cancelled'   => $rental->getCancelled(),
              'Inspected'   => $rental->getInspected(),
              'Notes'     => $rental->getNotes(),
              'RentalID'      => $rental->getRentalID(),


            )

          );

          return $result;
          
        }





        
        public function deleteRental($id){
          $query = $this->db->prepare("DELETE FROM rental WHERE RentalID = :id");
          return $query->execute(array("id" => $id));
        }



        // Return Rental Function
        public function getAllReturn(){
            $query      = $this->db->query("SELECT * FROM returnrental ORDER BY ReturnID"); //whenever you want to select everything from your table
            $ReturnArray = $query->fetchAll(PDO::FETCH_ASSOC);
            $ReturnObj = [];

            foreach ($ReturnArray as $array)
              $ReturnObj[] = new Returnrental($array);

            return $ReturnObj;
          }

          public function getSingleReturn($ReturnID){
            $query  = $this->db->prepare("SELECT * FROM returnrental WHERE ReturnID = :ReturnID");
            $query->execute(array($ReturnID));
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if($result)
              return new ReturnCar($result);
            else
              return false;
          }

          public function addReturn($returnrental){
            $array = $returnrental->toArray();
            unset($array['ReturnID']);
           var_dump($returnrental);
            $query = $this->db->prepare("INSERT INTO returnrental VALUES (DEFAULT, :RentalID, :ReturnDate, :Inspected, :Damage, :Notes, :GasLevel, :Millage, :AdditionalCharge)");
            $query->execute($array);
          }

          public function editRenturn($returnrental){
            $query = $this->db->prepare("UPDATE returnrental SET RentalID = :RentalID, ReturnDate = :ReturnDate, Inspected = :Inspected, Damage = :Damage ,Notes = :Notes, GasLevel = :GasLevel, Millage = :Millage, AdditionalCharge = :AdditionalCharge WHERE ReturnID = :ReturnID");
            $result = $query->execute(
              array('RentalID'      => $returnrental->getRentalID(),
                'ReturnDate'        => $returnrental->getReturnDate(),
                'Inspected'         => $returnrental->getInspected(),
                'Damage'            => $returnrental->getDamage(),
                'Notes'             => $returnrental->getNotes(),
                'GasLevel'          => $returnrental->getGasLevel(),
                'Millage'           => $returnrental->getMillage(),
                'AdditionalCharge'  => $returnrental->getAdditionalCharge(),
                'ReturnID'          => $returnrental->getReturnID()
                

              )

            );
           /*var_dump($result);
           die();*/
           
           return $result;
         }
         public function deleteReturn($id){

          $query = $this->db->prepare("DELETE FROM returnrental WHERE ReturnID = :id");
          return $query->execute(array("id" => $id));
        }



        public function getAllRentedCars(){
          $query = $this->db->query("SELECT * FROM rental r JOIN car c ON c.CarID = r.CarID WHERE c.Status = 0;");
          $result = $query->fetchAll(PDO::FETCH_ASSOC);


          return $result;
        }







      }

      ?>