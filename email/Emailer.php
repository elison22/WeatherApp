<?php

public class Emailer {

	public function __construct() 
	{

	}

	public function send_email($to,$from,$subject,$body,$is_html=false) 
	{
		$headers = "From: {$from}\r\n" .
				   "Reply-To:{$from}\r\n" .
				   'X-Mailer: PHP/' . phpversion();

	    if($is_html) {
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		}
		mail($to,$subject,$body,$headers);
	}

}