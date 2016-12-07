<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/html/mdb/includes/common/constants.php';
include $PHYSICAL_PATH.'/includes/db/mongo.php';

class movieDAO
{
    function getMoviesByGenre($genre){
        $connObj=MongoClass::getInstance();
        $db=$connObj->moviesDb;
        $collection=$db->moviesDetail;
        $query = array( 'Genre' => $genre );
        $cursor= $collection->find($query);
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
        $query= array('Poster'=> array('$ne'=>"N/A"));
        $cursor = $collection->find($query);
        $cursor->limit(14);
        $resultArray= iterator_to_array($cursor);
        return ($resultArray);
    }

    function getSideMovies(){
        $connObj = MongoClass::getInstance();
        $collection=$connObj->moviesDetail;
        $query= array('Poster'=> array('$ne'=>"N/A"));
        $cursor = $collection->find($query);
        $cursor->limit(7);
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