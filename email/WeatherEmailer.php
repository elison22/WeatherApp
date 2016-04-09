<?php

require ('Emailer.php');

class WeatherEmailer {

	public function __construct()
	{

	}

	public function send_weather_notification($user,$notification_type,$api_data)
	{
		$meta = file_get_contents("signup/users/{$user}");
		$email = explode(":::::", $meta)[0];
		$emailer = new Emailer();

		$body = $this->_build_body($notification_type,$api_data);

		$emailer->send_email($email,"donotreply@weatherapp.com","Weather Notification",$body,true);
	}

	private function _build_body($notification_type,$api_data)
	{
		$body = "<div>";
		switch($notification_type) {
			case "rain":
				$body .= "You are being notified that it was reported that the chances of rain today are greater than 50%.";
				break;
			case "snow":
				$body .= "You are being notified that it was reported that the chances of snow today are greater than 50%.";
				break;
			case "wind":
				$body .= "You are being notified that it was reported that there will be high winds today.";
				break;
			case "low_temp":
				$body .= "You are being notified that it was reported that at some point today the temperature will be below 50 degrees fahrenheit.";
				break;
			case "high_temp":
				$body .= "You are being notified that it was reported that at some point today the temperature will be above 100 degrees fahrenheit.";
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