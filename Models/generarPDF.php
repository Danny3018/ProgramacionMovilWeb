<?php
require('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(1);
    // Título
    $this->Cell(184,10,'Trabajador     
        Cargo   
        ValorHora 
        Horas
        Subtotal',1,0,'C');
    // Salto de línea
    $this->Ln(20);
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

include '../conexion/conexion.php';


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


/*Se consultan los datos de la tabla con el mismo join para poderlos
imprimir en el pdf*/ 
$sql = $conn->prepare('SELECT nombreT , nombreC , numeroHoras ,valorHora, subtotal
            FROM otdetalle, trabajadores, trabajo WHERE otdetalle.codigoTrabajador = trabajadores.codigo
            and otdetalle.idTrabajo = trabajo.id;');
$sql->execute();

$sumaValor = 0;
$sumaTiempo = 0;

foreach ($sql as $row) {

   
/*se imprimen los datos del join dentro del archivo pdf en cada columna correspondiente*/ 
    $pdf->cell(37, 10 , $row['nombreT'], 1 , 0 , 'C' , 0);
    $pdf->cell(37, 10 , $row['nombreC'], 1 , 0 , 'C' , 0);
    $pdf->cell(37, 10 , $row['valorHora'], 1 , 0 , 'C' , 0);
    $pdf->cell(37, 10 , $row['numeroHoras'], 1 , 0 , 'C' , 0);
    $pdf->cell(37, 10 , $row['subtotal'], 1 , 1 , 'C' , 0);

    /* Esta sumando el total de los valores que se han asignado y el tiempo (en dias) que
    se han asignado
    */

    $sumaValor +=  $row['subtotal'];
    $sumaTiempo += $row['numeroHoras'];


}

/* Se muestra el resultado en el Pdf*/

$pdf->cell(260, 10 , "Total    
   " ."Horas ". $sumaTiempo."    
        ".$sumaValor." $" , 0 , 0 , 'C' , 0);
               

$pdf->Output();
