<?php
/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:57 PM
 */
include '/var/www/html/mdb/vendor/autoload.php';
class MongoClass{
    private static $mongoConnection;
    private $conn='';
    private function __construct(){
        $this->conn = new MongoClient("mongodb://35.161.183.88:27017");
        $db=$this->conn->movieData;
        $db->authenticate("admin","admin");
    }

    public static function getInstance(){
        if (!self::$mongoConnection){
            self::$mongoConnection = new MongoClass();
        }
        return self::$mongoConnection->conn;
    }
}