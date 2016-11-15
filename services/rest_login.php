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
$result = $mysqlObj->check_if_user_exists($username);

if($result > 0){
    $pass_result = $mysqlObj->check_if_password_is_valid($username, $password);
    if($pass_result > 0){
        echo "Login successful! Redirecting user to home page!";
        sleep(3);
        header("Location: http://localhost/mdb/movie.php");
        die();
    }
}

echo "Login failed";

?>