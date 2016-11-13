<?php
    echo "Hi";
    include_once '/var/www/html/mdb/includes/db/mongo.php';
    $testObj = new Mongo();
    echo "Idhar aaya";
    echo($testObj->getMongoConnection());
    if($testObj->getMongoConnection()) {
        echo "Andar aa gaye";
        var_dump($testObj);
    }

