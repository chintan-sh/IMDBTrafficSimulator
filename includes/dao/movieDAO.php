<?php

/**
 * Created by PhpStorm.
 * User: sankalp
 * Date: 11/10/16
 * Time: 11:14 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";
include $PHYSICAL_PATH.'/includes/db/mongo.php';
include $PHYSICAL_PATH.'/services/fpdf/fpdf.php';
require $PHYSICAL_PATH. '/includes/dao/s3DAO.php';

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
        $like = new MongoRegex("/$name/i");
        $query = array('Title' => $like, 'Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists' => true));
        $cursor = $collection->find($query); //$cursor->addOption( '$maxScan', 10 );//$cursor= $db->command(array("distinct"=>"moviesDetail",  "key" => "imdbID", $query));
        $cursor->limit(14);
        $resultArr = iterator_to_array($cursor);
        return $resultArr;
    }

    function getRandomMovies(){
        $connObj = MongoClass::getInstance();
        $collection=$connObj->moviesDetail;
        $rand = mt_rand(100, 600);
        $query = array('Poster' => array('$ne' => "N/A"), 'Poster' => array('$exists'=> true));
        $cursor = $collection->find($query);
        $cursor->skip($rand);
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
    function generatePDF(){
        $result = $this->getRandomMovies();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont("Arial", "B", 25);
        $pdf->Cell(0, 10, "List of all the movies", 1, 1, "C");
        $pdf->SetFont("Arial", "B", 10);
        foreach ($result as $item) {
            $pdf->Cell(200, 20, $item['Title'], 100);
            $pdf->Cell(200, 10, $item['Year'], 100);
            $pdf->Cell(200, 10, $item['Rated'], 100);
            $pdf->Ln();
        }
        $config = require( $_SERVER['DOCUMENT_ROOT'].'includes/common/s3_config.php');
        $file = uniqid();
        $filename= $_SERVER['DOCUMENT_ROOT']."uploads/".$file.".pdf";
        $pdf->Output($filename,"F");
        $bucketName= "sudowarlordsbucket";
        $s3= new S3($config['key'],$config['secret']);
        $new_name= "reports/user_report_".$file.'.pdf';
        S3::putObject($s3->inputFile($filename, true), 'sudowarlordsbucket', $new_name, S3::ACL_PUBLIC_READ_WRITE, array(), array(), S3::STORAGE_CLASS_RRS);
        unlink($filename);
        return "https://s3-us-west-2.amazonaws.com/".$bucketName."/".$new_name;
    }

}