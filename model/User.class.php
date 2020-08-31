<?php 
/**
 * 
 */
class User{

	private $UserID;
	private $Username;
	private $Password;
	private $Fullname;
	private $DateOfBirth;
	private $Phone;
	private $Email;
	private $Address;
	private $DriveNo;
	private $CreditCardNo;
	private $Level;
	private $Status;
	
	function __construct($user){
		foreach ($rental as $key => $value) {
            $this->{$key} = $value;
        }
	}
}





 ?>