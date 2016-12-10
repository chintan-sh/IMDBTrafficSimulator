<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/mdb/includes/common/constants.php";
include $PHYSICAL_PATH.'/includes/db/mongo.php';
//include $PHYSICAL_PATH.'/services/fpdf/fpdf.php';

class movieDAO
{
    function getMoviesByGenre($genre){
        $db=MongoClass::getInstance();
        $collection=$db->moviesDetail;
        $like = new MongoRegex("/^".$genre."/i"); // like clause
        $query = array( 'Genre' => $like ,'imdbRating' => array('$gte' => "4"), 'Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists'=> true));
        $cursor= $collection->find($query); //$cursor->addOption( '$maxScan', 10 );//$cursor= $db->command(array("distinct"=>"moviesDetail",  "key" => "imdbID", $query));
        $cursor->limit(15);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getRecommendation($preference){
        $db=MongoClass::getInstance();
        $collection=$db->moviesDetail;
        $like = new MongoRegex("/^".$preference."/i"); // like clause
        $query = array( 'Genre' => $like , 'Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists'=> true));
        $cursor= $collection->find($query); //$cursor->addOption( '$maxScan', 10 );//$cursor= $db->command(array("distinct"=>"moviesDetail",  "key" => "imdbID", $query));
        $cursor->limit(5);
        $cursor->skip(15);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getMovieById($id){
        $connObj=MongoClass::getInstance();
        $collection=$connObj->moviesDetail;
        $query = array( 'imdbID' => $id );
        $cursor= $collection->find($query);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getMoviesByYear($year){
        $connObj=MongoClass::getInstance();
        $collection=$connObj->moviesDetail;
        $query = array('Year' => $year );
        $cursor= $collection->find($query);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;

    }

    function getMovieByName($name){
        $connObj = MongoClass::getInstance();
        $collection = $connObj->moviesDetail;
        $query = array('Title' => $name);
        $cursor = $collection->find($query);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getMoviesBySearchString($name){
        $db = MongoClass::getInstance();
        $collection = $db->moviesDetail;
        $like = new MongoRegex("/^" . $name . "/"); //
        $query = array('Title' => $like, 'Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists' => true));
        $cursor = $collection->find($query); //$cursor->addOption( '$maxScan', 10 );//$cursor= $db->command(array("distinct"=>"moviesDetail",  "key" => "imdbID", $query));
        $cursor->limit(15);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getRandomMovies(){
        $connObj = MongoClass::getInstance();
        $collection=$connObj->moviesDetail;
        $query = array('Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists'=> true));
        $cursor = $collection->find($query);
        $cursor->limit(14);
        $resultArray= iterator_to_array($cursor);
        return ($resultArray);
    }

    function getSideMovies(){
        $connObj = MongoClass::getInstance();
        $collection=$connObj->moviesDetail;
        $query = array('Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists'=> true));
        $cursor = $collection->find($query);
        $cursor->limit(4);
        $cursor->skip(15);
        $resultArray= iterator_to_array($cursor);
        return ($resultArray);
    }

    //Function to generate pdf from movieDb
//    function generatePDF(){
//        $connObj = MongoClass::getInstance();
//        $collection = $connObj->moviesDetail;
//        $cursor = $collection->find();
//        $result = iterator_to_array($cursor);
//        $pdf = new FPDF();
//        $pdf->AddPage();
//        $pdf->SetFont("Arial", "B", 25);
//        $pdf->Cell(0, 10, "List of all the movies", 1, 1, "C");
//        $pdf->SetFont("Arial", "B", 10);
//        $i = 40;
//        foreach ($result as $item) {
//            ;
//            //$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',0,$i,50,0,'PNG');
//            $pdf->Cell(200, 20, $item['Title'], 100);
//            $pdf->Cell(200, 10, $item['Year'], 100);
//            $pdf->Cell(200, 10, $item['Rating'], 100);
//            $pdf->Ln();
//            $i = $i + 50;
//        }
//        $filename = "/var/www/html/mdb/fpdf/test.pdf";
//        $pdf->Output($filename, 'F');
//    }

}