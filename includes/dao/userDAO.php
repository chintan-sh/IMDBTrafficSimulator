<?php
include_once "/var/www/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH . "includes/db/mysql.php";

/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:15 PM
 */
class UserDAO{
    public $db = '';

    public function create_new_user($username, $password){
        $result = 0;
        $db = Mysql::getInstance();
        $check_if_exists =  $this->check_if_user_exists($username);
        if($check_if_exists > 0){

        }
        return $result;
    }


    public function check_if_user_exists($username){
        $db = Mysql::getInstance();
        $result = $db->query("SELECT * FROM userdb.credential where c_username= '" . $username . "'");
        return $result;
    }

    public function check_if_password_is_valid($username, $password){
        $db = Mysql::getInstance();
        $result = $db->query("SELECT * FROM userdb.credential where c_username= '" . $username . "' and c_password  = '" . $password . "'");
        return $result;
    }
}