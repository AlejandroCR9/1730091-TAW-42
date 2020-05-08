<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
 //   $this->Image('../img/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte  de ingresos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(40,10, '#' ,1,0,'C',0);
	$this->Cell(40,10, 'Servicio' ,1,0,'C',0);
	$this->Cell(40,10, 'Fecha' ,1,0,'C',0);
	$this->Cell(40,10, 'Total',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../pdf/conn.php';
$consulta = "SELECT i.idIngreso AS idIngreso,  s.servicio AS servicio, i.fecha AS fecha, i.total AS total FROM ingresos i INNER JOIN servicios s ON i.idServicios = s.idServicios";
$resultado = $mysqli -> query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


while($row = $resultado->fetch_assoc()){
	$pdf->Cell(40,10, $row['idIngreso'],1,0,'C',0);
	$pdf->Cell(40,10, $row['servicio'],1,0,'C',0);	
	$pdf->Cell(40,10, $row['fecha'],1,0,'C',0);
	$pdf->Cell(40,10, $row['total'],1,1,'C',0);

}

$pdf->Output();
?>