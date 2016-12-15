<?php

/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */

$count = $_REQUEST["count"];
$pdf_count = $_REQUEST["pdf_count"];

if((!is_numeric($count) && array_key_exists('count', $_REQUEST)) && (!is_numeric($pdf_count) && array_key_exists('pdf_count', $_REQUEST))){
    return "Invalid input";
}

$notifyURL = 'http://localhost:3000' ;
$paramArr= array('count'=>$count, 'pdf_count'=>$pdf_count);

$curlUrl = str_replace(" ", "%20", trim($notifyURL));
$ch = curl_init($curlUrl);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  http_build_query($paramArr));
curl_setopt($ch, CURLOPT_URL, $curlUrl);

$curlResponse = curl_exec($ch);
curl_close ($ch);

$curlResponse = trim($curlResponse);

if($curlResponse === FALSE) {
    echo "Something went wrong!";
}


?>