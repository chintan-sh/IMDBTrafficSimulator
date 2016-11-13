<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:57 PM
 */
include '/var/www/html/mdb/vendor/autoload.php';
class Mongo1
{
    public function getMongoConnection(){
        //$mongoConnection = new MongoDB\Driver\Manager("mongodb://35.161.183.188:27017");
        $mongoConnection = new MongoDB\Client("mongodb://35.161.183.188:27017");
        $db = $mongoConnection->selectDatabase('test');
        return $db;
    }
}