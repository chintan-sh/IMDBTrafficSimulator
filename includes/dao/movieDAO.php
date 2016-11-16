<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once '/var/www/html/mdb/includes/common/constants.php';
include $Sankalp_Phy_Path.'/includes/db/mongo.php';
//include $Sankalp_Phy_Path.'/fpdf/fpdf.php';
//include '/var/www/html/mdb/vendor/autoload.php';

class movieDAO
{
    function insertMovie(){
        $connObj= new MongoClass();
        $collection= $connObj->getMovieCollection();
        $document = array(
            'title' => "James Bond",
            'Rating' => 95,
            'by' => "Chris");
        echo("Inserting -> ");
        $collection->insert($document, array("w" => 0));
        echo("Insertion worked! ");
    }

    function getMovie(){
        $connObj= new MongoClass();
        $collection= $connObj->getMovieCollection();
        $cursor = $collection->find();
        for ($i = 0; $i < 10; $i++) {
            var_dump($cursor->getNext());
        }
    }
    // Function to generate pdf from newdb
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