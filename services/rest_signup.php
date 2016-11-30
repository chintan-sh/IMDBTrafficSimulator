<?php
include_once "/var/www/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/dao/userDAO.php";
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */

$username= $_POST["username"];
$password= $_POST["password"];

$mysqlObj = new UserDAO();
$result = $mysqlObj->create_new_user($username, $password);
if($result){
    $_SESSION["username"] = $username;
    $_SESSION["is_logged"] = true;
    header("Location: " . $STATIC_URL . "/movie.php");
    die();
}

echo "User creation failed";





?>