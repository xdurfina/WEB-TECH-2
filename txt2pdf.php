<?php


$myfile = fopen("octaveLogs.txt", "r") or die("Unable to open file!");
$text= fread($myfile, filesize("octaveLogs.txt"));

require('fpdf16/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(40,10,$text);
$pdf->Output();
fclose($myfile);

?>
