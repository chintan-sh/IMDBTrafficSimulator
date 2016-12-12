<?php
/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:57 PM
 */
include $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

class MongoClass{
    private static $mongoConnection;
    private $conn='';
    private $db = '';

    private function __construct(){
        $this->conn = new MongoClient("mongodb://35.161.183.88:27017");
        $this->db=$this->conn->moviesDb;
        $this->db->authenticate("admin","admin");
    }

    public static function getInstance(){
        if (!self::$mongoConnection){
            self::$mongoConnection = new MongoClass();
        }
        return self::$mongoConnection->db;
    }
}