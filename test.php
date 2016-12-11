<?php
/**
 * Created by PhpStorm.
 * User: chintan
 * Date: 12/11/16
 * Time: 4:19 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";
include_once $PHYSICAL_PATH. "includes/dao/movieDAO.php";

$movieObj= new movieDAO();
$url=$movieObj->generatePDF();
echo "<a href='" .$url . "'> Link </a>";