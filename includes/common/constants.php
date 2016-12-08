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

$PHYSICAL_PATH = $_SERVER['DOCUMENT_ROOT'] . "/mdb/";
$STATIC_URL = "http://localhost/mdb/";

?>