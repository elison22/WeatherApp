<?php

/**
 * Created by IntelliJ IDEA.
 * User: thomas.tingey
 * Date: 4/9/16
 * Time: 11:40 AM
 */
class geonames
{
    private $username;
    private $url;
    private $north;
    private $south;
    private $east;
    private $west;

    public function __construct()
    {
        $this->username = "elison22";
        $this->north = "42.00162";
        $this->south = "36.9979";
        $this->east = "-109.04106";
        $this->west = "-114.053";
        $this->url =  "http://api.geonames.org/weatherJSON?north=" . $this->north .
                        "&south=" . $this->south .
                        "&east=" . $this->east .
                        "&west=" . $this->west .
                        "&username=" . $this->username .
                        "&maxRows=100";
    }

    public function get_json()
    {
        $response = file_get_contents($this->url);
        $data = json_decode($response);
        return $data;
    }

}