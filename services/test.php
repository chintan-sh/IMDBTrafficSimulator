<?php
    include_once '/var/www/html/mdb/includes/common/constants.php';
    //include_once $Sankalp_Phy_Path.'/includes/db/mongo.php';
    include_once $Sankalp_Phy_Path . '/includes/dao/MovieDAO.php';
    /*$dbTestObj = new Mongo();
    $dbTestObj->getMongoConnection();
    if($dbTestObj->getMongoConnection()) {
        echo('MongoDB connection working!');
        var_dump($connTestObj);
    }*/

    $movieObj = new MovieDAO();
    $movieObj->insertMovie();
    echo('inserted');

