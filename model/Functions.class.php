<?php 

abstract class Functions {
	
	//function for sending email
	static function sendEmail($to, $name, $string){

		$subject = "Please validate your account to continue!";
		$username = self :: encrypt($name);
		$msg = "";
		

		$headers = array(
		    'From' 			=> 'george@marketingwebsites.ca',
		    'Reply-To' 		=> 'george@marketingwebsites.ca',
		    'X-Mailer'		=> 'PHP/' . phpversion(),
		    'MIME-Version' 	=> '1.0',
		    'Content-type' 	=>  'text/html; charset=utf-8'
		);
		
		if ($string == "forget") {
			$msg = '
			<!DOCTYPE html>
				<html>
					<body>
						<h1>Hi,'.ucfirst($name).' </h1>
						<p>Please click here to reset your password : <a href="http://localhost/php_project/?controller=reset&action=&user_forget=' . $username . '">HERE</a></p>
						<p>---<br>George B.</p>
					</body>
				</html>
			';
		}else if ($string == "register") {
			$msg = '
			<!DOCTYPE html>
				<html>
					<body>
						<h1>Hi,'.ucfirst($name).' </h1>
						<p>Please click here to validate your account : <a href="http://localhost/php_project/?controller=register&action=validation&user_rg=' . $username . '">HERE</a></p>
						<p>---<br>George B.</p>
					</body>
				</html>
			';
		}

		
		$mail = mail($to, $subject, $msg, $headers);

	}

	//function for encrypting
	static function encrypt($name){
		$enc = str_rot13($name);
		$enc = base64_encode($enc);
		$enc = "b64Y" . $enc . "24BGT";
		$enc = strrev($enc);
		return $enc;
	}

	//function for decrypting
	static function decrypt($name){
		$decr = strrev($name);
		$decr = str_replace(array("b64Y", "24BGT"), "", $decr);
		$decr = base64_decode($decr);
		$decr = str_rot13($decr);
		return $decr;
	}
	//function for validing credit card number
	static function validatecard($number){
		global $type;

	    $cardtype = array(
	        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
	        "mastercard" => "/^5[1-5][0-9]{14}$/",
	        "amex"       => "/^3[47][0-9]{13}$/",
	        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
	    );

	    if (preg_match($cardtype['visa'],$number)){
			$type= "visa";
	        return true;
	    }else if (preg_match($cardtype['mastercard'],$number)){
			$type= "mastercard";
	        return true;
	    }else if (preg_match($cardtype['amex'],$number)){
			$type= "amex";
	        return true;
		}else if (preg_match($cardtype['discover'],$number)){
			$type= "discover";
	        return true;
	    }else{
        	return false;
    	} 
 	}


}

 ?>