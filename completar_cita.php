<?php
session_start();
include 'conexion.php'; 



$idCita = $_GET['id'];

$query = "UPDATE citas SET estado = 'Completada' WHERE idCita = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idCita);

if ($stmt->execute()) {
    header("Location: perfil.php");
} else {
    echo "Error al completar la cita: " . $stmt->error;
}
?>