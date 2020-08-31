<?php 

abstract class Functions{
	//function for sending email
	static function sendEmail($to, $name){

		
		$subject = "please validate your account to continue!";
		$Username = self :: encrypt($name);

		$headers = array(
			'From' => 'nehalp1925@gmail.com',
			'Reply-to' => 'nehalp1925@gmail.com',
			'X-Mailer' => 'PHP/' . phpversion(),
			'MIME-Version' => '1.0',
			'Content-type' => 'text/html; charset=utf-8'
		);

		$msg = '<!DOCTYPE html>
		<html>
		<body>
			<h1> Hey, ' .ucfirst($name).' </h1>
			<p> Click here to validate your your account: <a href="http://localhost/Workspacem4/Labs/Lab4/validation.php?username='.$username.'">Here</a>
			</p>
			<p>---<br>Nehal Patel</p>
		</body>
		</html>';
		$mail = mail($to, $subject, $msg, $headers);
		if($mail){
			return 1;
		}
		else{
			return 0;
		}

	}

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
}

?>