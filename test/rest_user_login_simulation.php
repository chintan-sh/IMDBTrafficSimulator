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

if (array_key_exists('username', $_REQUEST) && array_key_exists('password', $_REQUEST)) {
    if(trim($username) != "" && trim($password) != ""){
        $mysqlObj = new UserDAO();
        $result = $mysqlObj->check_if_user_exists($username);

        if($result > 0){
            $pass_result = $mysqlObj->check_if_password_is_valid($username, $password);
            if($pass_result->num_rows > 0){
                $result = $pass_result->fetch_array(MYSQLI_ASSOC);
                echo "---------------------> Login Successful";
                return;
            }
        }

    }
}


echo "---------------------> Login Failed";
return;


?>