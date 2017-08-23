<?php
require 'lib/fpdf/fpdf.php';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Write('Hello');
$pdf->Output();
/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/23/2017
 * Time: 12:47 AM
 */