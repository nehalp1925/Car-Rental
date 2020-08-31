<?php 

/**
 * 
 */
class Returnrental{


  private $ReturnID;
  private $RentalID;
  private $ReturnDate;
  private $Inspected;
  private $Damage;
  private $Notes;
  private $GasLevel;
  private $Millage;
  private $AdditionalCharge;

  function __construct($array){
    foreach ($array as $key => $value) {
        $this->{$key} = $value;
    }
}

public function toArray(){
    $array = [];
    $array['ReturnID']      = $this->ReturnID;
    $array['RentalID']      = $this->RentalID;
    $array['ReturnDate']    = $this->ReturnDate;
    $array['Inspected']     = $this->Inspected;
    $array['Damage']        = $this->Damage;
    $array['Notes']         = $this->Notes;
    $array['GasLevel']      = $this->GasLevel;
    $array['Millage']       = $this->Millage;
    $array['AdditionalCharge'] =$this->AdditionalCharge;
    return $array;

}


    /**
     * Gets the value of ReturnID
     * @return mixed
     */
    public function getReturnID(){
      return $this->ReturnID;
  }

    /**
     * Sets the value of ReturnID
     *
     * @param mixed $ReturnID
     * @return self
     */
    public function setReturnID($ReturnID){
      $this->ReturnID = $ReturnID;
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
     * Gets the value of ReturnDate
     * @return mixed
     */
    public function getReturnDate(){
      return $this->ReturnDate;
  }

    /**
     * Sets the value of ReturnDate
     *
     * @param mixed $ReturnDate
     * @return self
     */
    public function setReturnDate($ReturnDate){
      $this->ReturnDate = $ReturnDate;
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
     * Gets the value of Damage
     * @return mixed
     */
    public function getDamage(){
      return $this->Damage;
  }

    /**
     * Sets the value of Damage
     *
     * @param mixed $Damage
     * @return self
     */
    public function setDamage($Damage){
      $this->Damage = $Damage;
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

    /**
     * Gets the value of GasLevel
     * @return mixed
     */
    public function getGasLevel(){
      return $this->GasLevel;
  }

    /**
     * Sets the value of GasLevel
     *
     * @param mixed $GasLevel
     * @return self
     */
    public function setGasLevel($GasLevel){
      $this->GasLevel = $GasLevel;
  }

    /**
     * Gets the value of Millage
     * @return mixed
     */
    public function getMillage(){
      return $this->Millage;
  }

    /**
     * Sets the value of Millage
     *
     * @param mixed $Millage
     * @return self
     */
    public function setMillage($Millage){
      $this->Millage = $Millage;
  }

    /**
     * Gets the value of Millage
     * @return mixed
     */
    public function getAdditionalCharge(){
      return $this->AdditionalCharge;
  }

    /**
     * Sets the value of Millage
     *
     * @param mixed $Millage
     * @return self
     */
    public function setAdditionalCharge($AdditionalCharge){
      $this->AdditionalCharge = $AdditionalCharge;
  }

}



?>