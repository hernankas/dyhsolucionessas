<?php
require('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $equipo = $_POST['equipo'];
    $descripcion = $_POST['descripcion'];
    $solucion = $_POST['solucion'];
    $firma = $_POST['firma'];

    // Crear el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Reporte Tecnico', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Cliente: ' . $cliente, 0, 1);
    $pdf->Cell(0, 10, 'Equipo: ' . $equipo, 0, 1);
    $pdf->Cell(0, 10, 'Descripcion del Problema:', 0, 1);
    $pdf->MultiCell(0, 10, $descripcion);
    $pdf->Ln(5);
    $pdf->Cell(0, 10, 'Solucion Realizada:', 0, 1);
    $pdf->MultiCell(0, 10, $solucion);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Firma del Tecnico: ' . $firma, 0, 1);

    // Guardar o descargar el PDF
    $pdf->Output('I', 'reporte_tecnico.pdf');
}
?>
