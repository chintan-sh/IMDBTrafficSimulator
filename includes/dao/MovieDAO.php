<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/html/mdb/includes/common/constants.php';
//include $Sankalp_Phy_Path.'/includes/db/mongo.php';
//include '/var/www/html/mdb/vendor/autoload.php';

class movieDAO
{
    function insertMovie(){
        $conn = new MongoClient("mongodb://35.161.183.188:27017");

        $db = $conn->newdb;

        $username = "admin";
        $password = "admin";

        $db->authenticate($username, $password);
        var_dump($db);
        $collection= $db->movies;
        var_dump($collection);
        $document = array(
            'title' => "Harry Potter",
            'Rating' => 100,
            'by' => "JK Rowling");
        echo("Inserting -> ");
        var_dump($document);
        $collection->insert($document, array("w" => 0));
        var_dump($collection);
    }


    function deleteMovie(){

    }

    function getMovie(){
        $conn = new MongoClient("mongodb://35.161.183.188:27017");

        $db = $conn->newdb;

        $username = "admin";
        $password = "admin";

        $db->authenticate($username, $password);
        var_dump($db);
        $collection= $db->movies;
        var_dump($collection);
        $cursor = $collection->find();
        var_dump($cursor);
        for ($i = 0; $i < 10; $i++) {
            var_dump($cursor->getNext());
        }

    }
    
}