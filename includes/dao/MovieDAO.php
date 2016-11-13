<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/html/mdb/includes/common/constants.php';
include $Sankalp_Phy_Path.'/includes/db/mongo.php';
include '/var/www/html/mdb/vendor/autoload.php';

class movieDAO
{
    function insertMovie(){
//      $dbObj= new Mongo1();

        $mongoConnection = new MongoDB\Client("mongodb://admin:admin@35.161.183.188:27017");
        $db = $mongoConnection->newdb;

        $collection = $db->movies;
//      echo ("collecction".$collection );
        $document = array(
            'title' => "Harry Potter",
            'Rating' => 100,
            'by' => "JK Rowling");
        echo("here");
        $collection->insertOne($document);
        echo "Document inserted successfully";
    }


    function deleteMovie(){

    }

    function getMovie(){
        $dbObj= new Mongo();
        $collection = $dbObj->movies;
        echo "Movie collection selected";

        $cursor = $collection->find();
        foreach ($cursor as $document) {
            echo $document["year"] . "\n";
        }
    }
    
}