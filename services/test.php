<?php
include_once '/var/www/html/mdb/includes/common/constants.php';
include_once $PHYSICAL_PATH . '/includes/dao/movieDAO.php';

    $movieObj = new movieDAO();
    $movieObj->getRandomMovies();
    //$movieObj->generatePDF();