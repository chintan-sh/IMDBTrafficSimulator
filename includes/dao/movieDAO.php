<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/html/mdb/includes/common/constants.php';
include $Sankalp_Phy_Path.'/includes/db/mongo.php';

class movieDAO
{
    function getMoviesByGenre($genre){
        $connObj=MongoClass::getInstance();
        $db=$connObj->movieData;
        $collection=$db->moviedetail;
        $query = array( 'Genre' => $genre );
        $cursor= $collection->find($query);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getMoviesByYear($year){
        $connObj=MongoClass::getInstance();
        $db=$connObj->movieData;
        $collection=$db->moviedetail;
        $query = array('Year' => $year );
        $cursor= $collection->find($query);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;

    }

    function getRandomMovies(){
        $connObj = MongoClass::getInstance();
        $db = $connObj->movieData;
        $collection = $db->moviedetail;
        $arrayObj = new ArrayObject();
        $cursor = $collection->find();
        $cursor->limit(15);
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