<?php 

/**
 * 
 */
class Rental{
	private $RentalID;
	private $CarID;
	private $CustomerID;
	private $DateStart;
	private $DateEnd;
	private $TpsAccepted;
	private $Cancelled;
	private $Inspected;
	private $Notes;


	function __construct($rental){
		foreach ($rental as $key => $value) {
            $this->{$key} = $value;
        }
	}


	

    /**
     * Gets the value of RentalID
     * @return mixed
     */
    public function getRentalID(){
      return $this->RentalID;
    }
    
    /**
     * Sets the value of RentalID
     *
     * @param mixed $RentalID
     * @return self
     */
    public function setRentalID($RentalID){
      $this->RentalID = $RentalID;
    }
    
    /**
     * Gets the value of CarID
     * @return mixed
     */
    public function getCarID(){
      return $this->CarID;
    }
    
    /**
     * Sets the value of CarID
     *
     * @param mixed $CarID
     * @return self
     */
    public function setCarID($CarID){
      $this->CarID = $CarID;
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
     * Gets the value of DateStart
     * @return mixed
     */
    public function getDateStart(){
      return $this->DateStart;
    }
    
    /**
     * Sets the value of DateStart
     *
     * @param mixed $DateStart
     * @return self
     */
    public function setDateStart($DateStart){
      $this->DateStart = $DateStart;
    }
    
    /**
     * Gets the value of DateEnd
     * @return mixed
     */
    public function getDateEnd(){
      return $this->DateEnd;
    }
    
    /**
     * Sets the value of DateEnd
     *
     * @param mixed $DateEnd
     * @return self
     */
    public function setDateEnd($DateEnd){
      $this->DateEnd = $DateEnd;
    }
    
    /**
     * Gets the value of TpsAccepted
     * @return mixed
     */
    public function getTpsAccepted(){
      return $this->TpsAccepted;
    }
    
    /**
     * Sets the value of TpsAccepted
     *
     * @param mixed $TpsAccepted
     * @return self
     */
    public function setTpsAccepted($TpsAccepted){
      $this->TpsAccepted = $TpsAccepted;
    }
    
    /**
     * Gets the value of Cancelled
     * @return mixed
     */
    public function getCancelled(){
      return $this->Cancelled;
    }
    
    /**
     * Sets the value of Cancelled
     *
     * @param mixed $Cancelled
     * @return self
     */
    public function setCancelled($Cancelled){
      $this->Cancelled = $Cancelled;
    }
    
    /**
     * Gets the value of Inspected
     * @return mixed
     */
    public function getInspected(){
      return $this->Inspected;
    }
    
    /**
     * Sets the value of Inspected
     *
     * @param mixed $Inspected
     * @return self
     */
    public function setInspected($Inspected){
      $this->Inspected = $Inspected;
    }
    
    /**
     * Gets the value of Notes
     * @return mixed
     */
    public function getNotes(){
      return $this->Notes;
    }
    
    /**
     * Sets the value of Notes
     *
     * @param mixed $Notes
     * @return self
     */
    public function setNotes($Notes){
      $this->Notes = $Notes;
    }
    }



 ?>