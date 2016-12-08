<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/dao/userDAO.php";
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */

$name = $_POST["name"];
$username= $_POST["username"];
$password= $_POST["password"];
$email = $_POST["email"];

$preferences = "";
if(count($_POST['preferences']) > 1){
    foreach ($_POST['preferences'] as $one_preference) {
        $preferences .= $one_preference . ",";
    }
}else{
    $preferences = $_POST['preferences'];
}

$preferences = rtrim($preferences, ",");

$mysqlObj = new UserDAO();
$result = $mysqlObj->create_new_user($name, $username, $password, $email, $preferences);
if($result > 0){
    $_SESSION["name"] = $name;
    $_SESSION["preferences"] = $preferences;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["is_logged"] = true;
    header("Location: " . $STATIC_URL . "/movie.php");
    die();
}

echo "User creation failed";




?>