<?php 
/**
 * 
 */
class Customer{

	private $CustomerID;
	private $Username;
	private $Password;
	private $Fullname;
	private $DateOfBirth;
	private $Phone;
	private $Email;
	private $Address;
	private $DriveNo;
	private $CreditCardNo;
    private $valid;

	function __construct($customer){
		foreach ($customer as $key => $value) {
            $this->{$key} = $value;
        }
	}


	

    /**
     * Gets the value of CustomerID
     * @return mixed
     */
    public function getCustomerID(){
      return $this->CustomerID;
    }
    
    /**
     * Sets the value of CustomerID
     *
     * @param mixed $CustomerID
     * @return self
     */
    public function setCustomerID($CustomerID){
      $this->CustomerID = $CustomerID;
    }
    
    /**
     * Gets the value of Username
     * @return mixed
     */
    public function getUsername(){
      return $this->Username;
    }
    
    /**
     * Sets the value of Username
     *
     * @param mixed $Username
     * @return self
     */
    public function setUsername($Username){
      $this->Username = $Username;
    }
    
    /**
     * Gets the value of Password
     * @return mixed
     */
    public function getPassword(){
      return $this->Password;
    }
    
    /**
     * Sets the value of Password
     *
     * @param mixed $Password
     * @return self
     */
    public function setPassword($Password){
      $this->Password = $Password;
    }
    
    /**
     * Gets the value of Fullname
     * @return mixed
     */
    public function getFullname(){
      return $this->Fullname;
    }
    
    /**
     * Sets the value of Fullname
     *
     * @param mixed $Fullname
     * @return self
     */
    public function setFullname($Fullname){
      $this->Fullname = $Fullname;
    }
    
    /**
     * Gets the value of DateOfBirth
     * @return mixed
     */
    public function getDateOfBirth(){
      return $this->DateOfBirth;
    }
    
    /**
     * Sets the value of DateOfBirth
     *
     * @param mixed $DateOfBirth
     * @return self
     */
    public function setDateOfBirth($DateOfBirth){
      $this->DateOfBirth = $DateOfBirth;
    }
    
    /**
     * Gets the value of Phone
     * @return mixed
     */
    public function getPhone(){
      return $this->Phone;
    }
    
    /**
     * Sets the value of Phone
     *
     * @param mixed $Phone
     * @return self
     */
    public function setPhone($Phone){
      $this->Phone = $Phone;
    }
    
    /**
     * Gets the value of Email
     * @return mixed
     */
    public function getEmail(){
      return $this->Email;
    }
    
    /**
     * Sets the value of Email
     *
     * @param mixed $Email
     * @return self
     */
    public function setEmail($Email){
      $this->Email = $Email;
    }
    
    /**
     * Gets the value of Address
     * @return mixed
     */
    public function getAddress(){
      return $this->Address;
    }
    
    /**
     * Sets the value of Address
     *
     * @param mixed $Address
     * @return self
     */
    public function setAddress($Address){
      $this->Address = $Address;
    }
    
    /**
     * Gets the value of DriveNo
     * @return mixed
     */
    public function getDriveNo(){
      return $this->DriveNo;
    }
    
    /**
     * Sets the value of DriveNo
     *
     * @param mixed $DriveNo
     * @return self
     */
    public function setDriveNo($DriveNo){
      $this->DriveNo = $DriveNo;
    }
    
    /**
     * Gets the value of CreditCardNo
     * @return mixed
     */
    public function getCreditCardNo(){
      return $this->CreditCardNo;
    }
    
    /**
     * Sets the value of CreditCardNo
     *
     * @param mixed $CreditCardNo
     * @return self
     */
    public function setCreditCardNo($CreditCardNo){
      $this->CreditCardNo = $CreditCardNo;
    }

    /**
    * Gets the value of valid
    * @return mixed
    */
    public function getValid(){
      return $this->valid;
    }
    
    /**
    * Sets the value of valid
    *
    * @param mixed $valid
    * @return self
    */
    public function setValid($valid){
      $this->valid = $valid;
    }
    }




 ?>