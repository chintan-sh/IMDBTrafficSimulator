<?php
/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/16/16
 * Time: 7:53 PM
 */

$genre= $_POST["year"];
$objDao= new MovieDAO();

$resultList= $objDao->getMoviesByYear("year");

if($resultList!=null){
    echo($resultList);
}
else{
    echo("Sorry movie not found for ".$year." year!");
}