<?php

function error($message) 
{
	die($message);
}

$data = $_POST;

if($data) {

	if(!array_key_exists('email', $data)) {
		error("You must enter your email! Please do so and try again.");
	}
	$email = trim($data['email']);
	if($email === '') {
		error("Email cannot be blank! Please try again.");	
	}

	if(!array_key_exists('notifications',$data)) {
		error("You must choose at least one notification! Please do so and try again.");
	}
	$notifications = $data['notifications'];

	foreach($notifications as $n=>$val) {
		if($val === 1 || $val === '1') {
			file_put_contents("registered/{$n}/email","{$email}\n",FILE_APPEND);
		}
	}

	die("{$email} is now registered to receive weather notification emails.");

} else {
	error("Please fill out parts of the form and try again.");
}