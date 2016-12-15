<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/dao/movieDAO.php";
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */


$movieObj= new movieDAO();
$url=$movieObj->generatePDF();
echo " --------> <a href='" . $url . "'> PDF </a> <br>";

//$count  = trim($_REQUEST["count"]);
//if(!is_numeric($count) && array_key_exists('count', $_REQUEST)){
//    return "Invalid input";
//}else{
//    $movieObj= new movieDAO();
//    for($i=0; $i<$count; $i++){
//        $url=$movieObj->generatePDF();
//        echo " --------> <a href='" . $url . "'> PDF </a> <br>";
//    }
//}
//$name = $_REQUEST["name"];
//$username= $_REQUEST["username"];
//$password= $_REQUEST["password"];
//$email = $_REQUEST["email"];
//
//$preferences = "";
//if(count($_REQUEST['preferences']) > 1){
//    foreach ($_REQUEST['preferences'] as $one_preference) {
//        $preferences .= $one_preference . ",";
//    }
//}else{
//    $preferences = $_REQUEST['preferences'];
//}
//
//$preferences = rtrim($preferences, ",");
?>



