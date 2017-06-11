<?php

/* Credits : Free Contact Forms */

if(isset($_POST['email'])) {
	
	include 'feedback_settings.php';
	
	function died($error) {
		echo "Sorry, but there were error(s) found with the form you submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix them to continue.<br /><br />";
		die();
	}
	
	if(!isset($_POST['name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['feedback']) 	
		) {
		died('One or more fields are empty.\n');		
}

	$name = $_POST['name']; // required
	$email_from = $_POST['email']; // required
	$feedback = $_POST['feedback']; // required
	
	
	$error_message = "";
	
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(preg_match($email_exp,$email_from)==0) {
		$error_message .= 'The email address you entered does not appear to be valid.<br />';
	}
	if(strlen($full_name) < 2) {
		$error_message .= 'Please enter a valid name.<br />';
	}
	if(strlen($comments) < 2) {
		$error_message .= 'Please enter valid feedback.<br />';
	}


	if(strlen($error_message) > 0) {
		died($error_message);
	}
	$email_message = "Feedback form details below.\r\n";
	
	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:");
		return str_replace($bad,"",$string);
	}
	
	$email_message .= "Name: ".clean_string($name)."\r\n";
	$email_message .= "Email: ".clean_string($email_from)."\r\n";
	$email_message .= "Feedback: ".clean_string($feedback)."\r\n";
	
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n";
	mail($email_to, $email_subject, $email_message, $headers);
	header("Location: $thankyou");
	?>
	<script>location.replace('<?php echo $thankyou;?>')</script>
	<?php
}
die();
?>