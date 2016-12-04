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
        $db=$connObj->newdb;
        $collection=$db->movies;
        $arrayObj = new ArrayObject(array('moviename','rating','director'));
        $query = array( "movies" => array( 'genre' => $genre ) );
        $cursor= $collection->find($query);
        while($cursor->hasNext()){
            $arrayObj->append($cursor->getNext());
        }
        return $arrayObj;
    }

    function getMoviesByYear($year){
        $connObj=MongoClass::getInstance();
        $db=$connObj->newdb;
        $collection=$db->movies;
        $arrayObj = new ArrayObject(array('moviename','rating','director'));
        $query = array( "movies" => array( 'date' => $year) );
        $cursor= $collection->find($query);
        while($cursor->hasNext()){
            $arrayObj->append($cursor->getNext());
        }
        return $arrayObj;

    }

    function getAllMovies(){
        $connObj = MongoClass::getInstance();
        $db= $connObj->movies;
        $collection= $db->moviedetail;
        $arrayObj = new ArrayObject(array('Director','Year'));
        $cursor = $collection->find();
        for ($i = 0; $i < 10; $i++) {
            $arrayObj->append($cursor->getNext());
        }
        return $arrayObj;
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