<?php
	
	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$captcha = trim($_POST['captcha']);
	$site_owners_email = 'drobjohn@gmail.com'; // Replace this with your own email address
	$captchaanswer="3";
	if ($name=="") {
		$error['name'] = "Please enter your name";	
	}
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address";	
	}
	if($captcha<>$captchaanswer){ $error['captcha'] = "Please enter Correct captcha answer!"; }
	if ($message== "") {
		$error['message'] = "Please leave a comment.";
	}
	if ($subject=="") {
		$error['subject'] = "Please leave a subject.";
	}
	if ($subject=="") {
		$error['subject'] = "Please leave a subject.";
	}
	if (!$error) {
	
		$mail = mail($site_owners_email, $subject, $message,
			"From: ".$name." <".$email.">\r\n"
			."Reply-To: ".$email."\r\n"
			."X-Mailer: PHP/" . phpversion());
		echo "<div class='success'>" . $name . ", I've received your email. I'll be in touch with you as soon as possible! Thanks! </div>";
		
	} # end if no error
	else {

		$response ="";
		echo $response;
	} # end if there was an error sending

?>