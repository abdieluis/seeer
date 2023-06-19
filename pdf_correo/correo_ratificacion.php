<?php

require_once ("../db_functions/db_global.php");
require_once ("../db_functions/db_usuarios.php");
require_once ("../utilidades/funciones_utilidades.php");
require_once('../fpdf/fpdf.php');

// Crear una clase extendida de FPDF
class PDF extends FPDF {
    // Encabezado del documento
    function Header() {
        // Logo de la empresa
        // $this->Image('../images/ccl.png', 10, 10, 30);

        // Nombre de la empresa
        // $this->SetFont('Arial', 'B', 16);
        // $this->Cell(0, 10, 'Nombre de la Empresa', 0, 1, 'C');

        
        $this->SetFont('Arial', 'B', 16);
        $this->Image('../assets/membrete/membretado_ccl.jpg', -1,-3,212,300);
        $this->Ln(5);
    }

    // Pie de página del documento
    function Footer() {
        // Diseño de la empresa
        $this->SetFont('Arial', '', 10);
        // $this->Cell(0, 10, 'Diseno: Empresa', 0, 0, 'C');
    }
}

// Crear una instancia de la clase PDF
$pdf = new PDF();

// Agregar una página al PDF
$pdf->AddPage();

// Contenido del PDF

// Información de contacto de la empresa
//$nombre = $_POST['nombre']; // datos pedidos por post
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 50, utf8_decode( 'Confirmación de Ratificación'), 0, 1, 'C');

$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 0, utf8_decode('Información de la ratificación'), 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 90, utf8_decode('Mas información'), 0, 1);

// Generar el PDF y mostrarlo en el navegador
$pdf->Output();
// $pdf->Output('D','agenda_ratificacion'.'.pdf');

?>