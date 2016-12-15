<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/dao/userDAO.php";
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */

$name = $_REQUEST["name"];
$username= $_REQUEST["username"];
$password= $_REQUEST["password"];
$email = $_REQUEST["email"];

$preferences = "";
if(count($_REQUEST['preferences']) > 1){
    foreach ($_REQUEST['preferences'] as $one_preference) {
        $preferences .= $one_preference . ",";
    }
}else{
    $preferences = $_REQUEST['preferences'];
}

$preferences = rtrim($preferences, ",");

$mysqlObj = new UserDAO();
$result = $mysqlObj->create_new_user($name, $username, $password, $email, $preferences);
if($result > 0){
//    $_SESSION["name"] = $name;
//    $_SESSION["preferences"] = $preferences;
//    $_SESSION["username"] = $username;
//    $_SESSION["email"] = $email;
//    $_SESSION["is_logged"] = true;
    setcookie("name", $name, time() + (86400 * 30), "/");
    setcookie("username", $username, time() + (86400 * 30), "/");
    setcookie("preferences", $preferences, time() + (86400 * 30), "/");
    setcookie("email", $email, time() + (86400 * 30), "/");
    setcookie("is_logged", true, time() + (86400 * 30), "/");
    header("Location: " . $STATIC_URL . "profile.php");
    die();
}

echo "User creation failed";




?>