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
    echo "User created successfully! Redirecting user to home page!ing";
    sleep(3);
    header("Location: http://localhost/mdb/movie.php");
    return;
}

echo "User creation failed";





?>