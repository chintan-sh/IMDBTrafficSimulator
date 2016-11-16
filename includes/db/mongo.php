<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:57 PM
 */
include '/var/www/html/mdb/vendor/autoload.php';
class MongoClass{
        //    public function getMongoConnection(){
        //    $mongoConnection = new MongoClient("mongodb://35.161.183.188:27017");
        //    $username = "admin";
        //    $password = "admin";
        //    $db= $mongoConnection->mydb;
        //    $db->authenticate($username, $password);
        //        return $mongoConnection;
        //    }

     public function getMovieCollection(){
         $mongoConnection= new MongoClient();
         $db= $mongoConnection->newdb;
         $collection= $db->movies;
         return $collection;
     }



}