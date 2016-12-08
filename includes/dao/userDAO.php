<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/db/mysql.php";

/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:15 PM
 */
class UserDAO{
    public $db = '';

    public function create_new_user($name, $username, $password, $email, $preferences){
        $db = Mysql::getInstance();
        $check_if_exists =  $this->check_if_user_exists($username);
        if($check_if_exists < 1){ //echo "INSERT INTO userdb.credential (c_username, c_password) VALUES ('" . $username . "','" . $password . "'";
            $result = $db->query("
                                    INSERT INTO 
                                    userdb.credential (c_name, c_username, c_password, c_email, c_preferences )
                                    VALUES 
                                    (
                                    '" . $name . "',
                                    '" . $username . "',
                                    '" . md5($password) . "',
                                    '" . $email . "',
                                    '" . $preferences . "'
                                    )
                                ");

            if($result){
                return 1;
            }
        }
        return 0;
    }

    public function check_if_user_exists($username){
        $db = Mysql::getInstance();
        $result = $db->query("SELECT * FROM userdb.credential where c_username= '" . $username . "'");
        return $result->num_rows;
    }

    public function check_if_password_is_valid($username, $password){
        $db = Mysql::getInstance();
        $result = $db->query("SELECT * FROM userdb.credential where c_username= '" . $username . "' and c_password  = '" . md5($password) . "'");
        return $result;
    }
}