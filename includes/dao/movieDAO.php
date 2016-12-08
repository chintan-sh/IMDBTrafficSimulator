<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/mdb/includes/common/constants.php';
include $PHYSICAL_PATH.'/includes/db/mongo.php';

class movieDAO
{
    function getMoviesByGenre($genre){
        $db=MongoClass::getInstance();
        $collection=$db->moviesDetail;
        $like = new MongoRegex("/^".$genre."/i"); // like clause
        $query = array( 'Genre' => $like , 'Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists'=> true));
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
//     Function to generate pdf from newdb
//    function generatePDF(){
//        $connObj= new MongoClass();
//        $collection= $connObj->getMovieCollection();
//        $cursor= $collection->find();
//        $d = array();
//        while ($row = $cursor->getNext()) {
//            $d[] = $row;
//        }
//
//        $pdf= new FPDF();
//        $pdf->AddPage();
//        $pdf->SetFont("Arial","B",10);
//
//        foreach($d as $item) {
//            foreach ($item as $val)
//                $pdf->Cell(50, 10, $val, 0);
//            $pdf->Ln();
//        }
//        $pdf->Output();
//    }

}