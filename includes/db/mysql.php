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

    private $db_host='gs-db-instance1-cluster-1.cluster-c0g55r1qqyg0.us-west-2.rds.amazonaws.com';
    private $db_user = 'admin';
    private $db_pass = 'admin';
    private $db_name = 'sampledb';
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

