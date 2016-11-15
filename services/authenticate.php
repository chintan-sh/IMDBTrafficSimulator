<?php
include_once "/var/www/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/dao/userDAO.php";
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */


$mysqlObj = new UserDAO();
$result = $mysqlObj->check_if_user_exists("chintan");

if($result > 0){
    echo "Username found";
    $pass_result = $mysqlObj->check_if_password_is_valid("chintan", "chintan");
    echo "Did we find password? " . $pass_result;
}

echo "Reached back <br>";


print_r($_POST);
$name=$_POST["name"];
$email=$_POST["email"];
$username= $_POST["username"];
$password= $_POST["password"];
?>