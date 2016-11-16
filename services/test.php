<?php
include_once '/var/www/html/mdb/includes/common/constants.php';
include_once $Sankalp_Phy_Path . '/includes/dao/MovieDAO.php';

    $movieObj = new MovieDAO();
//    $movieObj->getMovie();
//    $movieObj->insertMovie();
    $movieObj->generatePDF();