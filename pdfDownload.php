<?php
require 'lib/fpdf/fpdf.php';
require_once './app/init.php';
$searchname=$_POST['search_name'];
$client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$usernamearr=(array)$client->users_lookup('user_id='.$_SESSION['user_id']);
$personinfo=(array)$client->users_show('screen_name='.$searchname);
print "<pre>";
print_r($usernamearr);
print "</pre>";

foreach ($usernamearr as $value) {
    $username=$value->name;
    break;
};


echo $username->name;


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",20);
$pdf->Write('','Thank You '.$username->name.' for using my website.');
$pdf->Ln();
$pdf->SetFont("Arial","B",16);
$pdf->Write('','Here is '.$personinfo->name.'\'s tweets.');
$pdf->Output();
/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/23/2017
 * Time: 12:47 AM
 */