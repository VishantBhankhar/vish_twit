<?php
require 'lib/fpdf/fpdf.php';
require_once './app/init.php';
$searchname=$_POST['search_name'];
$client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$usernamearr = (array)$client->users_lookup('user_id=' . $_SESSION['user_id']);
$personinfoarr=(array)$client->users_lookup('screen_name='.$searchname);
$tweets = (array)$client->statuses_userTimeline('screen_name=' . $searchname);
/*
print "<pre>";
print_r($usernamearr);
print "</pre>";
*/
foreach ($usernamearr as $value) {
    $username=$value->name;
    $userpic=$value->profile_image_url;
    break;
};
foreach ($personinfoarr as $value) {
    $personinfo=$value->name;
    $personpic=$value->profile_image_url;
    break;
};

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",20);
$pdf->Image($userpic);
$pdf->Write('','          Thank You '.$username.'.');
$pdf->SetFont("Arial","B",16);
$pdf->Ln(15);
$pdf->Image($personpic);
$pdf->Write('','           Here is '.$personinfo.'\'s tweets.');
$pdf->Ln(15);
$pdf->Cell(40,10,'ID',1,0,'C');
$pdf->Cell(100,10,'Tweet',1,0,'C');
$pdf->Cell(50,10,'At',1,0,'C');
$pdf->Ln(10);
$pdf->SetFont("Arial","I",8);
foreach ($tweets as $value) {
    if(isset($value->text)){
        $pdf->Cell(40,10,$value->id,1,0,'C');
        $pdf->Cell(100,10,$value->text,1,0,'C');
        $pdf->Cell(50,10,$value->created_at,1,0,'C');
        $pdf->Ln(10);
    }
    else break;
};
$pdf->Output();
/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/23/2017
 * Time: 12:47 AM
 */