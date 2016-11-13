<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/html/mdb/includes/common/constants.php';
include $Sankalp_Phy_Path.'/includes/db/mongo.php';
class movieDAO
{
    function insertMovie(){
        $dbObj= new Mongo();
        $collection = $dbObj->movies;
        $document = array(
            "title" => "Harry Potter",
            "Rating" => 100,
            "by", "JK Rowling"
        );
        echo("here");
        $collection->insert($document);
        echo "Document inserted successfully";
    }

    function deleteMovie(){

    }

    function getMovie(){

    }
    
}