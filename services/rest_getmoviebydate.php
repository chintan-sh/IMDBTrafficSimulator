<?php
/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/16/16
 * Time: 7:53 PM
 */

$genre= $_POST["genre"];
$objDao= new MovieDAO();

$resultList= $objDao->getMoviesByGenre("genre");

if($resultList!=null){
    echo($resultList);
}
else{
    echo("Sorry movie not found for ".$genre." genre!");
}