<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',16);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70,10,utf8_decode('Detalles de la Cita Médica'),0,0,'C');
        
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
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

include ('conexion.php');

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "MedAgenda"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idCita = $_GET['id'];

$consulta = "SELECT c.fecha, c.hora, c.estado, p.nombrePaciente, m.nombreMedico 
             FROM citas c 
             JOIN pacientes p ON c.idPaciente = p.idPacientes 
             JOIN medicos m ON c.idMedico = m.idMedico 
             WHERE c.idCita = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $idCita);
$stmt->execute();
$resultado = $stmt->get_result();
$cita = $resultado->fetch_assoc();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

// Agregar los detalles de la cita al PDF
$pdf->Cell(50,10,utf8_decode('Fecha:'),1,0,'C',0);
$pdf->Cell(0,10,utf8_decode($cita['fecha']),1,1,'C',0);
$pdf->Cell(50,10,utf8_decode('Hora:'),1,0,'C',0);
$pdf->Cell(0,10,utf8_decode($cita['hora']),1,1,'C',0);
$pdf->Cell(50,10,utf8_decode('Estado:'),1,0,'C',0);
$pdf->Cell(0,10,utf8_decode($cita['estado']),1,1,'C',0);
$pdf->Cell(50,10,utf8_decode('Paciente:'),1,0,'C',0);
$pdf->Cell(0,10,utf8_decode($cita['nombrePaciente']),1,1,'C',0);
$pdf->Cell(50,10,utf8_decode('Medico:'),1,0,'C',0);
$pdf->Cell(0,10,utf8_decode($cita['nombreMedico']),1,1,'C',0);

$pdf->Output();

?>