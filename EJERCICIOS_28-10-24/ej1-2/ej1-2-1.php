<?php
require __DIR__ . '../vendor/autoload.php';
use Fpdf\Fpdf;

$pdf = new Fpdf('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');

header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename='descargable.pdf'");
readfile("descargable.pdf")
?>