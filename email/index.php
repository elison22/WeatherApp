<?php

require_once('WeatherNotifier.php');

function extract_number($str) {

	if(!$str) {
		return '';
	}

	$num = '';
	$i = 0;
	while(is_numeric($str[$i])) {
		$num .= $str[$i];
		$i++;
	}
	return $num;
}

$return = [];

if(array_key_exists('data', $_POST)) {

	$data = json_decode($_POST['data']);

	if(array_key_exists('zip_data', $data)) {

		$notifications_needed = [];
		$notifications_needed['all'] = true;

		//read data
		$weather_info = $data->zip_data[0];
		
		$temperature = extract_number($weather_info->currentTemperature);
		$forecastHigh = extract_number($weather_info->forecastHighTemperature);
		$forecastLow = extract_number($weather_info->forecastLowTemperature);
		$condition = strtolower($weather_info->currentCondition);
		$wind = extract_number($weather_info->windSpeed);

		//check for notifications to send
		if( ((int)$temperature >= 90 && $temperature !== '') ||
			((int)$forecastHigh >= 90 && $forecastHigh !== '') ) 
		{
			$notifications_needed['high_temperature'] = true;		
		}
		if( ((int)$temperature <= 40 && $temperature !== '') ||
			((int)$forecastLow <= 40 && $forecastLow !== '') ) 
		{
			$notifications_needed['low_temperature'] = true;		
		}
		if( (int)$wind >= 35 && $wind !== '' ) {
			$notifications_needed['wind'] = true;
		}
		if(strpos($condition, 'rain')) {
			$notifications_needed['rain'] = true;
		}	
		if(strpos($condition, 'snow')) {
			$notifications_needed['snow'] = true;
		}

		$notifier = new WeatherNotifier();
		//send notifications
		$json_api_data = json_encode($weather_info);
		foreach($notifications_needed as $type=>$unused) {
			$notifier->send_email_notifications($type,$json_api_data);
		}

		$return['success'] = true;
		$return['message'] = "Data received and processed.";
	}
	else {
		$return['success'] = false;
		$return['message'] = "No data received";
	}

}
else {
	$return['success'] = false;
	$return['message'] = "No data received";
}

die(json_encode($return));

