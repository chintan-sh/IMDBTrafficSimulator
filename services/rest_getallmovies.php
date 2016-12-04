<?php
/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/16/16
 * Time: 7:53 PM
 */

$genre= $_POST["year"];
$objDao= new MovieDAO();

$resultList= $objDao->getAllMovies();

if($resultList!=null){
    echo($resultList);
}
else{
    echo("Sorry not found!");
}