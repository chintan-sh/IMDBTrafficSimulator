<?php
include_once '/var/www/html/mdb/includes/common/constants.php';
//include_once $Sankalp_Phy_Path.'/includes/db/mongo.php';
include_once $Sankalp_Phy_Path . '/includes/dao/MovieDAO.php';
//    //$dbTestObj = new Mongo();
////    $dbTestObj->getMongoConnection();
////    if($dbTestObj->getMongoConnection()) {
////        echo('MongoDB connection working!');
////        var_dump($connTestObj);
////    }
//
    $movieObj = new MovieDAO();
//    echo("got moviedao");
    $movieObj->insertMovie();
    $movieObj->getMovie();
//    echo('inserted');


//
//$collection = (new MongoClient("mongodb://35.161.183.188:27017"))->userdb->userdetail;
//$user = array(
//    'name' => "abcd",
//    'username' => "abcd",
//    'password' => "abcd");
//$collection->insert($user);




//$db = $conn->mynewdb;
//$collection = (new MongoDB\Client("mongodb://127.0.0.1:27017"))->dbname->coll;
//$collection = $db->movies;
//$document = array(
//    'title' => "Harry Potter",
//    'Rating' => 100,
//    'by' => "JK Rowling");
//echo("here");
//$collection->insert($document);
//echo "Document inserted successfully";
//
