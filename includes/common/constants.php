<?php
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:00 PM
 */

session_start();

function isLoggedIn(){
    if (isset($_SESSION['is_logged'])) {
        return true;
    } else {
        return false;
    }
}

$IP_ADDR = "localhost";
$PHYSICAL_PATH = $_SERVER['DOCUMENT_ROOT'] . "/mdb/";
$STATIC_URL = "http://".$IP_ADDR."/mdb/";
$CDN_PATH = "http://d22hyw0m24nmr8.cloudfront.net/"

?>