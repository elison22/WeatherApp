<?php

/**
 * Created by IntelliJ IDEA.
 * User: thomas.tingey
 * Date: 4/9/16
 * Time: 11:40 AM
 */
class agrichart
{
    private $url;
    private $token;
    private $zip;

    public function __construct($zip)
    {
        $this->token = "1a2d06998755523a9cebc856f5baee63";
        $this->zip = $zip;
        $this->url = "http://ondemand.websol.barchart.com/getWeather.json?apikey=" . $this->token .
                        "&zipCode=" . $this->zip .
                        "&fields=windDirection%2CwindSpeed%2Chumidity%2Cdewpoint%2CforcastedDay%2CforcastedPrecipitation%2CforecastHighTemperature%2CforecastLowTemperature";
    }

    public function get_json()
    {
        $result = file_get_contents($this->url);
        $data = json_decode($result);
        return $data;
    }
}