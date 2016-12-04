<?php
include_once '/var/www/html/mdb/includes/common/constants.php';
include_once $Sankalp_Phy_Path . '/includes/dao/movieDAO.php';

    $movieObj = new movieDAO();
    $movieObj->getAllMovies();
    //$movieObj->generatePDF();