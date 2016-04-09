<?php
require_once("geonames.php");
require_once("agrichart.php");
/**
 * Created by IntelliJ IDEA.
 * User: Thomas
 * Date: 4/9/2016
 * Time: 12:34 AM
 */
$response = array();
$geonames = new geonames();
$all_data = $geonames->get_json();
$response['all_data'] = $all_data->weatherObservations;
$agrichart = new agrichart(84606);
$zip_data = $agrichart->get_json();
$response['zip_data'] = $zip_data->results;
echo json_encode($response);

