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

$PHYSICAL_PATH = "/var/www/mdb/";
$Sankalp_Phy_Path ="/var/www/html/mdb/";

$STATIC_URL = "http://localhost/mdb/";

?>