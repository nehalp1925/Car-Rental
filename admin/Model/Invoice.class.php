<?php 
/**
 * 
 */
class Invoice{


	private $InvoiceID;
	private $ReturnID;
	private $Charge;
	private $AdditionalCharge;
	
	function __construct($invoice){
		foreach ($invoice as $key => $value) {
            $this->{$key} = $value;
        }
	}


	

    /**
     * Gets the value of InvoiceID
     * @return mixed
     */
    public function getInvoiceID(){
      return $this->InvoiceID;
    }
    
    /**
     * Sets the value of InvoiceID
     *
     * @param mixed $InvoiceID
     * @return self
     */
    public function setInvoiceID($InvoiceID){
      $this->InvoiceID = $InvoiceID;
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
     * Gets the value of Charge
     * @return mixed
     */
    public function getCharge(){
      return $this->Charge;
    }
    
    /**
     * Sets the value of Charge
     *
     * @param mixed $Charge
     * @return self
     */
    public function setCharge($Charge){
      $this->Charge = $Charge;
    }
    
    /**
     * Gets the value of AdditionalCharge
     * @return mixed
     */
    public function getAdditionalCharge(){
      return $this->AdditionalCharge;
    }
    
    /**
     * Sets the value of AdditionalCharge
     *
     * @param mixed $AdditionalCharge
     * @return self
     */
    public function setAdditionalCharge($AdditionalCharge){
      $this->AdditionalCharge = $AdditionalCharge;
    }
    }





 ?>