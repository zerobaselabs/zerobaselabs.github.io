<?php

//echo var_dump($_POST);

if (isset($_POST['email']) || !empty($_POST['email'])){

	    $name = htmlentities($_POST['name']);
	    $email = htmlentities($_POST['email']);
		$website = htmlentities($_POST['website']);
		$subject = htmlentities($_POST['subject']);
		$message = htmlentities($_POST['message']);
	    
	    //echo $name;
	    //echo $email;
	    //echo $website;
	    //echo $subject;
	    //echo $message;
	    // Extract form contents
		/*$name = $_POST['name'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];*/

		// Replace this with your own email address
		$to="irruti@gmail.com";

			// Return errors if present
		$errors = "";
		
		if($name =='') { $errors .= "name,"; }
		if(valid_email($email)==FALSE) { $errors .= "email,"; }
		if($message =='') { $errors .= "message,"; }

		// Send email
		if($errors =='') {

			$headers =  'From: TrendMonitorWeb <no-reply@trendmonitorapp.com>'. "\r\n" .
						'Reply-To: '.$email.'' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			$email_subject = "Website Contact Form: $email";
			$message="Name: $name \n\nEmail: $email \n\nWebsite: $website \n\nSubject: $subject \n\nMessage:\n\n $message";
		
			mail($to, $email_subject, $message, $headers);
			echo "true";
		
		} else {
			echo $errors;
		}
		
	} else {
		header("Location: http://trendmonitorapp.com/");
	}

	

	
		
	// Validate email address
	function valid_email($str) {
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}