<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";
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
        $result = $pass_result->fetch_array(MYSQLI_ASSOC);
//        $_SESSION["name"] = $result["c_name"];
//        $_SESSION["username"] = $result["c_username"];
//        $_SESSION["preferences"] = $result["c_preferences"];
//        $_SESSION["email"] = $result["c_email"];
//        $_SESSION["is_logged"] = true;
        setcookie("name", $result["c_name"], time() + (86400 * 30), "/");
        setcookie("username", $result["c_username"], time() + (86400 * 30), "/");
        setcookie("preferences", $result["c_preferences"], time() + (86400 * 30), "/");
        setcookie("email", $result["c_email"], time() + (86400 * 30), "/");
        setcookie("is_logged", true, time() + (86400 * 30), "/");
        echo "success";
        return;
    }
}

echo "failed";

?>