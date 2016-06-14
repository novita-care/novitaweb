<?php

	$TO 			= "brandimarch@icloud.com";
	$FROM		= "NovitaCare Alerts <alerts@novitacare.com>";
	$SUBJECT	= 'NovitaCare: BETA Application';
	
	$success;
	$message;
	$code = 0;
	
	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
	$topic = $_REQUEST['hear'];
	
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		$headers 	 = "From:" . $FROM;
		
		$body		 = 'NovitaCare BETA Application' . "\n";
		$body		.= '---------------------------------' . "\n\n";
		$body		.= 'Name: ' . $name . "\n\n";
		$body		.= 'Email: ' . $email . "\n\n";
		$body		.= 'How did you hear about us:' . "\n" . $topic . "\n\n";
		
		if (mail($TO, $SUBJECT, $body, $headers)) {
			
			$success = true;
			$message = 'Success';
		}
		else {
			
			$success = false;
			$message = 'Send attempt failed';
			$code = 2;
		}
	}
	else {
		
		$success = false;
		$message = 'Validation failed';
		$code = 1;
	}
	
	echo '{"Success":' . (($success) ? 'true' : 'false') . ', "Message":"' . $message . '", "Code":' . $code . '}';

?>