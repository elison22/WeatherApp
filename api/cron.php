<?php
/**
 * Created by IntelliJ IDEA.
 * User: Thomas
 * Date: 4/9/2016
 * Time: 6:19 PM
 */
require_once("geonames.php");
require_once("agrichart.php");
$response = array();
$geonames = new geonames();
$all_data = $geonames->get_json();
$response['all_data'] = $all_data->weatherObservations;
$agrichart = new agrichart(84606);
$zip_data = $agrichart->get_json();
$response['zip_data'] = $zip_data->results;
$url = "http://cs462email.thomastingey.com";
$post_fields = "data=" . urlencode(json_encode($response));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

$results = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r($results);