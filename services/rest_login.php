<?php
include_once "/var/www/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/dao/userDAO.php";
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:01 PM
 */

$username= $_REQUEST["username"];
$password= $_REQUEST["password"];

$mysqlObj = new UserDAO();
$result = $mysqlObj->check_if_user_exists($username);

if($result > 0){
    $pass_result = $mysqlObj->check_if_password_is_valid($username, $password);
    if($pass_result->num_rows > 0){
        // $user = $pass_result->fetch_row(); // echo "<pre> Yalla <br> "; print_r($user); echo "</pre>";
        $_SESSION["username"] = $username;
        $_SESSION["is_logged"] = true;
        header("Location: " . $STATIC_URL . "/movie.php");
        echo "Login successful! Redirecting user to home page!";
        echo "Success";
        die();
    }
}

echo "Failed";

?>