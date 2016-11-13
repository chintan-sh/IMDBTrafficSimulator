<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:57 PM
 */
class Mongo
{
    public function getMongoConnection(){
        $mongoConnection = new MongoDB\Driver\Manager("mongodb://35.161.183.188:27017");
        return $mongoConnection;
    }
}