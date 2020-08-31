<?php 
/**
 * 
 */
class Employee{

	private $UserID;
	private $Username;
	private $Password;
	private $Fullname;
	private $Email;
	private $Level;
	private $Status;
	
	function __construct($user){
		foreach ($user as $key => $value) {
            $this->{$key} = $value;
        }
	}

	

    /**
     * Gets the value of UserID
     * @return mixed
     */
    public function getUserID(){
      return $this->UserID;
    }
    
    /**
     * Sets the value of UserID
     *
     * @param mixed $UserID
     * @return self
     */
    public function setUserID($UserID){
      $this->UserID = $UserID;
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
     * Gets the value of Level
     * @return mixed
     */
    public function getLevel(){
      return $this->Level;
    }
    
    /**
     * Sets the value of Level
     *
     * @param mixed $Level
     * @return self
     */
    public function setLevel($Level){
      $this->Level = $Level;
    }
    
    /**
     * Gets the value of Status
     * @return mixed
     */
    public function getStatus(){
      return $this->Status;
    }
    
    /**
     * Sets the value of Status
     *
     * @param mixed $Status
     * @return self
     */
    public function setStatus($Status){
      $this->Status = $Status;
    }
    }


 ?>