<?php
session_start();
include 'conexion.php';
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idMedico = $_POST['medico'];
    $idPaciente = $_SESSION['user_id'];

    $query = "INSERT INTO citas (fecha, hora, idPaciente, idMedico) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $fecha, $hora, $idPaciente, $idMedico);

    if ($stmt->execute()) {
        echo "Cita agendada exitosamente.";
        header("Location: perfil_paciente.php");
    } else {
        echo "Error al agendar la cita: " . $stmt->error;
    }
}

?>