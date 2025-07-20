<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCita = $_POST['idCita'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idMedico = $_POST['idMedico'];

    $query = "UPDATE citas SET fecha = ?, hora = ?, idMedico = ? WHERE idCita = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $fecha, $hora, $idMedico, $idCita);

    if ($stmt->execute()) {
        header("Location: perfil.php");
    } else {
        echo "Error al actualizar la cita: " . $stmt->error;
    }
}
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>
