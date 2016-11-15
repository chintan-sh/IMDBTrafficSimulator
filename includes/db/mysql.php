<?php
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 11/10/16
 * Time: 11:15 PM
 */
class Mysql{
    // Store the single instance of Database
    private static $m_pInstance;

    private $db_host='localhost';
    private $db_user = 'root';
    private $db_pass = 'password';
    private $db_name = 'userdb';
    public $conn = '';

    // Private constructor to limit object instantiation to within the class
    private function __construct(){
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    // Getter method for creating/returning the single instance of this class
    public static function getInstance(){
        if (!self::$m_pInstance){
            self::$m_pInstance = new Mysql();
        }
        return self::$m_pInstance;
    }

    public function query($query){
        return mysqli_query($this->conn, $query);
    }



}

?>

