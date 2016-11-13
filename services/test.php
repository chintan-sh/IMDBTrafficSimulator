<?php
    include_once '/var/www/html/mdb/includes/common/constants.php';
    include_once $Sankalp_Phy_Path.'/includes/db/mongo.php';
    $connTestObj = new Mongo();
    if($connTestObj->getMongoConnection()) {
        echo('MongoDB connection working!');
        var_dump($connTestObj);
    }