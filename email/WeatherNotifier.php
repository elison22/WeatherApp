<?php

require ('Emailer.php');

class WeatherNotifier {

	public function __construct()
	{

	}

	public function send_email_notifications($notification_type,$api_data)
	{
		$unparsed = file_get_contents("signup/registered/{$notification_type}/email");
		$emails = explode("\n", $unparsed);
		$emailer = new Emailer();

		$body = $this->_build_body($notification_type,$api_data);

		foreach($emails as $email) {
			$emailer->send_email($email,"donotreply@weatherapp.com","Weather Notification",$body,true);
		}
	}

	private function _build_body($notification_type,$api_data)
	{
		$body = "<div>";
		switch($notification_type) {
			case "rain":
				$body .= "You are being notified that it is raining or will rain today.";
				break;
			case "snow":
				$body .= "You are being notified that it is snowing or will snow today.";
				break;
			case "wind":
				$body .= "You are being notified that it was reported that there are or will be high winds today.";
				break;
			case "low_temperature":
				$body .= "You are being notified that it was reported that the temperature is or will be low today.";
				break;
			case "high_temperature":
				$body .= "You are being notified that it was reported that the temperature is or will be high today.";
				break;
			case "all":
				$body .= "Your requested daily weather notification.";
				break;
		}
		$body .= "</div>";

		$body .= "<div>Here is the data we received:{$api_data}</div>"; 

		return $body;
	}

}