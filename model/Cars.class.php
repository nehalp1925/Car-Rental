<?php 
/**
 * 
 */
class Cars{

	private $CarID;
	private $Brand;
	private $Model;
    private $Type;
	private $TankCapacity;
	private $GasConsumption;
	private $Color;
	private $NumberOfPassenger;
	private $RentPrice;
	private $Image;
	private $Description;
	private $Status;

	
	function __construct($car){
		foreach ($car as $key => $value) {
            $this->{$key} = $value;
        }
	}

    public function toArray(){
        $array = [];
        $array['CarID'] = $this->CarID;
        $array['Brand'] = $this->Brand;
        $array['Model'] = $this->Model;
        $array['Type'] = $this->Type;
        $array['TankCapacity'] = $this->TankCapacity;
        $array['GasConsumption'] = $this->GasConsumption;
        $array['Color'] = $this->Color;
        $array['NumberOfPassenger'] = $this->NumberOfPassenger;
        $array['RentPrice'] = $this->RentPrice;
        $array['Image'] = $this->Image;
        $array['Description'] = $this->Description;
        $array['Status'] = $this->Status;
        return $array;

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
     * Gets the value of Brand
     * @return mixed
     */
    public function getBrand(){
      return $this->Brand;
    }
    
    /**
     * Sets the value of Brand
     *
     * @param mixed $Brand
     * @return self
     */
    public function setBrand($Brand){
      $this->Brand = $Brand;
    }
    
    /**
     * Gets the value of Model
     * @return mixed
     */
    public function getModel(){
      return $this->Model;
    }
    
    /**
     * Sets the value of Model
     *
     * @param mixed $Model
     * @return self
     */
    public function setModel($Model){
      $this->Model = $Model;
    }

    /**
     * Gets the value of Type
     * @return mixed
     */
    public function getType(){
      return $this->Type;
    }
    
    /**
     * Sets the value of Type
     *
     * @param mixed $Type
     * @return self
     */
    public function setType($Type){
      $this->Type = $Type;
    }



    
    /**
     * Gets the value of TankCapacity
     * @return mixed
     */
    public function getTankCapacity(){
      return $this->TankCapacity;
    }
    
    /**
     * Sets the value of TankCapacity
     *
     * @param mixed $TankCapacity
     * @return self
     */
    public function setTankCapacity($TankCapacity){
      $this->TankCapacity = $TankCapacity;
    }
    
    /**
     * Gets the value of GasConsumption
     * @return mixed
     */
    public function getGasConsumption(){
      return $this->GasConsumption;
    }
    
    /**
     * Sets the value of GasConsumption
     *
     * @param mixed $GasConsumption
     * @return self
     */
    public function setGasConsumption($GasConsumption){
      $this->GasConsumption = $GasConsumption;
    }
    
    /**
     * Gets the value of Color
     * @return mixed
     */
    public function getColor(){
      return $this->Color;
    }
    
    /**
     * Sets the value of Color
     *
     * @param mixed $Color
     * @return self
     */
    public function setColor($Color){
      $this->Color = $Color;
    }
    
    /**
     * Gets the value of NumberOfPassenger
     * @return mixed
     */
    public function getNumberOfPassenger(){
      return $this->NumberOfPassenger;
    }
    
    /**
     * Sets the value of NumberOfPassenger
     *
     * @param mixed $NumberOfPassenger
     * @return self
     */
    public function setNumberOfPassenger($NumberOfPassenger){
      $this->NumberOfPassenger = $NumberOfPassenger;
    }
    
    /**
     * Gets the value of RentPrice
     * @return mixed
     */
    public function getRentPrice(){
      return $this->RentPrice;
    }
    
    /**
     * Sets the value of RentPrice
     *
     * @param mixed $RentPrice
     * @return self
     */
    public function setRentPrice($RentPrice){
      $this->RentPrice = $RentPrice;
    }
    
    /**
     * Gets the value of Image
     * @return mixed
     */
    public function getImage(){
      return $this->Image;
    }
    
    /**
     * Sets the value of Image
     *
     * @param mixed $Image
     * @return self
     */
    public function setImage($Image){
      $this->Image = $Image;
    }
    
    /**
     * Gets the value of Description
     * @return mixed
     */
    public function getDescription(){
      return $this->Description;
    }
    
    /**
     * Sets the value of Description
     *
     * @param mixed $Description
     * @return self
     */
    public function setDescription($Description){
      $this->Description = $Description;
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