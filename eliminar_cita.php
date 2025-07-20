<?php
session_start();
include 'conexion.php'; 

$idCita = $_GET['id'];

$query = "UPDATE citas SET estado = 'Cancelada' WHERE idCita = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idCita);

if ($stmt->execute()) {
    header("Location: perfil.php");
} else {
    echo "Error al cancelar la cita: " . $stmt->error;
}
?>