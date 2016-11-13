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

        $mongoConnection = new MongoClient();
        return $mongoConnection;
    }
}