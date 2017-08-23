<?php
require 'lib/fpdf/fpdf.php';
require_once './app/init.php';
$searchname=$_POST['search_name'];
$client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$personinfo=(array)$client->users_show('screen_name='.$searchname);

        print "<pre>";
        print_r($personinfo);
        print "</pre>";

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","I",20);
$pdf->Write('Hello','My name is '.$searchname);
$pdf->Output();
/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/23/2017
 * Time: 12:47 AM
 */